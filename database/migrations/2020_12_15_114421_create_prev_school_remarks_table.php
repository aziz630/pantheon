<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrevSchoolRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prev_school_remarks', function (Blueprint $table) {
            $table->id();
            $table->string('prevSchRem_slc');
            $table->string('prevSchRem_c_c');
            $table->string('prevSchRem_s_c');
            $table->string('prevSchRem_last_exam_report');
            $table->string('prevSchRem_remarks');
            $table->foreignId('prev_school_id');
            $table->foreignId('student_id');
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
        Schema::dropIfExists('prev_school_remarks');
    }
}
