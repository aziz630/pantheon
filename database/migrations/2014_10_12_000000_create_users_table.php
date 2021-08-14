<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('id_no')->nullable();
            $table->string('usertype')->nullable()->comment('Student,Employee,Admin');
            $table->string('name', 20)->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('pob', 100)->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality', 80)->default('Pakistani')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('email', 225)->nullable();
            $table->string('password');
            $table->string('contact_no', 15)->nullable();
            $table->date('admission_date')->nullable();
            $table->string('father_name', 20)->nullable();
            $table->string('father_cnic', 35)->nullable();
            $table->string('father_occupation', 20)->nullable();
            $table->string('mother_name', 20)->nullable();
            $table->string('mother_cnic', 35)->nullable();
            $table->string('mother_occupation', 20)->nullable();
            $table->string('reason_of_withdrawal')->default(null)->nullable();
            $table->string('reason_of_resign')->default(null)->nullable();
            $table->string('reason_of_terminate')->default(null)->nullable();
            $table->string('file_attachment')->nullable();
            $table->string('resig_file')->default(NULL)->nullable();
            $table->foreignId('guardian_id')->nullable();
            $table->string('image')->nullable();
            $table->string('is_muslim')->nullable();
            $table->string('is_employee')->nullable();
            $table->string('married')->nullable();
            $table->date('join_date')->nullable();
            $table->boolean('status')->default(1);
            $table->boolean('emp_status')->default(1);
            $table->boolean('reject_status')->default(1)->nullable();
            $table->double('salary')->nullable();
            $table->string('experience')->nullable();







            $table->string('matric_pass_year')->default(NULL)->nullable();
            $table->string('matric_subj')->default(NULL)->nullable();
            $table->string('matric_schl')->default(NULL)->nullable();
            $table->string('matric_per')->default(NULL)->nullable();
            $table->string('secondary_pass_year')->default(NULL)->nullable();
            $table->string('secondary_subj')->default(NULL)->nullable();
            $table->string('secondary_schl')->default(NULL)->nullable();
            $table->string('secondary_per')->default(NULL)->nullable();
            $table->string('graduate_pass_year')->default(NULL)->nullable();
            $table->string('graduate_subj')->default(NULL)->nullable();
            $table->string('graduate_schl')->default(NULL)->nullable();
            $table->string('graduate_per')->default(NULL)->nullable();
            $table->string('post_graduate_pass_year')->default(NULL)->nullable();
            $table->string('post_graduate_subj')->default(NULL)->nullable();
            $table->string('post_graduate_schl')->default(NULL)->nullable();
            $table->string('post_graduate_per')->default(NULL)->nullable();
            $table->string('any_other_pass_year')->default(NULL)->nullable();
            $table->string('any_other_subj')->default(NULL)->nullable();
            $table->string('any_other_schl')->default(NULL)->nullable();
            $table->string('any_other_per')->default(NULL)->nullable();
            $table->softDeletesTz('deleted_at', 0)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
