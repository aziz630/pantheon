<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_register', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('fee_structure_id');
            $table->string('fee_month');
            $table->timestamp('transaction_date', $precision = 0);
            $table->string('description')->nullable();
            $table->string('discount_amount');
            $table->string('debit_amount');
            $table->string('credit_amount');
            $table->string('amount_payable');
            $table->boolean('is_notified');
            $table->boolean('is_processed')->default(False);
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
        Schema::dropIfExists('fee_register');
    }
}
