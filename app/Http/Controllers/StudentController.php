<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Services\ClassesService;
use App\Services\FeeService;
use App\Services\SectionService;
use App\Services\SessionService;
use Illuminate\Http\Request;
use App\Services\StudentService;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    private $studentService = null;

    public function __construct()
    {
        $this->studentService = new StudentService();
    }


    public function index()
    {
        $page_title = "Students Listing";
        $page_description = "Search a specific or all students";

        $class = new ClassesService();
        $classes = $class->get_all_classes();

        $section = new SectionService();
        $sections = $section->get_all_sections();

        return view('pages.students.student_list', compact('page_title', 'page_description', 'classes', 'sections'));
    }

    /**
     * 
     * In this method we are fetching all students from database,
     * and preparing this data for jquery datatable,
     * The @DataTables class is a provider class provided by yajra datatable package.
     * 
     */
    public function get_all_students(Request $RQ)
    {
        $students = $this->studentService->get_all_students();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($students)
                ->addColumn('erp_no', function ($row) {
                    $erp_no = $row->id;
                    return $erp_no;
                })
                ->addColumn('studentName', function ($row) {
                    $studentName = $row->std_name;
                    return $studentName;
                })
                ->addColumn('fatherName', function ($row) {
                    $fatherName = $row->std_father_name;
                    return $fatherName;
                })
                ->addColumn('gender', function ($row) {
                    $gender = ($row->std_gender === 1) ? 'Male' : ($row->std_gender === 2 ? 'Female' : 'Other');
                    return $gender;
                })
                ->addColumn('class', function ($row) {
                    $class = $row->class_name;
                    return $class;
                })
                ->addColumn('section', function ($row) {
                    $section = $row->section_name;
                    return $section;
                })->addColumn('documents', function ($row) {
                    /**  <a href=\"javascript:;\" class=\"btn btn-sm btn-clean btn-icon\" title=\"Edit details\">\\\r\n\t\t\t\t\t\t\t\t<i class=\"la la-edit\"></i>\\\r\n\t\t\t\t\t\t\t</a> */
                    $docBtn = '<a href="' . url("student/$row->id/previous_school") . '" class="btn btn-sm btn-clean btn-icon" title="checkout previous school info"><i class="flaticon2-crisp-icons text-success"></i></a>';
                    $docBtn .= '<a href="' . url("student/$row->id/edit_previous_school") . '" class="btn btn-sm btn-clean btn-icon" title="Edit previous school info"><i class="flaticon2-writing text-primary"></i></a>';
                    return $docBtn;
                })->addColumn('action', function ($row) {
                    /**  <a href=\"javascript:;\" class=\"btn btn-sm btn-clean btn-icon\" title=\"Edit details\">\\\r\n\t\t\t\t\t\t\t\t<i class=\"la la-edit\"></i>\\\r\n\t\t\t\t\t\t\t</a> */
                    $actBtn = '<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit text-primary"></i></a>';
                    $actBtn .= '<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash text-danger"></i></a>';
                    return $actBtn;
                })->rawColumns(['documents', 'action'])->make(true);
        }
    }


    /**
     * 
     * 
     * return form view to enroll new user
     */

    public function enroll_new_student_form()
    {
        $page_title = "Student Enrollment";
        $page_description = "Please fill out all fields carefully.";

        $session_service = new SessionService();
        $sessions = $session_service->get_all_sessions();

        $class_service = new ClassesService();
        $classes = $class_service->get_all_classes();

        return view('pages.students.add_student', compact('page_title', 'page_description', 'sessions', 'classes'));
    }



    /**
     * 
     * 
     * 
     * return view to ajax response for fee collection.
     */
    public function ajax_fee_collection_view(Request $RQ)
    {
        $fee_service = new FeeService();
        $fee_details = $fee_service->ajax_fee_structure_and_amounts($RQ);

        if ($fee_details)
            return view('pages.students.partials.collect_fee', compact('fee_details'));

        return false;
    }

    /**
     * 
     * Save and Enroll new student
     */
    public function save_and_enroll_new_student(StoreStudentRequest $RQ)
    {
        $page_title = "Student Enrollment";
        $page_description = "Please fill out all fields carefully.";

        //dd($RQ);
        $resp = $this->studentService->enroll_new_student($RQ);

        if ($resp) {
            return redirect(url('students'))->with('success', 'Student enrolled successfully.');
            //return redirect(url('collect_fee/' . $resp . '/' . true));
        } else {
            return redirect()->back()->with('error', 'Student can not be enrolled at this time,');
        }
    }


    /**
     * 
     * 
     * Withdraw student from school
     */

    public function withdraw_student()
    {
        return view('pages.students.withdraw_Student');
    }

    /**
     * 
     * 
     * 
     * Ajax resources needed for student enrollment form
     */

    public function get_all_sections_for_a_specific_class(Request $RQ)
    {
        $class_service = new ClassesService();

        return array(
            'status' => 200,
            'data' => $class_service->get_all_sections_for_a_specific_class($RQ->classID)
        );
    }
}
