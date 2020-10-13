<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Http\Requests\GuardarPersona;
use App\Http\Requests\ActualizarPersona;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensaje = session('mensaje', '');
        $texto_busqueda = session('texto_busqueda', '');
        // eliminar variable session
        session()->forget('mensaje');
        $personas = Persona::where('apellido_paterno', 'LIKE', '%' . $texto_busqueda . '%')
            ->orderBy('apellido_paterno', 'ASC')
            ->orderBy('apellido_materno', 'ASC')
            ->orderBy('nombre', 'ASC')->paginate(20);
        return view('admin.persona.index', [
            'listado' => $personas,
            'mensaje' => $mensaje
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.persona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPersona $request)
    {
        $persona = new Persona();
        $persona->apellido_paterno = $request->input('apellido_paterno');
        $persona->apellido_materno = $request->input('apellido_materno');
        $persona->nombre = $request->input('nombre');
        $persona->email = $request->input('email');
        $persona->celular = $request->input('celular');
        $persona->direccion = $request->input('direccion');
        $persona->save();
        // formas de declarar variables session
        // $request->session()->put('mensaje', 'Registrador correctamente');
        session(['mensaje' => 'Registrado correctamente']);
        return redirect()->route('persona.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);
        return view('admin.persona.edit', [
            'persona' => $persona
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarPersona $request, $id)
    {
        $persona = Persona::find($id);
        $persona->apellido_paterno = $request->input('apellido_paterno');
        $persona->apellido_materno = $request->input('apellido_materno');
        $persona->nombre = $request->input('nombre');
        $persona->email = $request->input('email');
        $persona->celular = $request->input('celular');
        $persona->direccion = $request->input('direccion');
        $persona->save();
        session(['mensaje' => 'Actualizado correctamente']);
        return redirect()->route('persona.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $mensaje = 'Eliminado correctamente: ' . $persona->nombre_completo;
        $persona->delete();
        session(['mensaje' => $mensaje]);
        return redirect()->route('persona.index');
    }

    public function buscar(Request $request)
    {
        $textoBusqueda = $request->input('texto_busqueda');
        session(['texto_busqueda' => $textoBusqueda]);
        return redirect()->route('persona.index');
    }
}
