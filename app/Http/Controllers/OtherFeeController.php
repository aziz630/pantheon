<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOtherFeeRequest;
use Illuminate\Http\Request;
use App\Services\OtherFeeService;
use Yajra\DataTables\Facades\DataTables;

class OtherFeeController extends Controller
{
    protected $other_fee_service = null;

    public function __construct()
    {
        $this->other_fee_service = new OtherFeeService();
    }



    /**
     * 
     * 
     * Return list view
     */

    public function other_fee_list($p = null)
    {
        $page_title = 'Other Fee Listing';
        $page_description = $p == null ? 'List of all active other fee' : 'List of all deleted other fee';
        $trashed = $p != null ? true : false;

        return view('pages.other_fee.list', compact('page_title', 'page_description', 'trashed'));
    }



    /**
     * 
     * 
     * Read all other_fee from the database through "service class"
     */

    public function read_all_other_fee(Request $RQ)
    {
        $other_fee = $this->other_fee_service->get_all_other_fee();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($other_fee)->addIndexColumn()
                ->addColumn('otherFeeName', function ($row) {
                    $other_feeName = $row->other_fee_name;
                    return $other_feeName;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('other_fee_edit/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('other_fee_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Read all trashed other_fee from the database through "service class"
     */

    public function read_all_trashed_other_fee(Request $RQ)
    {
        $other_fee = $this->other_fee_service->get_all_trashed_other_fee();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($other_fee)->addIndexColumn()
                ->addColumn('otherFeeName', function ($row) {
                    $otherFeeName = $row->other_fee_name;
                    return $otherFeeName;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('other_fee_restore/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Restore"><i class="fas fa-trash-restore"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Return a form view to create new other_fee
     */

    public function create_other_fee(Request $rq)
    {
        $page_title = 'Create OtherFee';
        $page_description = 'Use this form to create other_fee';

        return view('pages.other_fee.create', compact('page_title', 'page_description'));
    }



    /**
     * 
     * 
     * Save new other_fee
     */

    public function save_other_fee(StoreOtherFeeRequest $RQ)
    {
        $res = $this->other_fee_service->save_other_fee($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'OtherFee created successfully.');
        } else {
            return redirect()->back()->with('error', 'OtherFee can not be created at this time.');
        }
    }



    /**
     * 
     * 
     * Read a specifc other_fee info and return 
     * a form view to edit a other_fee 
     */

    public function edit_other_fee(Request $rq, $id)
    {
        $page_title = 'Edit OtherFee';
        $page_description = 'Use this form to edit/update other fee';

        $other_fee = $this->other_fee_service->get_a_other_fee($id)[0];
        return view('pages.other_fee.edit', compact('page_title', 'page_description', 'other_fee'));
    }



    /**
     * 
     * 
     * Update other_fee
     */

    public function update_other_fee(StoreOtherFeeRequest $RQ)
    {
        $res = $this->other_fee_service->update_other_fee($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'OtherFee created successfully.');
        } else {
            return redirect()->back()->with('error', 'OtherFee can not be created at this time.');
        }
    }



    /**
     * 
     * 
     * Delete other_fee
     */

    public function delete_other_fee(Request $rq, $id)
    {
        $res = $this->other_fee_service->delete_other_fee($id);
        if ($res) {
            return redirect()->back()->with('success', 'OtherFee deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'OtherFee can not be deleted at this time.');
        }
    }



    /**
     * 
     * 
     * Restore a class
     */

    public function restore_other_fee(Request $RQ, $id)
    {
        $res = $this->other_fee_service->restore_other_fee($id);
        if ($res) {
            return redirect()->back()->with('success', 'Other fee restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Other fee can not be restored at this time.');
        }
    }
}
