<?php

use Illuminate\Database\Seeder;
use App\Models\Propiedad;

class PropiedadSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Propiedad::updateOrCreate([
	  	"nombre" => "Casa en la playa",
	  	"codigo" => "001",
	  	"descripcion" => "Marcela en villarrica",
	  	"id_empresa" => 1,
	  ]);

	  Propiedad::updateOrCreate([
	  	"nombre" => "Departamento",
	  	"codigo" => "002",
	  	"descripcion" => "Salida norte Temuco",
	  	"id_empresa" => 1,
	  ]);

	  Propiedad::updateOrCreate([
	  	"nombre" => "Casa en remate",
	  	"codigo" => "001",
	  	"descripcion" => "Salida norte Temuco",
	  	"id_empresa" => 2,
	  ]);
  }
}
