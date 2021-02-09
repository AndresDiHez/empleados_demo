<?php

namespace App\Http\Controllers;

use App\Models\persona;
use Faker\Provider\es_PE\Person;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $nombre = $request->get('buscarpor');

        if ($nombre != null){
            $datos['personas'] = persona::where('nombre','like',"%$nombre%")->orwhere('apellido','like',"%$nombre%")->orwhere('fechaNacimiento','like',"%$nombre%")->get();
        }
        else{
            $datos['personas'] = persona::all();
        }
        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('empleados.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'nombre' => 'required|string|max:90',
            'apellido' => 'required|string|max:90',
            'fechaNacimiento' => 'required|date',
        ];
        $message =[
          'required' => 'El :attribute es requerido',
            'fechaNacimiento.required' => 'La fecha es requerida'
        ];
        $this->validate($request,$campos,$message);
        $personas = request()->except('_token');

        persona::insert($personas);

//        return response()->json($personas);
        return redirect('empleados')->with('mensaje','Guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = persona::findOrFail($id);
        return view('empleados.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:90',
            'apellido' => 'required|string|max:90',
            'fechaNacimiento' => 'required|date',
        ];
        $message =[
            'required' => 'El :attribute es requerido',
            'fechaNacimiento.required' => 'La fecha es requerida'
        ];

        $this->validate($request,$campos,$message);
        $personas = request()->except('_token','_method');

        persona::where('id','=',$id)->update($personas);
        $persona = persona::findOrFail($id);
        return redirect('empleados')->with('mensaje','Persona Modificado!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        persona::destroy($id);

        return redirect('empleados')->with('mensaje','Persona Eliminada!');
    }
}
