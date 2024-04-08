<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\MetodoPago;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VentasController extends Controller
{
    //Muestra la vista para listar todas los Ventas
    public function index(): View
    {
        $titulo = "Ventas"; // Título que indica el módulo
        // Obtener todas las Ventas con la relación Empleados
        $ventas = Venta::with('empleado')->latest()->get();
        return view('admin.ventas.listar', ['titulo' => $titulo, 'ventas' => $ventas]);
    }


    //Muestra el formulario para crear una nueva venta
    public function create(): View
    {
        $titulo = "Registrar Venta"; //Titulo que indica el módulo
        $empleados = Empleado::all(); //Obtiene todos los empleados
        $productos = Producto::all(); //Obtiene todos los Productos
        $metodoPago = MetodoPago::all(); //Obtiene todos los Metodos de Pago

        // Mostrar el formulario para crear una nueva venta
        return view('admin.ventas.form', ['titulo' => $titulo, 'empleados' => $empleados, 'productos' => $productos, 'metodoPago' => $metodoPago]);
    }


    //Permite crear registros
    public function store(Request $request)
    {
        // Crea un nuevo registro de Ventas utilizando los datos recibidos en la solicitud
        Venta::create($request->all());

        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Muestra el formulario para mostrar la informacion mediante su id
    public function edit(Venta $venta): View
    {
        $titulo = "Actualizar venta"; // Titulo que indica el módulo
        $empleados = Empleado::all(); //Obtiene todos los empleados
        $productos = Producto::all(); //Obtiene todos los Productos
        $metodoPago = MetodoPago::all(); //Obtiene todos los Metodos de Pago
        
        return view('admin.ventas.editar', ['titulo' => $titulo, 'venta' => $venta, 'productos' => $productos, 'metodoPago' => $metodoPago, 'empleados' => $empleados]);
    }


    //Actualiza la información
    public function update(Request $request, Venta $venta)
    {
        // Actualiza el registro de una venta utilizando los datos recibidos en la solicitud
        $venta->update($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }
}