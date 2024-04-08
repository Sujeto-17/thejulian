@extends('layout.emple')

@section('main_content')
<div class="row mt-4 text-center">
    <!-- CARTA PARA PEDIDOS -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <a href="{{ route('emple.pedidos.listar') }}"><img src="{{ asset('img/firma.png') }}" class="mx-auto pt-3" width="150px" alt="Pedidos"></a>
            <div class="card-body">
                <h5 class="card-title">Pedidos</h5>
                <p class="card-text">Consulta o modifica los pedidos pendientes o entregados</p>
                <a href="{{ route('emple.pedidos.listar') }}" class="text-decoration-none link-danger fw-bold">Pedidos</a>
            </div>
        </div>
    </div>
    <!-- FIN CARTA PARA PEDIDOS -->


    <!-- CARTA PARA VENTAS -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <a href="{{ route('emple.ventas.listar') }}"><img src="{{ asset('img/bolsa.png') }}" class="mx-auto pt-3" width="150px" alt="Ventas"></a>
            <div class="card-body">
                <h5 class="card-title">Ventas</h5>
                <p class="card-text">Realiza ventas de productos ya existentes</p>
                <a href="{{ route('emple.ventas.listar') }}" class="text-decoration-none link-danger fw-bold">Ventas</a>
            </div>
        </div>
    </div>


    <!-- CARTA PARA CLIENTES -->
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <a href="{{ route('emple.clientes.listar') }}"><img src="{{ asset('img/cliente.png') }}" class="mx-auto pt-3" width="150px" alt="Clientes"></a>
            <div class="card-body">
                <h5 class="card-title">Clientes</h5>
                <p class="card-text">Utiliza esta función para introducir y gestionar los registros de nuevos clientes en el sistema</p>
                <a href="{{ route('emple.clientes.listar') }}" class="text-decoration-none link-danger fw-bold">Clientes</a>
            </div>
        </div>
    </div>
    <!-- FIN CARTA PARA CLIENTES -->
</div>
@endsection