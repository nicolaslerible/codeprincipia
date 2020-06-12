@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Ranking Global</h1>
    <div class="row">
        <div class="list col-l-3 col-xs-12">
            <ul class="list-nav">
                @foreach ($levels as $level)
                <a class="
                {{$level->id == 1 ? 'list-start' : ''}}
                {{$level->id == 8 ? 'list-end' : 'list-link'}}    
                    {{$currentLvl == $level->id ? 'list-active' : ''}}"
                    href="{{ route('ranking', $level->id)}}">
                    <li>{{$level->nombre}}</li>
                </a>
                @endforeach
            </ul>
        </div>

        <div class="col-l-8">
            <table class="table-basic">
                <thead>
                    <tr>
                        <th scope="col">usuario</th>
                        <th scope="col">puntuacion</th>
                        <th scope="col">fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($scores)
                    @foreach ($scores as $score)
                    <tr>
                        <td scope="row">{{$score->user->name}}</td>
                        <td>{{$score->points}}</td>
                        <td>{{$score->updated_at}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection