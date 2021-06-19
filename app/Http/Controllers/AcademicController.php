<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicController extends Controller
{
    //

    protected $employee_service = null;

    public function __construct()
    {
        $this->employee_service = new EmployeService();
    }


    // public function get_employee_academic_detail(Request $RQ, $id)
    // {

    //     $employee = $this->employee_service->get_employee_academic_detail($id);
        

    //     return view('pages.employ.detail_page', compact('employee'));
    // }
}
