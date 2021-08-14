<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountEmployeeSalary;
use App\Models\AccountOtherCost;
use App\Models\AccountStudentsFee;
use PDF;


class ProfitController extends Controller
{
    public function Monthly_Profit_view(Request $request)
    {
        $start_date = date('Y-m', strtotime($request->start_date));
        $end_date = date('Y-m', strtotime($request->end_date));
        $sdate  =  date('Y-m-d', strtotime($request->start_date));
        $edate  =  date('Y-m-d', strtotime($request->end_date));

        $student_fee = AccountStudentsFee::whereBetween('date', [$start_date, $end_date])->sum('amount');

        $Employee_salary = AccountEmployeeSalary::whereBetween('date', [$start_date, $end_date])->sum('amount');

        $other_cost = AccountOtherCost::whereBetween('date', [$sdate, $edate])->sum('amount');

        $total_cost = $other_cost + $Employee_salary;
        $profit  =  $student_fee - $total_cost;

        return view('pages.report.profit.profit_view', compact('student_fee','Employee_salary', 'other_cost', 'total_cost', 'profit'));
    }

    public function report_Profit_Datewaise_Get(Request $request)
    {
        $start_date = date('Y-m', strtotime($request->start_date));
        $end_date = date('Y-m', strtotime($request->end_date));
        $sdate  =  date('Y-m-d', strtotime($request->start_date));
        $edate  =  date('Y-m-d', strtotime($request->end_date));

        $student_fee = AccountStudentsFee::whereBetween('date', [$start_date, $end_date])->sum('amount');

        $Employee_salary = AccountEmployeeSalary::whereBetween('date', [$start_date, $end_date])->sum('amount');

        $other_cost = AccountOtherCost::whereBetween('date', [$sdate, $edate])->sum('amount');

        $total_cost = $other_cost + $Employee_salary;
        $profit  =  $student_fee - $total_cost;

        $html['thsource']  = '<th>Student Fee</th>';
        $html['thsource'] .= '<th>Other Cost</th>';
        $html['thsource'] .= '<th>Employee Salary</th>';
        $html['thsource'] .= '<th>Total Cost</th>';
        $html['thsource'] .= '<th>Profit </th>';
        $html['thsource'] .= '<th>Action</th>';

        $color = 'success';
        $html['tdsource']  = '<td>'.$student_fee.'</td>';
        $html['tdsource']  .= '<td>'.$other_cost.'</td>';
        $html['tdsource']  .= '<td>'.$Employee_salary.'</td>';
        $html['tdsource']  .= '<td>'.$total_cost.'</td>';
        $html['tdsource']  .= '<td>'.$profit.'</td>';
        $html['tdsource'] .='<td>';
        $html['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PDF" target="_blanks" href="'.route("report.profit.pdf").'?start_date='.$sdate.'&end_date='.$edate.'">Pay Slip</a>';
        $html['tdsource'] .= '</td>';
     
       return response()->json(@$html); 
    }




    public function Report_Profit_pdf(Request $request)
    {
        $data['start_date'] = date('Y-m', strtotime($request->start_date));
        $data['end_date'] = date('Y-m', strtotime($request->end_date));
        $data['sdate']  =  date('Y-m-d', strtotime($request->start_date));
        $data['edate']  =  date('Y-m-d', strtotime($request->end_date));

        $pdf = PDF::loadView('pages.report.profit.profit_PDF', $data);
        // $pdf->setOption('enable-javascript', true);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        $pdf->stream('document.pdf');
    }
}
