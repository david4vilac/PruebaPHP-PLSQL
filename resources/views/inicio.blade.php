@extends('layout/plantilla')

@section('tituloPagina', 'Crud con Laravel')

@section('contenido')
<br>
<br>
<div class="card">
  <div class="card-header">
    CRUD CON LARAVEL
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            @if($mensaje = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $mensaje }}
                </div>
            @endif
        </div>
    </div>
    <h5 class="card-title">Listado des sesiones en el sistema</h5>
    <p class="card-text float-right">
        <a href="{{ route('seguimientos.create') }}" class="btn btn-primary">
        <span class="fas fa-user-plus"></span> Agregar sesión
        </a>
    </p>

    <p class="card-text">
        <div class="table table-responsive">
            <table class="table table-sm table-bordered">
                <thead>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Asunto</th>
                    <th>correo</th>
                    <th>Telefono</th>
                    <th>fecha</th>
                    <th>dias</th>
                    <th>fecha_proximo_seguimiento</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>    
                <tbody>
                @foreach($datos as $item)
                    <tr>
                        <td>{{ $item->nombres }}</td>
                        <td>{{ $item->apellidos }}</td>
                        <td>{{ $item->asunto }}</td>
                        <td>{{ $item->correo }}</td>
                        <td>{{ $item->telefono }}</td>
                        <td>{{ $item->fecha }}</td>
                        <td>{{ $item->dias }}</td>
                        <td>{{ $item->fecha_proximo_seguimiento }}</td>
                        <td>
                            <form action="{{ route('seguimientos.edit', $item->id) }}" method="GET">
                                <button class="btn btn-warning btn-sm">
                                    <span class="fas fa-user-edit"></span>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('seguimientos.show', $item->id) }}" method="GET">
                                <button class="btn btn-danger btn-sm">
                                    <span class="fas fa-user-times"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach


                </tbody>        
            </table>
        </div>
    </p>
  </div>
</div>
@endsection









