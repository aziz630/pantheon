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

$factory->define(adacemics::class, function (Faker $faker) {
    return [
        'employ_id' => 1,
        'matric_pass_year' => 2020,
        'matric_subj' => 'english',
        'matric_schl' => 'city',
        'matric_per' => 80,
        'secondary_pass_year' => 2020,
        'secondary_subj' => 'english',
        'secondary_schl' => 'city',
        'secondary_per' => 80,
        'graduate_pass_year' => 2020,
        'graduate_subj' => 'english',
        'graduate_schl' => 'city',
        'graduate_per' => 80,
        'post_graduate_pass_year' => 2020,
        'post_graduate_subj' => '2020english',
        'post_graduate_schl' => 'english','city',
        'post_graduate_per');'city',80,
        'any_other_pass_year' => 2020,
        'any_other_subj' => 'english',
        'any_other_schl' => 'city',
        'any_other_per' => 80,
    ];
});
