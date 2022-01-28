<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bat_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bat_id');
            $table->string('kode');
            $table->integer('qty');
            $table->string('note');
            $table->integer('price')->nullable();
            $table->integer('amount')->nullable();
            $table->timestamps();

            $table->foreign('bat_id')->references('id')->on('bats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bat_items');
    }
}
