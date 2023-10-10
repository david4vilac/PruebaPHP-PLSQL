@extends('layout/plantilla')

@section('tituloPagina', 'PUT - CRUD')

@section('contenido')
<br>
<br>
<div class="card">
  <div class="card-header">
    Actualizar seguimiento
  </div>
  <div class="card-body">
    <form action="{{ route('seguimientos.update', $seguimiento->id ) }}" method="POST">
        @csrf
        @method("PUT")
        <label for="">Nombres</label>
        <input type="text" name="nombres" class="form-control" required value="{{ $seguimiento->nombres }}">
        <label for="">Apeliidos</label>
        <input type="text" name="apellidos" class="form-control" required value="{{ $seguimiento->apellidos }}">
        <label for="">Asunto</label>
        <input type="text" name="asunto" class="form-control" required value="{{ $seguimiento->asunto }}">
        <label for="">Correo</label>
        <input type="text" name="correo" class="form-control" required value="{{ $seguimiento->correo }}">
        <label for="">Telefono</label>
        <input type="text" name="telefono" class="form-control" required value="{{ $seguimiento->telefono }}">
        <label for="">Dias</label>
        <input type="text" name="dias" class="form-control" required value="{{ $seguimiento->dias }}">
        <label for="">Fecha</label>
        <input type="date" name="fecha" class="form-control" required value="{{ $seguimiento->fecha }}">
        <label for="">Fecha Proximo Seguimiento</label>
        <input type="date" name="fecha_proximo_seguimiento" class="form-control" value="{{ $seguimiento->fecha_proximo_seguimiento }}" readonly>
        <br>
        <a href="{{ route('seguimientos.index')}}" class="btn btn-secondary">
        <span class="fas fa-undo-alt"></span> Regresar</a>
        <button class="btn btn-warning">Actualizar</button>
    </form>
  </div>
</div>

@endsection