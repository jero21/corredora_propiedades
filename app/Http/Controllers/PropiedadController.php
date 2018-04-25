<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedad;
use App\Http\Controllers\AuthenticateController;

class PropiedadController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(AuthenticateController $auth)
  {
    //$user = \JWTAuth::parseToken()->authenticate();
    return Propiedad::where('id_empresa', $auth->getAuthUser()->empresa->id)->get();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Propiedad::create($request->all());
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
    return Propiedad::findOrFail($id);
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
    $propiedad = Propiedad::find($id);
    $propiedad->update($request->all());
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
    Propiedad::destroy($id);
    return ['deleted' => true];
  }

  public function getPropertyByCity ($id_ciudad) {
    // 
  }
}
