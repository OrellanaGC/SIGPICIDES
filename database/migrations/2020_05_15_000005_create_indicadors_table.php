<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicador', function (Blueprint $table) {
            $table->id();
            $table->integer('id_proy');
            $table->string('detalle', 1000);
            $table->integer('cant_variables')->nullable();
            $table->boolean('tipo')->nullable()->default(false);
            $table->boolean('modificable')->default(true);
            $table->boolean('finalizado')->default(false);
            $table->string('descrip_avance', 1000)->nullable();
            $table->boolean('tipo_de_grafico')->nullable()->default(true);
            $table->foreign('id_proy')->references('id')->on('proyecto')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('indicador');
    }
}
