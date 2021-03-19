<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PrevSchoolService;
use App\Services\StudentService;

class PreviousSchoolController extends Controller
{
    protected $prevSchool_service = null;
    protected $student_service = null;

    public function __construct()
    {
        $this->prevSchool_service = new PrevSchoolService();
        $this->student_service = new StudentService();
    }



    /**
     * 
     * 
     * Return Student Previous school information
     */

    public function get_student_previous_school(Request $rq, $std_id)
    {
        $prev_school = $this->prevSchool_service->get_a_previous_school_for_student($std_id);

        if (!$prev_school) {
            return $this->create_previous_school($rq, $std_id);
        } else {


            $student = $this->student_service->get_a_student($std_id);
            $page_title = 'Previous School info';
            $page_description = 'Student last atended school information';

            //dd($prev_school);

            return view('pages.prev_school.list', compact('page_title', 'page_description', 'prev_school', 'student'));
        }
    }



    /**
     * 
     * 
     * Return a form view to create new previous school information
     */

    public function create_previous_school($rq, $std_id)
    {
        $page_title = 'Previous School info';
        $page_description = 'Use this form to save student previous school information';
        $student = $this->student_service->get_a_student($std_id);

        return view('pages.prev_school.create', compact('page_title', 'page_description', 'student'));
    }



    /**
     * 
     * 
     * Save new previous school information
     */

    public function save_previous_school(Request $RQ)
    {
        $res = $this->prevSchool_service->save_previous_school_info($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Previous school info saved successfully.');
        } else {
            return redirect()->back()->with('error', 'Previous school info can not be saved at this time.');
        }
    }



    /**
     * 
     * 
     * Read a specifc previous school info and return 
     * a form view to edit a previous school info
     */

    public function edit_previous_school_info(Request $rq, $std_id)
    {

        $prev_school = $this->prevSchool_service->get_a_previous_school_for_student($std_id);

        if (!$prev_school) {
            return $this->create_previous_school($rq, $std_id);
        } else {

            $page_title = 'Edit previous school info';
            $page_description = 'Use this form to edit/update previous school information';

            $student = $this->student_service->get_a_student($std_id);
            return view('pages.prev_school.edit', compact('page_title', 'page_description', 'prev_school', 'student'));
        }
    }



    /**
     * 
     * 
     * Update previous school information
     */

    public function update_a_previous_school(Request $RQ)
    {
        $res = $this->prevSchool_service->update_a_previous_school($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Previous school info updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Previous school info can not be updated at this time.');
        }
    }



    /**
     * 
     * 
     * Delete a previous school info
     */

    public function delete_previous_school(Request $rq, $id)
    {
        $res = $this->prevSchool_service->delete_previous_school($id);
        if ($res) {
            return redirect()->back()->with('success', 'Previous school info deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Previous school info can not be deleted at this time.');
        }
    }



    /**
     * 
     * 
     * Restore a previous school info
     */

    public function restore_previous_school(Request $RQ, $id)
    {
        $res = $this->prevSchool_service->restore_previous_school($id);
        if ($res) {
            return redirect()->back()->with('success', 'Previous school info restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Previous school info can not be restored at this time.');
        }
    }
}
