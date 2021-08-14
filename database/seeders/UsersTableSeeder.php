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
            'name' => 'admin',
            'is_employee' => 'admin',
            'usertype'  => 'admin',
            'email' => 'trellis@gmail.com',
            'password' => Hash::make('admin123'),
            'gender' => '1',
            'dob' => null,
            'pob' => null,
            'title' => null,
            'is_muslim' => 'muslim',
            'nationality' => 1,
            'image' => 'no image',
            'status' => 1,
            'current_address' => 'Mohalla Janam kheil, Kokarai Swat',
            'contact_no' => '03420909974',
            'guardian_id' => null,
        ]);
    }
}
