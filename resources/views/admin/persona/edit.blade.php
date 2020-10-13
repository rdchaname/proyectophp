@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modificar persona:
                        {{ $persona->nombre_completo }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('persona.update', $persona->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Apellido paterno</label>
                                <div class="col-sm-8">
                                    <input type="text" required
                                        class="form-control @error('apellido_paterno') is-invalid @enderror "
                                        value="{{ old('apellido_paterno', $persona->apellido_paterno) }}" name="apellido_paterno" />
                                    @error('apellido_paterno')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Apellido materno</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{ old('apellido_materno', $persona->apellido_materno) }}" required
                                        class="form-control @error('apellido_materno') is-invalid @enderror"
                                        name="apellido_materno" />
                                    @error('apellido_materno')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nombre</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{ old('nombre', $persona->nombre) }}" required class="form-control"
                                        name="nombre" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" value="{{ old('email', $persona->email) }}" required
                                        class="form-control  @error('email') is-invalid @enderror" name="email" />
                                    @error('email')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Celular</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{ old('celular', $persona->celular) }}" class="form-control" name="celular" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Dirección</label>
                                <div class="col-sm-8">
                                    <input type="text" value="{{ old('direccion', $persona->direccion) }}" class="form-control"
                                        name="direccion" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-check-circle"></i> Modificar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
