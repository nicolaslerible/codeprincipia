@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-l-8">
            <div class="card">
                <div class="card-header">Edición de Usuario</div>
                <div class="card-body">
                    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdmUsersListController@update',
                    $user->id]]) !!}

                    <div class="form-group row">
                        <label for="name" class="col-l-4 col-form-label text-md-right">Nombre</label>

                        <div class="col-l-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>Campo requerido</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>Campo requerido</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-l-4">
                            <input type="radio" value="1" id="test1" name="codRol" {{ $user->codRol == "1" ? 'checked' : '' }}>
                            <label for="test1">Administrador</label>
                        </div>
                        <div class="col-l-1">
                            <input type="radio" value="2" class="col-l-2" id="test2" name="codRol" {{ $user->codRol == "2" ? 'checked' : '' }}>
                            <label for="test2">Usuario</label>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Modificar</button>
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