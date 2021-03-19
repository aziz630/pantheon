<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyAccountTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_account_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guardian_id');
            $table->timestamp('transaction_date', $precision = 0);
            $table->string('description')->nullable();
            $table->string('debit_amount');
            $table->string('credit_amount');
            $table->string('balance');
            $table->boolean('is_notified');
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
        Schema::dropIfExists('family_account_transactions');
    }
}
