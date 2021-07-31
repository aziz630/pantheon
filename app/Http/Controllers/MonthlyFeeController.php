<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Session;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Enrollment;
use App\Models\FeeCategoryAmount;
use DB;
use PDF;

class MonthlyFeeController extends Controller
{
    public function monthly_free_view($p = null)
    {
        $data['sessions'] = Session::all();
        $data['classes'] = Classes::all();
        return view('pages.fee.monthly_fee.monthly_fee_view', $data);
    }


    public function monthly_fee_class_wise(Request $request)
    {
        $session = $request->session;
    	 $class = $request->class_id;
    	 if ($session !='') {
    	 	$where[] = ['academic_session_id','like',$session.'%'];
    	 }
    	 if ($class !='') {
    	 	$where[] = ['class_id','like',$class.'%'];
    	 }
    	 $allStudent = Enrollment::with(['discount'])->where($where)->get();
    	//  dd($allStudent);
    	 $html['thsource']  = '<th>SL</th>';
    	 $html['thsource'] .= '<th>ID NO</th>';
    	 $html['thsource'] .= '<th>Student Name</th>';
    	 $html['thsource'] .= '<th>Monthly Fee</th>';
    	 $html['thsource'] .= '<th>Discount </th>';
    	 $html['thsource'] .= '<th>Student Fee </th>';
    	 $html['thsource'] .= '<th>Action</th>';


    	 foreach ($allStudent as $key => $v) {
             $i=10;
    	 	$registrationfee = FeeCategoryAmount::where('fee_category_id','2')->where('class_id',$v->class_id)->first();
    	 	$color = 'success';
    	 	$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$v['student']['id_no'].'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$v['student']['std_name'].'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$registrationfee->amount.'</td>';
    	 	$html[$key]['tdsource'] .= '<td>'.$v['discount']['discount'].'%'.'</td>';
    	 	
    	 	$originalfee = $registrationfee->amount;
    	 	$discount = $v['discount']['discount'];
    	 	$discounttablefee = $discount/100*$originalfee;
    	 	$finalfee = (float)$originalfee-(float)$discounttablefee;

    	 	$html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';
    	 	$html[$key]['tdsource'] .='<td>';
    	 	$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.monthly.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&month='.$request->month.' ">Fee Slip</a>';
    	 	$html[$key]['tdsource'] .= '</td>';

    	 }  
    	return response()->json(@$html);
    }


    public function monthly_fee_payslip(Request $request)
    {
        $student_id = $request->student_id;
    	$class_id = $request->class_id;
    	$data['month'] = $request->month;
    	


    	$data['details'] = Enrollment::with(['student','discount'])->where('student_id',$student_id)->where('class_id',$class_id)->first();

        $pdf = PDF::loadView('pages.fee.monthly_fee.monthly_fee_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
