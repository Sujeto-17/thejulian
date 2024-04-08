@extends('layout.admin')

@section('main_content')
<div class="row mt-4 text-center">
    <!-- CARTA PARA PEDIDOS -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <a href="{{ route('admin.pedidos.listar') }}"><img src="{{ asset('img/firma.png') }}" class="mx-auto pt-3" width="150px" alt="Pedidos"></a>
            <div class="card-body">
                <h5 class="card-title">Pedidos</h5>
                <p class="card-text">Consulta o modifica los pedidos pendientes o entregados</p>
                <a href="{{ route('admin.pedidos.listar') }}" class="text-decoration-none link-danger fw-bold">Pedidos</a>
            </div>
        </div>
    </div>
    <!-- FIN CARTA PARA PEDIDOS -->


    <!-- CARTA PARA VENTAS -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <a href="{{ route('admin.ventas.listar') }}"><img src="{{ asset('img/bolsa.png') }}" class="mx-auto pt-3" width="150px" alt="Ventas"></a>
            <div class="card-body">
                <h5 class="card-title">Ventas</h5>
                <p class="card-text">Realiza ventas de productos ya existentes</p>
                <a href="{{ route('admin.ventas.listar') }}" class="text-decoration-none link-danger fw-bold">Ventas</a>
            </div>
        </div>
    </div>


    <!-- CARTA PARA CLIENTES -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <a href="{{ route('admin.clientes.listar') }}"><img src="{{ asset('img/cliente.png') }}" class="mx-auto pt-3" width="150px" alt="Clientes"></a>
            <div class="card-body">
                <h5 class="card-title">Clientes</h5>
                <p class="card-text">Utiliza esta función para introducir y gestionar los registros de nuevos clientes en el sistema</p>
                <a href="{{ route('admin.clientes.listar') }}" class="text-decoration-none link-danger fw-bold">Clientes</a>
            </div>
        </div>
    </div>
    <!-- FIN CARTA PARA CLIENTES -->
</div>


<div class="row text-center">
    <!-- CARTA PARA EMPLEADOS -->
    <div class="col-md-4">
        <div class="card h-100">
            <a href="{{ route('admin.empleados.listar') }}"><img src="{{ asset('img/empleados.png') }}" class="mx-auto pt-3" width="150px" alt="Empleados"></a>
            <div class="card-body">
                <h5 class="card-title">Empleados</h5>
                <p class="card-text">Registra nuevos empleados y asignales en que sucursal se encontrarán</p>
                <a href="{{ route('admin.empleados.listar') }}" class="text-decoration-none link-danger fw-bold">Empleados</a>
            </div>
        </div>
    </div>
    <!-- FIN CARTA PARA EMPLEADOS -->


    <!-- CARTA PARA USUARIOS -->
    <div class="col-md-4">
        <div class="card h-100">
            <a href="{{ route('admin.usuarios.listar') }}"><img src="{{ asset('img/usuario.png') }}" class="mx-auto pt-3" width="150px" alt="Usuarios"></a>
            <div class="card-body">
                <h5 class="card-title">Módelo de Usuarios</h5>
                <p class="card-text">Administra la inscripción de nuevos miembros y la asignación de funciones</p>
                <a href="{{ route('admin.usuarios.listar') }}" class="text-decoration-none link-danger fw-bold">Usuarios</a>
            </div>
        </div>
    </div>
    <!-- FIN CARTA PARA USUARIOS -->

    
    <!-- CARTA PARA OTROS -->
    <div class="col-md-4">
        <div class="card h-100">
            <img src="{{ asset('img/ajustes.png') }}" class="mx-auto pt-3" width="150px" alt="Otras configuraciones">
            <div class="card-body">
                <h5 class="card-title">Otras configuraciones</h5>
                <p class="card-text">Permite realizar otras funciones del sistema</p>
                <a href="{{ route('admin.productos.listar') }}" class="text-decoration-none link-danger fw-bold">Productos</a><br>
                <a href="{{ route('admin.categorias.listar') }}" class="text-decoration-none link-danger fw-bold">Categorías</a><br>
                <a href="{{ route('admin.sucursal.listar') }}" class="text-decoration-none link-danger fw-bold">Sucursal</a><br>
                <a href="{{ route('admin.metodoPago.listar') }}" class="text-decoration-none link-danger fw-bold">Métodos de pago</a>
            </div>
        </div>
    </div>
    <!-- FIN CARTA PARA OTROS -->
@endsection