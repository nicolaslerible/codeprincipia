<?php

namespace App\Http\Controllers;

use App\Level;
use App\Score;
use Illuminate\Http\Request;

class AdmScoreController extends Controller
{
    /**
     * Muestra las puntuaciones de un nivel especifico.
     * 
     * <p>Recoge en un array todas lass ocurrenciass de la tabla Score
     * cuyo codigo de nivel coincida con $id y las pasa como parámetro
     * a la vista.</p>
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id Codigo del nivel 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $scores = Score::where('codLvl', $id)->get();
        $currentLvl = $id;
        $levels = Level::all();
        $role = 'admin';

        return view('admin.levels.score',  compact(['scores','currentLvl', 'levels' , 'role']));
    }
    /**
     * Borra una puntuacion de la base de datos.
     * 
     * <p>Primero busca al Score cuya "id" corresponda con $id, despues elimina el
     * registro de la base de datos y por ultimo envia un mensaje de feedback informando
     * del exito de la operación.</p>
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $score=Score::findOrFail($id);
        $score->delete();

        return redirect('/admin/levels/1');
    }
}
