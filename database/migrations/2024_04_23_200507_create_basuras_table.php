<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basuras', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_hora');
            $table->string('largo_perfil');
            $table->string('responsable_medicion');
            $table->foreignId('localidad')->constrained('locations')->onDeleteCascade(); // Assuming there is a 'localidades' table
            $table->string('sitio_perfil');
            $table->boolean('coincide_perfil')->default(false);
            $table->time('hora_bajamar');
            $table->string('distancia_pleamar_mojon');
            $table->string('distancia_agua_pleamar');
            $table->integer('personas_sector1');
            $table->integer('personas_sector2');
            $table->integer('cestos_area_medicion');
            $table->integer('cestos_derecha_izquierda');
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
        Schema::dropIfExists('basuras');
    }
}
