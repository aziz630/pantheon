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
            $table->string('ERP_number', 100);
            $table->string('emp_name', 50);
            $table->string('emp_fname', 50);
            $table->string('emp_address', 100);
            $table->string('emp_contact', 15);
            $table->date('emp_dob');
            $table->string('emp_email', 15);
            $table->string('emp_permanent_address', 100);
            $table->string('is_married');
            $table->string('emp_nationality');
            $table->string('emp_gender');
            $table->string('is_employee');
            $table->string('emp_religion');
            $table->string('emp_experience');
            $table->string('emp_image');
            $table->string('emp_file');
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
