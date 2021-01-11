<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubjectService;
use Yajra\DataTables\Facades\DataTables;

class SubjectController extends Controller
{
    protected $subject_service = null;

    public function __construct()
    {
        $this->subject_service = new SubjectService();
    }



    /**
     * 
     * 
     * Return list view
     */

    public function subjects_list($p = null)
    {
        $page_title = 'Subjects Listing';
        $page_description = $p == null ? 'List of all active subjects' : 'List of all deleted subjects';
        $trashed = $p != null ? true : false;

        return view('pages.subjects.list', compact('page_title', 'page_description', 'trashed'));
    }



    /**
     * 
     * 
     * Read all subjects from the database through "service class"
     */

    public function read_all_subjects(Request $RQ)
    {
        $subjects = $this->subject_service->get_all_subjects();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($subjects)->addIndexColumn()
                ->addColumn('subject', function ($row) {
                    $subject = $row->subject_name;
                    return $subject;
                })->addColumn('description', function ($row) {
                    $description = $row->subject_description;
                    return $description;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('subject_edit/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('subject_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Read all trashed subjects from the database through "service class"
     */

    public function read_all_trashed_subjects(Request $RQ)
    {
        $subjects = $this->subject_service->get_all_trashed_subjects();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($subjects)->addIndexColumn()
                ->addColumn('subject', function ($row) {
                    $subject = $row->subject_name;
                    return $subject;
                })->addColumn('description', function ($row) {
                    $description = $row->subject_description;
                    return $description;
                })->addColumn('createdAt', function ($row) {
                    $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
                    return $createdAt;
                })->addColumn('updatedAt', function ($row) {
                    $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
                    return $updatedAt;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('subject_restore/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Restore"><i class="fas fa-trash-restore"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }



    /**
     * 
     * 
     * Return a form view to create new subject
     */

    public function create_subject(Request $RQ)
    {
        $page_title = 'Create Subject';
        $page_description = 'Use this form to create subject';

        return view('pages.subjects.create', compact('page_title', 'page_description'));
    }



    /**
     * 
     * 
     * Save new subject
     */

    public function save_subject(Request $RQ)
    {
        $res = $this->subject_service->save_subject($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Subject created successfully.');
        } else {
            return redirect()->back()->with('error', 'Subject can not be created at this time.');
        }
    }



    /**
     * 
     * 
     * a form view to edit a subject 
     */

    public function edit_subject(Request $RQ, $id)
    {
        $page_title = 'Edit Subject';
        $page_description = 'Use this form to edit/update subject';

        $subject = $this->subject_service->get_a_subject($id)[0];
        return view('pages.subjects.edit', compact('page_title', 'page_description', 'subject'));
    }



    /**
     * 
     * 
     * Update subject
     */

    public function update_subject(Request $RQ)
    {
        $res = $this->subject_service->update_subject($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Subject updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Subject can not be updated at this time.');
        }
    }



    /**
     * 
     * 
     * Delete subject
     */

    public function delete_subject(Request $RQ, $id)
    {
        $res = $this->subject_service->delete_subject($id);
        if ($res) {
            return redirect()->back()->with('success', 'Subject deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Subject can not be deleted at this time.');
        }
    }



    /**
     * 
     * 
     * Restore subject
     */

    public function restore_subject(Request $RQ, $id)
    {
        $res = $this->subject_service->restore_subject($id);
        if ($res) {
            return redirect()->back()->with('success', 'Subject restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Subject can not be restored at this time.');
        }
    }
}
