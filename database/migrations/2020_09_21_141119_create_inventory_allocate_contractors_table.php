<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryAllocateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_allocate_contractors', function (Blueprint $table) {
            $table->id();
            $table->string('fk_contract');
            $table->string('fk_stage');
            $table->string('fk_repository');
            $table->string('fk_contractor');
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
        Schema::dropIfExists('inventory_allocate_contractors');
    }
}
