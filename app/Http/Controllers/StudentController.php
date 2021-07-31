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
use App\Services\discountService;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Enrollment;
use Illuminate\Support\Facades\DB;
use App\Models\DiscountStudent;
use App\Models\Student;
use App\Models\Session;
use App\Models\Classes;
use App\Models\Guardian;
use App\Models\Section;




class StudentController extends Controller
{
    private $studentService = null;

    public function __construct()
    {
        $this->studentService = new StudentService();
        // $this->guardian_servece = new GuardianService();

    }

    /**
     * 
     * 
     * All Student list
     */

    public function all_student_list()
    {
        $data['sessions'] = Session::all();
        $data['classes'] = Classes::all();

        $data['session_id'] = Session::orderBy('id', 'desc')->first()->id;
        $data['class_id'] = Classes::orderBy('id', 'desc')->first()->id;
        // dd($data['classe_id']);
        $data['allData'] = Enrollment::where('academic_session_id', $data['session_id'])->where('class_id', $data['class_id'])->get();
        // dd($data['allData']);

        return view('pages.students.student_list',$data);
    }  


    /**
     * 
     * 
     * Search students
     */

    public function student_student(Request $request)
    {
        $data['sessions'] = Session::all();
        $data['classes'] = Classes::all();

        $data['session_id'] = $request->session;
        $data['class_id'] = $request->class;
        $data['allData'] = Enrollment::where('academic_session_id', $request->session)->where('class_id', $request->class)->get();
        // dd($data['allData']);

        return view('pages.students.student_list', $data);

    }
    

    /**
     * 
     * 
     * student list for promotion
     */

    public function students_promotion_list()
    {
         $data['sessions'] = Session::all();
        $data['classes'] = Classes::all();

        $data['session_id'] = Session::orderBy('id', 'desc')->first()->id;
        $data['class_id'] = Classes::orderBy('id', 'desc')->first()->id;
        // dd($data['classe_id']);
        $data['allData'] = Enrollment::where('academic_session_id', $data['session_id'])->where('class_id', $data['class_id'])->get();
        // dd($data['allData']);

        return view('pages.students.student_promotion_list', $data);
    } 

    
    /**
     * 
     * 
     * Search students for promotion
     */

     public function search_student_for_promotion(Request $request)
    {
        $data['sessions'] = Session::all();
        $data['classes'] = Classes::all();

        $data['session_id'] = $request->session;
        $data['class_id'] = $request->class;
        $data['allData'] = Enrollment::where('academic_session_id', $request->session)->where('class_id', $request->class)->get();
        // dd($data['allData']);

        return view('pages.students.student_promotion_list', $data);

    }


     /**
     * 
     * 
     * promote students
     */

    public function promote_selected_studentn(Request $request)
    {

        // $student_id_array = $request->id;
        // dd($student_id_array);

        $data['class_id'] = $request->class;
        $data['session_id'] = $request->session;
        $data['allData'] = Enrollment::whereIn('id', $student_id_array)
        ->update([
            'class_name' => $request->class,
            'session' => $request->session,
        ]);

        if ($data) {
            return redirect()->back()->with('success', 'students promote successfully.');
        } else {
            return redirect()->back()->with('error', 'student can not be promote at this time,');
        }

    }


   


    /**
     * 
     * 
     * student list for withdrawal
     */
    
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
    
    public function save_and_enroll_new_student(StoreStudentRequest $RQ)
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


    public function edit_student_record(Request $RQ, $student_id)
    {
        $data['page_title'] = 'Edit Student';

        $data['page_description'] = 'Use this form to edit/update Student';

        $data['sessions'] = Session::all();
        $data['classes'] = Classes::all();
        $data['sections'] = Section::all();
        $data['guardian'] = Guardian::all();

        $data['editData'] = Enrollment::with('student')->where('student_id', $student_id)->first();
        // dd($data['editData']);

        return view('pages.students.edit_student',$data);
    }



    /**
     * 
     * 
     *  Update student record
     */

    public function update_student_record(UpdateStudentRequest $rq, $student_id)
    {

        $rq->validate([
            "std_email" => "required|email|unique:students,std_email,".$rq->student_id,
        ]);

        DB::transaction(function() use($rq, $student_id){
        
    
            $model = Student::where('id', $student_id)->first();
            $model->std_name = $rq->fullName;
            $model->std_gender = $rq->stdGender;
            $model->std_dob = date_format(date_create($rq->stdDOB), 'Y-m-d');
            $model->std_pob = $rq->stdPOB;
            $model->std_religion = $rq->stdReligion;
            $model->std_nationality = $rq->stdNationality;
            $model->std_current_address = $rq->stdCurrentAddress;
            $model->std_permanent_address = $rq->stdPermanentAddress;
            $model->std_email = $rq->std_email;
            $model->std_emergency_contact_no = $rq->stdEmergency;
            $model->std_admission_date = date_format(date_create($rq->stdAdmissionDate), 'Y-m-d');


             //  upload profile image
             if($rq->file('stdImage')){
             $image = $rq->file('stdImage');
            //  unlink(public_path('stdProfile',$model->stdImage));
             $imageName = time().'.'.$image->extension();
             $image->move(public_path('stdProfile'),$imageName);
             }

            $model->std_father_name = $rq->stdFatherName;
            $model->std_father_cnic = $rq->stdFatherCNIC;
            $model->std_father_occupation = $rq->stdFatherOccupation;
            $model->std_mother_name = $rq->stdMotherName;
            $model->std_mother_cnic = $rq->stdMotherCNIC;
            $model->std_mother_occupation = $rq->stdMotherOccupation;
            $model->std_image = $imageName;
    
            $model->save();
           
            $this->studentID = $model->id;
            //  upload profile image
            $cnic = $rq->file('guardianCnicCopy');
            $cnicCopy = time().'.'.$cnic->extension();
            $cnic->move(public_path('gardianCNIC'),$cnicCopy);
    
    
            $guardian = Guardian::where('id', $student_id)->first();
            $guardian->grd_name = $rq->guardianName;
            $guardian->grd_cninc_no = $rq->guardianCnic;
            $guardian->grd_mobile = $rq->guardianMobile;
            $guardian->grd_home_ph = $rq->guardianHomePhone;
            $guardian->grd_email = $rq->guardianEmail;
            $guardian->grd_address = $rq->gurdianAddress;
            $guardian->grd_occupation = $rq->guardianOccupation;
            $guardian->grd_cnic_copy = $cnicCopy;
            $guardian->save();
    
            $enrollment = Enrollment::where('id', $rq->id)->where('student_id', $student_id)->first();
            $enrollment->class_id = $rq->class;
            $enrollment->section_id = $rq->section;
            $enrollment->academic_session_id = $rq->session;
            $enrollment->guardian_id = $this->studentID;
            $enrollment->enrollment_date = date_format(date_create($rq->stdAdmissionDate), 'Y-m-d');
    
            $enrollment->save();           
        });
           
        
            return redirect(url('students'))->with('success', 'students updated successfully.');
      
    }




     /**
     * 
     * 
     *  Edit student record for Promotion
     */

    public function promote_single_student($student_id)
    {
        $data['page_title'] = 'Edit Student';

        $data['page_description'] = 'Use this form to edit/update Student';

        $data['sessions'] = Session::all();
        $data['classes'] = Classes::all();
        $data['sections'] = Section::all();
        $data['guardian'] = Guardian::all();

        $data['editData'] = Enrollment::with('student')->where('student_id', $student_id)->first();
        // dd($data['editData']);


        return view('pages.students.edit_student_promotion',$data);
    }


    /**
     * 
     * 
     *  Update student promotion record
     */

    public function update_student_promotion_record(UpdateStudentRequest $rq, $student_id)
    {

        $rq->validate([
            "std_email" => "required|email|unique:students,std_email,".$rq->student_id,
        ]);

        DB::transaction(function() use($rq, $student_id){
        
    
            $model = Student::where('id', $student_id)->first();
            $model->std_name = $rq->fullName;
            $model->std_gender = $rq->stdGender;
            $model->std_dob = date_format(date_create($rq->stdDOB), 'Y-m-d');
            $model->std_pob = $rq->stdPOB;
            $model->std_religion = $rq->stdReligion;
            $model->std_nationality = $rq->stdNationality;
            $model->std_current_address = $rq->stdCurrentAddress;
            $model->std_permanent_address = $rq->stdPermanentAddress;
            $model->std_email = $rq->std_email;
            $model->std_emergency_contact_no = $rq->stdEmergency;
            $model->std_admission_date = date_format(date_create($rq->stdAdmissionDate), 'Y-m-d');


             //  upload profile image
             if($rq->file('stdImage')){
             $image = $rq->file('stdImage');
            //  unlink(public_path('stdProfile',$model->stdImage));
             $imageName = time().'.'.$image->extension();
             $image->move(public_path('stdProfile'),$imageName);
             }

            $model->std_father_name = $rq->stdFatherName;
            $model->std_father_cnic = $rq->stdFatherCNIC;
            $model->std_father_occupation = $rq->stdFatherOccupation;
            $model->std_mother_name = $rq->stdMotherName;
            $model->std_mother_cnic = $rq->stdMotherCNIC;
            $model->std_mother_occupation = $rq->stdMotherOccupation;
            $model->std_image = $imageName;
    
            $model->save();
           
            $this->studentID = $model->id;


            //  upload profile image
            $cnic = $rq->file('guardianCnicCopy');
            $cnicCopy = time().'.'.$cnic->extension();
            $cnic->move(public_path('gardianCNIC'),$cnicCopy);
    
    
            $guardian = Guardian::where('id', $student_id)->first();
            $guardian->grd_name = $rq->guardianName;
            $guardian->grd_cninc_no = $rq->guardianCnic;
            $guardian->grd_mobile = $rq->guardianMobile;
            $guardian->grd_home_ph = $rq->guardianHomePhone;
            $guardian->grd_email = $rq->guardianEmail;
            $guardian->grd_address = $rq->gurdianAddress;
            $guardian->grd_occupation = $rq->guardianOccupation;
            $guardian->grd_cnic_copy = $cnicCopy;
            $guardian->save();
    
            $enrollment = new Enrollment();
            $enrollment->student_id = $student_id;
            $enrollment->class_id = $rq->class;
            $enrollment->section_id = $rq->section;
            $enrollment->academic_session_id = $rq->session;
            $enrollment->guardian_id = $this->studentID;
            $enrollment->enrollment_date = date_format(date_create($rq->stdAdmissionDate), 'Y-m-d');
    
            $enrollment->save();           
        });
           
        
            return redirect(url('student_promotion'))->with('success', 'students Promoted successfully.');
      
    }


    /**
     * 
     * 
     * Delete student
     */

    public function delete_student(Request $rq, $student_id)
    {
        $res = $this->studentService->delete_student($student_id);
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
    public function view_single_student_detail(Request $RQ, $student_id)
    {

        
        $student = $this->studentService->view_single_student($student_id);
        
        $section = new SectionService();
        $sections = $section->get_all_sections($student_id);

        $guardians= new GuardianService();
        $guardian = $guardians->get_all_guardians($student_id);

        $discounts= new discountService();
        $discount = $discounts->get_all_discount();

        // $discount = Enrollment::with('discount')->where('student_id', $student_id)->first();

        return view('pages.students.detail_page', compact('student', 'guardian', 'sections', 'discount'));
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
