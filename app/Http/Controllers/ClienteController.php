<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(AuthenticateController $auth)
  {
    return Cliente::all();
  }

  // Retorna un cliente especifico con la cantidad de reservas que tiene abiertas
  public function getReservas ($id) {
    return Cliente::withCount('reservas as cant_reservas')->where('cliente.id', $id)->get();
  }

  public function getReservasAbiertas ($id) {
    return Cliente::withCount(['reservas' => function ($query){
      $query->where('estado', true);
    }])
    ->where('cliente.id', $id)
    ->get();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Cliente::create($request->all());
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
    return Cliente::findOrFail($id);
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
    $cliente = Cliente::find($id);
    $cliente->update($request->all());
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
    Cliente::destroy($id);
    return ['deleted' => true];
  }
}
