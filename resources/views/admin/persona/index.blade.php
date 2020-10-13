@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Personas<a class="btn btn-success float-right" href="{{ route('persona.create') }}">Nuevo</a>
                    </div>
                    @if ($mensaje !== '')
                        <div class="alert alert-success" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" class="form-inline" action="{{ route('persona.buscar') }}">
                            @csrf
                            <input type="text" name="texto_busqueda" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                                placeholder="Buscar">
                            <button type="submit" class="btn btn-primary mb-2">Buscar</button>
                        </form>
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
                                            <a href="{{ route('persona.edit', $valor->id) }}"
                                                class="btn btn-warning">Editar</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('persona.destroy', $valor->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('¿Está seguro de eliminar el registro?')"
                                                    type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
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
