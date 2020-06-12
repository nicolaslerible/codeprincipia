<!--@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="text-center">Lista de Niveles del administrador</h1>

    @if (Session::has('feedbackUsu'))
    <div class="alert alert-success" role="alert">
        {{session('feedbackUsu')}}
    </div>
    @endif

    <table class="table-basic">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">usuario</th>
                <th scope="col">Nivel</th>
                <th scope="col">puntuacion</th>
            </tr>
        </thead>
        <tbody>
            @if ($puntuaciones)
            @foreach ($puntuaciones as $puntuacion)
            <tr>
                <th scope="row">{{$puntuacion->id}}</th>
                <td>{{$puntuacion->user->name}}</td>
                <td><a href="{{ route('levels.score', $puntuacion->codLvl)}}">{{$puntuacion->level->nombre}}</a></td>
                <td>{{$puntuacion->points}}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection-->