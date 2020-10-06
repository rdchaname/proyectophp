@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Personas<a class="btn btn-success float-right" href="{{ route('persona.create')  }}">Nuevo</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Apellido paterno</th>
                                    <th>Apellido materno</th>
                                    <th>Nombres</th>
                                    <th>Email</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listado as $valor)
                                    <tr>
                                        <td>{{ $valor->apellido_paterno }}</td>
                                        <td>{{ $valor->apellido_materno }}</td>
                                        <td>{{ $valor->nombre }}</td>
                                        <td>{{ $valor->email }}</td>
                                        <td>
                                            <button class="btn btn-warning">Editar</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger">Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $listado->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
