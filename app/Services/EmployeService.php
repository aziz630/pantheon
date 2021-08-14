<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Academic;
use App\Models\EmployeeSalaryLog;
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
                    $file->move(public_path('upload/attachement'), $name);  
                    $files[] = $name;  
                }
             }

            //  upload profile image
            $image = $this->rq->file('file');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('upload/employee_profile'),$imageName);



        $checkYear = date('Ym',strtotime($this->rq->join_date));
    	//dd($checkYear);
    	$employee = User::where('usertype','Employee')->orderBy('id','DESC')->first();

    	if ($employee == null) {
    		$firstReg = 0;
    		$employeeId = $firstReg+1;
    		if ($employeeId < 10) {
    			$id_no = '000'.$employeeId;
    		}elseif ($employeeId < 100) {
    			$id_no = '00'.$employeeId;
    		}elseif ($employeeId < 1000) {
    			$id_no = '0'.$employeeId;
    		}
    	}else{
            $employee = User::where('usertype','Employee')->orderBy('id','DESC')->first()->id;
            $employeeId = $employee+1;
            if ($employeeId < 10) {
                    $id_no = '000'.$employeeId;
                }elseif ($employeeId < 100) {
                    $id_no = '00'.$employeeId;
                }elseif ($employeeId < 1000) {
                    $id_no = '0'.$employeeId;
                }

    	    } // end else 

    	$final_id_no = $checkYear.$id_no;

            // $code = rand(0000,9999);

            $employee = User::create([

                'title' => $this->rq->title,
                'name' => $this->rq->fullName,
                'father_name' => $this->rq->fName,
                'id_no' => $final_id_no,
                'usertype' => 'Employee',
                'current_address' => $this->rq->empCurrentAddress,
                'contact_no' => $this->rq->empContact,
                'dob' => date_format(date_create($this->rq->empDOB), 'Y-m-d'),
                'password' => bcrypt('pantheon@123'),
                'email' => $this->rq->emp_email,
                'permanent_address' => $this->rq->empPermanentAddress,
                'married' => $this->rq->empMarried,
                'nationality' => $this->rq->empNationality,
                'gender' => $this->rq->empGender,
                'is_employee' => $this->rq->role_id,
                'religion' => $this->rq->empReligion,
                'experience' => $this->rq->empExperience,
                'image' => $imageName,
                'status' => true,
                'join_date' => date_format(date_create($this->rq->empJoinDate), 'Y-m-d'),
                'salary' => $this->rq->empSalary,
                'file_attachment' => json_encode($files),

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
                
            ]);

            $this->employID = $employee->id;

            $employee->attachRole($this->rq->role_id);

            $employee_salary = EmployeeSalaryLog::create([

                'employee_id' => $this->employID,
                'effected_salary' => date('Y-m-d',strtotime($this->rq->join_date)),
                'previous_salary' => $this->rq->empSalary,
                'present_salary' => $this->rq->empSalary,
                'increment_salary' => '0',
            ]);
             
        });  
        
        return true;
    }

    /**
     * 
     * 
     * Get All employies List
     */
    public function get_all_employee()
    {
        $employee = false;

        if ($data = User::where([
            ['emp_status', '=' , true],
            ['reason_of_terminate', '=', Null ],
            ['usertype', '=', 'Employee'],
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

        if ($data = User::where([
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
        if ($data = User::where('emp_status', '=', false)->get()){

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
        if ($data = User::where('reason_of_terminate', '!=' , NULL)->get()){

            $resign_employee = $data;
        }
        return $resign_employee;
    }


    public function get_single_employee($id)
    {
        $employee = false;

        if ($data = User::find($id)) {
            $employee = $data;
        }

        return $employee;
    }


    public function get_resign_employee($id)
    {
        $resigne_employee = false;

        if ($data = User::find($id)) {
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
                $file->move(public_path('upload/attachement'), $name);  
                $files[] = $name;  
            }
         }

        //  upload profile image
        $image = $rq->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('upload/employee_profile'),$imageName);


        $model = User::find($rq->eId);
        $model->title = $rq->title;
        $model->name = $rq->fullName;
        $model->father_name = $rq->fName;
        $model->address = $rq->empCurrentAddress;
        $model->contact = $rq->empContact;
        $model->dob = date_format(date_create($rq->empDOB), 'Y-m-d');
        $model->email = $rq->emp_email;
        $model->permanent_address = $rq->empPermanentAddress;
        $model->image = $imageName;
        $model->married = $rq->empMarried;
        $model->is_employee = $rq->role_id;
        $model->nationality = $rq->empNationality;
        $model->gender = $rq->empGender;
        $model->join_date = date_format(date_create($this->rq->empJoinDate), 'Y-m-d');
        $model->salary = $this->rq->empSalary;
        $model->religion = $rq->empReligion;
        $model->experience = $rq->empExperience;
        $model->status = true;
        $model->file_attachment = json_encode($files);

        // $model->save();
       
        // $academic = Academic::find($rq->eId);
        $model->matric_pass_year = $rq->mpassingyear;
        $model->matric_subj = $rq->msubject;
        $model->matric_schl = $rq->mschoolname;
        $model->matric_per = $rq->mpersentage;

        $model->secondary_pass_year = $rq->mpassingyear;
        $model->secondary_subj = $rq->ssubject;
        $model->secondary_schl = $rq->scollegename;
        $model->secondary_per = $rq->scgpa;

        $model->graduate_pass_year = $rq->gpassingyear;
        $model->graduate_subj = $rq->gsubject;
        $model->graduate_schl = $rq->gcollegename;
        $model->graduate_per = $rq->gcgpa;

        $model->post_graduate_pass_year = $rq->pgpassingyear;
        $model->post_graduate_subj = $rq->pgsubject;
        $model->post_graduate_schl = $rq->pgcollegename;
        $model->post_graduate_per = $rq->pgcgpa;

        $model->any_other_pass_year = $rq->opassingyear;
        $model->any_other_subj = $rq->osubject;
        $model->any_other_schl = $rq->ocollegename;
        $model->any_other_per = $rq->ocgpa;    
        $model->save();           
        
        return true;

    }

    // update employee for resign just add two fields to employee table

    public function update_employee_resign_record($rq)
    {
        $image = $rq->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('upload/resigneImages'),$imageName);
        
        $model = User::find($rq->rId);
        $model->reason_of_resign = $rq->reasonOfResign;
        $model->resig_file = $imageName;
        $model->save();
        return true;
      
    }


    // update employee for termination just add reason_of_terminate fields to employee table

    public function employee_terminate_record($rq)
    {
        
        $model = User::find($rq->tId);
        $model->reason_of_terminate = $rq->reasonOfTerminate;
        $model->save();
        return true;
      
    }



    public function edit_employee($id)
    {
        $employee = false;

        if ($data = User::where('id', $id)->first()) {
            $employee = $data;
        }
        return $employee;
    }




    public function get_all_trashed_employee()
    {
        $employee = false;

        if ($data = User::onlyTrashed()->get()) {
            $employee = $data;
        }

        return $employee;
    }



    function delete_employee($id)
    {
        $model = User::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }



    function restore_employee($id)
    {
        $model = User::withTrashed()->where('id', $id);
        if ($model->restore()) {
            return true;
        }

        return false;
    }

}


