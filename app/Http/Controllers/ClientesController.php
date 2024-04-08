<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\EntidadFederativa;
use App\Models\RegimenFiscal;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientesController extends Controller
{
    //Muestra la vista para listar todas los Clientes
    public function index(): View
    {
        $titulo = "Clientes"; //Titulo que indica el módulo
        $clientes = Cliente::latest()->get(); // Obtener todas los clientes
        return view('admin.clientes.listar', ['titulo' => $titulo, 'clientes' => $clientes]);
    }


    //Muestra el formulario para crear un nuevo Cliente
    public function create(): View
    {
        $titulo = "Registrar Clientes"; //Titulo que indica el módulo
        $entidadesFederativas = EntidadFederativa::all(); //Obtiene todas las entidades Federativas
        $regimenFiscal = RegimenFiscal::all(); //Obtiene todos los regimen fiscales
        // Mostrar el formulario para crear un nuevo Cliente
        return view('admin.clientes.form', ['titulo' => $titulo, 'entidadesFederativas' => $entidadesFederativas, 'regimenFiscal' => $regimenFiscal]);
    }


    //Permite crear registros
    public function store(Request $request)
    {
        // Crea un nuevo registro de Clientes utilizando los datos recibidos en la solicitud
        Cliente::create($request->all());

        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Muestra el formulario para editar informacion mediante su id
    public function edit(Cliente $cliente): View
    {
        $titulo = "Actualizar Datos del Cliente"; // Titulo que indica el módulo
        $entidadesFederativas = EntidadFederativa::all(); //Obtener todas las entidades Federativas
        $regimenFiscal = RegimenFiscal::all(); //Obtener todos los regimen fiscales
        return view('admin.clientes.editar', ['titulo' => $titulo, 'cliente' => $cliente, 'entidadesFederativas' => $entidadesFederativas, 'regimenFiscal' => $regimenFiscal]);
    }


    //Actualiza la información
    public function update(Request $request, Cliente $cliente)
    {
        // Verifica si el checkbox fue marcado o no y ajusta el valor del campo factura
        $request->merge(['factura' => $request->has('factura') ? true : false]);

        // Actualiza el registro de Clientes utilizando los datos recibidos en la solicitud
        $cliente->update($request->all());

        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }
}