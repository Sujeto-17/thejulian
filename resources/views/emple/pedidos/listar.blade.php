@extends('layout.emple')

@section('main_content')
    <!-- BOTON NUEVO PEDIDO -->
    <div class="col-sm-3 ps-5 my-4">
        <a href="{{ route('pedidos.create') }}" class="btn btn-success">
            <i class="bi bi-plus-square"></i> Nuevo Pedido</a>
    </div>
    <!-- FIN BOTON NUEVO PEDIDO -->

    <!-- TABLAS PEDIDO -->
    <div class="col-sm-12 ps-5 pe-4">
        <table class="table table-bordered table-striped" id="MiTabla">
            <thead class="text-center">
                <th>#</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Total</th>
                <th>Status</th>
                <th>Factura</th>
                <th>Acciones</th>
            </thead>
            <tbody class="text-center">
                @foreach ($pedidos as $pedidos)
                    <tr>
                        <td>{{ $pedidos->id }}</td>
                        <td>
                            @if (!empty($pedidos->cliente->razonSocial))
                                {{ $pedidos->cliente->razonSocial }}
                            @else
                                {{ $pedidos->cliente->nombre . ' ' . $pedidos->cliente->apellido }}
                            @endif
                        </td>
                        <td>{{ $pedidos->producto->productos }}</td>
                        <td>{{ $pedidos->total }}</td>
                        <td>{{ $pedidos->status->statusActual }}</td>
                        <td>
                            @if ($pedidos->factura)
                                <a class="text-primary"><i class="bi bi-check-square"></i></a>
                            @else
                                <a class="text-secondary"><i class="bi bi-square"></i></a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pedidos.edit', $pedidos->id) }}" class="btn btn-success btn-sm"
                                data-bs-toggle="tooltip" data-bs-title="Editar datos">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- FIN TABLAS PEDIDO -->
@endsection
