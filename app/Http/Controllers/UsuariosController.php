<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UsuariosController extends Controller
{
    //Muestra la vista para listar todos los Usuarios
    public function index(): View
    {
        $titulo = "Usuarios"; //Titulo que indica el módulo
        $usuarios = User::latest()->get(); // Obtener todos los usuarios
        return view('admin.usuarios.listar', ['titulo' => $titulo, 'usuarios' => $usuarios]);
    }


    //Muestra el formulario para crear un nuevo usuario
    public function create(): View
    {
        $titulo = "Registrar Usuarios"; //Titulo que indica el módulo
        // Mostrar el formulario para crear un nuevo usuario
        return view('admin.usuarios.form', ['titulo' => $titulo]);
    }


    //Permite crear registros
    public function store(Request $request)
    {
        // Crea un nuevo registro de Usuario utilizando los datos recibidos en la solicitud
        User::create($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Muestra el formulario para editar informacion mediante su id
    public function edit(User $usuario): View
    {
        $titulo = "Actualizar Usuarios"; // Titulo que indica el módulo
        return view('admin.usuarios.editar', ['titulo' => $titulo, 'usuario' => $usuario]);
    }


    //Actualiza la información
    public function update(Request $request, User $usuario)
    {
        // Actualiza el registro de usuarios utilizando los datos recibidos en la solicitud
        $usuario->update($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }
}