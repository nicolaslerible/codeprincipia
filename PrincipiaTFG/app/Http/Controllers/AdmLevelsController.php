<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdmLevelsController extends Controller {
    /**
     * Comprueba si el usuario es administrador.
     *
     * <p>Primero accede al middleware "Authenticate.php" para que compruebe 
     * si hay algún usuario registrado. Despues, si hay un usuario, accede
     * al middleware "EsAdmin.php" para comprobar si el usuario es 
     * administrador.</p>
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('checkAdmin');
    }

    /**
     * Muestra una lista con todas las puntuaciones de los jugadores.
     * 
     * <p>Recoge en una variable un array con todas las punuaciones y en otra
     * el rol del usuario. Después envia estos datos en forma de parámetros
     * a la vista.</p>
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $puntuaciones = Score::all();
        $role = 'admin';

        return view('admin.levels.index', compact(['puntuaciones', 'role']));
    }

    /**
     * Almacena las puntuaciones en la base de datos.
     * 
     * <p>Primero obtiene la id del usuario registrado actualmente el codigo del nivel
     * y su respectiva puntuación. Despues, compruebo si el usuario ya tiene una puntuación en 
     * ese nivel. Si ya tiene una puntuación, la ocurreencia se actualiza con la nueva puntuación,
     * si no tiene, se crea una ocurrencia con los datos del usuario y sus puntuaciones.</p>
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $userId = Auth::id();
        $lvl = $request->get("codLvl");
        $score = $request->get("points");

        $oldScoreId = Score::where('codUsu', '=', $userId)->where('codLvl', $lvl)->value('id');

        if ($request->ajax()) {
            if ($oldScoreId != null) {
                $oldScore = Score::findOrFail($oldScoreId);
                $oldScore->update(['points' => $score]);
            } else {
                Score::create(['codUsu' => $userId, 'codLvl' => $lvl, 'points' => $score]);
            }
        }
    }

    /**
     * Muestra una lista con las puntuaciones de los usuarios de un 
     * nivel en especifico.
     *
     * <p>Muestra una lista con las puntuaciones de los usuarios de un 
     * nivel en especifico</p>
     * 
     * @return \Illuminate\Http\Response
     */
    public function scoreList() {
        return view('admin.levels.score');
    }

}
