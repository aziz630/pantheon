<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\EmployRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Services\EmployeService;
use App\Services\AcademicService;
use Yajra\DataTables\Facades\DataTables;


class EmployController extends Controller
{


    protected $employee_service = null;
    protected $academic_service = null;

    public function __construct()
    {
        $this->employee_service = new EmployeService();
        $this->academic_service = new AcademicService();
    }


    /**
     * 
     * List of all employee  
     *  
     */


    public function employee_list($p = null)
    {
        $page_title = 'Employee Listing';
        $page_description = $p == null ? 'List of all active employee' : 'List of all deleted employee';
        $trashed = $p != null ? true : false;

        return view('pages.employ.list', compact('page_title', 'page_description', 'trashed'));
    }

     /**
     * 
     * List of all Domestic employee  
     *  
     */


    public function domestic_employee_list($p = null)
    {
        $page_title = 'Employee Listing';
        $page_description = $p == null ? 'List of all domestic employee' : 'List of all deleted employee';
        $trashed = $p != null ? true : false;

        return view('pages.employ.list', compact('page_title', 'page_description', 'trashed'));
    }



    public function hire_new_employ()
    {

    return view('pages.employ.create');
    }
   

    public function save_new_employee(Request $RQ)
    {

        $resp = $this->employee_service->save_employee($RQ);
        if ($resp) {
            return redirect(url('hire_employ'))->with('success', 'Employee enrolled successfully.');
        } else {
            return redirect()->back()->with('error', 'Employee can not be enrolled at this time,');
        }
    }


    /**
     * 
     * Read all employee info  
     *  
     */

    public function read_all_employee(Request $RQ)
    {
        $employee = $this->employee_service->get_all_employee();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($employee)->addIndexColumn()
                ->addColumn('title', function ($row) {
                    $empTitle = $row->emp_title;
                    return $empTitle;
                })->addColumn('fullName', function ($row) {
                    $empName = $row->emp_name;
                    return $empName;
                })->addColumn('fName', function ($row) {
                    $empFname = $row->emp_fname;
                    return $empFname;
                })->addColumn('empContact', function ($row) {
                    $empcontact = $row->emp_contact;
                    return $empcontact;
                })->addColumn('empEmail', function ($row) {
                    $empemail = $row->emp_email;
                    return $empemail;
                })->addColumn('more', function ($row) {
                    $detail = '<a href="' . url('single_emp/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon btn-outline-primary" title="Edit details">View</a>';
                    return $detail;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('edit_employ/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon btn" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('employee_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['action', 'more'])->make(true);
        }
    }



    /**
     * 
     * Read all Domestic employee info  
     *  
     */


    public function read_all_domestic_employee(Request $RQ)
    {
        $domEmployee = $this->employee_service->get_all_domestic_employee();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($domEmployee)->addIndexColumn()
                ->addColumn('title', function ($row) {
                    $empTitle = $row->emp_title;
                    return $empTitle;
                })->addColumn('fullName', function ($row) {
                    $empName = $row->emp_name;
                    return $empName;
                })->addColumn('fName', function ($row) {
                    $empFname = $row->emp_fname;
                    return $empFname;
                })->addColumn('empContact', function ($row) {
                    $empcontact = $row->emp_contact;
                    return $empcontact;
                })->addColumn('empEmail', function ($row) {
                    $empemail = $row->emp_email;
                    return $empemail;
                })->addColumn('more', function ($row) {
                    $actBtn = '<a href="' . url('single_emp/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon btn-icon btn-outline-primary" title="Edit details"><i class="la la-edit"></i></a>';        
                    return $actBtn;
                })->addColumn('action', function ($row) {
                    $actBtn = '<a href="' . url('edit_employ/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                    $actBtn .= '<a href="' . url('employee_delete/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['action','more'])->make(true);
        }
    }

    /**
     * 
     * Read all Trashed employee info  
     *  
     */

    public function read_all_trashed_employee(Request $RQ)
    {
        $trashEmployee = $this->employee_service->get_all_trashed_employee();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($trashEmployee)->addIndexColumn()
                ->addColumn('title', function ($row) {
                    $empTitle = $row->emp_title;
                    return $empTitle;
                })->addColumn('fullName', function ($row) {
                    $empName = $row->emp_name;
                    return $empName;
                })->addColumn('fName', function ($row) {
                    $empFname = $row->emp_fname;
                    return $empFname;
                })->addColumn('empContact', function ($row) {
                    $empcontact = $row->emp_contact;
                    return $empcontact;
                })->addColumn('empEmail', function ($row) {
                    $empemail = $row->emp_email;
                    return $empemail;
                })->addColumn('more', function ($row) {
                    $actBtn = '<a href="' . url('single_emp/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon btn-icon btn-outline-primary" title="Edit details"><i class="la la-edit"></i></a>';        
                    return $actBtn;
                })->addColumn('action', function ($row) {
                    $actBtn .= '<a href="' . url('employee_restore/' . $row->id) . '" class="btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                    return $actBtn;
                })->rawColumns(['action','more'])->make(true);
        }
    }



    public function get_single_employee_detail(Request $RQ, $id)
    {

        $employee = $this->employee_service->get_single_employee($id);
        $academic = $this->academic_service->edit_employee_academic_detail($id);
        return view('pages.employ.detail_page', compact('employee', 'academic'));
    }


     /**
     * 
     * Read a specifc employee info and return 
     * a form view to edit a section 
     */

    public function edit_employee_record(Request $RQ, $id)
    {
        $page_title = 'Edit Employee';

        $page_description = 'Use this form to edit/update employee';

        $employee = $this->employee_service->edit_employee($id);
        $academic = $this->academic_service->edit_employee_academic_detail($id);

        return view('pages.employ.edit', compact('page_title','page_description','employee', 'academic'));
    }




     /**
     * 
     * 
     * Update session
     */

    public function update_employee_record(Request $RQ)
    {
        $res = $this->employee_service->update_employee($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Employee updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Employee can not be updated at this time.');
        }
    }



    public function delete_employee(Request $rq, $id)
    {
        $res = $this->employee_service->delete_employee($id);
        if ($res) {
            return redirect()->back()->with('success', 'employee deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'employee can not be deleted at this time.');
        }
    }



    public function restore_employee(Request $RQ, $id)
    {
        $res = $this->employee_service->restore_employee($id);
        if ($res) {
            return redirect()->back()->with('success', 'Employee restored successfully.');
        } else {
            return redirect()->back()->with('error', 'Employee can not be restored at this time.');
        }
    }
}