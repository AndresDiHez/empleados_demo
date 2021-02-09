@extends('layouts.app')

@section('content')
<div class="container">
    <h1>EmpleadoPuesto</h1>
    @if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" ariel-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif

        <form class="form-inline">

            <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">

            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
        <br>
    <a href="{{url('empleados_puestos/create')}}" class="btn btn-success">Agregar</a>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <td>#</td>
                <td>Empleado</td>
                <td>Puesto</td>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados_puestos as $empleado_puesto)
            <tr>
                <td>{{$empleado_puesto->id}}</td>
                <td>{{$empleado_puesto->persona}}</td>
                <td>{{$empleado_puesto->puesto}}</td>
                <td>
                    <a href="{{url('/empleados_puestos/'.$empleado_puesto->id.'/edit')}}" class="btn btn-dark">Editar</a>
                    <form action="{{url('/empleados_puestos/'.$empleado_puesto->id)}}" method="post" class="d-inline" >
                        @csrf
                        {{method_field('DELETE')}}
                        <input class="btn btn-danger" type="submit" value="Eliminar" onclick="return confirm('¿Estas seguro que quieres borrar?')">
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
    <script>
    </script>

@endsection
