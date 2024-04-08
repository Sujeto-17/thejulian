@extends('layout.admin')

@section('main_content')
    <!-- BOTON NUEVO EMPLEADO -->
    <div class="col-sm-3 ps-5 my-4">
        <a href="{{ route('empleados.create') }}" class="btn btn-success">
            <i class="bi bi-plus-square"></i> Nuevo Empleado</a>
    </div>
    <!-- FIN BOTON NUEVO EMPLEADO -->

    <!-- TABLAS EMPLEADOS -->
    <div class="col-sm-12 ps-5 pe-4">
        <table class="table table-bordered table-striped" id="MiTabla">
            <thead class="text-center">
                <th>#</th>
                <th>Nombre del Empleado</th>
                <th>Correo Electrónico</th>
                <th>Categoría</th>
                <th>Status</th>
                <th>Acciones</th>
            </thead>
            <tbody class="text-center">
                @foreach ($empleados as $empleados)
                    <tr>
                        <td>{{ $empleados->id }}</td>
                        <td>{{ $empleados->nombres  . ' ' . $empleados->apellidos}}</td>
                        <td>{{ $empleados->correo }}</td>
                        <td>{{ $empleados->categoria->nombreCategoria}}</td>
                        <td>{{ $empleados->status }}</td>
                        <td>
                            <a href="{{ route('empleados.edit', $empleados->id) }}" class="btn btn-success btn-sm"
                                data-bs-toggle="tooltip" data-bs-title="Editar datos">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- FIN TABLAS EMPLEADOS -->
@endsection