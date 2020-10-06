@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registrar persona</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('persona.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Apellido paterno</label>
                                <div class="col-sm-8" >
                                    <input type="text" class="form-control" name="apellido_paterno" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Apellido materno</label>
                                <div class="col-sm-8" >
                                    <input type="text" class="form-control" name="apellido_materno" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nombre</label>
                                <div class="col-sm-8" >
                                    <input type="text" class="form-control" name="nombre" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
