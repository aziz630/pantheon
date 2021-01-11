<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeStructureAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_structure_amounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_structure_id');
            $table->foreignId('fee_category_id');
            $table->string('fee_amount');
            $table->boolean('no_repeat')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee_structure_amounts');
    }
}
