@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="text-center">Administración de usuarios</h1>

    <div class="card">
        <div class="card-header">
            <form class="form-inline col-l-12">

                <label for="tipo" class="col-form-label">Filtro:</label>

                <select name="tipo" class="form-control col-l-2 mr-2">
                    <option>Parámetro</option>
                    <option value="id">Clave</option>
                    <option value="name">Nombre</option>
                    <option value="email">Email</option>
                </select>

                <input name="buscarpor" class="form-control col-l-2 mr-2" type="search" placeholder="Valor"
                    aria-label="Search">

                <button class="btn btn-dark mr-2" type="submit">Buscar</button>
                @if (Session::has('feedbackUsu'))
                <div class="alert col-l-4" role="alert">
                    {{session('feedbackUsu')}}
                </div>
                @endif
            </form>
        </div>
    </div>
    <br>



    <table class="table-basic">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">Nombre</th>
                <th scope="col" class="xs-hide">Email</th>
                <th scope="col"><a class="btn btn-dark" href="{{ route('users.create') }}"><b>Crear Usuario</b></a></th>
            </tr>
        </thead>
        <tbody>
            @if ($usuarios)
            @foreach ($usuarios as $usuario)
            <tr>
                <th scope="row">{{$usuario->id}}</th>
                <td>{{$usuario->role->nombre}}</td>
                <td>{{$usuario->name}}</td>
                <td class="xs-hide">{{$usuario->email}}</td>
                <td>

                    {!! Form::model($usuario, ['method' => 'DELETE', 'action' => ['AdmUsersListController@destroy',
                    $usuario->id]]) !!}
                    <a class="btn btn-yellow" href="{{ route('users.edit', $usuario->id)}}">Editar</a>
                    <button type="submit" class="btn btn-red">Borrar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    {{ $usuarios->links('layouts.pagination') }}

</div>
@endsection