@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{url('empleados_puestos/'.$empleado_puesto->id)}}" method="post">
            @csrf
            {{method_field('PATCH')}}
            @include('empleados_puestos.form',['modo' => 'Editar'])
        </form>
    </div>
@endsection
