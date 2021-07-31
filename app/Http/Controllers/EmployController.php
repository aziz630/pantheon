<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Services\EmployeService;
use App\Services\AcademicService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;
// use Mail;
use App\Mail\TestMail;

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
     * List of all Resign Request list  
     *  
     */

    public function resigne_request_list($p = null)
    {
        $page_title = 'Resign Employee Listing';
        $page_description = $p == null ? 'List of all resigne Requests' : 'List of all deleted employee';
        $trashed = $p != null ? true : false;

        return view('pages.employ.resigne_list', compact('page_title', 'page_description', 'trashed'));
    }

     /**
     * 
     * List of all Resigned employies  
     *  
     */

    public function resigned_employee_list($p = null)
    {
        $page_title = 'Resigned Employee Listing';
        $page_description = $p == null ? 'List of all resigned employies' : 'List of all deleted employee';
        $trashed = $p != null ? true : false;

        return view('pages.employ.all_resigne_emp_list', compact('page_title', 'page_description', 'trashed'));
    }


    public function terminate_employee_list($p = null)
    {
        $page_title = 'Terminated Employee Listing';
        $page_description = $p == null ? 'List of all terminated employies' : 'List of all deleted employee';
        $trashed = $p != null ? true : false;

        return view('pages.employ.terminate_employee_list', compact('page_title', 'page_description', 'trashed'));
    }


    public function resign_employ()
    {
        $page_title = 'Resign Employee';
       
        return view('pages.employ.resigne_emp', compact('page_title'));
    }



    public function hire_new_employ()
    {

    return view('pages.employ.create');
    }
   


    public function save_new_employee(StoreEmployeeRequest $RQ)
    {

        $resp = $this->employee_service->save_employee($RQ);
        if ($resp) {
            return redirect(url('employee'))->with('success', 'Employee enrolled successfully.');
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
                    $detail = '<a href="' . url('single_emp/' . $row->id) . '" class="btn btn-primary btn-sm" title="Edit details">View</a>';
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
     * Read all resign Requests info  
     *  
     */


    public function read_all_resigne_requests(Request $RQ)
    {
        $resEmployee = $this->employee_service->get_all_resigne_requests();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($resEmployee)->addIndexColumn()
                ->addColumn('title', function ($row) {
                    $empTitle = $row->emp_title;
                    return $empTitle;
                })->addColumn('fullName', function ($row) {
                    $empName = $row->emp_name;
                    return $empName;
                })->addColumn('action', function ($row) {
                    $detail = '<a href="' . url('resignRequest/' . $row->id) . '" class="btn btn-primary btn-sm" title="Edit details">View</a>';
                    return $detail;
                })->rawColumns(['action'])->make(true);
        }
    }





    /**
     * 
     * Read all resignd employee info  
     *  
     */


    public function read_all_resigned_employee(Request $RQ)
    {
        $resEmployee = $this->employee_service->get_all_resigned_employee();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($resEmployee)->addIndexColumn()
                ->addColumn('title', function ($row) {
                    $empTitle = $row->emp_title;
                    return $empTitle;
                })->addColumn('fullName', function ($row) {
                    $empName = $row->emp_name;
                    return $empName;
                })->addColumn('empEmail', function ($row) {
                    $ERPNO = $row->emp_email;
                    return $ERPNO;
                })->addColumn('status', function ($row) {
                     if ($row->emp_status == 0) return 'resigne';
                    return 'cancle';
                })->rawColumns(['status'])->make(true);
        }
    }



    /**
     * 
     * Read all terminated Requests info  
     *  
     */


    public function read_all_terminated_request(Request $RQ)
    {
        $resEmployee = $this->employee_service->get_all_terminated_employee();

        /***  Check whether the request is ajax or not */
        if ($RQ->ajax()) {
            return DataTables::of($resEmployee)->addIndexColumn()
                ->addColumn('title', function ($row) {
                    $empTitle = $row->emp_title;
                    return $empTitle;
                })->addColumn('fullName', function ($row) {
                    $empName = $row->emp_name;
                    return $empName;
                })->addColumn('empEmail', function ($row) {
                    $empEmail = $row->emp_email;
                    return $empEmail;
                })->addColumn('erpNumber', function ($row) {
                    $ERPNO = $row->ERP_number;
                    return $ERPNO;
                })->addColumn('action', function ($row) {
                    $detail = '<a href="' . url('#' . $row->id) . '" class="btn btn-primary btn-sm" title="Edit details">Back</a>';
                    return $detail;
                })->rawColumns(['action'])->make(true);
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



    /**
     * 
     * Read a single employee info
     * 
     */


    public function get_single_employee_detail(Request $RQ, $id)
    {

        $employee = $this->employee_service->get_single_employee($id);
        $academic = $this->academic_service->edit_employee_academic_detail($id);
        return view('pages.employ.detail_page', compact('employee', 'academic'));
    }

    


     /**
     * 
     * Read a resign employee info
     * 
     */


    public function get_resigne_employee_detail(Request $RQ, $id)
    {

        $employee = $this->employee_service->get_resign_employee($id);

        return view('pages.employ.resign_detail_page', compact('employee'));
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
     * Update reason of resign field
     */

    public function update_resign_employee_record(Request $RQ)
    {


         $validatedData = $RQ->validate([
            'reasonOfResign' => 'required',
            'file' => 'required',
        ]);

        $res = $this->employee_service->update_employee_resign_record($RQ);
        if ($res) {
            return redirect()->back()->with('success', 'Resign Form Submited successfully.');
        } else {
            return redirect()->back()->with('error', 'Resign Form is not Submited  at this time.');
        }
    }


     /**
     * 
     * 
     * Download Resigne Employee File 
     */

    public function download_resign_File(Request $RQ, $resig_file)
    {
        return response()->download(public_path('resigneImages/'.$resig_file));
    }

    public function download_emp_file_attachment(Request $RQ, $emp_file_attachment)
    {
        $headers = ["Content-Type"=>"application/zip"];
        $fileName = "attachement.zip"; // name of zip
        Zipper::make(public_path('attachement/'.$emp_file_attachment. ''.$fileName)) //file path for zip file
            ->add(public_path()."attachement/".$emp_file_attachment.'/')->close(); //files to be zipped

        return response()->download(public_path('attachement/'.$fileName),$fileName, $headers);
    }

    /**
     * 
     * 
     * Terminate Employee 
     */

    public function terminate_employee_record(Request $RQ)
    {
        $res = $this->employee_service->employee_terminate_record($RQ);
        if ($res) {
            return redirect(url('employee'))->with('success', 'Employee Terminated successfully.');
        } else {
            return redirect()->back()->with('error', 'Employee not Terminated at this time.');
        }
    }


     /**
     * 
     * 
     * Employee approve And rejected 
     */

    public function approve(Request $request, $id)
    {
        $approve = Employee::findOrFail($id);
        $approveUser = User::findOrFail($id);
            $approve->emp_status = false;  
            $approveUser->status = false;
            $approve->save();
            $approveUser->save();

            // $employee = Employee::whereEmail($request->emp_email)->first();
            // if(count($employee) == 1)
            // {

                

                Mail::to($approve->emp_email)->send(new TestMail());
                
            return redirect(url('resigneRequest'))->with('success', 'Request Approved successfully And send Email.');
        
        // }
    }
   
    
     public function reject($id)
    {
        $reject = Employee::findOrFail($id);
        $reject->reject_status = false; 
        $reject->save();

        $data = array('name'=>"Aziz");
   
        Mail::send(['text'=>'pages.emails.testMail'], $data, function($message) {
           $message->to('eng.azizkhan11@gmail.com', 'Pantheon')->subject
              ('Your Resignation has been Rejected by the Head. kindly contact Us');
           $message->from('eng.azizkhan11@gmail.com','Pantheon');
        });

        return redirect(url('resigneRequest'))->with('error', 'Employee Request Rejected.');
        
    }

 /**
     * 
     * 
     * Update resign employee record
     */

    public function update_employee_record(UpdateEmployeeRequest $RQ)
    {

        $RQ->validate([
           
            "emp_email" => "required|email|unique:employees,emp_email,".$RQ->eId,
  
        ]);

        $res = $this->employee_service->update_employee($RQ);
        if ($res) {
            return redirect(url('employee'))->with('success', 'Employee updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Employee can not be updated at this time.');
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