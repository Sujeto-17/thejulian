<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class MetodoPagoController extends Controller
{
    //Muestra la vista para listar todas los metodos de pago.
    public function index(): View
    {
        $titulo = "Métodos de Pago"; //Titulo que indica el módulo
        $metodoPago = MetodoPago::latest()->get(); // Obtener todas las metodos de pago
        return view('admin.metodoPago.listar', ['titulo' => $titulo, 'metodoPago' => $metodoPago]);
    }


    //Muestra el formulario para crear un nuevo metodo de pago.
    public function create(): View
    {
        $titulo = "Registrar Métodos de Pago"; //Titulo que indica el módulo
        // Mostrar el formulario para crear un nuevo metodo de pago
        return view('admin.metodoPago.form', ['titulo' => $titulo]);
    }


    //Permite crear registros
    public function store(Request $request)
    {
        // Crea un nuevo registro de Metodo de pago utilizando los datos recibidos en la solicitud
        MetodoPago::create($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Muestra el formulario para editar informacion mediante su id
    public function edit(MetodoPago $metodoPago): View
    {
        $titulo = "Actualizar Método de Pago"; // Titulo que indica el módulo
        return view('admin.metodoPago.editar', ['titulo' => $titulo, 'metodoPago' => $metodoPago]);
    }


    //Actualiza la información
    public function update(Request $request, MetodoPago $metodoPago)
    {
        // Actualiza el registro de Metodo de pago utilizando los datos recibidos en la solicitud
        $metodoPago->update($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Eliminar el metodo de pago seleccionada mediante su id
    public function destroy($id): JsonResponse
    {
        MetodoPago::destroy($id);
        return response()->json(['success' => true, 'message' => 'Método de Pago eliminado exitosamente']);
    }
}