<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    //METODO PARA MOSTRAR LA VISTA MODO ADMINISTRADOR
    public function admin(): View
    {
        $titulo = "Inicio"; //Titulo para cada módulo
        // Retorna la vista 'view/admin/index' y pasa la variable $titulo para ser utilizada en la vista
        return view('admin.index', ['titulo' => $titulo]);
    }

    //METODO PARA MOSTRAR LA VISTA MODO EMPLEADO
    public function emple(): View
    {
        $titulo = "Inicio"; //Titulo para cada módulo
        // Retorna la vista 'view/empleado/index' y pasa la variable $titulo para ser utilizada en la vista
        return view('emple.index', ['titulo' => $titulo]);
    }
}