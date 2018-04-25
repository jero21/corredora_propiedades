<?php

use Illuminate\Database\Seeder;
use App\Models\ReservaVisita;
use Carbon\Carbon;

class ReservaVisitaSeederTable extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    ReservaVisita::updateOrCreate([
    	"fecha" => Carbon::now()->addDays(30),
    	"id_propiedad" => 1,
    	"id_cliente" => 1,
    ]);
    ReservaVisita::updateOrCreate([
      "fecha" => Carbon::now()->addDays(7),
      "id_propiedad" => 2,
      "id_cliente" => 1,
    ]);

    ReservaVisita::updateOrCreate([
    	"fecha" => Carbon::now()->addDays(1),
    	"id_propiedad" => 1,
    	"id_cliente" => 2,
    ]);
  }
}
