@extends('layout/plantilla')

@section('tituloPagina', 'GET - CRUD')

@section('contenido')
<br>
<br>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="card">
  <div class="card-header">
    CRUD CON LARAVEL
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            @if($mensaje = Session::get('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
            {{ $mensaje }}
            </div>
            </div>

            @endif
        </div>
    </div>
    <h5 class="card-title">Listado de sesiones en el sistema</h5>
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
            <hr>
           
        </div>
        <div class='row'>
            <div class="col-sm-12">
                {{ $datos->links() }}
            </div>
        </div>
    </p>
  </div>
</div>
@endsection









