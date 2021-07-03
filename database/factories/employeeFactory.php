<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'emp_title' => 'employee',
        'emp_name' => 'Jawad',
        'emp_fname' => 'MJawad',
        'emp_address' => 'mingora Swat',
        'emp_contact' => '03420909974',
        'emp_dob' => '',
        'emp_email' => 'employee123@gmail.com',
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
    ];
});
