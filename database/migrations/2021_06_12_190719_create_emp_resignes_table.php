<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpResignesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_resignes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employ_id');
            $table->string('emp_name');
            $table->boolean('emp_staus');
            $table->string('emp_resign_reason');
            $table->date('emp_start_date');    
            $table->date('emp_end_date');    
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
        Schema::dropIfExists('emp_resignes');
    }
}
