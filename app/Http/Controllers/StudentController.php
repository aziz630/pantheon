<?php

namespace App\Http\Controllers;

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

        //$students = $this->studentService->get_all_students();
        $students = false;

        return view('pages.students.student_list', compact('page_title', 'page_description', 'students'));
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
            return DataTables::of($students)->addColumn('studentName', function ($row) {
                $studentName = $row->fname . ' ' . $row->lname;
                return $studentName;
            })->addColumn('status', function ($row) {
                $status = $row->deleted_at == '' ? 'Withdraw' : 'Enrolled';
                return $status;
            })->addColumn('action', function ($row) {
                /**  <a href=\"javascript:;\" class=\"btn btn-sm btn-clean btn-icon\" title=\"Edit details\">\\\r\n\t\t\t\t\t\t\t\t<i class=\"la la-edit\"></i>\\\r\n\t\t\t\t\t\t\t</a> */
                $actBtn = '<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                $actBtn .= '<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                return $actBtn;
            })->rawColumns(['action'])->make(true);
        }
    }

    public function enroll_new_student_form()
    {
        $page_title = "Student Enrollment";
        $page_description = "Please fill out all fields carefully.";
        $countries = [
            [
                'id' => 1,
                'name' => 'Pakistan'
            ],
            [
                'id' => 2,
                'name' => 'India'
            ],
            [
                'id' => 3,
                'name' => 'Turky'
            ]
        ];
        return view('pages.students.add_student', compact('countries', 'page_title', 'page_description'));
    }

    public function withdraw_student()
    {
        return view('pages.students.withdraw_Student');
    }
}
