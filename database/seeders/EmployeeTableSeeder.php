<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'emp_title' => 'employee',
            'emp_name' => 'Jawad',
            'emp_fname' => 'MJawad',
            'emp_address' => 'mingora Swat',
            'emp_contact' => '03420909974',
            'emp_dob' => null,
            'emp_email' => 'aziz@gmail.com',
            'emp_permanent_address' => 'mingora Swat',
            'is_married' => 'single',
            'emp_nationality' => 'pakistani',
            'emp_gender' => 'male',
            'is_employee' => 'employee',
            'emp_religion' => 'islam',
            'reason_of_resign' => null,
            'emp_status' => 1,
            'emp_experience' => '2 Yeaes',
            'emp_profile_image' => 'no image',
            'emp_file_attachment' => 'no files',
            'resig_file' => null,
        ]);
    }
}
