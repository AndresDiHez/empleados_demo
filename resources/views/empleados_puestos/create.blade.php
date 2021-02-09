@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{url('/empleados_puestos')}}" method="post">
        @csrf
        @include('empleados_puestos.form',['modo' => 'Crear','errores',])
    </form>
</div>
@endsection
