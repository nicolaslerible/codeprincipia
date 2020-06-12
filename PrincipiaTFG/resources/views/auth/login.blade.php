@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-xl-6 col-l-7 col-s-6 col-xs-11">
            <div class="card">
                <div class="card-header">Iniciar sesión</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-l-2 col-s-12 col-xs-12 col-form-label">E-mail</label>

                            <div class="col-l-6 col-s-12 col-xs-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
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
                                     autocomplete="current-password">


                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Campo requerido</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-l-4"></div>
                            <div class="col-l-8">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                                <a href="{{ route('register') }}" class="btn btn-link">Registrarme</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('auth.message')

    </div>
</div>
@endsection