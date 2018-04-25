<?php

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeederTable extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Cliente::updateOrCreate([
    	"nombre" => "Cristofer",
    	"apellido" => "Torres",
    	"telefono" => "+569 86497445",
    ]);
    Cliente::updateOrCreate([
    	"nombre" => "Carlos",
    	"apellido" => "Moll",
    	"telefono" => "+569 86497445",
    ]);
  }
}
