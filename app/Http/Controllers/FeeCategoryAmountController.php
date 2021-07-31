<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\Classes;
use App\Models\FeeCategoryAmount;
use App\Http\Requests\FreeAmountRequest;



class FeeCategoryAmountController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    /**
     * 
     * 
     * Return list view
     */

    public function fee_category_amount_list($p = null)
    {
        $data['page_title'] = 'Fee Category Amount Listing';
        $data['page_description'] = $p == null ? 'List of all active fee categories Amount' : 'List of all deleted fee categories Amount';
        $data['trashed'] = $p != null ? true : false;
        // $data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
         

        return view('pages.fee.fee_category_amount.list',$data);
    }


    /**
     * 
     * 
     * Return create page
     */

    public function create_fee_amount_category(){

        $data['fee_categories'] = FeeCategory::all();
    	$data['classes'] = Classes::all();
    	return view('pages.fee.fee_category_amount.create',$data);
    }


    /**
     * 
     * 
     * Save Free Amount
     */

    public function save_fee_amount(Request $request)
    {
        // dd($request->all());    
        // $validatedData = $request->validate([
        //     'fee_category' => 'required',
        //     'class_id[]' => 'required',
        //     'amount[]' => 'required',
            
        // ]);
        
        $countClass = count($request->class_id);
    	if ($countClass !=NULL) {
    		for ($i=0; $i <$countClass ; $i++) { 
    			$fee_amount = new FeeCategoryAmount();
    			$fee_amount->fee_category_id = $request->fee_category;
    			$fee_amount->class_id = $request->class_id[$i];
    			$fee_amount->amount = $request->amount[$i];
    			$fee_amount->save();

    		} // End For Loop
    	}// End If Condition


        return redirect()->back()->with('success', 'Fee Amount Inserted successfully.');

    }

    /**
     * 
     * 
     * Edit fee amount
     */
    public function edit_fee_amount($fee_category_id){
    	$data['editData'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
    	// dd($data['editData']->toArray());
    	$data['fee_categories'] = FeeCategory::all();
    	$data['classes'] = Classes::all();
    	return view('pages.fee.fee_category_amount.edit',$data);

    }

    public function update_fee_category_amount(Request $request, $fee_category_id)
    {

        if($request->class_id == NULL)
        {
            return redirect()->back()->with('error', 'Sorry You do not select any class amount.');
        }else{
            
            $countClass = count($request->class_id);

	        FeeCategoryAmount::where('fee_category_id',$fee_category_id)->delete(); 

    		for ($i=0; $i <$countClass ; $i++) { 
    			$fee_amount = new FeeCategoryAmount();
    			$fee_amount->fee_category_id = $request->fee_category;
    			$fee_amount->class_id = $request->class_id[$i];
    			$fee_amount->amount = $request->amount[$i];
    			$fee_amount->save();

    		} // End For Loop
        }

        return redirect()->back()->with('success', 'Fee Amount Updated successfully.');

    }

    public function detail_fee_amount($fee_category_id)
    {
    	$data['detailsData'] = FeeCategoryAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();

    	return view('pages.fee.fee_category_amount.detail_fee_amount',$data);

    }
   
}
