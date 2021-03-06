<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'employee_id' => 1,
        'is_employee' => 'admin',
        'email' => 'trellis@gmail.com',
        'email_verified_at' => null,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => null,
        'gender' => '1',
        'dob' => '',
        'pob' => '',
        'title' => null,
        'religion' => 1,
        'status' => 1,
        'nationality' => 1,
        'profile_image' => 'no image',
        // 'reason_of_resign' => '',
        'attended_other_school' => 0,
        'address' => 'Mohalla Janam kheil, Kokarai Swat',
        'phone' => '03420909974',
        'emergency_contact' => '03419526970',
        'is_student' => 0,
        'guardian_id' => null,
        'is_faculty_member' => 1,
    ];
});
