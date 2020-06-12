<?php

namespace App\Http\Controllers;

use App\Level;
use App\Score;
use Illuminate\Http\Request;

class UsrGameController extends Controller
{
    /**
     * Muestra la pagina con el videojuego.
     *
     * <p>Muestra la pagina con el videojuego.</p>
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('user.game.index');
    }

    /**
     * Muestra un ranking con las puntuaciones de los usuarios.
     *
     * <p>Recoge en una variable las ocurrenccias de la tabla Score cuyo codigo
     * de nivel coincida con el parametro $id, y a continuacion se mandan como parámetro
     * a la vista.</p>
     * 
     * @param int $id Codigo del nivel a mostrar.
     * @return \Illuminate\Http\Response
     */
    public function ranking($id){
        $scores = Score::where('codLvl', $id)->orderBy('points', 'desc')->get();
        $currentLvl = $id;
        $levels = Level::all();

        return view('user.game.ranking',  compact(['scores','currentLvl', 'levels']));
    }
}
