<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\MetodoPago;
use App\Models\Status;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PedidosController extends Controller
{
    //Muestra la vista para listar todos los pedidos
    public function index(): View
    {
        $titulo = "Pedidos"; // Título que indica el módulo

        // Obtener todos los pedidos con las relaciones necesarias
        $pedidos = Pedido::with(['cliente', 'empleado', 'producto', 'metodoPago', 'status'])->latest()->get();

        return view('admin.pedidos.listar', ['titulo' => $titulo, 'pedidos' => $pedidos]);
    }


    //Muestra el formulario para crear un nuevo pedido
    public function create(): View
    {
        $titulo = "Registrar Pedido"; //Titulo que indica el módulo
        $clientes = Cliente::all(); //Obtiene todos los clientes
        $empleados = Empleado::all(); //Obtiene todos los empleados
        $productos = Producto::all(); //Obtiene todos los Productos
        $metodoPago = MetodoPago::all(); //Obtiene todos los Metodos de Pago
        $status = Status::all(); //Obtiene todos los Status

        // Mostrar el formulario para crear un nuevo pedido
        return view('admin.pedidos.form', ['titulo' => $titulo, 'clientes' => $clientes, 'empleados' => $empleados, 'productos' => $productos, 'metodoPago' => $metodoPago, 'status' => $status]);
    }


    //Permite crear registros
    public function store(Request $request)
    {
        // Crea un nuevo registro de Pedidos utilizando los datos recibidos en la solicitud
        Pedido::create($request->all());

        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }


    //Muestra el formulario para mostrar la informacion mediante su id
    public function edit(Pedido $pedido): View
    {
        $titulo = "Actualizar Pedido"; // Titulo que indica el módulo
        $clientes = Cliente::all(); //Obtiene todos los clientes
        $empleados = Empleado::all(); //Obtiene todos los empleados
        $productos = Producto::all(); //Obtiene todos los Productos
        $metodoPago = MetodoPago::all(); //Obtiene todos los Metodos de Pago
        $status = Status::all(); //Obtiene todos los Status
        
        return view('admin.pedidos.editar', ['titulo' => $titulo, 'pedido' => $pedido, 'clientes' => $clientes, 'empleados' => $empleados, 'productos' => $productos, 'metodoPago' => $metodoPago, 'status' => $status]);
    }


    //Actualiza la información
    public function update(Request $request, Pedido $pedido)
    {
        // Actualiza el registro de un Pedido utilizando los datos recibidos en la solicitud
        $pedido->update($request->all());
        // Retorna una respuesta JSON indicando que la operación fue exitosa
        return response()->json(['success' => true]);
    }
}