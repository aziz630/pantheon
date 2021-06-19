<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Academic;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

use Throwable;

class EmployeService
{

    /***
    
     * Enroll and save new employee
     * 
     * do a sql transaction, if any of our query get failed then rollback all entries and return with error.
     */
    public function save_employee($rq)
    {

        $this->rq = $rq;

        DB::transaction(function () {

            $image = $this->rq->image->store('employee');

            $employee = Employee::create([

                'emp_title' => $this->rq->title,
                'ERP_number' => $this->rq->ERP_number,
                'emp_name' => $this->rq->fullName,
                'emp_fname' => $this->rq->fName,
                'emp_address' => $this->rq->empCurrentAddress,
                'emp_contact' => $this->rq->empContact,
                'emp_dob' => date_format(date_create($this->rq->empDOB), 'Y-m-d'),
                'emp_email' => $this->rq->empEmail,
                'emp_permanent_address' => $this->rq->empPermanentAddress,
                'is_married' => $this->rq->empMarried,
                'emp_nationality' => $this->rq->empNationality,
                'emp_gender' => $this->rq->empGender,
                'is_employee' => $this->rq->role_id,
                'emp_religion' => $this->rq->empReligion,
                'emp_experience' => $this->rq->empExperience,
                'emp_image' => $image,
                'emp_file' => 'no image',
                
            ]);

            $this->employID = $employee->id;


            $academic = Academic::create([

                'matric_pass_year' => $this->rq->mpassingyear,
                'matric_subj' => $this->rq->msubject,
                'matric_schl' => $this->rq->mschoolname,
                'matric_per' => $this->rq->mpersentage,

                'secondary_pass_year' => $this->rq->mpassingyear,
                'secondary_subj' => $this->rq->ssubject,
                'secondary_schl' => $this->rq->scollegename,
                'secondary_per' => $this->rq->scgpa,

                'graduate_pass_year' => $this->rq->gpassingyear,
                'graduate_subj' => $this->rq->gsubject,
                'graduate_schl' => $this->rq->gcollegename,
                'graduate_per' => $this->rq->gcgpa,

                'post_graduate_pass_year' => $this->rq->pgpassingyear,
                'post_graduate_subj' => $this->rq->pgsubject,
                'post_graduate_schl' => $this->rq->pgcollegename,
                'post_graduate_per' => $this->rq->pgcgpa,

                'any_other_pass_year' => $this->rq->opassingyear,
                'any_other_subj' => $this->rq->osubject,
                'any_other_schl' => $this->rq->ocollegename,
                'any_other_per' => $this->rq->ocgpa,                
                'employ_id' => $this->employID,
            ]);  


            $user = User::create([
                'fname' => $this->rq->fullName,
                'email' => $this->rq->empEmail,
                'password' => Hash::make('pantheon@123'),
                'gender' => $this->rq->empGender,
                'dob' => date_format(date_create($this->rq->empDOB), 'Y-m-d'),
                'is_muslim' => $this->rq->empReligion,
                'nationality' => $this->rq->empNationality,
                'address' => $this->rq->empCurrentAddress,
                'phone' => $this->rq->empContact,
                'emergency_contact' => $this->rq->empContact,
                
            ]);
                
            $user->attachRole($this->rq->role_id);
        });  
        
        return true;
    }

    public function get_all_employee()
    {
        $employee = false;

        if ($data = Employee::all()) {
            $employee = $data;
        }

        return $employee;
    }

    public function get_all_domestic_employee()
    {
        $employee = false;

        if ($data = Employee::where('is_employee', 2)->get()) {
            $employee = $data;
        }

        return $employee;
    }


    public function get_single_employee($id)
    {
        $employee = false;

        if ($data = Employee::find($id)) {
            $employee = $data;
        }

        return $employee;
    }


    function update_employee($rq)
    {
        $model = Employee::find($rq->eId);
        $model->emp_title = $rq->title;
        $model->ERP_number = $rq->ERP_number;
        $model->emp_name = $rq->fullName;
        $model->emp_fname = $rq->fName;
        $model->emp_address = $rq->empCurrentAddress;
        $model->emp_contact = $rq->empContact;
        $model->emp_dob = date_format(date_create($rq->empDOB), 'Y-m-d');
        $model->emp_email = $rq->empEmail;
        $model->emp_permanent_address = $rq->empPermanentAddress;
        $model->is_married = $rq->empMarried;
        $model->emp_nationality = $rq->empNationality;
        $model->emp_gender = $rq->empGender;
        $model->emp_religion = $rq->empReligion;
        $model->emp_experience = $rq->empExperience;
        $model->emp_experience = 'no image';
        $model->save();
       
        $academic = Academic::find($rq->eId);
        $academic->matric_pass_year = $rq->mpassingyear;
        $academic->matric_subj = $rq->msubject;
        $academic->matric_schl = $rq->mschoolname;
        $academic->matric_per = $rq->mpersentage;

        $academic->secondary_pass_year = $rq->mpassingyear;
        $academic->secondary_subj = $rq->ssubject;
        $academic->secondary_schl = $rq->scollegename;
        $academic->secondary_per = $rq->scgpa;

        $academic->graduate_pass_year = $rq->gpassingyear;
        $academic->graduate_subj = $rq->gsubject;
        $academic->graduate_schl = $rq->gcollegename;
        $academic->graduate_per = $rq->gcgpa;

        $academic->post_graduate_pass_year = $rq->pgpassingyear;
        $academic->post_graduate_subj = $rq->pgsubject;
        $academic->post_graduate_schl = $rq->pgcollegename;
        $academic->post_graduate_per = $rq->pgcgpa;

        $academic->any_other_pass_year = $rq->opassingyear;
        $academic->any_other_subj = $rq->osubject;
        $academic->any_other_schl = $rq->ocollegename;
        $academic->any_other_per = $rq->ocgpa;    
        $academic->save();           
        
        return true;

    }


    public function edit_employee($id)
    {
        $employee = false;

        if ($data = Employee::where('id', $id)->first()) {
            $employee = $data;
        }
        return $employee;
    }



    public function get_all_trashed_employee()
    {
        $employee = false;

        if ($data = Employee::onlyTrashed()->get()) {
            $employee = $data;
        }

        return $employee;
    }




    function delete_employee($id)
    {
        $model = Employee::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }



    function restore_employee($id)
    {
        $model = Employee::withTrashed()->where('id', $id);
        if ($model->restore()) {
            return true;
        }

        return false;
    }

}


