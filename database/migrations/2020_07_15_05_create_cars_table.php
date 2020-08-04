<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('registration');//plate number
            $table->string('chassis');
            $table->integer('year');
            $table->integer('capacity');
            $table->boolean('isAutomatic')->default(false);
            $table->text('equipment');
            $table->longText('flaw');//if there is some problems in the car//like paint or rust//change later to longtext
            $table->integer('mileage');
            $table->boolean('isAvailable')->default(true);
            $table->integer('model_id')->unsigned();//not brand
            $table->foreign('model_id')->references('id')->on('models');
            $table->integer('fuel_id')->unsigned();
            $table->foreign('fuel_id')->references('id')->on('fuels');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types');
            $table->integer('color_id')->unsigned();
            $table->foreign('color_id')->references('id')->on('colors');
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
        Schema::dropIfExists('cars');
    }
}
