<?php

namespace App\Services;

use App\Models\FamilyTransaction;
use App\Models\Guardian;
use Illuminate\Support\Facades\DB;

class GuardianService
{

    /**
     * 
     * Read all guardians from the database which are not deleted
     */

    public function get_all_guardians()
    {
        $guardians = collect();

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
        $guardians = collect();

        if ($data = Guardian::onlyTrashed()->get()) {
            $guardians = $data;
        }

        return $guardians;
    }


    /**
     * 
     * 
     * Read all fee records (Transaction history) for a specific student
     */

    public function get_account_transactions($id)
    {
        $feeRecords = false;

        $data = Guardian::with('account_transaction')->where('id', $id)->get()->sortBy('account_transaction.transaction_date', SORT_REGULAR, false);

        if (count($data)) {
            $feeRecords = $data[0];
        }
        return $feeRecords;
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


    /*********************************************************** account transactions */

    /**
     * 
     * 
     * 
     * Get a last transaction for specific family account for reverse transaction
     */
    function get_a_transaction($id)
    {
        $transaction_details = FamilyTransaction::where('id', $id)->get();
        if ($transaction_details)
            return $transaction_details;
        return false;
    }

    /**
     * 
     * 
     * 
     * Save deposit/withdraw transaction from/to account
     */
    function save_transaction($rq)
    {
        $guardian_account = FamilyTransaction::where('guardian_id', $rq->account_id)->get()->sortBy('account_transaction.transaction_date', SORT_REGULAR, false)->last();
        $family_account_new_balance = 0;

        $model = new FamilyTransaction();
        $model->guardian_id = $rq->account_id;
        $model->transaction_date = $rq->date;
        $model->description = $rq->description;

        if ($rq->transactionType == 'deposit') {
            $model->debit_amount = $rq->amount;
            $model->credit_amount = 0;
            $model->balance = $family_account_new_balance = $guardian_account->balance + $rq->amount;
        } else if ($rq->transactionType == 'withdraw') {
            $model->debit_amount = 0;
            $model->credit_amount = $rq->amount;
            $model->balance = $family_account_new_balance = $guardian_account->balance - $rq->amount;
        }

        $model->is_notified = 1;

        if ($model->save()) {
            $model = Guardian::find($rq->account_id);
            $model->account_balance = $family_account_new_balance;
            $model->save();
            return true;
        }

        return false;
    }

    /**
     * 
     * 
     * 
     * update Recent deposit/withdraw transaction from/to account
     */
    function update_transaction($rq)
    {
        $guardian = Guardian::find($rq->account_id);
        $family_account_new_balance = 0;

        $model = FamilyTransaction::find($rq->transactionID);
        if ($rq->description != '')
            $model->description = $rq->description;

        if (isset($rq->prevDebit)) {
            // Calculate Family account new balance
            $family_account_new_balance = ($guardian->account_balance - $rq->prevDebit) + $rq->amount;

            $model->debit_amount = $rq->amount;
            $model->credit_amount = 0;
            $model->balance = $family_account_new_balance;
        } else if (isset($rq->prevCredit)) {
            // Calculate Family account new balance
            $family_account_new_balance = ($guardian->account_balance + $rq->prevCredit) - $rq->amount;

            $model->debit_amount = 0;
            $model->credit_amount = $rq->amount;
            $model->balance = $family_account_new_balance;
        }

        $model->is_notified = 1;

        if ($model->save()) {
            $guardian->account_balance = $family_account_new_balance;
            $guardian->save();
            return true;
        }

        return false;
    }
}
