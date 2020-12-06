<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_info', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('phone', 20);
            $table->string('address');
            $table->string('web_address');
            $table->string('email', 100);
            $table->string('logo');
            $table->foreignId('owner_id');
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
        Schema::dropIfExists('school_info');
    }
}
