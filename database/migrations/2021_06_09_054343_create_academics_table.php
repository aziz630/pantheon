<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employ_id');
            $table->string('matric_pass_year');
            $table->string('matric_subj');
            $table->string('matric_schl');
            $table->string('matric_per');
            $table->string('secondary_pass_year');
            $table->string('secondary_subj');
            $table->string('secondary_schl');
            $table->string('secondary_per');
            $table->string('graduate_pass_year');
            $table->string('graduate_subj');
            $table->string('graduate_schl');
            $table->string('graduate_per');
            $table->string('post_graduate_pass_year');
            $table->string('post_graduate_subj');
            $table->string('post_graduate_schl');
            $table->string('post_graduate_per');
            $table->string('any_other_pass_year');
            $table->string('any_other_subj');
            $table->string('any_other_schl');
            $table->string('any_other_per');
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
        Schema::dropIfExists('academics');
    }
}
