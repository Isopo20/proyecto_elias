<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Incluyo el modelo para poder ser utilizado en el controlador
use App\Models\Sucursales;
// Esta clase sirve para manejar los datos de la sesión del usuario
use Illuminate\Support\Facades\Auth;

class SucursalesController extends Controller
{
    function index(){
        // Listar todos los registros de los alumnos
        $datos = array();
        $datos['registros'] = Sucursales::all();
        return view('sucursal.listado')->with($datos);
    }

    function formulario($id = 0){
        $datos = array();
        if($id == 0){
            // Agregar
            $datos['sucursal'] = new Sucursales();
            $datos['operacion'] = 'Agregar';
        } else {
            // Editar
            $datos['sucursal'] = Sucursales::find($id);
            $datos['operacion'] = 'Modificar';
        }

        return view('sucursal.formulario')->with($datos);
    }

    function save(Request $r){
        // 1.-Recupero toda la información de la petición
        $context = $r->all();
        switch($context['operacion']){
            case 'Agregar':
                $sucursal = new Sucursales();
                $sucursal->nombre = $context['nombre'];
                $sucursal-> direccion = $context['direccion'];
                $sucursal->save();
                break;
            case 'Modificar':
                $sucursal = Sucursales::find($context['id']);
                $sucursal->nombre = $context['nombre'];
                $sucursal-> direccion = $context['direccion'];
                $sucursal->save();
                break;
            case 'Eliminar':
                $sucursal = Sucursales::find($context['id']);
                $sucursal->delete();
                break;
        }
        return redirect()->route('index_sucursales');
    }
}