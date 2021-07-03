<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_title', 100);
            $table->string('emp_name', 100);
            $table->string('emp_fname', 100);
            $table->string('emp_address', 100);
            $table->string('emp_contact', 100);
            $table->date('emp_dob')->nullable();
            $table->string('emp_email', 255)->unique();
            $table->string('emp_permanent_address', 255);
            $table->string('is_married');
            $table->string('emp_nationality');
            $table->string('emp_gender');
            $table->string('is_employee');
            $table->string('emp_religion');
            $table->string('reason_of_resign')->default(null)->nullable();
            $table->string('reason_of_terminate')->default(null)->nullable();
            $table->boolean('emp_status')->default(1);
            $table->boolean('reject_status')->default(1);
            $table->string('emp_experience');
            $table->string('emp_profile_image');
            $table->string('emp_file_attachment');
            $table->string('resig_file')->default(NULL)->nullable();
            $table->softDeletesTz('deleted_at', 0);
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
        Schema::dropIfExists('employees');
    }
}
