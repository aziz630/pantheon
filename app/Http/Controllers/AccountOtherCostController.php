<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountOtherCost;



class AccountOtherCostController extends Controller
{
    public function Account_Other_Cost_view()
    {
        $data['allData'] = AccountOtherCost::orderBy('id', 'desc')->get();

        return view('pages.account.other_cost.other_cost_view',$data);
    }


    public function Add_Other_Cost()
    {
        return view('pages.account.other_cost.other_cost_add');
    }


    public function Save_other_Cost(Request $request)
    {
        $cost = new AccountOtherCost();
    	$cost->date = date('Y-m-d', strtotime($request->date));
    	$cost->amount = $request->amount;

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/cost_images'),$filename);
    		$cost['image'] = $filename;
    	}
    	$cost->description = $request->description;
    	$cost->save();

    	
    	return redirect(url('other_cost_view'))->with('success', 'Other cost submitted successfully');

    }

    public function Edit_Other_Cost($id)
    {
        $data['editData'] = AccountOtherCost::find($id);

        return view('pages.account.other_cost.other_cost_edit', $data);
        
    }

    public function Update_Other_Cost(Request $request, $id)
    {
        $cost = AccountOtherCost::find($id);
    	$cost->date = date('Y-m-d', strtotime($request->date));
    	$cost->amount = $request->amount;

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/cost_images'),$filename);
    		$cost['image'] = $filename;
    	}
    	$cost->description = $request->description;
    	$cost->save();

    	
    	return redirect(url('other_cost_view'))->with('success', 'Data Updated successfully');

    }
}
