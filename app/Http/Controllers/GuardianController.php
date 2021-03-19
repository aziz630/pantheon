<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GuardianService;
use Yajra\DataTables\Facades\DataTables;

class GuardianController extends Controller
{
    protected $guardian_service = null;

    public function __construct()
    {
        $this->guardian_service = new GuardianService();
    }



    /**
     * 
     * 
     * Return list view
     */

    public function guardians_list($p = null)
    {
        $page_title = 'Account Listing';
        $page_description = $p == null ? 'List of all active accounts' : 'List of all deleted accounts';
        $trashed = $p != null ? true : false;

        return view('pages.guardians.list', compact('page_title', 'page_description', 'trashed'));
    }



    /**
     * 
     * 
     * Read all guardians from the database through "service class"
     */

    public function read_all_guardians(Request $RQ)
    {
        $guardians = $this->guardian_service->get_all_guardians();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($guardians)->addIndexColumn()
                ->addColumn('guardianName', function ($row) {
                    $name = $row->grd_name;
                    return $name;
                })->addColumn('guardianCNIC', function ($row) {
                    $cnic = $row->grd_cnic_no;
                    return $cnic;
                })->addColumn('guardianContact', function ($row) {
                    $mobile = $row->grd_mobile;
                    return $mobile;
                })->addColumn('accountBalance', function ($row) {
                    $balance = $row->account_balance;
                    return $balance;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('account_Transactions/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Transaction history"><i class="flaticon-layers"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Read all trashed guardians from the database through "service class"
     */

    public function read_all_trashed_guardians(Request $RQ)
    {
        $guardians = $this->guardian_service->get_all_trashed_guardians();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($guardians)->addIndexColumn()
                ->addColumn('name', function ($row) {
                    $name = $row->grd_name;
                    return $name;
                })->addColumn('cnic', function ($row) {
                    $cnic = $row->grd_cnic;
                    return $cnic;
                })->addColumn('mobile', function ($row) {
                    $mobile = $row->grd_mobile;
                    return $mobile;
                })->addColumn('phone', function ($row) {
                    $phone = $row->grd_home_ph;
                    return $phone;
                })->addColumn('email', function ($row) {
                    $email = $row->grd_email;
                    return $email;
                })->addColumn('address', function ($row) {
                    $address = $row->grd_address;
                    return $address;
                })->addColumn('occupation', function ($row) {
                    $occupation = $row->grd_occupation;
                    return $occupation;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('guardian_restore/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Restor"><i class="fas fa-trash-restore"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Read a specifc guardian info and return 
     * a form view to edit a guardian 
     */

    public function show_transaction_history(Request $RQ, $id)
    {
        $page_title = 'Transactions History';
        $page_description = 'List all transactions history for this account';

        $transactions = $this->guardian_service->get_account_transactions($id);

        return view('pages.guardians.transaction_list', compact('page_title', 'page_description', 'transactions'));
    }


    /**
     * 
     * 
     * 
     * Cash deposit view
     */
    public function cash_deposit(Request $RQ, $id)
    {
        $page_title = 'Cash Deposit';
        $page_description = 'account recharging';

        $account_details = $this->guardian_service->get_a_guardian($id)[0];

        return view('pages.guardians.deposit', compact('page_title', 'page_description', 'account_details'));
    }


    /**
     * 
     * 
     * 
     * Cash withdraw view
     */
    public function cash_withdraw(Request $RQ, $id)
    {
        $page_title = 'Cash Withdraw';
        $page_description = 'account discharging';

        $account_details = $this->guardian_service->get_a_guardian($id)[0];

        return view('pages.guardians.withdraw', compact('page_title', 'page_description', 'account_details'));
    }


    /**
     * 
     * 
     * 
     * Reversing a last transaction 
     */
    public function reverse_transaction(Request $RQ, $id)
    {
        $page_title = 'Recent Transaction';
        $page_description = 'Reversing Transaction';

        $transaction_details = $this->guardian_service->get_a_transaction($id)[0];
        $account_details = $this->guardian_service->get_a_guardian($transaction_details->guardian_id)[0];

        return view('pages.guardians.revers_transaction', compact('page_title', 'page_description', 'account_details', 'transaction_details'));
    }


    /**
     * 
     * 
     * Store Family account transaction record. 
     */
    function save_account_transaction(Request $rq)
    {
        $res = $this->guardian_service->save_transaction($rq);
        if ($res) {
            return redirect()->back()->with('success', 'Transaction made successfully.');
        } else {
            return redirect()->back()->with('error', 'Transaction can not be made at this time.');
        }
    }


    /**
     * 
     * 
     * Update Family account transaction record. 
     */
    function update_account_transaction(Request $rq)
    {
        $res = $this->guardian_service->update_transaction($rq);
        if ($res) {
            return redirect()->back()->with('success', 'Transaction updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Transaction can not be updated at this time.');
        }
    }



    /**
     * 
     * 
     * Update guardian
     */

    public function update_guardian(Request $RQ)
    {
        $res = $this->guardian_service->update_guardian($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Guardian updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Guardian can not be updated at this time.');
        }
    }



    /**
     * 
     * 
     * Delete guardian
     */

    public function delete_guardian(Request $RQ, $id)
    {
        $res = $this->guardian_service->delete_guardian($id);
        if ($res) {
            return redirect()->back()->with('success', 'Guardian deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Guardian can not be deleted at this time.');
        }
    }



    /**
     * 
     * 
     * Restore guardian
     */

    public function restore_guardian(Request $RQ, $id)
    {
        $res = $this->guardian_service->restore_guardian($id);
        if ($res) {
            return redirect()->back()->with('success', 'Guardian restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Guardian can not be restored at this time.');
        }
    }
}
