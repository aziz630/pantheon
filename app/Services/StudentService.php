<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;

class StudentService
{
    public function get_all_students()
    {
        $students = false;

        if ($data = User::where('is_student', 0)->get()) {
            $students = $data;
        }

        return $students;
    }
}
