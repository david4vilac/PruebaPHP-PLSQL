@extends('layout/plantilla')

@section('tituloPagina', 'Crud con Laravel')

@section('contenido')
<br>
<br>
<div class="card">
  <div class="card-body">
  <div class="card-header">
    Eliminar un seguimiento!
  </div>
    <div class="alert alert-danger" role="alert">
        Estas seguro de eliminar el registro ???
            <table class="table table-sm table-hover">
                <thead>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Asunto</th>
                    <th>correo</th>
                    <th>Telefono</th>
                    <th>fecha</th>
                    <th>dias</th>
                    <th>fecha_proximo_seguimiento</th>
                </thead>    
                <tbody>
                    <tr>
                        <td>{{ $seguimiento->nombres }}</td>
                        <td>{{ $seguimiento->apellidos }}</td>
                        <td>{{ $seguimiento->asunto }}</td>
                        <td>{{ $seguimiento->correo }}</td>
                        <td>{{ $seguimiento->telefono }}</td>
                        <td>{{ $seguimiento->fecha }}</td>
                        <td>{{ $seguimiento->dias }}</td>
                        <td>{{ $seguimiento->fecha_proximo_seguimiento }}</td>
                    </tr>
                </tbody>        
            </table>
            <hr>
            <form action="{{ route('seguimientos.destroy', $seguimiento->id ) }}" method='POST'>
                @csrf
                @method('DELETE')
                <a href="{{ route('seguimientos.index') }}"  class="btn btn-secondary"> <span class="fas fa-undo-alt"></span> Regresar</a>
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </div>
  </div>
</div>
@endsection