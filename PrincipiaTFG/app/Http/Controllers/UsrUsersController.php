<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsrUsersController extends Controller
{
    /**
     * Comprueba si el usuario esta conectado.
     *
     * <p>Primero accede al middleware "Authenticate.php" para que compruebe 
     * si hay algún usuario registrado.</p>
     * 
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Muestra la informacion del usuario registrado.
     *
     * <p>Obtengo la información del usuario registrado y todas las ocurrencias
     * de la tabla Score cuyo codigo de usuario coincida con la "id" del usuario
     * registrado.</p>
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Auth::user()->getId();
        $info=User::findOrFail($user);
        $scores=Score::where("codUsu", $user)->orderBy('codLvl')->get();

        return view('user.home.index', compact(['info', 'scores']));
    }
    
}
