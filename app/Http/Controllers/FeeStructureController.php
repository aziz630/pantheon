<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FeeStructureService;
use App\Services\FeeCategoryService;
use App\Services\ClassesService;
use App\Services\SessionService;
use Yajra\DataTables\Facades\DataTables;

class FeeStructureController extends Controller
{
    protected $structure_service = null;

    public function __construct()
    {
        $this->structure_service = new FeeStructureService();
    }



    /**
     * 
     * 
     * Return list view
     */

    public function fee_structure_list($p = null)
    {
        $page_title = 'Fee Structure Listing';
        $page_description = $p == null ? 'List of all active fee structure' : 'List of all deleted fee structure';
        $trashed = $p != null ? true : false;

        return view('pages.fee.fee_structure.list', compact('page_title', 'page_description', 'trashed'));
    }



    /**
     * 
     * 
     * Read all fee structure from the database through "service class"
     */

    public function read_all_fee_structures(Request $RQ)
    {
        $structures = $this->structure_service->get_all_fee_structures();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($structures)->addIndexColumn()
                ->addColumn('session', function ($row) {
                    $session = $row->session;
                    return $session;
                })
                ->addColumn('class', function ($row) {
                    $class = $row->class_name;
                    return $class;
                })
                ->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('fee_structure_edit/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('fee_structure_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Read all trashed fee structure from the database through "service class"
     */

    public function read_all_trashed_fee_structures(Request $RQ)
    {
        $structures = $this->structure_service->get_all_trashed_fee_structures();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($structures)->addIndexColumn()
                ->addColumn('session', function ($row) {
                    $session = $row->session;
                    return $session;
                })
                ->addColumn('class', function ($row) {
                    $class = $row->class_name;
                    return $class;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('fee_structure_restore/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Restore"><i class="fas fa-trash-restore"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Return a form view to create new fee structure
     */

    public function create_fee_structure(Request $RQ)
    {
        $feeCategory_service = new FeeCategoryService();
        $class_service = new ClassesService();
        $session_service = new SessionService();

        $fee_categories = $feeCategory_service->get_all_fee_categories();
        $sessions = $session_service->get_all_sessions();
        $classes = $class_service->get_all_classes();

        $fee_categories = count($fee_categories) > 0 ? $fee_categories : false;
        $page_title = 'Create Fee structure';
        $page_description = 'Use this form to create fee structure';


        return view('pages.fee.fee_structure.create', compact('page_title', 'page_description', 'fee_categories', 'sessions', 'classes'));
    }



    /**
     * 
     * 
     * Save new fee structure
     */

    public function save_fee_structure(Request $RQ)
    {
        $res = $this->structure_service->save_fee_structure($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Fee structure created successfully.');
        } else {
            return redirect()->back()->with('error', 'Fee structure can not be created at this time.');
        }
    }



    /**
     * 
     * 
     * a form view to edit a fee structure 
     */

    public function edit_fee_structure(Request $RQ, $id)
    {
        $feeCategory_service = new FeeCategoryService();
        $class_service = new ClassesService();
        $session_service = new SessionService();

        $fee_categories = $feeCategory_service->get_all_fee_categories();
        $sessions = $session_service->get_all_sessions();
        $classes = $class_service->get_all_classes();

        $fee_categories = count($fee_categories) > 0 ? $fee_categories : false;

        $page_title = 'Edit Fee structure';
        $page_description = 'Use this form to edit/update fee structure';

        $structure = $this->structure_service->get_a_fee_structure($id);

        //dd($structure);
        return view('pages.fee.fee_structure.edit', compact('page_title', 'page_description', 'structure', 'fee_categories', 'sessions', 'classes'));
    }



    /**
     * 
     * 
     * Update fee structure
     */

    public function update_fee_structure(Request $RQ)
    {
        $res = $this->structure_service->update_fee_structure($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Fee structure updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Fee structure can not be updated at this time.');
        }
    }



    /**
     * 
     * 
     * Delete fee structure
     */

    public function delete_fee_structure(Request $RQ, $id)
    {
        $res = $this->structure_service->delete_fee_structure($id);
        if ($res) {
            return redirect()->back()->with('success', 'Fee structure deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Fee structure can not be deleted at this time.');
        }
    }



    /**
     * 
     * 
     * Restore fee structure
     */

    public function restore_fee_structure(Request $RQ, $id)
    {
        $res = $this->structure_service->restore_fee_structure($id);
        if ($res) {
            return redirect()->back()->with('success', 'Fee structure restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Fee structure can not be restored at this time.');
        }
    }
}
