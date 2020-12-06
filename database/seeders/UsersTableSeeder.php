<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'erp_no' => 'RSM_1',
            'fname' => 'Jawad',
            'lname' => 'khan',
            'email' => 'jawadk116@gmail.com',
            'email_verified_at' => null,
            'password' => Hash::make('admin123'),
            'remember_token' => null,
            'gender' => '1',
            'dob' => null,
            'pob' => null,
            'is_muslim' => 1,
            'nationality' => 1,
            'attended_other_school' => 0,
            'address' => 'Mohalla Janam kheil, Kokarai Swat',
            'phone' => '03420909974',
            'emergency_contact' => '03419526970',
            'is_student' => 0,
            'guardian_id' => null,
            'is_faculty_member' => 1
        ]);
    }
}
