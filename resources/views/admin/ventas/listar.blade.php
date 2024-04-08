@extends('layout.admin')

@section('main_content')
    <!-- BOTON NUEVA VENTA -->
    <div class="col-sm-3 ps-5 my-4">
        <a href="{{ route('ventas.create') }}" class="btn btn-success">
            <i class="bi bi-plus-square"></i> Nueva Venta</a>
    </div>
    <!-- FIN BOTON NUEVA VENTA -->

    <!-- TABLAS VENTA -->
    <div class="col-sm-12 ps-5 pe-4">
        <table class="table table-bordered table-striped" id="MiTabla">
            <thead class="text-center">
                <th>#</th>
                <th>Empleado</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
                <th>Acciones</th>
            </thead>
            <tbody class="text-center">
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->empleado->nombres . ' ' . $venta->empleado->apellidos }}</td>
                        <td>{{ $venta->producto->productos }}</td>
                        <td>{{ $venta->cantidad }}</td>
                        <td>{{ $venta->precio }}</td>
                        <td>{{ $venta->total }}</td>
                        <td>
                            <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-success btn-sm"
                                data-bs-toggle="tooltip" data-bs-title="Editar datos">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
    <!-- FIN TABLAS VENTA -->
@endsection
