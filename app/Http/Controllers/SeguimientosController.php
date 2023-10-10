<?php

namespace App\Http\Controllers;

use App\Models\Seguimientos;
use Illuminate\Http\Request;

class SeguimientosController extends Controller
{

    public function index()
    {
        $datos = Seguimientos::orderBy('nombres')->paginate(4);
        return view('inicio', compact('datos'));
    }

    public function create()
    {
        return view('agregar');
    }

    public function show($id)
    {
        $seguimiento = Seguimientos::find($id);
        return view('eliminar', compact('seguimiento'));
    }

    public function store(Request $request)
    {

        $seguimiento = new Seguimientos();
        $seguimiento->nombres = $request->post('nombres');
        $seguimiento->apellidos = $request->post('apellidos');
        $seguimiento->asunto = $request->post('asunto');
        $seguimiento->correo = $request->post('correo');
        $seguimiento->telefono = $request->post('telefono');
        $seguimiento->fecha = $request->post('fecha');
        $seguimiento->dias = $request->post('dias');
        $seguimiento->fecha_proximo_seguimiento = $seguimiento->calcularFechaProximoSeguimiento($seguimiento->fecha, $seguimiento->dias);
        $seguimiento->save();

        return redirect()->route("seguimientos.index")->with("success", "Agregado con exito!!");
    }

    public function edit($id)
    {
        $seguimiento = Seguimientos::find($id);
        return view('actualizar', compact('seguimiento'));
    }

    public function update(Request $request, $id)
    {
        $seguimiento = Seguimientos::find($id);
        $seguimiento->nombres = $request->post('nombres');
        $seguimiento->apellidos = $request->post('apellidos');
        $seguimiento->asunto = $request->post('asunto');
        $seguimiento->correo = $request->post('correo');
        $seguimiento->telefono = $request->post('telefono');
        $seguimiento->fecha = $request->post('fecha');
        $seguimiento->dias = $request->post('dias');
        $seguimiento->fecha_proximo_seguimiento = $seguimiento->calcularFechaProximoSeguimiento($seguimiento->fecha, $seguimiento->dias);
        
        $seguimiento->save();
        return redirect()->route("seguimientos.index")->with("success", "Actualizado con exito!!");
    }

    public function destroy($id)
    {
        $seguimientos = Seguimientos::find($id);
        $seguimientos->delete();
        return redirect()->route("seguimientos.index")->with("success", "Eliminado con exito!!");
    }
}
