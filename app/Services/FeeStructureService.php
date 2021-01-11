<?php

namespace App\Services;

use App\Models\FeeStructure;
use App\Models\FeeStructureAmount;
use App\Services\FeeCategoryService;
use Illuminate\Support\Facades\DB;
use Throwable;

class FeeStructureService
{

    private $rq = null;

    /**
     * 
     * 
     * Read all fee structures
     */

    public function get_all_fee_structures()
    {

        $categories = false;

        $data = DB::table('fee_structures')
            ->join('academic_sessions', 'fee_structures.session_id', '=', 'academic_sessions.id')
            ->join('classes', 'fee_structures.class_id', '=', 'classes.id')
            ->select('fee_structures.*', 'academic_sessions.session', 'classes.class_name')
            ->where('fee_structures.deleted_at', '=', Null)
            ->get();

        if ($data) {
            $categories = $data;
        }

        return $categories;
    }


    /**
     * 
     * 
     * Read all trashed fee structures
     */

    public function get_all_trashed_fee_structures()
    {
        $categories = false;

        $data = DB::table('fee_structures')
            ->join('academic_sessions', 'fee_structures.session_id', '=', 'academic_sessions.id')
            ->join('classes', 'fee_structures.class_id', '=', 'classes.id')
            ->select('fee_structures.*', 'academic_sessions.session', 'classes.class_name')
            ->where('fee_structures.deleted_at', '!=', Null)
            ->get();

        if (count($data)) {
            $categories = $data;
        }

        return $categories;
    }



    /**
     * 
     * Read a specific fee structure info from the database.
     */

    public function get_a_fee_structure($id)
    {
        $category = false;

        $data = DB::table('fee_structures')
            ->join('fee_structure_amounts', 'fee_structures.id', '=', 'fee_structure_amounts.fee_structure_id')
            ->select('fee_structures.*', 'fee_structure_amounts.fee_category_id', 'fee_structure_amounts.fee_amount', 'fee_structure_amounts.no_repeat')
            ->where('fee_structures.id', '=', $id)
            ->get();

        if (count($data)) {
            $category = $data;
        }

        return $category;
    }



    /**
     * Save new feee structure
     */

    function save_fee_structure($rq)
    {
        $this->rq = $rq;

        try {
            DB::transaction(function () {
                $structure = FeeStructure::create([
                    'session_id' => $this->rq->sessionId,
                    'class_id' => $this->rq->classId
                ]);

                $feeStructureAmounts = $this->prepareStructureAmountArray($this->rq, $structure->id);
                FeeStructureAmount::insert($feeStructureAmounts);
            });

            $this->rq = null;
        } catch (Throwable $e) {
            return false;
        }

        return true;
    }

    /**
     * 
     * Preparing data for fee structure transaction
     */
    function prepareStructureAmountArray($rq, $structure)
    {
        $feeCategory_service = new FeeCategoryService();
        $data = array();
        $i = 0;

        $categories = $feeCategory_service->get_all_fee_categories();

        foreach ($categories as $category) {
            if (isset($rq[$category->category_name]) && $rq[$category->category_name] != '') {
                $data[$i] = array(
                    'fee_structure_id' => $structure,
                    'fee_category_id' => $rq[$category->category_name . '_id'],
                    'fee_amount' => $rq[$category->category_name],
                    'no_repeat' => isset($rq[$category->category_name . '_no_repeat']) ? 1 : 0,
                );

                $i++;
            }
        }

        return $data;
    }



    /**
     * 
     * Update a fee structure
     */

    public function update_fee_structure($rq)
    {
        $this->rq = $rq;
        try {
            DB::transaction(function () {

                $model = FeeStructure::find($this->rq->sID);
                $model->session_id = $this->rq->sessionId;
                $model->class_id = $this->rq->classId;
                $model->save();

                $model2 = FeeStructureAmount::where('fee_structure_id', $this->rq->sID);

                $model2->delete();

                $feeStructureAmounts = $this->prepareStructureAmountArray($this->rq, $this->rq->sID);
                FeeStructureAmount::insert($feeStructureAmounts);
            });

            $this->rq = null;
        } catch (Throwable $e) {
            return false;
        }

        return true;
    }



    /**
     * Delete a fee structure
     */

    function delete_fee_structure($id)
    {
        $model = FeeStructure::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }



    /**
     * Restore a fee structure
     */

    function restore_fee_structure($id)
    {
        $model = FeeStructure::withTrashed()->where('id', $id);
        if ($model->restore()) {
            return true;
        }

        return false;
    }
}
