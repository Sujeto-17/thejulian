@extends('layout.admin')

@section('main_content')
    <!-- BOTON NUEVO CLIENTES -->
    <div class="col-sm-3 ps-5 my-4">
        <a href="{{ route('clientes.create') }}" class="btn btn-success">
            <i class="bi bi-plus-square"></i> Nuevo Cliente</a>
    </div>
    <!-- FIN BOTON NUEVO CLIENTES -->

    <!-- TABLAS CLIENTES -->
    <div class="col-sm-12 ps-5 pe-4">
        <table class="table table-bordered table-striped" id="MiTabla">
            <thead class="text-center">
                <th>#</th>
                <th>RFC</th>
                <th>Nombre/Razón Social</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Factura</th>
                <th>Acciones</th>
            </thead>
            <tbody class="text-center">
                @foreach ($clientes as $clientes)
                    <tr>
                        <td>{{ $clientes->id }}</td>
                        <td>{{ $clientes->rfc }}</td>
                        <td>{{ $clientes->razonSocial ?: $clientes->nombre }}</td>
                        <td>{{ $clientes->telefono }}</td>
                        <td>{{ $clientes->correo }}</td>
                        <td></td>
                        <td>
                            <a href="{{ route('clientes.edit', $clientes->id) }}" class="btn btn-success btn-sm"
                                data-bs-toggle="tooltip" data-bs-title="Editar datos">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- FIN TABLAS CLIENTES -->
@endsection
