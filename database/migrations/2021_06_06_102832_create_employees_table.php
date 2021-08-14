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
            $table->string('emp_title')->nullable();
            $table->string('emp_name')->nullable();
            $table->string('emp_fname')->nullable();
            $table->string('emp_address')->nullable();
            $table->string('emp_contact')->nullable();
            $table->date('emp_dob')->nullable();
            $table->string('emp_email', 255)->unique();
            $table->string('emp_permanent_address')->nullable();
            $table->string('is_married')->nullable();
            $table->string('emp_nationality')->nullable();
            $table->string('emp_gender')->nullable();
            $table->string('is_employee')->nullable();
            $table->string('emp_religion')->nullable();
            $table->string('reason_of_resign')->default(null)->nullable();
            $table->string('reason_of_terminate')->default(null)->nullable();
            $table->boolean('emp_status')->default(1);
            $table->boolean('reject_status')->default(1)->nullable();
            $table->string('emp_experience')->nullable();
            $table->string('emp_profile_image')->nullable();
            $table->string('emp_file_attachment')->nullable();
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
