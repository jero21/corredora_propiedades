<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::updateOrCreate([
	  	"name" => "Jeremias",
	  	"email" => "jeremias.mora@ufrontera.cl",
	  	"password" => bcrypt("secret"),
	  	"id_empresa" => 1,
	  	"confirmed" => true
	  ]);
  }
}
