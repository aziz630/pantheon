<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DomEmployeService;
use App\Http\Requests\DomEmployRequest;
use Yajra\DataTables\Facades\DataTables;



class DomesticController extends Controller
{
    
    protected $Dom_employee_service = null;

    public function __construct()
    {
        $this->Dom_employee_service = new DomEmployeService();
    }


    // public function Dom_employee_list($p = null)
    // {
    //     $employee = $this->Dom_employee_service->get_all_dom_employee();
    //     $page_title = 'Domestic Employee Listing';
    //     $page_description = $p == null ? 'List of all active employee' : 'List of all deleted employee';
    //     $trashed = $p != null ? true : false;

    //     return view('pages.domestic_employee.list', compact('page_title', 'page_description', 'trashed'));
    // }

    // public function create_domestic_emp(Request $rq)
    // {
    //     $page_title = 'Add Employee';

    //     return view('pages.domestic_employee.create_dom_emp', compact('page_title'));
    // }



    // public function save_dom_employee(Request $RQ)
    // {

    //     $resp = $this->Dom_employee_service->save_domestic_employee($RQ);
    //     if ($resp) {
    //         return redirect(url('students'))->with('success', 'Domestic Employee enrolled successfully.');
    //     } else {
    //         return redirect()->back()->with('error', 'Domestic Employee can not be enrolled at this time,');
    //     }
    // }

    public function read_all_dom_employee(Request $RQ)
    {
        $employee = $this->Dom_employee_service->get_all_dom_employee();
        // dd($employee);

        /***  Check whether the request is ajax or not */
        // if ($RQ->ajax()) {
        //     return DataTables::of($employee)->addIndexColumn()
        //         ->addColumn('title', function ($row) {
        //             $empTitle = $row->dom_emp_title;
        //             return $empTitle;
        //         })->addColumn('fullName', function ($row) {
        //             $empName = $row->dom_emp_name;
        //             return $empName;
        //         })->addColumn('fName', function ($row) {
        //             $empFname = $row->dom_emp_fname;
        //             return $empFname;
        //         })->addColumn('empContact', function ($row) {
        //             $empcontact = $row->dom_emp_contact;
        //             return $empcontact;
        //         })->addColumn('createdAt', function ($row) {
        //             $createdAt = $row->created_at != '' ? $row->created_at : 'Null';
        //             return $createdAt;
        //         })->addColumn('updatedAt', function ($row) {
        //             $updatedAt = $row->updated_at != '' ? $row->updated_at : 'Null';
        //             return $updatedAt;
        //         })->addColumn('action', function ($row) {
        //             $actBtn = '<a href="' . url('class_edit/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
        //             $actBtn .= '<a href="' . url('class_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
        //             return $actBtn;
        //         })->rawColumns(['action'])->make(true);
        // }
    }

    
}
