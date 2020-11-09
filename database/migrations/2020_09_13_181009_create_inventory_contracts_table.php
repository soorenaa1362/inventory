<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contract_number');
            $table->string('fk_customer');
            $table->timestamp('date');
            $table->string('total_amount');
            $table->string('prepayment');
            $table->string('fk_piece');
            $table->string('circulation');
            $table->string('fixed_price');
            $table->string('sales_price');
            $table->enum('status', ['current','cleared'])->default('current');
            $table->softDeletes(); 
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
        Schema::dropIfExists('inventory_contracts');
    }
}
