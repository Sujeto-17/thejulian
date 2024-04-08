<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\EntidadFederativa;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class SucursalController extends Controller
{
    //Muestra la vista para listar todas las sucursales.
    public function index(): View
    {
        $titulo = "Sucursal"; // Título que indica el módulo
        // Obtener todas las sucursales con la relación entidadFederativa cargada
        $sucursal = Sucursal::with('entidadFederativa')->latest()->get();
        return view('admin.sucursal.listar', ['titulo' => $titulo, 'sucursal' => $sucursal]);
    }


    //Muestra el formulario para crear una nueva sucursal.
    public function create(): View
    {
        $titulo = "Registrar Sucursal"; //Titulo que indica el módulo
        $entidadesFederativas = EntidadFederativa::all(); //Obtiene todas las entidades Federativas

        // Mostrar el formulario para crear una nueva sucursal
        return view('admin.sucursal.form', ['titulo' => $titulo, 'entidadesFederativas' => $entidadesFederativas]);
    }


    //Permite crear registros
    public function store(Request $request)
    {
        // Crea un nuevo registro de Sucursal utilizando los datos recibidos en la solicitud
        Sucursal::create($request->all());

        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Muestra el formulario para editar informacion mediante su id
    public function edit(Sucursal $sucursal): View
    {
        $titulo = "Actualizar Sucursal"; // Titulo que indica el módulo
        $entidadesFederativas = EntidadFederativa::all();
        return view('admin.sucursal.editar', ['titulo' => $titulo, 'sucursal' => $sucursal, 'entidadesFederativas' => $entidadesFederativas]);
    }


    //Actualiza la información
    public function update(Request $request, Sucursal $sucursal)
    {
        // Actualiza el registro de sucursal utilizando los datos recibidos en la solicitud
        $sucursal->update($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Eliminar la sucursal seleccionada mediante su id
    public function destroy($id): JsonResponse
    {
        Sucursal::destroy($id);
        return response()->json(['success' => true, 'message' => 'Sucursal eliminada exitosamente']);
    }
}