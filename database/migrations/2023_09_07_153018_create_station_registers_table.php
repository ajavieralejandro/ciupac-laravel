<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_registers', function (Blueprint $table) {
            $table->id();
            $table->string('mac');
            $table->string('name');
            $table->float('temperature',3,1);
            $table->float('feels_like',3,1);
            $table->float('humidity',3,1);
            $table->float('wind',3,1);
            $table->string('wind_gust');
            $table->string('dew_point');
            $table->string('wind_direction');
            $table->string('pressure_relative');
            $table->string('pressure_absolute');
            $table->string('uvi');



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
        Schema::dropIfExists('station_registers');
    }
}
