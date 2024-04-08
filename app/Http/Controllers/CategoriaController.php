<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    //Muestra la vista para listar todas las categorías.
    public function index(): View
    {
        $titulo = "Categorias"; //Titulo que indica el módulo
        $categorias = Categoria::latest()->get(); // Obtener todas las categorías
        return view('admin.categorias.listar', ['titulo' => $titulo, 'categorias' => $categorias]);
    }


    //Muestra el formulario para crear una nueva categoría.
    public function create(): View
    {
        $titulo = "Registrar Categoria"; //Titulo que indica el módulo
        // Mostrar el formulario para crear una nueva categoría
        return view('admin.categorias.form', ['titulo' => $titulo]);
    }


    //Permite crear registros
    public function store(Request $request)
    {
        // Crea un nuevo registro de Categoria utilizando los datos recibidos en la solicitud
        Categoria::create($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Muestra el formulario para editar informacion mediante su id
    public function edit(Categoria $categoria): View
    {
        $titulo = "Actualizar Categoria"; // Titulo que indica el módulo
        return view('admin.categorias.editar', ['titulo' => $titulo, 'categoria' => $categoria]);
    }


    //Actualiza la información
    public function update(Request $request, Categoria $categoria)
    {
        // Actualiza el registro de categoria utilizando los datos recibidos en la solicitud
        $categoria->update($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Eliminar la categoria seleccionada mediante su id
    public function destroy($id): JsonResponse
    {
        Categoria::destroy($id);
        return response()->json(['success' => true, 'message' => 'Categoría eliminada exitosamente']);
    }
}