<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;

class UserService {
    public function get_all_faculty_members()
    {
        $faculty_members = false;
		
		if($data = User::where('is_faculty_member', 1)->get()) {
			$faculty_members = $data;
		}
		
		return $faculty_members;
    }
	
	public function get_all_students()
    {
        $students = false;
		
		if($data = User::where('is_student', 1)->get()) {
			$students = $data;
		}
		
		return $students;
    }
}
