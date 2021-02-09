<h1>{{$modo}} puesto</h1>
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
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{isset($puesto->nombre) ? $puesto->nombre :old('nombre')}}">
</div>
<input class="btn btn-success" type="submit" value="{{$modo}}">
<a class="btn btn-outline-primary" href="{{url('puestos/')}}">Regresar</a>
