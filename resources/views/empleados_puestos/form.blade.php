<h1>{{$modo}} EmpleadoPuesto</h1>
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
    <div class="form-group">
        <label for="Personas">Personas</label>
        <select class="form-control" name="empleado_id">
            @foreach($personas as $item)
                <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
        <label for="Personas">Puestos</label>
        <select class="form-control" name="puesto_id">
            @foreach($puestos as $item)
                <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
<input class="btn btn-success" type="submit" value="{{$modo}}">
<a class="btn btn-outline-primary" href="{{url('empleados_puestos/')}}">Regresar</a>
