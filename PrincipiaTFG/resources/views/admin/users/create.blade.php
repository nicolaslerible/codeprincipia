@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-l-5">
            <div class="card">
                <div class="card-header">
                    Creación de usuario
                </div>
                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'action' => 'AdmUsersListController@store']) !!}

                    <div class="form-group row">
                        <label for="name" class="col-l-2 col-form-label text-md-right">Nombre</label>

                        <div class="col-l-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>Campo requerido</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-l-2 col-s-12 col-xs-12 col-form-label">Contraseña</label>
                        <div class="col-l-6 col-s-12 col-xs-12">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>Campo requerido</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-l-2 col-s-12 col-xs-12 col-form-label">E-mail</label>

                        <div class="col-l-6 col-s-12 col-xs-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>Campo requerido</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-l-4">
                            <input type="radio" value="1" id="test1" name="codRol" checked>
                            <label for="test1">Administrador</label>
                        </div>
                        <div class="col-l-1">
                            <input type="radio" value="2" class="col-l-2" id="test2" name="codRol">
                            <label for="test2">Usuario</label>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <button type="reset" class="btn btn-link">Restablecer</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>


        </div>
    </div>
</div>
@endsection