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
            $table->string('id_no')->nullable();
            $table->string('usertype')->nullable()->comment('Student,Employee,Admin');
            $table->string('std_name', 20)->nullable();
            $table->string('std_gender')->nullable();
            $table->date('std_dob')->nullable();
            $table->string('std_pob', 100)->nullable();
            $table->string('std_religion')->nullable();
            $table->string('std_nationality', 80)->default('Pakistani')->nullable();
            $table->string('std_current_address')->nullable();
            $table->string('std_permanent_address')->nullable();
            $table->string('std_email', 225)->nullable();
            // $table->string('std_mobile_no', 15);
            $table->string('std_emergency_contact_no', 15)->nullable();
            $table->date('std_admission_date')->nullable();
            // $table->date('std_registeration_no');
            $table->string('std_father_name', 20)->nullable();
            $table->string('std_father_cnic', 35)->nullable();
            $table->string('std_father_occupation', 20)->nullable();
            $table->string('std_mother_name', 20)->nullable();
            $table->string('std_mother_cnic', 35)->nullable();
            $table->string('std_mother_occupation', 20)->nullable();
            $table->string('reason_of_withdrawal')->default(null)->nullable();
            $table->foreignId('guardian_id')->nullable();
            $table->string('std_image')->nullable();
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
        Schema::dropIfExists('students');
    }
}
