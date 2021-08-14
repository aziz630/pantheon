<?php

namespace App\Services;

use App\Models\Enrollment;
use App\Models\FamilyTransaction;
use App\Models\Fee;
use App\Models\Guardian;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Session;
use App\Models\DiscountStudent;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use Throwable;

class StudentService
{
    private $rq = null;
    private $guardianID = null;
    private $studentID = null;
    private $familyAccount_balance = 0;


      /**
     * 
     * 
     * 
     * Get all withdrawed students
     */
    public function get_all_withdraw_students()
    {
        $students = collect();
        $data = DB::table('users')
            ->join('enrollments', 'users.id', '=', 'enrollments.student_id')
            ->join('classes', 'enrollments.class_id', '=', 'classes.id')
            ->join('sections', 'enrollments.section_id', '=', 'sections.id')
            ->select(
                'users.*',
                'enrollments.class_id',
                'enrollments.section_id',
                'classes.class_name',
                'sections.section_name'
            )
            ->where('users.deleted_at', '=', Null)->where('reason_of_withdrawal', '!=' , NULL)
            ->orderBy('users.id')
            ->get();

        if ($data) {
            $students = $data;  
        }

        return $students;

    

    }

    /**
     * 
     * 
     * Get a specific student
     */

    public function get_a_student($id)
    {
        $student = false;

        if ($data = User::find($id)) {
            $student = $data;
        }

        return $student;
    }


    /***
     * 
     * 
     * 
     * Enroll and save new student
     * 
     * do a sql transaction, if any of our query get failed then rollback all entries and return with error.
     */
    public function enroll_new_student($rq)
    {
        $this->rq = $rq;
            DB::transaction(function () {
                     

                    //  upload profile image
                    $cnic = $this->rq->file('guardianCnicCopy');
                    $cnicCopy = time().'.'.$cnic->extension();
                    $cnic->move(public_path('upload/gardianCNIC'),$cnicCopy);

                    $guardian = Guardian::create([
                        'grd_name' => $this->rq->guardianName,
                        'grd_cninc_no' => $this->rq->guardianCnic,
                        'grd_mobile' => $this->rq->guardianMobile,
                        'grd_home_ph' => $this->rq->guardianHomePhone,
                        'grd_email' => $this->rq->guardianEmail,
                        'grd_address' => $this->rq->gurdianAddress,
                        'grd_occupation' => $this->rq->guardianOccupation,
                        'account_balance' => '0',
                        'grd_cnic_copy' => $cnicCopy,
                    ]);

                    $this->guardianID = $guardian->id;

                //  upload profile image
                $image = $this->rq->file('stdImage');
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('upload/stdProfile'),$imageName);
                    
                $checkYear = Session::find($this->rq->session)->session;
                $student = User::where('usertype','Student')->orderBy('id','DESC')->first();

                if ($student == null) {
                    $firstReg = 0;
                    $studentId = $firstReg+1;
                    if ($studentId < 10) {
                        $id_no = '000'.$studentId;
                    }elseif ($studentId < 100) {
                        $id_no = '00'.$studentId;
                    }elseif ($studentId < 1000) {
                        $id_no = '0'.$studentId;
                    }
                }else{
                    $student = User::where('usertype','Student')->orderBy('id','DESC')->first()->id;
                    $studentId = $student+1;
                    if ($studentId < 10) {
                            $id_no = '000'.$studentId;
                        }elseif ($studentId < 100) {
                            $id_no = '00'.$studentId;
                        }elseif ($studentId < 1000) {
                            $id_no = '0'.$studentId;
                        }

                    } // end else 

                    $final_id_no = $checkYear.$id_no;
                    // $code = rand(0000,9999);

                $student = User::create([
                    'name' => $this->rq->fullName,
    	            'id_no' => $final_id_no,
    	            'usertype' => 'Student',
                    'password' => bcrypt('pantheon@123'),
                    'gender' => $this->rq->stdGender,
                    'dob' => date_format(date_create($this->rq->stdDOB), 'Y-m-d'),
                    'pob' => $this->rq->stdPOB,
                    'religion' => $this->rq->stdReligion,
                    'nationality' => $this->rq->stdNationality,
                    'current_address' => $this->rq->stdCurrentAddress,
                    'permanent_address' => $this->rq->stdPermanentAddress,
                    'email' => $this->rq->std_email,
                    'contact_no' => $this->rq->stdEmergency,
                    'admission_date' => date_format(date_create($this->rq->stdAdmissionDate), 'Y-m-d'),
                    'father_name' => $this->rq->stdFatherName,
                    'father_cnic' => $this->rq->stdFatherCNIC,
                    'father_occupation' => $this->rq->stdFatherOccupation,
                    'mother_name' => $this->rq->stdMotherName,
                    'mother_cnic' => $this->rq->stdMotherCNIC,
                    'mother_occupation' => $this->rq->stdMotherOccupation,
                    'image' => $imageName,
                    'guardian_id' => $this->guardianID,
                ]);

                $this->studentID = $student->id;

                $enrollment = Enrollment::create([
                    'student_id' => $this->studentID,
                    'class_id' => $this->rq->class,
                    'section_id' => $this->rq->section,
                    'academic_session_id' => $this->rq->session,
                    'guardian_id' => $this->guardianID,
                    'enrollment_date' => date_format(date_create($this->rq->stdAdmissionDate), 'Y-m-d'),
                    'enrollment_status' => 1,
                ]);

                $this->enrollmentID = $enrollment->id;

                DiscountStudent::create([
                    'inrollment_id' => $this->enrollmentID,
                    'fee_category_id' => '1',
                    'discount' => $this->rq->discount,
                ]);
               
            });

            
        return true;
    }



    
       /**
     * 
     * 
     * View Student detail
     */

    public function view_single_student($student_id)
    {
        $student = false;

        if ($data = User::find($student_id)) {
            $student = $data;
        }

        return $student;
    }


     /**
     * 
     * 
     * Delete Student
     */

    function delete_student($id)
    {
        $model = User::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }


    
    public function student_withdraw_record($rq)
    {
        
        $model = User::find($rq->wId);
        $model->reason_of_withdrawal = $rq->reasonOfWithdraw;
        $model->save();
        return true;
      
    }
}
