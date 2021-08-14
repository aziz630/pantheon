<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;
use App\Models\User;


class EmployeeAttendanceController extends Controller
{
    public function Employee_Attendance_view()
    {
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id', 'DESC')->get();

        // $data['allData'] = EmployeeAttendance::orderBy('id', 'DESC')->get();

        return view('pages.employ.employeeAttendance.employee_attendance_view', $data);
    }

    public function Add_Employee_Attendance()
    {
        $data['employees'] = User::where('usertype','Employee')->get();

        return view('pages.employ.employeeAttendance.employee_attendance_add',$data);
    }

    public function store_Employee_Attendance(Request $request)
    {
        EmployeeAttendance::where('date', date('y-m-d', strtotime($request->date)))->delete();

        $countEmployee = count($request->employee_id);
        // dd($countEmployee);
        for ($i=0; $i < $countEmployee; $i++) { 
            $attandance_status = 'attandance_status'.$i;
            $attand = new EmployeeAttendance();
            $attand->date = date('y-m-d', strtotime($request->date));
            $attand->employee_id = $request->employee_id[$i];
            $attand->attandance_status = $request->$attandance_status;
            $attand->save();

        }
        if ($attand->save()) {
            return redirect(url('employee/attendance/view'))->with('success', 'Attendance Updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Attendance Not Updated.');
        }



    }

    public function Employee_Attendance_Edit($date)
    {
        $data['editData'] = EmployeeAttendance::where('date', $date)->get();
        $data['employees'] = User::where('usertype', 'Employee')->get();

        return view('pages.employ.employeeAttendance.employee_attendance_edit',$data);

    }

    public function Employee_Attendance_details($date)
    {
        $data['details'] = EmployeeAttendance::where('date', $date)->get();

        return view('pages.employ.employeeAttendance.employee_attendance_detail', $data);
    }
}
