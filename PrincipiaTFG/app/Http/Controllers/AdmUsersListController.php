<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;

class AdmUsersListController extends Controller {
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
     * Muestra una lista con los usuarios registrados.
     * 
     * <p>Recoge en una variable el tipo de información y el valor que
     * se estan buscando. Accede a la función "buscarpor" del modelo 
     * "User" y devuelve todas las ocurrencias que coincidan con esa 
     * busqueda, si no se especifica ningun parametro de busqueda 
     * devolverá todos los usuarios. En ambos casos los usuarios se
     * mosatrarán en una paginación agrupados de 5 en 5.</p>
     * 
     * @param  \Illuminate\Http\Request  $request tipo y valor de la busqueda
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $role = 'admin';
        $tipo = $request->get('tipo');
        $info = $request->get('buscarpor');

        $usuarios = User::buscarpor($tipo, $info)->paginate(5);
        
        return view('admin.users.index', compact(['usuarios', 'role']));

    }

    /**
     * Muestra el formulario de creacion de usuarios.
     * 
     * <p>Muestra el formulario de creacion de usuarios.</p>
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $role = 'admin';
        return view('admin.users.create', compact('role'));
    }

    /**
     * Almacena una nueva ocurrencia en la base de datos.
     * 
     * <p>Primero recoge los datos del nuevo usuario a registrar, despues
     * encripta la contraseña y crea un nuevo usuario. Ademas, manda un
     * mensaje de feedback informando de que el usuario se ha creado con
     * exito.</p>
     *
     * @param  \Illuminate\Http\Request  $request datos del usuario a registrar
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $info = $request->all();
        $info['password']=bcrypt($request->password);
        User::create($info);

        Session::flash ('feedbackUsu', 'Usuario creado con exito');

        return redirect('/admin/users');
    }

    /**
     * Muestra el formulario de edicion de un usuario.
     *
     * <p>Primero busca al usuario cuya "id" corresponda con el parametro
     * $id. Despues pasa los datos de este usuario como parámetro a la vista.</p>
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user=User::findOrFail($id);
        $role = 'admin';

        return view('admin.users.edit', compact(['user', 'role']));
    }

    /**
     * Actualiza los datos del usuario en la base de datos.
     *
     * <p>Recoge la informacion actualizada, busca al usuario cuya "id" corresponda 
     * con $id y actualiza al usuario con la nueva informacion. Ademas manda un mensaje
     * de feedback informando de que la operacion se ha realizado exitosamente.</p>
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $info = $request->all();
        $user=User::findOrFail($id);
        $user->update($info);

        Session::flash ('feedbackUsu', 'Usuario modificado con exito');

        return redirect('/admin/users');
    }

    /**
     * Borra a un usuario de la base de datos.
     * 
     * <p>Primero busca al usuario cuya "id" corresponda con $id, despues elimina el
     * registro de la base de datos y por ultimo envia un mensaje de feedback informando
     * del exito de la operación.</p>
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {        
        $user=User::findOrFail($id);
        $user->delete();

        Session::flash ('feedbackUsu', 'Usuario eliminado con exito');

        return redirect('/admin/users');
    }
}
