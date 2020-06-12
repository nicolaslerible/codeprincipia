@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-l-5">
            <h1>Bienvenido, {{ $info->name }}</h1>
            <p>
                Gracias por registrarte, ahora podras guardar tus datos en la base de datos y tus puntuaciones aparecerán en los rankings
            </p>
        </div>
        <div class="col-l-5">
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
                    @if ($scores)
                    @foreach ($scores as $score)
                    <tr>
                        <th scope="row">{{$score->id}}</th>
                        <td>{{$score->user->name}}</td>
                        <td><a href="{{ route('ranking', $score->codLvl) }}">{{$score->level->nombre}}</a></td>
                        <td>{{$score->points}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection