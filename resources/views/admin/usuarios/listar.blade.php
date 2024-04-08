@extends('layout.admin')

@section('main_content')
    <!-- BOTON NUEVA USUARIO -->
    <div class="col-sm-3 ps-5 my-4">
        <a href="" class="btn btn-success">
            <i class="bi bi-plus-square"></i> Nuevo Usuario</a>
    </div>
    <!-- FIN BOTON NUEVA USUARIO -->

    <!-- TABLAS USUARIO -->
    <div class="col-sm-12 ps-5 pe-4">
        <table class="table table-bordered table-striped" id="MiTabla">
            <thead class="text-center">
                <th>#</th>
                <th>Nombre Completo</th>
                <th>Correo Electrónico</th>
                <th>Status</th>
                <th>Acciones</th>
            </thead>
            <tbody class="text-center">
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->status }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-success btn-sm"
                                data-bs-toggle="tooltip" data-bs-title="Editar datos">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- FIN TABLAS USUARIO -->
@endsection
