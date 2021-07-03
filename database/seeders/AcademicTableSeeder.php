<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AcademicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academics')->insert([
            'employ_id' => 1,
            'matric_pass_year'    => 2020,
            'matric_subj'         => 'english',
            'matric_schl'         => 'city',
            'matric_per'          => 80,
            'secondary_pass_year' => 2020,
            'secondary_subj'      => 'english',
            'secondary_schl'      => 'city',
            'secondary_per'       => 80,
            'graduate_pass_year'  => 2020,
            'graduate_subj'       => 'english',
            'graduate_schl'       => 'city',
            'graduate_per'        => 80,
            'post_graduate_pass_year' => 2020,
            'post_graduate_subj'  => 'english',
            'post_graduate_schl'  => 'english',
            'post_graduate_per'   => 80,
            'any_other_pass_year' => 2020,
            'any_other_subj'      => 'english',
            'any_other_schl'      => 'city',
            'any_other_per'       => 80,
        ]);
    }
}
