<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;
use PDF;

class MonthlySalaryController extends Controller
{
    public function Employee_Monthly_Salary_View()
    {
        return view('pages.employ.employeeMonthlySalary.employee_monthly_salary_view');
    }

    public function Employee_Monthly_Salary_Get(Request $request)
    {
        $date = date('Y-m', strtotime($request->date));
    	 if ($date !='') {
    	 	$where[] = ['date','like',$date.'%'];
    	 }
    	
    	 $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
    	//  dd($allStudent);
    	 $html['thsource']  = '<th>SL</th>';
    	 $html['thsource'] .= '<th>Employee Name</th>';
    	 $html['thsource'] .= '<th>Basic Salary</th>';
    	 $html['thsource'] .= '<th>Salary This Month</th>';
    	 $html['thsource'] .= '<th>Action</th>';


    	 foreach ($data as $key => $attend) {
    	 	$totalAttendance = EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $attend->employee_id)->get();
    	 	$totalAbsent = count($totalAttendance->where('attandance_status', 'Absent'));

             $color = 'success';
    	 	$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';
    	 	
    	 	$salary = (float)$attend['user']['salary'];
    	 	$salaryPerSay = (float)$salary/30;
    	 	$salaryMinus = (float)$totalAbsent*(float)$salaryPerSay;
    	 	$finalSalary = (float)$salary-(float)$salaryMinus;

    	 	$html[$key]['tdsource'] .='<td>'.$finalSalary.'$'.'</td>';
    	 	$html[$key]['tdsource'] .='<td>';
    	 	$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip", $attend->employee_id).'">Fee Slip</a>';
    	 	$html[$key]['tdsource'] .= '</td>';

    	 }  
    	return response()->json(@$html);
    }

    public function Employee_Monthly_Salary_Payslip(Request $request, $employee_id)
    {
       $id = EmployeeAttendance::where('employee_id', $employee_id)->first();

       $date = date('Y-m', strtotime($id->date));
       if ($date !='') {
           $where[] = ['date','like',$date.'%'];
       }
      
       $data['details'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id', $id->employee_id)->get();

       $pdf = PDF::loadView('pages.employ.employeeMonthlySalary.employee_monthly_salary_pdf', $data);
			$pdf->SetProtection(['copy', 'print'], '', 'pass');
			$pdf->stream('document.pdf');
    }
}
