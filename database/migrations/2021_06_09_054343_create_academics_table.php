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
