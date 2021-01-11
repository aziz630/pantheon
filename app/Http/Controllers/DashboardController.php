<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DashboardService;
use App\Models\Classes;

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

        $total_students = $this->dashboardService->count_all_students();

        return view('pages.dashboard', compact('page_title', 'page_description', 'total_students'));
    }
}
