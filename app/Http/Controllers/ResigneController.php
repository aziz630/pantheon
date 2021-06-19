<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\EmployRequest;
use App\Services\EmpResignService;
use Yajra\DataTables\Facades\DataTables;

class ResigneController extends Controller
{


    protected $empResign_service = null;

    public function __construct()
    {
        $this->empResign_service = new EmpResignService();
    }

     /**
     * 
     * List of all Resign employee  
     *  
     */

    public function resign_employee_list($p = null)
    {
        $page_title = 'Resign Employee Listing';
        $page_description = $p == null ? 'List of all active resign employee' : 'List of all deleted employee';
        $trashed = $p != null ? true : false;

        return view('pages.employ.resigne_list', compact('page_title', 'page_description', 'trashed'));
    }

    public function resign_employ()
    {
        $page_title = 'Resign Employee';
       
        return view('pages.employ.resigne_emp', compact('page_title'));
    }





    public function read_all_resigne_employee(Request $RQ)
    {
        $employee = $this->empResign_service->get_all_resigne_employee();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($employee)->addIndexColumn()
                ->addColumn('name', function ($row) {
                    $empname = $row->emp_name;
                    return $empname;
                })->addColumn('empStatus', function ($row) {
                    $empStatus = $row->emp_status;
                    return $empStatus;
                })->addColumn('empReason', function ($row) {
                    $empReason = $row->emp_resson;
                    return $empReason;
                })->addColumn('startDate', function ($row) {
                    $empstartDate = $row->emp_start_date;
                    return $empstartDate;
                })->addColumn('endDate', function ($row) {
                    $empEndDate = $row->emp_end_date;
                    return $empEndDate;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('edit_empResigne/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('empResigne_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['action'])->make(true);
        }
    }
}
