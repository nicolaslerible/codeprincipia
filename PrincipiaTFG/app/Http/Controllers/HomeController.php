<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Comprueba si el usuario es administrador.
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
     * Muestra un mensaje dependiendo de si eres usuario o administrador.
     * 
     * <p>Si el usuario es administrador, este será redireccionado a la interfaz
     * de administradores, si no, se le mostrará un mensaje informando de que
     * el usuario ha iniciado sesión con éxito.</p>
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        if(Auth::user()->esAdmin()){
            return redirect('/admin/users');
        }
        return view('home');
    }
}
