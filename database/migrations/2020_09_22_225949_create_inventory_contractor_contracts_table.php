<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryContractorContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_contractor_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('fk_allocateContractor');
            $table->timestamp('start_date');
            $table->integer('unit_fee');
            $table->integer('raw_material')->nullable();
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
        Schema::dropIfExists('inventory_contractor_contracts');
    }
}
