<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('grd_name');
            $table->string('grd_cninc_no', 30);
            $table->string('grd_cnic_copy');
            $table->string('grd_mobile', 20);
            $table->string('grd_home_ph', 20);
            $table->string('grd_email', 50);
            $table->string('grd_address');
            $table->string('grd_occupation', 50);
            $table->string('account_balance', 50);
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
        Schema::dropIfExists('guardians');
    }
}
