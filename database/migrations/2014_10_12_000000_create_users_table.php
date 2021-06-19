<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            // $table->integer('role_id');
            // $table->string('lname')->default(null);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender');
            $table->date('dob')->nullable();
            $table->string('pob')->default(null)->nullable();
            $table->string('is_muslim')->default('0');
            $table->string('nationality');
            $table->boolean('attended_other_school')->default(0);
            $table->string('address')->default(null);
            $table->string('phone')->default(null);
            $table->string('emergency_contact')->default(null);
            $table->boolean('is_student')->default(1);
            $table->foreignId('guardian_id')->default(null)->nullable();
            $table->boolean('is_faculty_member')->default(0);
            $table->softDeletesTz('deleted_at', 0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
