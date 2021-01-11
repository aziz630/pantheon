<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FeeService;
use App\Services\GuardianService;
use App\Services\StudentService;
use Yajra\DataTables\Facades\DataTables;

class FeeController extends Controller
{
    protected $fee_service = null;

    public function __construct()
    {
        $this->fee_service = new FeeService();
    }



    /**
     * 
     * 
     * Return list view
     */

    public function fee_register($p = null)
    {
        $page_title = 'Fee Register';
        $page_description = $p == null ? 'Active fee register' : 'Trashed fee register';
        $trashed = $p != null ? true : false;

        return view('pages.fee.list', compact('page_title', 'page_description', 'trashed'));
    }



    /**
     * 
     * 
     * Read all fee from the database through "service class"
     */

    public function read_all_fee_records(Request $RQ)
    {
        $feeRecords = $this->fee_service->read_all_processed_transactions();
        //$students = $this->fee_service->get_all_students_from_fee_register();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($feeRecords)
                ->addColumn('enrollment', function ($row) {
                    $enrollment = $row[count($row) - 1]->std_id;
                    return $enrollment;
                })
                ->addColumn('studentName', function ($row) {
                    $studentName = $row[count($row) - 1]->std_name;
                    return $studentName;
                })
                ->addColumn('fatherName', function ($row) {
                    $fatherName = $row[count($row) - 1]->std_father_name;
                    return $fatherName;
                })
                ->addColumn('lastTransaction', function ($row) {
                    $lastTransaction = date_format(date_create($row[count($row) - 1]->transaction_date), 'd M Y');
                    return $lastTransaction;
                })
                ->addColumn('debit', function ($row) {
                    $debit = $row[count($row) - 1]->debit_amount;
                    return $debit;
                })
                ->addColumn('credit', function ($row) {
                    $credit = $row[count($row) - 1]->credit_amount;
                    return $credit;
                })
                ->addColumn('dues', function ($row) {
                    $dues = $row[count($row) - 1]->amount_payable;
                    return $dues;
                })
                ->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('fee_transaction_history/' . $row[count($row) - 1]->std_id . '/' . $row[count($row) - 1]->guardian_id) . '" class="btn btn-sm btn-clean btn-icon" title="Transactions History"><i class="flaticon-layers"></i></a>';
                    return $actBtn;
                })
                ->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Return list view of student transaction history
     */

    public function show_transaction_history($std_id, $guardian_id, $p = null)
    {
        //dd($std_id, $guardian_id);
        $page_title = 'Fee Register';
        $page_description = $p == null ? 'Active fee register' : 'Trashed fee register';
        $trashed = $p != null ? true : false;

        $transactions = $this->fee_service->get_all_fee_records($std_id);

        return view('pages.fee.transaction_list', compact('page_title', 'page_description', 'trashed', 'transactions', 'std_id'));
    }




    /**
     * 
     * 
     * Generate Fee Slips for all students
     */
    public function generate_fee_slips()
    {
        /**
         * 
         * We will generate fee slip automatically through CRON JOBs 
         * 
         * get all active students, their fee structure and previous dues from fee register table
         * apply fee structure + previous dues
         * make entry in both current month fee slip and fee register tables
         * 
         */
    }




    /**
     * 
     * 
     * Return a form view to collect fee
     */

    public function collect_fee(Request $RQ, $std_id = null, $firstTime = false)
    {
        $page_title = 'Fee register';
        $page_description = 'Collect Fee';

        $student_service = new StudentService();

        $student = ($std_id != null) ? $student_service->get_a_student($std_id) : null;
        if ($std_id != null && !$student) return redirect()->back()->with('error', 'Student not found');

        $fee_details = $std_id != null ? ($firstTime == null ? $this->fee_service->get_all_fee_records($std_id)->last() : $this->fee_service->get_fee_details_for_firt_time_enrollment($std_id)) : null;

        // If the request is done for a new student then we should process the fee details here,
        // we have to loop through all the fee categories and generate the desired fee slip

        if ($firstTime) {
            $student_fee_details = [];
            $i = 0; // iterator

            foreach ($fee_details as $category_fee) {
                if ($i == 0) {
                    $student_fee_details = array(
                        'student_id' => $category_fee->student_id,
                        'student_name' => $category_fee->std_name,
                        'father_name' => $category_fee->std_father_name,
                        'class_id' => $category_fee->class_id,
                        'section_id' => $category_fee->section_id,
                        'session_id' => $category_fee->structure_session,
                        'guardian_id' => $category_fee->guardian_id,
                        'structure_id' => $category_fee->structure_id,
                        'fee_details' => [
                            [
                                'category_id' => $category_fee->fee_category_id,
                                'category_name' => $category_fee->category_name,
                                'fee_amount' => $category_fee->fee_amount,
                                'no_repeat' => $category_fee->no_repeat,
                            ]
                        ]
                    );
                } else {
                    $student_fee_details['fee_details'][$i] = [
                        'category_id' => $category_fee->fee_category_id,
                        'category_name' => $category_fee->category_name,
                        'fee_amount' => $category_fee->fee_amount,
                        'no_repeat' => $category_fee->no_repeat,
                    ];
                }

                $i++;
            }

            $fee_details = $student_fee_details;
        }

        return view('pages.fee.collect', compact('page_title', 'page_description', 'student', 'firstTime', 'fee_details'));
    }




    /**
     * 
     * 
     * Return an ajax response with student and his/her fee details
     */

    public function student_fee_details(Request $RQ)
    {
        $std_id = $RQ->enrno;

        $student_service = new StudentService();

        $student = $std_id != null ? $student_service->get_a_student($std_id) : null;
        $fee_details = $this->fee_service->get_all_fee_records($std_id)->last();

        return array(
            'status' => 200,
            'data' => [
                'student' => $student,
                'fee_details' => $fee_details
            ]
        );
    }



    /**
     * 
     * 
     * Save new fee collection
     */

    public function save_fee_record(Request $RQ)
    {
        //dd($RQ);
        if ($RQ->first_time) {

            /**
             * 
             * Check if payment type is Pay from account 
             * then check account balance,
             * if account have sufficent balance then make transactions (collect fee, deduct from account)
             * remove entry from current month fee slips table
             * redirect back with success message
             * otherwise redirect back with insufficent balance message
             */

            /**
             * 
             * if payment type is Cash Pay
             * then collect deposit fee
             * remove entry from current month fee slips table
             * redirect back with success message
             */




            if ($RQ->paymentType == "cash") {
                $resp = $this->fee_service->collect_cash_from_student_first_time($RQ);

                if ($resp) {
                    return redirect(url('students'))->with('success', 'Student Enrolled successfully.');
                } else {

                    dd($resp);
                    return redirect(url('students'))->with('error', 'Student can not be Enrolled at this time.');
                }
            }
        } else {
            dd('Your selected payment type is "Continue with dues"', 'This payment type is currently unavailable');
        }


        /**
         * 
         * if payment type is Continue with Dues
         * then just remove entry from current month fee slips table
         * redirect back with success message
         */


        //$res = $this->fee_service->save_fee_record($RQ);
        // if ($resp) {
        //     return redirect(url('students'))->with('success', 'Student Enrolled successfully.');
        // } else {
        //     return redirect(url('students'))->with('error', 'Student can not be Enrolled at this time.');
        // }
    }



    /**
     * 
     * 
     * a form view to edit a fee record
     */

    public function edit_fee_record(Request $RQ, $id)
    {
        $page_title = 'Edit Fee register';
        $page_description = 'Use this form to edit/update fee record';

        dd('This page is under development, thanks.');

        $fee = $this->fee_service->get_a_fee_record($id)[0];
        return view('pages.fee.edit', compact('page_title', 'page_description', 'fee'));
    }



    /**
     * 
     * 
     * Update fee record
     */

    public function update_fee_record(Request $RQ)
    {
        $res = $this->fee_service->update_fee_record($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Fee collection updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Fee collection can not be updated at this time.');
        }
    }



    /**
     * 
     * 
     * Delete fee record
     */

    public function delete_fee_record(Request $RQ, $id)
    {
        $res = $this->fee_service->delete_fee_record($id);
        if ($res) {
            return redirect()->back()->with('success', 'Fee record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Fee record can not be deleted at this time.');
        }
    }



    /**
     * 
     * 
     * Restore fee record
     */

    public function restore_fee_record(Request $RQ, $id)
    {
        $res = $this->fee_service->restore_fee_record($id);
        if ($res) {
            return redirect()->back()->with('success', 'Fee record restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Fee record can not be restored at this time.');
        }
    }
}
