<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardService
{
    public function count_all_students()
    {
        $students = 0;

        if ($data = User::where('is_student', 1)->get()) {
            $students = count($data);
        }

        return $students;
    }

    public function count_all_active_students()
    {
        $students = 0;

        if ($data = User::where('is_student', 1)->get()) {
            $students = count($data);
        }

        return $students;
    }

    public function count_all_withdraw_students()
    {
        $students = 0;

        if ($data = User::where('is_student', 1)->get()) {
            $students = count($data);
        }

        return $students;
    }
}
