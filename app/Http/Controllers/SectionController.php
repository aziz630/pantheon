<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use Illuminate\Http\Request;
use App\Services\SectionService;
use Yajra\DataTables\Facades\DataTables;

class SectionController extends Controller
{
    protected $section_service = null;

    public function __construct()
    {
        $this->section_service = new SectionService();
    }



    /**
     * 
     * 
     * Return list view
     */

    public function sections_list($p = null)
    {
        $page_title = 'Sections Listing';
        $page_description = $p == null ? 'List of all active sections' : 'List of all deleted sections';
        $trashed = $p != null ? true : false;

        return view('pages.sections.list', compact('page_title', 'page_description', 'trashed'));
    }



    /**
     * 
     * 
     * Read all sections from the database through "service class"
     */

    public function read_all_sections(Request $RQ)
    {
        $sections = $this->section_service->get_all_sections();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($sections)->addIndexColumn()
                ->addColumn('sectionName', function ($row) {
                    $sectionName = $row->section_name;
                    return $sectionName;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('section_edit/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('section_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Read all trashed sections from the database through "service class"
     */

    public function read_all_trashed_sections(Request $RQ)
    {
        $sections = $this->section_service->get_all_trashed_sections();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($sections)->addIndexColumn()
                ->addColumn('sectionName', function ($row) {
                    $sectionName = $row->section_name;
                    return $sectionName;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('section_restore/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Restore"><i class="fas fa-trash-restore"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Return a form view to create new section
     */

    public function create_section(Request $rq)
    {
        $page_title = 'Create Section';
        $page_description = 'Use this form to create section';

        return view('pages.sections.create', compact('page_title', 'page_description'));
    }



    /**
     * 
     * 
     * Save new section
     */

    public function save_section(StoreSectionRequest $RQ)
    {
        $res = $this->section_service->save_section($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Section created successfully.');
        } else {
            return redirect()->back()->with('error', 'Section can not be created at this time.');
        }
    }



    /**
     * 
     * 
     * Read a specifc section info and return 
     * a form view to edit a section 
     */

    public function edit_section(Request $rq, $id)
    {
        $page_title = 'Edit Section';
        $page_description = 'Use this form to edit/update section';

        $section = $this->section_service->get_a_section($id)[0];
        return view('pages.sections.edit', compact('page_title', 'page_description', 'section'));
    }



    /**
     * 
     * 
     * Update section
     */

    public function update_section(StoreSectionRequest $RQ)
    {
        $res = $this->section_service->update_section($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Section created successfully.');
        } else {
            return redirect()->back()->with('error', 'Section can not be created at this time.');
        }
    }



    /**
     * 
     * 
     * Delete section
     */

    public function delete_section(Request $rq, $id)
    {
        $res = $this->section_service->delete_section($id);
        if ($res) {
            return redirect()->back()->with('success', 'Section deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Section can not be deleted at this time.');
        }
    }



    /**
     * 
     * 
     * Restore a class
     */

    public function restore_section(Request $RQ, $id)
    {
        $res = $this->section_service->restore_section($id);
        if ($res) {
            return redirect()->back()->with('success', 'Section restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Section can not be restored at this time.');
        }
    }
}
