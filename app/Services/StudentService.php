<?php

namespace App\Services;

use App\Models\Enrollment;
use App\Models\Fee;
use App\Models\Guardian;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use Throwable;

class StudentService
{
    private $rq = null;
    private $guardianID = null;
    private $studentID = null;

    /**
     * 
     * 
     * 
     * Get all active students
     */
    public function get_all_students()
    {
        $students = false;
        $data = DB::table('students')
            ->join('enrollments', 'students.id', '=', 'enrollments.student_id')
            ->join('classes', 'enrollments.class_id', '=', 'classes.id')
            ->join('sections', 'enrollments.section_id', '=', 'sections.id')
            ->select(
                'students.*',
                'enrollments.class_id',
                'enrollments.section_id',
                'classes.class_name',
                'sections.section_name',
            )
            ->where('students.deleted_at', '=', Null)
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

        try {
            DB::transaction(function () {
                $guardian = Guardian::create([
                    'grd_name' => $this->rq->guardianName,
                    'grd_cnic_no' => $this->rq->guardianCnic,
                    'grd_mobile' => $this->rq->guardianMobile,
                    'grd_home_ph' => $this->rq->guardianHomePhone,
                    'grd_email' => $this->rq->guardianEmail,
                    'grd_address' => $this->rq->gurdianAddress,
                    'grd_occupation' => $this->rq->guardianOccupation,
                    'account_balance' => '0',
                    'grd_cnic_copy' => 'no image',
                ]);

                $this->guardianID = $guardian->id;

                $student = Student::create([
                    'std_name' => $this->rq->fullName,
                    'std_gender' => $this->rq->stdGender,
                    'std_dob' => date_format(date_create($this->rq->stdDOB), 'Y-m-d'),
                    'std_pob' => $this->rq->stdPOB,
                    'std_religion' => $this->rq->stdReligion,
                    'std_nationality' => $this->rq->stdNationality,
                    'std_current_address' => $this->rq->stdCurrentAddress,
                    'std_permanent_address' => $this->rq->stdPermanentAddress,
                    'std_email' => $this->rq->stdEmail,
                    'std_mobile_no' => $this->rq->stdPhone,
                    'std_emergency_contact_no' => $this->rq->stdEmergency,
                    'std_admission_date' => date_format(date_create($this->rq->stdAdmissionDate), 'Y-m-d'),
                    'std_registeration_no' => $this->rq->regNumber,
                    'std_father_name' => $this->rq->stdFatherName,
                    'std_father_cnic' => $this->rq->stdFatherCNIC,
                    'std_father_occupation' => $this->rq->stdFatherOccupation,
                    'std_mother_name' => $this->rq->stdMotherName,
                    'std_mother_cnic' => $this->rq->stdMotherCNIC,
                    'std_mother_occupation' => $this->rq->stdMotherOccupation,
                    'std_image' => 'no image',
                    'guardian_id' => $this->guardianID,
                ]);

                $this->studentID = $student->id;

                Enrollment::create([
                    'student_id' => $this->studentID,
                    'class_id' => $this->rq->class,
                    'section_id' => $this->rq->section,
                    'academic_session_id' => $this->rq->session,
                    'enrollment_date' => date_format(date_create($this->rq->stdAdmissionDate), 'Y-m-d'),
                    'enrollment_status' => 1,
                ]);

                $guardian = Guardian::find($this->guardianID);
                $guardian->account_balance = intval($this->rq->Security) + intval($guardian->account_balance);
                $guardian->save();

                Fee::insert([
                    [
                        'student_id' => $this->studentID,
                        'fee_structure_id' => $this->rq->structure_id,
                        'fee_month' => date('F'),
                        'transaction_date' => date('Y-m-d H:i:s', strtotime("-1 minutes")),
                        'description' => 'Amount payable for new admission',
                        'discount_amount' => 0,
                        'debit_amount' => 0,
                        'credit_amount' => intval($this->rq->deposit) + intval($this->rq->concission),
                        'amount_payable' => intval($this->rq->deposit) + intval($this->rq->concission),
                        'is_notified' => 1,
                        'is_processed' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ], [
                        'student_id' => $this->studentID,
                        'fee_structure_id' => $this->rq->structure_id,
                        'fee_month' => date('F'),
                        'transaction_date' => date('Y-m-d H:i:s', time()),
                        'description' => 'Amount paid for new Admission, ' . intval($this->rq->Security) . ' security fee is deposited to family account',
                        'discount_amount' => $this->rq->concission,
                        'debit_amount' => intval($this->rq->deposit) - intval($this->rq->Security),
                        'credit_amount' => 0,
                        'amount_payable' => 0,
                        'is_notified' => 1,
                        'is_processed' => 1,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]
                ]);
            });

            $this->rq = null;
            $this->guardianID = null;
        } catch (Throwable $e) {
            $std_id = $this->studentID;
            $this->studentID = null;
            //dd($e);
            return $std_id;
        }

        return true;
    }
}
