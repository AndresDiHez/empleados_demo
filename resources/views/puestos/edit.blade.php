@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{url('puestos/'.$puesto->id)}}" method="post">
            @csrf
            {{method_field('PATCH')}}
            @include('puestos.form',['modo' => 'Editar'])
        </form>
    </div>
@endsection
