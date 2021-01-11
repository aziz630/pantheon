<?php

namespace App\Services;

use App\Models\Guardian;

class GuardianService
{

    /**
     * 
     * Read all guardians from the database which are not deleted
     */

    public function get_all_guardians()
    {
        $guardians = false;

        if ($data = Guardian::all()) {
            $guardians = $data;
        }

        return $guardians;
    }

    /**
     * 
     * Read all guardians from the database which are deleted
     */

    public function get_all_trashed_guardians()
    {
        $guardians = false;

        if ($data = Guardian::onlyTrashed()->get()) {
            $guardians = $data;
        }

        return $guardians;
    }



    /**
     * 
     * Read a specific guardian info from the database.
     */

    public function get_a_guardian($id)
    {
        $guardian = false;

        if ($data = Guardian::where('id', $id)->get()) {
            $guardian = $data;
        }
        return $guardian;
    }



    /**
     * Save new guardian
     */

    function save_guardian($rq)
    {
        $model = new Guardian();
        $model->grd_name = $rq->guardianName;
        $model->grd_cnic = $rq->guardianCnic;
        $model->grd_cnic_copy = 'image file';
        $model->grd_mobile = $rq->guardianMobile;
        $model->grd_home_ph = $rq->guardianPhone;
        $model->grd_email = $rq->guardianEmail;
        $model->grd_address = $rq->guardianAddress;
        $model->grd_occupation = $rq->guardianOccupation;
        $model->account_balance = $rq->guardianBalance;

        if ($model->save()) {
            return true;
        }

        return false;
    }



    /**
     * Update a guardian
     */

    function update_guardian($rq)
    {
        $model = Guardian::find($rq->cId);
        $model->grd_name = $rq->guardianName;
        $model->grd_cnic = $rq->guardianCnic;
        $model->grd_cnic_copy = 'image file';
        $model->grd_mobile = $rq->guardianMobile;
        $model->grd_home_ph = $rq->guardianPhone;
        $model->grd_email = $rq->guardianEmail;
        $model->grd_address = $rq->guardianAddress;
        $model->grd_occupation = $rq->guardianOccupation;
        $model->account_balance = $rq->guardianBalance;

        if ($model->save()) {
            return true;
        }

        return false;
    }



    /**
     * Delete a guardian
     */

    function delete_guardian($id)
    {
        $model = Guardian::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }



    /**
     * Restore a guardian
     */

    function restore_guardian($id)
    {
        $model = Guardian::withTrashed()->where('id', $id);
        if ($model->restore()) {
            return true;
        }

        return false;
    }
}
