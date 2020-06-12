@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Pagina de scores</h1>
    <div class="row">
        <div class="list col-l-2 col-xs-11">
            <ul class="list-nav">
                @foreach ($levels as $level)
                <a class="
                {{$level->id == 1 ? 'list-start' : ''}}
                {{$level->id == 8 ? 'list-end' : 'list-link'}}    
                    {{$currentLvl == $level->id ? 'list-active' : ''}}"
                    href="{{ route('levels.score' , $level->id)}}">
                    <li>{{$level->nombre}}</li>
                </a>
                @endforeach
            </ul>
        </div>

        <div class="col-l-9 col-xs-11">
            <table class="table-basic">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">usuario</th>
                        <th scope="col">puntuacion</th>
                        <th scope="col">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($scores)
                    @foreach ($scores as $score)
                    <tr>
                        <th scope="row">{{$score->id}}</th>
                        <td scope="row">{{$score->user->name}}</td>
                        <td>{{$score->points}}</td>
                        <td>
                            {!! Form::model($score, ['method' => 'DELETE', 'action' => ['AdmScoreController@destroy', $score->id]]) !!}
                            <button type="submit" class="btn btn-red">Borrar</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection