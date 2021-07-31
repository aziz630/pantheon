<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use App\Services\DashboardService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private $dashboardService = null;

    public function __construct()
    {
        $this->dashboardService = new DashboardService();
    }

    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        // $total_employee = $this->dashboardService->count_all_employee();
        if(Auth::user()->hasRole('admin')){
            return view('pages.dashboard', compact('page_title', 'page_description'));
        }elseif(Auth::user()->hasRole('employee')){
            return view('pages.empdashboard', compact('page_title', 'page_description'));

        }
        // if(Auth::user()->hasRole('admin')) {
        //     return redirect('/dashboard');
        // }
        
    }
}
