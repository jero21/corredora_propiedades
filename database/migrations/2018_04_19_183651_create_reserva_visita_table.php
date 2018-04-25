<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaVisitaTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('reserva_visita', function (Blueprint $table) {
      $table->increments('id');
      $table->date('fecha');
      $table->text('comentario')->nullable();
      $table->boolean('estado')->default(true);
      $table->integer('id_propiedad')->unsigned();
      $table->foreign('id_propiedad')->references('id')->on('propiedad');
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
    Schema::dropIfExists('reserva_visita');
  }
}
