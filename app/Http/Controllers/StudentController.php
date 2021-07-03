<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

use App\Services\ClassesService;
use App\Services\FeeService;
use App\Services\SectionService;
use App\Services\SessionService;
use App\Services\GuardianService;
use Illuminate\Http\Request;
use App\Services\StudentService;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;



class StudentController extends Controller
{
    private $studentService = null;

    public function __construct()
    {
        $this->studentService = new StudentService();
        $this->guardian_servece = new GuardianService();

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
    
    
    public function withdraw_students_list()
    {
        $page_title = "Students Listing";
        $page_description = "Search a specific or all students";

        // $class = new ClassesService();
        // $classes = $class->get_all_classes();

        // $section = new SectionService();
        // $sections = $section->get_all_sections();

        return view('pages.students.withdraw_student_list', compact('page_title', 'page_description'));
    }     

    /**
     * 
     * In this method we are fetching all students from database,
     * and preparing this data for jquery datatable,
     * The @DataTables class is a provider class provided by yajra datatable package.
     * 
     */
    public function read_all_students(Request $RQ)
    {
        $students = $this->studentService->get_all_students();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($students)
                ->addColumn('erp_no', function ($row) {
                    $erp_no = $row->id;
                    return $erp_no;
                })->addColumn('studentName', function ($row) {
                    $studentName = $row->std_name;
                    return $studentName;
                })->addColumn('fatherName', function ($row) {
                    $fatherName = $row->std_father_name;
                    return $fatherName;
                })->addColumn('stdGender', function ($row) {
                    $gender = ($row->std_gender === 1) ? 'Male' : ($row->std_gender === 2 ? 'Female' : 'Other');
                    return $gender;
                })->addColumn('class', function ($row) {
                    $class = $row->class_name;
                    return $class;
                })->addColumn('section', function ($row) {
                    $section = $row->section_name;
                    return $section;
                })->addColumn('more', function ($row) {
                    $detail = '<a href="' . url('view_student/' . $row->id) . '" class="btn btn-primary btn-sm" title="Edit details">View</a>';
                    return $detail;
                // })->addColumn('documents', function ($row) {
                //     /**  <a href=\"javascript:;\" class=\"btn btn-sm btn-clean btn-icon\" title=\"Edit details\">\\\r\n\t\t\t\t\t\t\t\t<i class=\"la la-edit\"></i>\\\r\n\t\t\t\t\t\t\t</a> */
                //     $docBtn = '<a href="' . url("student/$row->id/previous_school") . '" class="btn btn-sm btn-clean btn-icon" title="checkout previous school info"><i class="flaticon2-crisp-icons text-success"></i></a>';
                //     $docBtn .= '<a href="' . url("student/$row->id/edit_previous_school") . '" class="btn btn-sm btn-clean btn-icon" title="Edit previous school info"><i class="flaticon2-writing text-primary"></i></a>';
                //     return $docBtn;
                })->addColumn('action', function ($row) {
                    /**  <a href=\"javascript:;\" class=\"btn btn-sm btn-clean btn-icon\" title=\"Edit details\">\\\r\n\t\t\t\t\t\t\t\t<i class=\"la la-edit\"></i>\\\r\n\t\t\t\t\t\t\t</a> */
                    // $actBtn = '<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit text-primary"></i></a>';
                    // $actBtn .= '<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash text-danger"></i></a>';
                    // return $actBtn;
                    $actBtn = '<a href="' . url('edit_student/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon btn" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('delete_student/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['documents', 'action', 'more'])->make(true);
        }
    }


        /**
         * 
         * 
         * 
         * read all withdrawed students 
         */


    public function read_all_withdraw_students(Request $RQ)
    {
        $students = $this->studentService->get_all_withdraw_students();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($students)
                ->addColumn('erp_no', function ($row) {
                    $erp_no = $row->id;
                    return $erp_no;
                })->addColumn('studentName', function ($row) {
                    $studentName = $row->std_name;
                    return $studentName;
                })->addColumn('fatherName', function ($row) {
                    $fatherName = $row->std_father_name;
                    return $fatherName;
                })->addColumn('stdGender', function ($row) {
                    $gender = ($row->std_gender === 1) ? 'Male' : ($row->std_gender === 2 ? 'Female' : 'Other');
                    return $gender;
                })->addColumn('class', function ($row) {
                    $class = $row->class_name;
                    return $class;
                })->addColumn('section', function ($row) {
                    $section = $row->section_name;
                    return $section;
                })->addColumn('more', function ($row) {
                    $detail = '<a href="' . url('#' . $row->id) . '" class="btn btn-primary btn-sm" title="Edit details">Back</a>';
                    return $detail;
                })->rawColumns(['more'])->make(true);
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

        $section = new SectionService();
        $sections = $section->get_all_sections();

        return view('pages.students.add_student', compact('page_title', 'page_description', 'sessions', 'classes', 'sections'));
    }



    /**
     * 
     * Save and Enroll new student
     */
    
    public function save_and_enroll_new_student(Request $RQ)
    {

        $resp = $this->studentService->enroll_new_student($RQ);
        
        if ($resp) {
            return redirect(url('students'))->with('success', 'student enrolled successfully.');
        } else {
            return redirect()->back()->with('error', 'student can not be enrolled at this time,');
        }
    }



    /**
     * 
     * 
     * 
     * Edit student .
     */


    public function edit_student_record(Request $RQ, $id)
    {
        $page_title = 'Edit Student';

        $page_description = 'Use this form to edit/update Student';

        $student = $this->studentService->edit_student($id);

        $guardian = $this->guardian_servece->get_all_guardians();

        $class_service = new ClassesService();
        $classes = $class_service->get_all_classes();

        $session_service = new SessionService();
        $sessions = $session_service->get_all_sessions();

        $section = new SectionService();
        $sections = $section->get_all_sections();

        return view('pages.students.edit_student',  compact('page_title', 'page_description', 'guardian', 'classes', 'sections','sessions', 'student'));
    }



    /**
     * 
     * 
     *  Update student record
     */

    public function update_student_record(Request $RQ)
    {

        $RQ->validate([
            "std_email" => "required|email|unique:students,std_email,".$RQ->sId,
        ]);

        $res = $this->studentService->update_student($RQ);
        if ($res) {
            return redirect(url('students'))->with('success', 'students updated successfully.');
        } else {
            return redirect()->back()->with('error', 'students can not be updated at this time.');
        }
    }


    /**
     * 
     * 
     * Delete student
     */

    public function delete_student(Request $rq, $id)
    {
        $res = $this->studentService->delete_student($id);
        if ($res) {
            return redirect()->back()->with('success', 'Student deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Student can not be deleted at this time.');
        }
    }


    /**
     * 
     * 
     * Download Guardian CNIC
     */
    public function download_guardian_CNIC(Request $RQ, $grd_cnic_copy)
    {
        return response()->download(public_path('gardianCNIC/'.$grd_cnic_copy));
    }

/**
 * 
 * 
 * view a single student
 */
    public function view_single_student_detail(Request $RQ, $id)
    {

        
        $student = $this->studentService->view_single_student($id);
        
        $section = new SectionService();
        $sections = $section->get_all_sections($id);

        $guardian = $this->guardian_servece->get_all_guardians($id);

        // $students = collect();
        // $data = DB::table('students')
        //     ->join('enrollments', 'students.id', '=', 'enrollments.student_id')
        //     ->join('classes', 'enrollments.class_id', '=', 'classes.id')
        //     ->join('sections', 'enrollments.section_id', '=', 'sections.id')
        //     ->select(
        //         'students.*',
        //         'enrollments.class_id',
        //         'enrollments.section_id',
        //         'classes.class_name',
        //         'sections.section_name'
        //     )
        //     ->where('students.deleted_at', '=', Null)->where('reason_of_withdrawal', '=' , NULL)
        //     ->orderBy('students.id')
        //     ->get();

        // $enrollment = Enrollment::all()->first($id);


        return view('pages.students.detail_page', compact('student', 'guardian', 'sections'));
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
     * Withdraw Student 
     */

    public function withdraw_student_record(Request $RQ)
    {
        $res = $this->studentService->student_withdraw_record($RQ);
        if ($res) {
            return redirect(url('students'))->with('success', 'student withdraw successfully.');
        } else {
            return redirect()->back()->with('error', 'student not withdraw at this time.');
        }
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
