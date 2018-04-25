<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('empresa', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nombre')->index();
      $table->string('email')->unique()->index();
      $table->string('telefono');
      $table->string('sitio_web');
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
      Schema::dropIfExists('empresa');
  }
}
