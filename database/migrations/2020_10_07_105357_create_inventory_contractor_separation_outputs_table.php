<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryContractorSeparationOutputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_contractor_separation_outputs', function (Blueprint $table) {
            $table->id();
            $table->string('fk_contractorOutputPiece');
            $table->timestamp('date_of_separation');
            $table->integer('healthy_weight');
            $table->integer('healthy_number');
            $table->integer('unhealthy_weight');
            $table->integer('unhealthy_number');
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
        Schema::dropIfExists('inventory_contractor_separation_outputs');
    }
}
