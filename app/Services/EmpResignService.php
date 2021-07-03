<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmpResigne;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Throwable;

class EmpResignService
{

    /***
    
     * Enroll and save new employee
     * 
     * do a sql transaction, if any of our query get failed then rollback all entries and return with error.
     */
    // public function save_employee($rq)
    // {

    //     $this->rq = $rq;

    //     DB::transaction(function () {


    //         $employee = Employee::create([

    //             'emp_title' => $this->rq->title,
    //             'emp_name' => $this->rq->fullName,
    //             'emp_fname' => $this->rq->fName,
    //             'emp_address' => $this->rq->empCurrentAddress,
    //             'emp_contact' => $this->rq->empContact,
    //             'emp_dob' => date_format(date_create($this->rq->empDOB), 'Y-m-d'),
    //             'emp_email' => $this->rq->empEmail,
    //             'emp_permanent_address' => $this->rq->empPermanentAddress,
    //             'emp_status' => $this->rq->empStatus,
    //             'emp_nationality' => $this->rq->empNationality,
    //             'emp_gender' => $this->rq->empGender,
    //             'is_employee' => $this->rq->empSatus,
    //             'emp_religion' => $this->rq->empReligion,
    //             'emp_experience' => $this->rq->empExperience,
    //             'emp_file' => 'no image',
                

                
    //             ]);

    //             $this->employID = $employee->id;


    //             $academic = Academic::create([

    //             'matric_pass_year' => $this->rq->mpassingyear,
    //             'matric_subj' => $this->rq->msubject,
    //             'matric_schl' => $this->rq->mschoolname,
    //             'matric_per' => $this->rq->mpersentage,

    //             'secondary_pass_year' => $this->rq->mpassingyear,
    //             'secondary_subj' => $this->rq->ssubject,
    //             'secondary_schl' => $this->rq->scollegename,
    //             'secondary_per' => $this->rq->scgpa,

    //             'graduate_pass_year' => $this->rq->gpassingyear,
    //             'graduate_subj' => $this->rq->gsubject,
    //             'graduate_schl' => $this->rq->gcollegename,
    //             'graduate_per' => $this->rq->gcgpa,

    //             'post_graduate_pass_year' => $this->rq->pgpassingyear,
    //             'post_graduate_subj' => $this->rq->pgsubject,
    //             'post_graduate_schl' => $this->rq->pgcollegename,
    //             'post_graduate_per' => $this->rq->pgcgpa,

    //             'any_other_pass_year' => $this->rq->opassingyear,
    //             'any_other_subj' => $this->rq->osubject,
    //             'any_other_schl' => $this->rq->ocollegename,
    //             'any_other_per' => $this->rq->ocgpa,                
    //             'employ_id' => $this->employID,
    //         ]);  

    //         if($academic) {

    //             return true;
    //         }

    //         return false;


    //     });  
    // }

    // public function get_all_resigne_employee()
    // {
    //     $employee = false;

    //     if ($data = Employee::all()) {
    //         $employee = $data;
    //     }

    //     return $employee;
    // }

    // public function get_all_domestic_employee()
    // {
    //     $employee = false;

    //     if ($data = Employee::where('is_employee', 2)->get()) {
    //         $employee = $data;
    //     }

    //     return $employee;
    // }


    // public function get_employee($id)
    // {
    //     $employee = false;

    //     if ($data = Employee::find($id)) {
    //         $employee = $data;
    //     }

    //     return $employee;
    // }


    // function update_employee($rq)
    // {
    //     $model = Employee::find($rq->eId);
    //     $model->emp_title = $rq->title;
    //     $model->emp_name = $rq->fullName;
    //     $model->emp_fname = $rq->fName;
    //     $model->emp_address = $rq->empCurrentAddress;
    //     $model->emp_contact = $rq->empContact;
    //     $model->emp_dob = $rq-> date_format(date_create($rq->empDOB), 'Y-m-d');
    //     $model->emp_email = $rq->empEmail;
    //     $model->emp_permanent_address = $rq->empPermanentAddress;
    //     $model->emp_status = $rq->empStatus;
    //     $model->emp_nationality = $rq->empNationality;
    //     $model->emp_gender = $rq->empGender;
    //     $model->emp_religion = $rq->empReligion;
    //     $model->emp_experience = $rq->empExperience;
    //     $model->emp_experience = 'no image';

    //     if ($model->save()) {
    //         return true;
    //     }

    //     return false;
    // }


    // public function get_a_employee($id)
    // {
    //     $employee = false;

    //     if ($data = Employee::where('id', $id)->get()) {
    //         $employee = $data;
    //     }
    //     return $employee;
    // }

    // function delete_employee($id)
    // {
    //     $model = Employee::find($id);

    //     if ($model->delete()) {
    //         return true;
    //     }

    //     return false;
    // }

}


