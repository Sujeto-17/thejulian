<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ClientesEmpleController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PedidosEmpleController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\VentasEmpleController;
use App\Http\Controllers\UsuariosController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
      return view('index');
});

//---------------- ADMINISTRADOR ------------
// Rutas para el modo admin
Route::group(['prefix' => 'admin'], function () {
      Route::get('/', [HomeController::class, 'admin'])->name('admin.index');
      Route::resource('/clientes', ClientesController::class)->names([
            'index' => 'admin.clientes.listar'
      ]);
      Route::resource('/pedidos', PedidosController::class)->names([
            'index' => 'admin.pedidos.listar'
      ]);
      Route::resource('/ventas', VentasController::class)->names([
            'index' => 'admin.ventas.listar'
      ]);
      Route::resource('/categorias', CategoriaController::class)->names([
            'index' => 'admin.categorias.listar'
      ]);
      Route::resource('/empleados', EmpleadosController::class)->names([
            'index' => 'admin.empleados.listar'
      ]);
      Route::resource('/metodoPago', MetodoPagoController::class)->names([
            'index' => 'admin.metodoPago.listar'
      ]);
      Route::resource('/productos', ProductoController::class)->names([
            'index' => 'admin.productos.listar'
      ]);
      Route::resource('/sucursal', SucursalController::class)->names([
            'index' => 'admin.sucursal.listar'
      ]);
      Route::resource('/usuarios', UsuariosController::class)->names([
            'index' => 'admin.usuarios.listar'
      ]);
});


// Rutas para el modo emple
Route::group(['prefix' => 'emple'], function () {
      Route::get('/', [HomeController::class, 'emple'])->name('emple.index');
      Route::resource('/clientes', ClientesEmpleController::class)->names([
            'index' => 'emple.clientes.listar'
      ]);
      Route::resource('/pedidos', PedidosEmpleController::class)->names([
            'index' => 'emple.pedidos.listar'
      ]);
      Route::resource('/ventas', VentasEmpleController::class)->names([
            'index' => 'emple.ventas.listar'
      ]);
});