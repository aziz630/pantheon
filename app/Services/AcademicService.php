<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Academic;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Throwable;

class AcademicService
{

    /***
    
     * Enroll and save new employee
     * 
     * do a sql transaction, if any of our query get failed then rollback all entries and return with error.
     */
   

    // public function get_all_employee()
    // {
    //     $employee = false;

    //     if ($data = Employee::all()) {
    //         $employee = $data;
    //     }

    //     return $employee;
    // }



    public function edit_employee_academic_detail($id)
    {
        $academic = false;

        if ($data = Academic::where('id', $id)->first()) {
            $academic = $data;
        }
        return $academic;
    }



    function delete_adademic($id)
    {
        $model = Academic::find($id);

        if ($model->delete()) {
            return true;
        }

        return false;
    }

}


