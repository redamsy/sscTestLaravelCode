<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentalrates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars');
            $table->integer('rentaltype_id')->unsigned();
            $table->foreign('rentaltype_id')->references('id')->on('rentaltypes');
            $table->integer('rate');
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
        Schema::dropIfExists('rentalrates');
    }
}
