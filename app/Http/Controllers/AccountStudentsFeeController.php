<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountStudentsFee;
use App\Models\Session;
use App\Models\Classes;
use App\Models\FeeCategory;
use App\Models\Enrollment;
use App\Models\FeeCategoryAmount;
use App\Models\DuesAccount;

use DB;


class AccountStudentsFeeController extends Controller
{
    public function student_account_view()
    {
        $data['allData'] = AccountStudentsFee::with(['DuesFee'])->get();


        // $data['allData'] = DuesAccount::all();
        // DB::table('account_students_fees')
        // ->select('account_students_fees.*', DB::raw('COUNT(dues) as due'))->get();

        return view('pages.account.student_fee.student_fee_view', $data);
    }

    public function Student_Fee_Add(){
    	$data['sessions'] = Session::all();
    	$data['classes'] = Classes::all();
    	$data['fee_categories'] = FeeCategory::all();

    	return view('pages.account.student_fee.student_fee_add',$data);

    }



    public function Student_Fee_Get_Student(Request $request)
    {

        $class_id = $request->class_id;
        $year_id = $request->session;
        $fee_category_id = $request->fee_category_id;
        $date = date('Y-m',strtotime($request->date));    	   
          
        $data = Enrollment::with(['discount'])->where('academic_session_id',$year_id)->where('class_id',$class_id)->get();
        
        $html['thsource']  = '<th>ID No</th>';
        $html['thsource'] .= '<th>Student Name</th>';
        $html['thsource'] .= '<th>Father Name</th>';
        $html['thsource'] .= '<th>Original Fee </th>';
        $html['thsource'] .= '<th>Discount Amount</th>';
        $html['thsource'] .= '<th>Fee (For This Student)</th>';
        $html['thsource'] .= '<th>Select</th>';
 
        foreach ($data as $key => $std) {
        $registrationfee = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->where('class_id',$std->class_id)->first();

        $accountstudentfees = AccountStudentsFee::where('student_id',$std->student_id)->where('year_id',$std->academic_session_id)->where('class_id',$std->class_id)->where('fee_category_id',$fee_category_id)->where('date',$date)->first();
        // $duesFee = DuesAccount::where('student_id',$std->student_id)->first();

        if($accountstudentfees !=null) {
            $checked = 'checked';
        }else{
            $checked = '';
        }  	 	 
        $color = 'success';
        $html[$key]['tdsource']  = '<td>'.$std['student']['id_no']. '<input type="hidden" name="fee_category_id" value= " '.$fee_category_id.' " >'.'</td>';
    
        $html[$key]['tdsource']  .= '<td>'.$std['student']['name']. '<input type="hidden" name="session" value= " '.$std->academic_session_id.' " >'.'</td>';
    
        $html[$key]['tdsource']  .= '<td>'.$std['student']['father_name']. '<input type="hidden" name="class_id" value= " '.$std->class_id.' " >'.'</td>';
    
        $html[$key]['tdsource']  .= '<td>'.$registrationfee->amount.'$'.'<input type="hidden" name="date" value= " '.$date.' " >'.'</td>';
    
        $html[$key]['tdsource'] .= '<td>'.$std['discount']['discount'].'%'.'</td>';
   
        $orginalfee = $registrationfee->amount;
        $discount = $std['discount']['discount'];
        $discountablefee = $discount/100*$orginalfee;
        $finalfee = (int)$orginalfee-(int)$discountablefee;    	 	 
 
        $html[$key]['tdsource'] .='<td>'. '<input type="text" name="amount[]" value="'.$finalfee.' " class="form-control" readonly'.'</td>';
        
        $html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="student_id[]" value="'.$std->student_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 
    
        }  
         return response()->json(@$html);
 
    } // end mehtod
 
 
   
    public function Account_Fee_Store(Request $request)
    {
         
        $date = date('Y-m',strtotime($request->date));

        
        AccountStudentsFee::where('year_id',$request->session)->where('class_id',$request->class_id)->where('fee_category_id',$request->fee_category_id)->where('date',$request->date)->delete();
 
        $checkdata = $request->checkmanage;
        
        if ($checkdata !=null) {
             for ($i=0; $i <count($checkdata) ; $i++) { 
                $data = new AccountStudentsFee;
                $data->dues_id = $request->student_id[$checkdata[$i]];
                $data->year_id = $request->session;
                $data->class_id = $request->class_id;
                $data->date = $date;
                $data->fee_category_id = $request->fee_category_id;
                $data->student_id = $request->student_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];
                $data->fee  =  'done';
                $data->save();
            } // end for loop
        } // end if 
 
        if (!empty(@$data) || empty($checkdata)) {

      
            return redirect(url('student_fee'))->with('success', 'Data Successfully Updated');
        
                
        }else{
        
            return redirect()->back()->with('error', 'Data not Updated');
        
        } 
 
    } // end method 

}
