<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ProductoController extends Controller
{
    //Muestra la vista para listar todas las categorías.
    public function index(): View
    {
        $titulo = "Productos"; //Titulo que indica el módulo
        $producto = Producto::latest()->get(); // Obtener todas los Productos
        return view('admin.productos.listar', ['titulo' => $titulo, 'producto' => $producto]);
    }


    //Muestra el formulario para crear un nuevo producto
    public function create(): View
    {
        $titulo = "Registrar Producto"; //Titulo que indica el módulo
        // Mostrar el formulario para crear un nuevo producto
        return view('admin.productos.form', ['titulo' => $titulo]);
    }


    //Permite crear registros
    public function store(Request $request)
    {
        // Crea un nuevo registro de Productos utilizando los datos recibidos en la solicitud
        Producto::create($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Muestra el formulario para editar informacion mediante su id
    public function edit(Producto $producto): View
    {
        $titulo = "Actualizar Producto"; // Titulo que indica el módulo
        return view('admin.productos.editar', ['titulo' => $titulo, 'producto' => $producto]);
    }


    //Actualiza la información
    public function update(Request $request, Producto $producto)
    {
        // Actualiza el registro de productos utilizando los datos recibidos en la solicitud
        $producto->update($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Eliminar el producto seleccionado mediante su id
    public function destroy($id): JsonResponse
    {
        Producto::destroy($id);
        return response()->json(['success' => true, 'message' => 'Producto eliminado exitosamente']);
    }
}