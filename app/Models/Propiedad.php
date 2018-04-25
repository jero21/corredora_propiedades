<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
  protected $table = 'propiedad';
  
  protected $primaryKey = 'id';

  protected $fillable = [
      'nombre', 'codigo', 'descripcion', 'id_empresa',
  ];

  //Relationships

  public function empresa () {
  	return $this->belongsTo(Empresa::class, 'id_empresa');
  }
  public function reservas () {
    return $this->hasMany(ReservaVisita::class, 'id_propiedad');
  }
}
