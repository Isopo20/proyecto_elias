<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Incluyo el modelo para poder ser utilizado en el controlador
use App\Models\Usuarios;
// Esta clase sirve para manejar los datos de la sesión del usuario
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    function index(){
        // Listar todos los registros de los alumnos
        $datos = array();
        $datos['registros'] = Usuarios::all();
        return view('usuarios.listado')->with($datos);
    }

    function formulario($id = 0){
        $datos = array();
        if($id == 0){
            // Agregar
            $datos['usuario'] = new Usuarios();
            $datos['operacion'] = 'Agregar';
        } else {
            // Editar
            $datos['usuario'] = Usuarios::find($id);
            $datos['operacion'] = 'Modificar';
        }

        return view('usuarios.formulario')->with($datos);
    }

    function save(Request $r){
        // 1.-Recupero toda la información de la petición
        $context = $r->all();
        switch($context['operacion']){
            case 'Agregar':
                $usuario = new Usuarios();
                $usuario->nombre = $context['nombre'];
                $usuario->password = $context['password'];
                $usuario->save();
                break;
            case 'Modificar':
                $usuario = Usuarios::find($context['id']);
                $usuario->nombre = $context['nombre'];
                $usuario->password = $context['password'];
                $usuario->save();
                break;
            case 'Eliminar':
                $usuario = Usuarios::find($context['id']);
                $usuario->delete();
                break;
        }
        return redirect()->route('index_usuarios');
    }
}
