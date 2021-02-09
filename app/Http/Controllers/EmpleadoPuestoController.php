<?php

namespace App\Http\Controllers;

use App\Models\empleado_puesto;
use App\Models\persona;
use App\Models\puesto;
use Illuminate\Http\Request;

class EmpleadoPuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('buscarpor');

        if ($nombre != null){
            $datos['empleados_puestos'] = empleado_puesto::select('empleado_puestos.id','personas.nombre AS persona','puestos.nombre AS puesto')
                ->leftJoin('personas','personas.id','=','empleado_puestos.empleado_id')
                ->leftJoin('puestos','puestos.id','=','empleado_puestos.puesto_id')
                ->where('personas.nombre','like',"%$nombre%")
                ->orwhere('puestos.nombre','like',"%$nombre%")->get();

        }
        else{
            $datos['empleados_puestos'] = empleado_puesto::select('empleado_puestos.id','personas.nombre AS persona','puestos.nombre AS puesto')
                ->leftJoin('personas','personas.id','=','empleado_puestos.empleado_id')
                ->leftJoin('puestos','puestos.id','=','empleado_puestos.puesto_id')->get();
        }
        return view('empleados_puestos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = persona::all();
        $puestos = puesto::all();
        return view('empleados_puestos.create', compact('personas','puestos'));
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
            'empleado_id' => 'required|string|max:90',
            'puesto_id' => 'required|string|max:90',

        ];
        $message =[
            'required' => 'El :attribute es requerido',
            'persona_id.required' => 'La persona es requerida'
        ];
        $this->validate($request,$campos,$message);
        $empleados_puestos = request()->except('_token');

        empleado_puesto::insert($empleados_puestos);

        return redirect('empleados_puestos')->with('mensaje','Guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empleado_puesto  $empleado_puesto
     * @return \Illuminate\Http\Response
     */
    public function show(empleado_puesto $empleado_puesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empleado_puesto  $empleado_puesto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personas = persona::all();
        $puestos = puesto::all();

        $empleado_puesto = empleado_puesto::findOrFail($id);
        return view('empleados_puestos.edit', compact('empleado_puesto','personas','puestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleado_puesto  $empleado_puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $campos = [
            'empleado_id' => 'required|string|max:90',
            'puesto_id' => 'required|string|max:90',

        ];
        $message =[
            'required' => 'El :attribute es requerido',
            'persona_id.required' => 'La persona es requerida'
        ];
        $this->validate($request,$campos,$message);
        $empleados_puestos = request()->except('_token','_method');

        empleado_puesto::where('id','=',$id)->update($empleados_puestos);
        $empleado_puesto = empleado_puesto::findOrFail($id);

        return redirect('empleados_puestos')->with('mensaje','EmpleadoPuesto Modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empleado_puesto  $empleado_puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        empleado_puesto::destroy($id);

        return redirect('empleados_puestos')->with('mensaje','Puesto Eliminado!');
    }
}
