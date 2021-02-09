@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{url('empleados/'.$persona->id)}}" method="post">
            @csrf
            {{method_field('PATCH')}}
            @include('empleados.form',['modo' => 'Editar'])
        </form>
    </div>
@endsection
