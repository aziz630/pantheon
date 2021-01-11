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
        $page_title = 'Guadian Listing';
        $page_description = $p == null ? 'List of all active guardians' : 'List of all deleted guardians';
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
                    $actBtn = '<a href="' . url('guardian_edit/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('guardian_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
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

    public function edit_guardian(Request $RQ, $id)
    {
        $page_title = 'Edit Guardian';
        $page_description = 'Use this form to edit/update student guardian';

        $guardian = $this->guardian_service->get_a_guardian($id)[0];

        return view('pages.guardians.edit', compact('page_title', 'page_description', 'guardian'));
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
