<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmpleadosController extends Controller
{
    //Muestra la vista para listar todas los Empleados
    public function index(): View
    {
        $titulo = "Empleados"; // Título que indica el módulo
        // Obtener todas los Empleados con la relación Categorias
        $empleados = Empleado::with('categoria')->latest()->get();
        return view('admin.empleados.listar', ['titulo' => $titulo, 'empleados' => $empleados]);
    }


    //Muestra el formulario para crear un nuevo Empleado
    public function create(): View
    {
        $titulo = "Registrar Nuevo Empleado"; //Titulo que indica el módulo
        $categorias = Categoria::all();

        // Mostrar el formulario para crear un nuevo Empleado
        return view('admin.empleados.form', ['titulo' => $titulo, 'categorias' => $categorias]);
    }


    //Permite crear registros
    public function store(Request $request)
    {
        // Crea un nuevo registro de Empleados utilizando los datos recibidos en la solicitud
        Empleado::create($request->all());

        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Muestra el formulario para editar informacion mediante su id
    public function edit(Empleado $empleado): View
    {
        $titulo = "Actualizar Datos del Empleados"; // Titulo que indica el módulo
        $categorias = Categoria::all();
        return view('admin.empleados.editar', ['titulo' => $titulo, 'empleado' => $empleado, 'categorias' => $categorias]);
    }


    //Actualiza la información
    public function update(Request $request, Empleado $empleado)
    {
        // Actualiza el registro de un Empleado utilizando los datos recibidos en la solicitud
        $empleado->update($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }
}