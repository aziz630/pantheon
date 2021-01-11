<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('std_name', 20);
            $table->tinyInteger('std_gender');
            $table->date('std_dob');
            $table->string('std_pob', 100);
            $table->boolean('std_religion');
            $table->string('std_nationality', 80)->default('Pakistani');
            $table->string('std_current_address');
            $table->string('std_permanent_address');
            $table->string('std_email', 50);
            $table->string('std_mobile_no', 15);
            $table->string('std_emergency_contact_no', 15);
            $table->date('std_admission_date');
            $table->date('std_registeration_no');
            $table->string('std_father_name', 20);
            $table->string('std_father_cnic', 35);
            $table->string('std_father_occupation', 20);
            $table->string('std_mother_name', 20);
            $table->string('std_mother_cnic', 35);
            $table->string('std_mother_occupation', 20);
            $table->foreignId('guardian_id');
            $table->string('std_image');
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
        Schema::dropIfExists('students');
    }
}
