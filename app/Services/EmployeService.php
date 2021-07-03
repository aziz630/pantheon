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

            // upload multiple Attachement 

            $files = [];
            if($this->rq->hasfile('empfile'))
             {
                foreach($this->rq->file('empfile') as $file)
                {
                    $name = time().'.'.$file->extension();
                    $file->move(public_path('attachement'), $name);  
                    $files[] = $name;  
                }
             }

            //  upload profile image
            $image = $this->rq->file('file');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('profile'),$imageName);

            $employee = Employee::create([

                'emp_title' => $this->rq->title,
                'emp_name' => $this->rq->fullName,
                'emp_fname' => $this->rq->fName,
                'emp_address' => $this->rq->empCurrentAddress,
                'emp_contact' => $this->rq->empContact,
                'emp_dob' => date_format(date_create($this->rq->empDOB), 'Y-m-d'),
                'emp_email' => $this->rq->emp_email,
                'emp_permanent_address' => $this->rq->empPermanentAddress,
                'is_married' => $this->rq->empMarried,
                'emp_nationality' => $this->rq->empNationality,
                'emp_gender' => $this->rq->empGender,
                'is_employee' => $this->rq->role_id,
                'emp_religion' => $this->rq->empReligion,
                'emp_experience' => $this->rq->empExperience,
                'emp_profile_image' => $imageName,
                'emp_status' => true,
                'emp_file_attachment' => json_encode($files),
                
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
                'email' => $this->rq->emp_email,
                'password' => Hash::make('pantheon@123'),
                'gender' => $this->rq->empGender,
                'dob' => date_format(date_create($this->rq->empDOB), 'Y-m-d'),
                'is_muslim' => $this->rq->empReligion,
                'nationality' => $this->rq->empNationality,
                'address' => $this->rq->empCurrentAddress,
                'phone' => $this->rq->empContact,
                'title' => $this->rq->title,
                'is_employee' => $this->rq->role_id,
                'emergency_contact' => $this->rq->empContact,
                'status' => true,
                'profile_image' => $imageName,
                'employee_id' => $this->employID,
                
            ]);
                
            $user->attachRole($this->rq->role_id);
        });  
        
        return true;
    }

    public function get_all_employee()
    {
        $employee = false;

        // where('emp_status', '=', true)->where('reason_of_terminate', '=' , NULL)
        if ($data = Employee::where([
            ['emp_status', '=' , true],
            ['reason_of_terminate', '=', Null ],
            ['emp_dob', '!=', Null]
            ])->get()){
            $employee = $data;
        }

        return $employee;
    }


    
     /**
     * 
     * get all resign employee   
     *  
     */
    public function get_all_resigne_requests()
    {
        $resign_employee = false;

        // $statusValue = ['field' => 'value', 'another_field' => 'another_value', ...];

        if ($data = Employee::where([
            ['reason_of_resign', '!=' , NULL],
            ['emp_status', '=', true ],
            ['reject_status', '=', true]
            ])->get()){

            $resign_employee = $data;
        }
        return $resign_employee;
    }



   /*
    *
    *   query for all resigned employee
    */


    public function get_all_resigned_employee()
    {
        $resign_employee = false;
        if ($data = Employee::where('emp_status', '=', false)->get()){

            $resign_employee = $data;
        }
        return $resign_employee;
    }


    /*
    *
    *   query for all Terminated employee
    */

    public function get_all_terminated_employee()
    {
        $resign_employee = false;
        if ($data = Employee::where('reason_of_terminate', '!=' , NULL)->get()){

            $resign_employee = $data;
        }
        return $resign_employee;
    }


    public function get_single_employee($id)
    {
        $employee = false;

        if ($data = Employee::find($id)) {
            $employee = $data;
        }

        return $employee;
    }


    public function get_resign_employee($id)
    {
        $resigne_employee = false;

        if ($data = Employee::find($id)) {
            $resigne_employee = $data;
        }

        return $resigne_employee;
    }


    function update_employee($rq)
    {

        $files = [];
        if($rq->hasfile('empfile'))
         {
            foreach($rq->file('empfile') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path('attachement'), $name);  
                $files[] = $name;  
            }
         }

        //  upload profile image
        $image = $rq->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('profile'),$imageName);


        $model = Employee::find($rq->eId);
        $model->emp_title = $rq->title;
        $model->emp_name = $rq->fullName;
        $model->emp_fname = $rq->fName;
        $model->emp_address = $rq->empCurrentAddress;
        $model->emp_contact = $rq->empContact;
        $model->emp_dob = date_format(date_create($rq->empDOB), 'Y-m-d');
        $model->emp_email = $rq->emp_email;
        $model->emp_permanent_address = $rq->empPermanentAddress;
        $model->emp_profile_image = $imageName;
        $model->is_married = $rq->empMarried;
        $model->is_employee = $rq->role_id;
        $model->emp_nationality = $rq->empNationality;
        $model->emp_gender = $rq->empGender;
        $model->emp_religion = $rq->empReligion;
        $model->emp_experience = $rq->empExperience;
        $model->emp_status = true;
        $model->emp_file_attachment = json_encode($files);

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

    // update employee for resign just add two fields to employee table

    public function update_employee_resign_record($rq)
    {
        $image = $rq->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('resigneImages'),$imageName);
        
        $model = Employee::find($rq->rId);
        $model->reason_of_resign = $rq->reasonOfResign;
        $model->resig_file = $imageName;
        $model->save();
        return true;
      
    }


    // update employee for termination just add reason_of_terminate fields to employee table

    public function employee_terminate_record($rq)
    {
        
        $model = Employee::find($rq->tId);
        $model->reason_of_terminate = $rq->reasonOfTerminate;
        $model->save();
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


