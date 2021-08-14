<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeSalaryLog;



class EmployeeSalaryController extends Controller
{
    public function Employee_Salary_View()
    {
        $data['allData'] = User::where('usertype', 'Employee')->get();

        return view('pages.employ.employeeSalary.employee_salary_view', $data);
    }

    public function Employee_Salary_Increment($id)
    {
        $data['editData'] = User::find($id);

        return view('pages.employ.employeeSalary.employee_salary_increment', $data);
    }

    public function Salary_Store(Request $request, $id)
    {
        $user = User::find($id);
    	$previous_salary = $user->salary;
    	$present_salary = (float)$previous_salary+(float)$request->increment_salary; 
    	$user->salary = $present_salary;
    	$user->save();

    	$salaryData = new EmployeeSalaryLog();
    	$salaryData->employee_id = $id;
    	$salaryData->previous_salary = $previous_salary;
    	$salaryData->increment_salary = $request->increment_salary;
    	$salaryData->present_salary = $present_salary;
    	$salaryData->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
    	$salaryData->save(); 

        if ($salaryData->save()) {
            return redirect(url('employee/salary/view'))->with('success', 'Salary Incremented successfully.');
        } else {
            return redirect()->back()->with('error', 'Salary not Incremented.');
        }
    }


    public function Employee_Salary_detail(Request $request, $id)
    {
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id', $data['details']->id)->get();
        // dd($data['salary_log']->toArray());
        return view('pages.employ.employeeSalary.employee_salary_detail', $data);

    }   



}
