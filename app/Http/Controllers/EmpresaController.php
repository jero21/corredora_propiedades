<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use DB;

class EmpresaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Empresa::join('propiedad', 'empresa.id', '=', 'propiedad.id_empresa')
            ->select(DB::raw('empresa.nombre as empresa, empresa.id as id_empresa, propiedad.nombre as propiedad, propiedad.codigo as codigo_propiedad, propiedad.id as id_propiedad'))
            ->orderBy('empresa.nombre')
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
    Empresa::create($request->all());
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
    return User::findOrFail($id);
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
    $empresa = Empresa::find($id);
    $empresa->update($request->all());
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
    Empresa::destroy($id);
    return ['deleted' => true];

  }
}
