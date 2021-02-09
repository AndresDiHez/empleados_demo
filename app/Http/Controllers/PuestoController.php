<?php

namespace App\Http\Controllers;

use App\Models\puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
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
            $datos['puestos'] = puesto::where('nombre','like',"%$nombre%")->get();
        }
        else{
            $datos['puestos'] = puesto::all();
        }
        return view('puestos.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('puestos.create');
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
        ];
        $message =[
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request,$campos,$message);
        $puestos = request()->except('_token');

        puesto::insert($puestos);

        return redirect('puestos')->with('mensaje','Guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function show(puesto $puesto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puesto = puesto::findOrFail($id);
        return view('puestos.edit', compact('puesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:90',
        ];
        $message =[
            'required' => 'El :attribute es requerido',
        ];

        $this->validate($request,$campos,$message);
        $puestos = request()->except('_token','_method');

        puesto::where('id','=',$id)->update($puestos);
        $puesto = puesto::findOrFail($id);

        return redirect('puestos')->with('mensaje','Puesto Modificado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\puesto  $puesto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        puesto::destroy($id);

        return redirect('puestos')->with('mensaje','Puesto Eliminado!');
    }
}
