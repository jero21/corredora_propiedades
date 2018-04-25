<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdClienteToReservaVisitaTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('reserva_visita', function (Blueprint $table) {
      $table->integer('id_cliente')->undigned();
      $table->foreign('id_cliente')->references('id')->on('cliente')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('reserva_visita', function (Blueprint $table) {
      $table->dropColumn(['id_cliente']);
    });
  }
}
