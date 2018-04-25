<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
		$this->call(EmpresaSeeder::class);
    $this->call(PropiedadSeeder::class);
    $this->call(UsuarioSeeder::class);
    $this->call(ClienteSeederTable::class);
		$this->call(ReservaVisitaSeederTable::class);
  }
}
