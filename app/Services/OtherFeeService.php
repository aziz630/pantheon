<?php

namespace App\Services;

use App\Models\OtherFee;

class OtherFeeService
{


    /**
     * 
     * Read all other_fee
     * */

    public function get_all_other_fee()
    {
        $other_fee = false;

        if ($data = OtherFee::all()) {
            $other_fee = $data;
        }

        return $other_fee;
    }


    /**
     * 
     * Read all trashed other_fee
     */

    public function get_all_trashed_other_fee()
    {
        $other_fee = false;

        if ($data = OtherFee::onlyTrashed()->get()) {
            $other_fee = $data;
        }

        return $other_fee;
    }



    /**
     * 
     * Read a specific class info from the database.
     */

    public function get_a_other_fee($id)
    {
        $other_fee = false;

        if ($data = OtherFee::where('id', $id)->get()) {
            $other_fee = $data;
        }
        return $other_fee;
    }



    /**
     * Save new other_fee
     */

    function save_other_fee($rq)
    {
        $model = new OtherFee();
        $model->other_fee_name = $rq->otherFeeName;

        if ($model->save()) {
            return true;
        }

        return false;
    }



    /**
     * Update a other_fee
     */

    function update_other_fee($rq)
    {
        $model = OtherFee::find($rq->oId);
        $model->other_fee_name = $rq->otherFeeName;

        if ($model->save()) {
            return true;
        }

        return false;
    }



    /**
     * Delete a other_fee
     */

    function delete_other_fee($id)
    {
        $model = OtherFee::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }



    /**
     * Restore a OtherFee
     */

    function restore_other_fee($id)
    {
        $model = OtherFee::withTrashed()->where('id', $id);
        if ($model->restore()) {
            return true;
        }

        return false;
    }
}
