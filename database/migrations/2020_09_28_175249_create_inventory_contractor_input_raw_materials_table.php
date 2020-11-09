<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryContractorInputRawMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_contractor_input_raw_materials', function (Blueprint $table) {
            $table->id();
            $table->string('fk_contractorContract');
            $table->timestamp('date_input_raw_material');
            $table->integer('weight');
            $table->string('fk_rawMaterial');
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
        Schema::dropIfExists('inventory_contractor_input_raw_materials');
    }
}
