<h1>{{$modo}} empleado</h1>
@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() AS $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{isset($persona->nombre) ? $persona->nombre :old('nombre')}}">
</div>
<div class="form-group">
    <label for="Apellido">Apellido</label>
    <input class="form-control" type="text" name="apellido" id="apellido" value="{{isset($persona->apellido) ? $persona->apellido :old('apellido')}}">
</div>
<div class="form-group">
    <label for="fechaNacimiento">Fecha de Nacimiento</label>
    <input class="form-control" type="date" name="fechaNacimiento" id="fechaNacimiento" value="{{isset($persona->fechaNacimiento) ? $persona->fechaNacimiento :old('fechaNacimiento')}}">
</div>
<input class="btn btn-success" type="submit" value="{{$modo}}">
<a class="btn btn-outline-primary" href="{{url('empleados/')}}">Regresar</a>
