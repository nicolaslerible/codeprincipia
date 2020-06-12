<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



    <title>Space Adventure</title>
    <script type="text/javascript" src="{{ asset('js/gameFiles/phaser.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/Preload.js') }}"></script>
    <!--Enemies-->
    <script type="text/javascript" src="{{ asset('js/gameFiles/enemies/Enemy.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/enemies/Basic.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/enemies/Typhon.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/enemies/Moon.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/enemies/Shoot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/enemies/Ball.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/enemies/miniBosses/Taco.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/enemies/miniBosses/Crab.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/enemies/miniBosses/Wall.js') }}"></script>
    <!--Classes-->
    <script type="text/javascript" src="{{ asset('js/gameFiles/powerup/Powerup.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/mechanics/Explosion.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/mechanics/GameController.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/mechanics/Planet.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/mechanics/Button.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/mechanics/HUD.js') }}"></script>
    <!--Player-->
    <script type="text/javascript" src="{{ asset('js/gameFiles/players/Player.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/players/beam.js') }}"></script>
    <!--Planets-->
    <script type="text/javascript" src="{{ asset('js/gameFiles/planets/Mercury.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/planets/Venus.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/planets/Earth.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/planets/Mars.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/planets/Jupiter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/planets/Saturn.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/planets/Uranus.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/planets/Neptune.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/scenes/Level.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/scenes/ChooseLevel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/scenes/GameOver.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/scenes/Victory.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/scenes/GameMenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/gameFiles/scenes/OptionsMenu.js') }}"></script>
    <!--Conf-->
    <script type="text/javascript" src="{{ asset('js/gameFiles/game.js') }}"></script>

</head>

<body>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="logo">
                <a href="#" class="nav-link">
                    <span class="link-text">Project Principia</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-alt-circle-right"
                        class="svg-inline--fa fa-arrow-alt-circle-right fa-w-16" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M256 8c137 0 248 111 248 248S393 504 256 504 8 393 8 256 119 8 256 8zM140 300h116v70.9c0 10.7 13 16.1 20.5 8.5l114.3-114.9c4.7-4.7 4.7-12.2 0-16.9l-114.3-115c-7.6-7.6-20.5-2.2-20.5 8.5V212H140c-6.6 0-12 5.4-12 12v64c0 6.6 5.4 12 12 12z">
                        </path>
                    </svg>
                </a>
            </li>
            @if ($role ?? '' == 'admin')
            @include('layouts.adminNav')
            @else
            @include('layouts.userNav')
            @endif
            @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt"
                        class="svg-inline--fa fa-sign-in-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z">
                        </path>
                    </svg>
                    <span class="link-text">Login</span>
                </a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">
                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="plus-square"
                        class="svg-inline--fa fa-plus-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M352 240v32c0 6.6-5.4 12-12 12h-88v88c0 6.6-5.4 12-12 12h-32c-6.6 0-12-5.4-12-12v-88h-88c-6.6 0-12-5.4-12-12v-32c0-6.6 5.4-12 12-12h88v-88c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v88h88c6.6 0 12 5.4 12 12zm96-160v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48zm-48 346V86c0-3.3-2.7-6-6-6H54c-3.3 0-6 2.7-6 6v340c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z">
                        </path>
                    </svg>
                    <span class="link-text">Register</span>
                </a>
            </li>
            @endif
            @else
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt"
                        class="svg-inline--fa fa-sign-out-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512">
                        <path fill="currentColor"
                            d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z">
                        </path>
                    </svg>
                    <span class="link-text">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endguest
        </ul>
    </nav>

    <main>
        <div class="container">
            <br>
            <div class="row">
                <div class="col col-xl-6 col-l-7 col-s-6 col-xs-11">
                    <a id="boton" class="btn btn-link">Guardar Progreso</a>
                    <!--<form method="POST" action="{{ route('levels.store') }}">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-l-8">
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-primary">Guardar progreso</button>
                                
                            </div>
                        </div>
                    </form>-->
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        $('#boton').click(function () {
            var lvl = [parseInt(localStorage.getItem('lvl1')), parseInt(localStorage.getItem('lvl2')),
            parseInt(localStorage.getItem('lvl3')), parseInt(localStorage.getItem('lvl4')),
            parseInt(localStorage.getItem('lvl5')), parseInt(localStorage.getItem('lvl6')),
            parseInt(localStorage.getItem('lvl7')), parseInt(localStorage.getItem('lvl8'))]

            lvl.forEach(function (score, indice, array) {
                if (score > 1) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('levels.store') }}",
                        headers: { 'X-CSRF-TOKEN': "{{csrf_token()}}" },
                        data: {
                            codLvl: indice + 1,
                            points: score,
                        },
                        dataType: 'json',
                    });
                }
            });
        });
    </script>

</body>

</html>