@extends('layout/plantilla')

@section('tituloPagina', 'POST - CRUD')

@section('contenido')
<br>
<br>
<div class="card">
  <div class="card-header">
    Agregar Nuevo
  </div>
  <div class="card-body">
    <form action="{{ route('seguimientos.store') }}" method="POST">
        @csrf
        <label for="">Nombres</label>
        <input type="text" name="nombres" class="form-control" required >
        <label for="">Apeliidos</label>
        <input type="text" name="apellidos" class="form-control" required>
        <label for="">Asunto</label>
        <input type="text" name="asunto" class="form-control" require>
        <label for="">Correo</label>
        <input type="text" name="correo" class="form-control" required>
        <label for="">Telefono</label>
        <input type="text" name="telefono" class="form-control" required >
        <label for="">Fecha</label>
        <input type="date" name="fecha" class="form-control" required>
        <label for="">Dias</label>
        <input type="text" name="dias" class="form-control" required>
        <br>
        <a href="{{ route('seguimientos.index')}}" class="btn btn-secondary">
        <span class="fas fa-undo-alt"></span> Regresar</a>
        <button class="btn btn-primary">Agregar</button>
    </form>
  </div>
</div>

@endsection