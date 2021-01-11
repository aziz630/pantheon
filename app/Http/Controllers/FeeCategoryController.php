<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FeeCategoryService;
use Yajra\DataTables\Facades\DataTables;

class FeeCategoryController extends Controller
{
    protected $category_service = null;

    public function __construct()
    {
        $this->category_service = new FeeCategoryService();
    }



    /**
     * 
     * 
     * Return list view
     */

    public function fee_category_list($p = null)
    {
        $page_title = 'Fee Category Listing';
        $page_description = $p == null ? 'List of all active fee categories' : 'List of all deleted fee categories';
        $trashed = $p != null ? true : false;

        return view('pages.fee.fee_category.list', compact('page_title', 'page_description', 'trashed'));
    }



    /**
     * 
     * 
     * Read all fee categories from the database through "service class"
     */

    public function read_all_fee_categories(Request $RQ)
    {
        $categories = $this->category_service->get_all_fee_categories();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($categories)->addIndexColumn()
                ->addColumn('category', function ($row) {
                    $category = $row->category_name;
                    return $category;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('fee_category_edit/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('fee_category_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Read all trashed fee categories from the database through "service class"
     */

    public function read_all_trashed_fee_categories(Request $RQ)
    {
        $categories = $this->category_service->get_all_trashed_fee_categories();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($categories)->addIndexColumn()
                ->addColumn('category', function ($row) {
                    $category = $row->category_name;
                    return $category;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('fee_category_restore/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Restore"><i class="fas fa-trash-restore"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Return a form view to create new fee category
     */

    public function create_fee_category(Request $RQ)
    {
        $page_title = 'Create Fee category';
        $page_description = 'Use this form to create fee category';

        return view('pages.fee.fee_category.create', compact('page_title', 'page_description'));
    }



    /**
     * 
     * 
     * Save new fee category
     */

    public function save_fee_category(Request $RQ)
    {
        $res = $this->category_service->save_fee_category($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Fee category created successfully.');
        } else {
            return redirect()->back()->with('error', 'Fee category can not be created at this time.');
        }
    }



    /**
     * 
     * 
     * a form view to edit a fee category 
     */

    public function edit_fee_category(Request $RQ, $id)
    {
        $page_title = 'Edit Fee category';
        $page_description = 'Use this form to edit/update fee category';

        $category = $this->category_service->get_a_fee_category($id)[0];
        return view('pages.fee.fee_category.edit', compact('page_title', 'page_description', 'category'));
    }



    /**
     * 
     * 
     * Update fee category
     */

    public function update_fee_category(Request $RQ)
    {
        $res = $this->category_service->update_fee_category($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Fee category updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Fee category can not be updated at this time.');
        }
    }



    /**
     * 
     * 
     * Delete fee category
     */

    public function delete_fee_category(Request $RQ, $id)
    {
        $res = $this->category_service->delete_fee_category($id);
        if ($res) {
            return redirect()->back()->with('success', 'Fee category deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Fee category can not be deleted at this time.');
        }
    }



    /**
     * 
     * 
     * Restore fee category
     */

    public function restore_fee_category(Request $RQ, $id)
    {
        $res = $this->category_service->restore_fee_category($id);
        if ($res) {
            return redirect()->back()->with('success', 'Fee category restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Fee category can not be restored at this time.');
        }
    }
}
