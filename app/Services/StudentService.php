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
     * Get all active students
     */
    // public function get_all_students()
    // {
    //     $students = collect();
    //     $data = DB::table('students')
    //         ->join('enrollments', 'students.id', '=', 'enrollments.student_id')
    //         ->join('classes', 'enrollments.class_id', '=', 'classes.id')
    //         ->join('sections', 'enrollments.section_id', '=', 'sections.id')
    //         ->select(
    //             'students.*',
    //             'enrollments.class_id',
    //             'enrollments.section_id',
    //             'classes.class_name',
    //             'sections.section_name'
    //         )
    //         ->where('students.deleted_at', '=', Null)->where('reason_of_withdrawal', '=' , NULL)
    //         ->orderBy('students.id')
    //         ->get();

    //     if ($data) {
    //         $students = $data;  
    //     }

    //     return $students;

    

    // }



      /**
     * 
     * 
     * 
     * Get all withdrawed students
     */
    public function get_all_withdraw_students()
    {
        $students = collect();
        $data = DB::table('students')
            ->join('enrollments', 'students.id', '=', 'enrollments.student_id')
            ->join('classes', 'enrollments.class_id', '=', 'classes.id')
            ->join('sections', 'enrollments.section_id', '=', 'sections.id')
            ->select(
                'students.*',
                'enrollments.class_id',
                'enrollments.section_id',
                'classes.class_name',
                'sections.section_name'
            )
            ->where('students.deleted_at', '=', Null)->where('reason_of_withdrawal', '!=' , NULL)
            ->orderBy('students.id')
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

        if ($data = Student::find($id)) {
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
                    $cnic->move(public_path('gardianCNIC'),$cnicCopy);

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
                    // $this->familyAccount_balance = 0;
                // }

                //  upload profile image
                $image = $this->rq->file('stdImage');
                $imageName = time().'.'.$image->extension();
                $image->move(public_path('stdProfile'),$imageName);
                    
                $checkYear = Session::find($this->rq->section)->session;
                $student = Student::where('usertype','Student')->orderBy('id','DESC')->first();

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
                    $student = Student::where('usertype','Student')->orderBy('id','DESC')->first()->id;
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

                $student = Student::create([
                    'std_name' => $this->rq->fullName,
    	            'id_no' => $final_id_no,
    	            'usertype' => 'Student',
                    'std_gender' => $this->rq->stdGender,
                    'std_dob' => date_format(date_create($this->rq->stdDOB), 'Y-m-d'),
                    'std_pob' => $this->rq->stdPOB,
                    'std_religion' => $this->rq->stdReligion,
                    'std_nationality' => $this->rq->stdNationality,
                    'std_current_address' => $this->rq->stdCurrentAddress,
                    'std_permanent_address' => $this->rq->stdPermanentAddress,
                    'std_email' => $this->rq->std_email,
                    // 'std_mobile_no' => $this->rq->stdPhone,
                    'std_emergency_contact_no' => $this->rq->stdEmergency,
                    'std_admission_date' => date_format(date_create($this->rq->stdAdmissionDate), 'Y-m-d'),
                    // 'std_registeration_no' => $this->rq->regNumber,
                    'std_father_name' => $this->rq->stdFatherName,
                    'std_father_cnic' => $this->rq->stdFatherCNIC,
                    'std_father_occupation' => $this->rq->stdFatherOccupation,
                    'std_mother_name' => $this->rq->stdMotherName,
                    'std_mother_cnic' => $this->rq->stdMotherCNIC,
                    'std_mother_occupation' => $this->rq->stdMotherOccupation,
                    'std_image' => $imageName,
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
               

                // FamilyTransaction::create([
                //     'guardian_id' => $this->guardianID,
                //     'transaction_date' => date('Y-m-d H:i:s', strtotime("-1 minutes")),
                //     'description' => 'Security Fee deposit',
                //     'debit_amount' => intval($this->rq->Security),
                //     'credit_amount' => 0,
                //     'balance' => $this->familyAccount_balance + intval($this->rq->Security),
                //     'is_notified' => 1,
                // ]);

                // $guardian = Guardian::find($this->guardianID);
                // $guardian->account_balance = intval($this->rq->Security) + intval($guardian->account_balance);
                // $guardian->save();

                // Fee::insert([
                //     [
                //         'student_id' => $this->studentID,
                //         'fee_structure_id' => $this->rq->structure_id,
                //         'fee_month' => date('F'),
                //         'transaction_date' => date('Y-m-d H:i:s', strtotime("-1 minutes")),
                //         'description' => 'Amount payable for new admission',
                //         'discount_amount' => 0,
                //         'debit_amount' => 0,
                //         'credit_amount' => (intval($this->rq->deposit) + intval($this->rq->concission)) - intval($this->rq->Security),
                //         'amount_payable' => (intval($this->rq->deposit) + intval($this->rq->concission)) - intval($this->rq->Security),
                //         'is_notified' => 1,
                //         'is_processed' => 1,
                //         'created_at' => date('Y-m-d H:i:s'),
                //         'updated_at' => date('Y-m-d H:i:s'),
                //     ], [
                //         'student_id' => $this->studentID,
                //         'fee_structure_id' => $this->rq->structure_id,
                //         'fee_month' => date('F'),
                //         'transaction_date' => date('Y-m-d H:i:s', time()),
                //         'description' => 'Amount paid for new Admission, ' . intval($this->rq->Security) . ' security fee is deposited to family account',
                //         'discount_amount' => $this->rq->concission,
                //         'debit_amount' => intval($this->rq->deposit) - intval($this->rq->Security),
                //         'credit_amount' => 0,
                //         'amount_payable' => 0,
                //         'is_notified' => 1,
                //         'is_processed' => 1,
                //         'created_at' => date('Y-m-d H:i:s'),
                //         'updated_at' => date('Y-m-d H:i:s'),
                //     ]
                // ]);
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

        if ($data = Student::find($student_id)) {
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
        $model = Student::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }


    
    public function student_withdraw_record($rq)
    {
        
        $model = Student::find($rq->wId);
        $model->reason_of_withdrawal = $rq->reasonOfWithdraw;
        $model->save();
        return true;
      
    }
}
