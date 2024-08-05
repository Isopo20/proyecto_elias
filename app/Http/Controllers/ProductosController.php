<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Incluyo el modelo para poder ser utilizado en el controlador
use App\Models\Productos;
// Esta clase sirve para manejar los datos de la sesión del usuario
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    function index(){
        // Listar todos los registros de los alumnos
        $datos = array();
        $datos['registros'] = Productos::all();
        return view('productos.listado')->with($datos);
    }

    function formulario($id = 0){
        $datos = array();
        if($id == 0){
            // Agregar
            $datos['producto'] = new Productos();
            $datos['operacion'] = 'Agregar';
        } else {
            // Editar
            $datos['producto'] = Productos::find($id);
            $datos['operacion'] = 'Modificar';
        }

        return view('productos.formulario')->with($datos);
    }

    function save(Request $r){
        // 1.-Recupero toda la información de la petición
        $context = $r->all();
        switch($context['operacion']){
            case 'Agregar':
                $producto = new Productos();
                $producto->nombre = $context['nombre'];
                $producto->save();
                break;
            case 'Modificar':
                $producto = Productos::find($context['id']);
                $producto->nombre = $context['nombre'];
                $producto->save();
                break;
            case 'Eliminar':
                $producto = Productos::find($context['id']);
                $producto->delete();
                break;
        }
        return redirect()->route('index_productos');
    }
}