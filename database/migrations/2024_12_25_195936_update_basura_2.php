<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBasura2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('basuras', function (Blueprint $table) {
            $table->integer('residuos_papel')->default(0);
            $table->integer('residuos_goma')->default(0);
            $table->integer('residuos_vidrio')->default(0);
            $table->integer('residuos_ceramica')->default(0);
            $table->integer('residuos_cigarrillos')->default(0);
            $table->integer('desechos_sanitarios')->default(0);
            $table->integer('residuos_ropa')->default(0);
            $table->integer('residuos_madera')->default(0);
            $table->integer('residuos_metal')->default(0);
            $table->integer('residuos_otros')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
