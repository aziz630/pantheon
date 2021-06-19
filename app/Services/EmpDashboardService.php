<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmpDashboardService
{
    public function count_all_employee()
    {
        $students = 0;

        if ($data = Employee::all()) {
            $students = count($data);
        }

        return $students;
    }

    public function count_all_active_employee()
    {
        $students = 0;

        if ($data = User::where('is_employee', 1)->get()) {
            $students = count($data);
        }

        return $students;
    }

    // public function count_all_withdraw_students()
    // {
    //     $students = 0;

    //     if ($data = User::where('is_student', 1)->get()) {
    //         $students = count($data);
    //     }

    //     return $students;
    // }
}
