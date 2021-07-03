<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassRequest;
use Illuminate\Http\Request;
use App\Services\ClassesService;
use App\Services\SectionService;
use Yajra\DataTables\Facades\DataTables;

class ClassController extends Controller
{
    protected $class_service = null;
    protected $section_service = null;

    public function __construct()
    {
        $this->class_service = new ClassesService();
        $this->section_service = new SectionService();
    }



    /**
     * 
     * 
     * Return list view
     */

    public function classes_list($p = null)
    {
        $page_title = 'Classes Listing';
        $page_description = $p == null ? 'List of all active classes' : 'List of all deleted classes';
        $trashed = $p != null ? true : false;

        return view('pages.classes.list', compact('page_title', 'page_description', 'trashed'));
    }



    /**
     * 
     * 
     * Read all classes from the database through "service class"
     */

    public function read_all_classes(Request $RQ)
    {
        $classes = $this->class_service->get_all_classes();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($classes)->addIndexColumn()
                ->addColumn('className', function ($row) {
                    $className = $row->class_name;
                    return $className;
                })->addColumn('classLimit', function ($row) {
                    $classLimit = $row->class_limit;
                    return $classLimit;
                })->addColumn('classSections', function ($row) {
                    $classSections = count($row->sections);
                    return $classSections;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('class_edit/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('class_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Read all trashed classes from the database through "service class"
     */

    public function read_all_trashed_classes(Request $RQ)
    {
        $classes = $this->class_service->get_all_trashed_classes();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($classes)->addIndexColumn()
                ->addColumn('className', function ($row) {
                    $className = $row->class_name;
                    return $className;
                })->addColumn('classLimit', function ($row) {
                    $classLimit = $row->class_limit;
                    return $classLimit;
                })->addColumn('classSections', function ($row) {
                    $classSections = count($row->sections);
                    return $classSections;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('class_restore/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Restor"><i class="fas fa-trash-restore"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Read all available sections and 
     * Return a form view to create new class
     */

    public function create_class(Request $RQ)
    {
        $page_title = 'Create Class';
        $page_description = 'Use this form to create class';

        $sections = $this->section_service->get_all_sections();
        return view('pages.classes.create', compact('page_title', 'page_description', 'sections'));
    }



    /**
     * 
     * 
     * Save new class
     */

    public function save_class(StoreClassRequest $RQ)
    {
        // dd($RQ);
        $res = $this->class_service->save_class($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Class created successfully.');
        } else {
            return redirect()->back()->with('error', 'Class can not be created at this time.');
        }
    }



    /**
     * 
     * 
     * Read a specifc class info and return 
     * a form view to edit a class 
     */

    public function edit_class(Request $RQ, $id)
    {
        $page_title = 'Edit Class';
        $page_description = 'Use this form to edit/update class';

        $class = $this->class_service->get_a_class($id)[0];
        $sections = $this->section_service->get_all_sections();

        return view('pages.classes.edit', compact('page_title', 'page_description', 'class', 'sections'));
    }



    /**
     * 
     * 
     * Update class
     */

    public function update_class(StoreClassRequest $RQ)
    {
        $res = $this->class_service->update_class($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Class updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Class can not be updated at this time.');
        }
    }



    /**
     * 
     * 
     * Delete class
     */

    public function delete_class(Request $RQ, $id)
    {
        $res = $this->class_service->delete_class($id);
        if ($res) {
            return redirect()->back()->with('success', 'Class deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Class can not be deleted at this time.');
        }
    }



    /**
     * 
     * 
     * Restore class
     */

    public function restore_class(Request $RQ, $id)
    {
        $res = $this->class_service->restore_class($id);
        if ($res) {
            return redirect()->back()->with('success', 'Class restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Class can not be restored at this time.');
        }
    }
}
