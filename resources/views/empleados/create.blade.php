@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{url('/empleados')}}" method="post">
        @csrf
        @include('empleados.form',['modo' => 'Crear','errores',])
    </form>
</div>
@endsection
