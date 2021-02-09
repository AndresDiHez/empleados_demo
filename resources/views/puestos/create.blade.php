@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{url('/puestos')}}" method="post">
        @csrf
        @include('puestos.form',['modo' => 'Crear','errores',])
    </form>
</div>
@endsection
