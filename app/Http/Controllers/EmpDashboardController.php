<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\EmpDashboardService;

class EmpDashboardController extends Controller
{
    private $emp_dashboardService = null;

    public function __construct()
    {
        $this->emp_dashboardService = new EmpDashboardService();
    }


    public function index()
    {
        $page_title = 'Employee Dashboard';
        $page_description = 'Some description for the page';

        $total_employee = $this->emp_dashboardService->count_all_employee();
        
        // if(Auth::user()->hasRole('employee')){
            $user = Auth::user();
            dd($user->email);
            return view('pages.empdashboard', compact('page_title', 'page_description', 'total_employee','user'));
        // }
    
        
    }
}
