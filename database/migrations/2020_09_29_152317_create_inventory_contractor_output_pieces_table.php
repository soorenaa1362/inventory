<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryContractorOutputPiecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_contractor_output_pieces', function (Blueprint $table) {
            $table->id();
            $table->string('fk_contractorContract');
            $table->timestamp('date_output_piece');
            $table->integer('weight');
            $table->integer('number');
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
        Schema::dropIfExists('inventory_contractor_output_pieces');
    }
}
