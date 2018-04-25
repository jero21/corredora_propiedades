<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservaVisita extends Model
{
  protected $table = 'reserva_visita';
  
  protected $primaryKey = 'id';

  protected $fillable = [
      'fecha', 'estado', 'comentario', 'id_cliente', 'id_propiedad',
  ];

  // Relationships

  public function propiedad() {
  	return $this->belongsTo(Propiedad::class, 'id_propiedad');
  }

  public function cliente() {
  	return $this->belongsTo(Cliente::class, 'id_cliente');
  }
}
