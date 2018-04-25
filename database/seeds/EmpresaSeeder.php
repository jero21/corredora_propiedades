<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa;
class EmpresaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Empresa::updateOrCreate([
    	"nombre" => "Empresa 1",
    	"email" => "empresa1@gmail.com",
    	"telefono" => "+569 86497445",
    	"sitio_web" => "www.empresa1.cl",
    ]);

    Empresa::updateOrCreate([
    	"nombre" => "Super Corredora",
    	"email" => "contacto@supercorredora.com",
    	"telefono" => "+569 86497445",
    	"sitio_web" => "www.supercorredora.cl",
    ]);
  }
}
