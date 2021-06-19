<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\DomesticEmp;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use Throwable;

class DomEmployeService
{

    /***
    
     * Enroll and save new employee
     * 
     * do a sql transaction, if any of our query get failed then rollback all entries and return with error.
     */
    // public function save_domestic_employee($rq)
    // {

    //     $this->rq = $rq;

    //     $domEmployee = DomesticEmp::create([

    //         'dom_emp_title' => $this->rq->title,
    //         'dom_emp_name' => $this->rq->fullName,
    //         'dom_emp_fname' => $this->rq->fName,
    //         'dom_emp_address' => $this->rq->empCurrentAddress,
    //         'dom_emp_contact' => $this->rq->empContact,
    //         'dom_emp_dob' => date_format(date_create($this->rq->empDOB), 'Y-m-d'),
    //         'dom_emp_email' => $this->rq->empEmail,
    //         'dom_emp_permanent_address' => $this->rq->empPermanentAddress,
    //         'dom_emp_status' => $this->rq->empStatus,
    //         'dom_emp_nationality' => $this->rq->empNationality,
    //         'dom_emp_gender' => $this->rq->empGender,
    //         'dom_emp_religion' => $this->rq->empReligion,
    //     ]);  
        
    //     if($domEmployee) 
    //         return true;
    //     return false;
               
    // }

    // public function get_all_dom_employee()
    // {
    //     $employee = false;

    //     if ($data = DomesticEmp::all()) {
    //         $employee = $data;
    //     }

    //     return $employee;
    // }

}
