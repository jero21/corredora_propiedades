<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservaVisita;
use App\Utils\Reservas\TransformReservas;
use DB;

class ReservaVisitaController extends Controller
{

  protected $reservasTransformer;

  public function __construct(TransformReservas $reservasTransformer) {
    $this->reservasTransformer = $reservasTransformer;
  }
    

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(AuthenticateController $auth)
  {
    return ReservaVisita::with('cliente')->get();
  }

  // Retorna todas las reservas abiertas de la empresa en las distintas propiedades.
  public function reservasPropiedad(AuthenticateController $auth) {
    return ReservaVisita::join('propiedad', 'reserva_visita.id_propiedad', '=', 'propiedad.id')
            ->join('empresa', 'propiedad.id_empresa', '=', 'empresa.id')
            ->join('cliente', 'reserva_visita.id_cliente', '=', 'cliente.id')

            ->select(DB::raw('reserva_visita.id as id_reserva, reserva_visita.fecha, propiedad.nombre as propiedad, cliente.nombre, cliente.apellido'))

            ->where('empresa.id', $auth->getAuthUser()->empresa->id)
            ->where('reserva_visita.estado', true)
            ->get();
  }

  public function diasRestantesReserva (AuthenticateController $auth) {
    $reservas = ReservaVisita::join('propiedad', 'reserva_visita.id_propiedad', '=', 'propiedad.id')
              ->join('empresa', 'propiedad.id_empresa', '=', 'empresa.id')
              ->join('cliente', 'reserva_visita.id_cliente', '=', 'cliente.id')

              ->select(DB::raw('reserva_visita.id as id_reserva, reserva_visita.fecha, reserva_visita.estado, propiedad.nombre as propiedad, cliente.nombre, cliente.apellido'))

              ->where('empresa.id', $auth->getAuthUser()->empresa->id)
              ->where('reserva_visita.estado', true)
              ->get();

    return $this->reservasTransformer->transformCollection($reservas->toArray());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    ReservaVisita::create($request->all());
    return ['created' => true];
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    return ReservaVisita::findOrFail($id);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $reserva = ReservaVisita::find($id);
    $reserva->update($request->all());
    return ['updated' => true];
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    ReservaVisita::destroy($id);
    return ['deleted' => true];
  }
}
