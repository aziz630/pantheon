<?php

namespace App\Services;

use App\Models\Fee;
use App\Models\Guardian;
use Illuminate\Support\Facades\DB;
use Throwable;

class FeeService
{


    /**
     * 
     * 
     * 
     * Read all last transactions for each student from fee_register
     */
    public function read_all_processed_transactions()
    {
        $feeRecords = collect();

        $data = DB::table('fee_register')
            ->join('students', 'fee_register.student_id', '=', 'students.id')
            ->select('fee_register.*', 'students.id as std_id', 'students.std_name', 'students.std_father_name', 'students.guardian_id')
            ->where('fee_register.deleted_at', '=', Null)
            ->where('fee_register.is_processed', '=', True)
            ->orderBy('fee_register.transaction_date')
            ->get()
            ->groupBy('std_id');

        if (count($data)) {
            $feeRecords = $data;
        }
        return $feeRecords;
    }


    /**
     * 
     * 
     * Read all fee records (Transaction history) for a specific student
     */

    public function get_all_fee_records($id)
    {
        $feeRecords = false;

        $data = DB::table('fee_register')
            ->join('students', 'fee_register.student_id', '=', 'students.id')
            ->join('guardians', 'students.guardian_id', '=', 'guardians.id')
            ->select(
                'fee_register.*',
                'students.id as std_id',
                'students.std_name',
                'students.std_father_name',
                'guardians.grd_name as account_title',
                'guardians.account_balance'
            )
            ->where('fee_register.deleted_at', '=', Null)
            ->where('fee_register.student_id', '=', $id)
            ->orderBy('fee_register.transaction_date')
            ->get();

        if (count($data)) {
            $feeRecords = $data;
        }
        return $feeRecords;
    }


    /**
     * 
     * 
     * Read all fee records (Transaction history) for a specific student
     */

    public function get_fee_details_for_firt_time_enrollment($id)
    {

        $feeRecords = false;

        $data = DB::table('enrollments')
            ->join('students', 'enrollments.student_id', '=', 'students.id')
            ->join('fee_structures', function ($join) {
                $join->on('enrollments.academic_session_id', '=', 'fee_structures.session_id')
                    ->on('enrollments.class_id', '=', 'fee_structures.class_id');
            })
            ->join('fee_structure_amounts', 'fee_structures.id', '=', 'fee_structure_amounts.fee_structure_id')
            ->join('fee_categories', 'fee_structure_amounts.fee_category_id', '=', 'fee_categories.id')
            ->join('guardians', 'students.guardian_id', '=', 'guardians.id')
            ->select(
                'enrollments.*',
                'students.std_name',
                'students.std_father_name',
                'students.id as student_id',
                'fee_structures.id as structure_id',
                'fee_structures.session_id as structure_session',
                'fee_structures.class_id as structure_class',
                'fee_structure_amounts.*',
                'fee_categories.*',
                'guardians.id as guardian_id'
            )
            ->where('fee_structures.deleted_at', '=', Null)
            ->where('enrollments.student_id', '=', $id)
            ->get();
        if (count($data)) {
            $feeRecords = $data;
        }
        return $feeRecords;
    }

    //// ***************** we use the following method for first time enrollment fee collection,
    //// The above is working properly but not in our desired format
    public function ajax_fee_structure_and_amounts($rq)
    {

        $feeStructure = false;

        try {
            $data = DB::table('classes')
                ->join('fee_structures', 'classes.id', '=', 'fee_structures.class_id')
                ->join('fee_structure_amounts', 'fee_structures.id', '=', 'fee_structure_amounts.fee_structure_id')
                ->join('fee_categories', 'fee_structure_amounts.fee_category_id', '=', 'fee_categories.id')
                ->select(
                    'classes.id as class_id',
                    'fee_structures.id as structure_id',
                    'fee_structures.session_id as structure_session',
                    'fee_structure_amounts.*',
                    'fee_categories.id as category_id',
                    'fee_categories.category_name as category_name'
                )
                ->where('fee_structures.class_id', '=', $rq->classID)
                ->where('fee_structures.session_id', '=', $rq->sessionID)
                ->get();

            if (count($data)) {
                $feeStructure = $data;
            }
        } catch (Throwable $e) {
            $feeStructure = false;
        }

        return $feeStructure;
    }



    /**
     * 
     * 
     * 
     * First time collection
     * perform fee collection transaction for payment type cash. 
     */
    public function collect_cash_from_student_first_time($rq)
    {
        $this->rq = $rq;

        try {
            DB::transaction(function () {
                $guardian = Guardian::find($this->rq->guardian_id);
                $guardian->account_balance = intval($this->rq->Security) + intval($guardian->account_balance);
                $guardian->save();

                Fee::insert([
                    [
                        'student_id' => $this->rq->enrollment,
                        'fee_structure_id' => $this->rq->structure_id,
                        'fee_month' => date('F'),
                        'transaction_date' => date('Y-m-d H:i:s', strtotime("-1 minutes")),
                        'description' => 'Amount payable for new admission',
                        'discount_amount' => 0,
                        'debit_amount' => 0,
                        'credit_amount' => intval($this->rq->deposit) + intval($this->rq->concission),
                        'amount_payable' => intval($this->rq->deposit) + intval($this->rq->concission),
                        'is_notified' => 1,
                        'is_processed' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ], [
                        'student_id' => $this->rq->enrollment,
                        'fee_structure_id' => $this->rq->structure_id,
                        'fee_month' => date('F'),
                        'transaction_date' => date('Y-m-d H:i:s', time()),
                        'description' => 'Amount paid for new Admission, ' . intval($this->rq->Security) . ' security fee is deposited to family account',
                        'discount_amount' => $this->rq->concission,
                        'debit_amount' => intval($this->rq->deposit) - intval($this->rq->Security),
                        'credit_amount' => 0,
                        'amount_payable' => 0,
                        'is_notified' => 1,
                        'is_processed' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]
                ]);
            });

            $this->rq = null;
        } catch (Throwable $e) {
            dd($e);
            return false;
        }

        return true;
    }


    /**
     * 
     * 
     * Read all transactions which are not processed by finance officer
     */

    public function read_all_unprocessed_transactions()
    {
        $feeRecords = collect();

        $data = DB::table('fee_register')
            ->join('students', 'fee_register.student_id', '=', 'students.id')
            ->select('fee_register.*', 'students.id as std_id', 'students.std_name', 'students.std_father_name', 'students.guardian_id')
            ->where('fee_register.deleted_at', '=', Null)
            ->where('fee_register.is_processed', '=', False)
            ->orderBy('fee_register.transaction_date')
            ->get()
            ->groupBy('std_id');

        if (count($data)) {
            $feeRecords = $data;
        }
        return $feeRecords;
    }



    /**
     * 
     * Read a specific fee record info from the database.
     */

    public function get_a_fee_record($id)
    {
        $fee = false;

        if ($data = Fee::where('id', $id)->get()) {
            $fee = $data;
        }
        return $fee;
    }



    /**
     * Save new fee record
     */

    function save_fee_record($rq)
    {
        $model = new Fee();
        //$model->category_name = $rq->categoryName;

        if ($model->save()) {
            return true;
        }

        return false;
    }



    /**
     * 
     * Update a fee record
     */

    public function update_fee_record($rq)
    {
        $model = Fee::find($rq->sId);
        //$model->category_name = $rq->categoryName;

        if ($model->save()) {
            return true;
        }
        return false;
    }



    /**
     * Delete a fee record
     */

    function delete_fee_record($id)
    {
        $model = Fee::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }



    /**
     * Restore a fee record
     */

    function restore_fee_record($id)
    {
        $model = Fee::withTrashed()->where('id', $id);
        if ($model->restore()) {
            return true;
        }

        return false;
    }
}
