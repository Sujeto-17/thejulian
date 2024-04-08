@extends('layout.admin')

@section('main_content')
    <!-- BOTON NUEVO PRODUCTO -->
    <div class="col-sm-3 ps-5 my-4">
        <a href="{{ route('productos.create') }}" class="btn btn-success">
            <i class="bi bi-plus-square"></i> Nuevo Producto</a>
    </div>
    <!-- FIN BOTON NUEVO PRODUCTO -->

    <!-- TABLAS PRODUCTO -->
    <div class="col-sm-12 ps-5 pe-4">
        <table class="table table-bordered table-striped" id="MiTabla">
            <thead class="text-center">
                <th>#</th>
                <th>Nombre del Producto</th>
                <th>Precio</th>
                <th>Acciones</th>
            </thead>
            <tbody class="text-center">
                @foreach ($producto as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->productos }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-success btn-sm"
                                data-bs-toggle="tooltip" data-bs-title="Editar datos">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                style="display: inline;" id="formEliminar{{ $producto->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmarEliminacion('{{ $producto->id }}')" data-bs-toggle="tooltip"
                                    data-bs-title="Eliminar Productos">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- FIN TABLAS PRODUCTO -->

    <!-- Script para confirmar eliminación de producto -->
    <script>
        // Función para confirmar la eliminación de un producto
        function confirmarEliminacion(productoId) {
            // Obtiene el formulario de eliminación utilizando el ID
            var formulario = document.getElementById('formEliminar' + productoId);

            // Muestra un diálogo de confirmación utilizando SweetAlert
            Swal.fire({
                title: '¿Estás seguro de eliminar este Producto?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                // Si el usuario confirma la eliminación
                if (result.isConfirmed) {
                    // Realiza una solicitud fetch para enviar los datos del formulario de eliminación
                    fetch(formulario.action, {
                            method: formulario.method, // Método HTTP (POST, GET, etc.)
                            body: new FormData(formulario) // Datos del formulario
                        })
                        .then(response => {
                            // Si la respuesta del servidor no es exitosa, lanza un error
                            if (!response.ok) {
                                throw new Error('Error al eliminar el producto');
                            }
                            // Parsea la respuesta como JSON y la retorna
                            return response.json();
                        })
                        .then(data => {
                            // Si la eliminación fue exitosa
                            if (data.success) {
                                // Muestra un mensaje de éxito usando SweetAlert
                                Swal.fire({
                                    title: '¡Eliminado!',
                                    text: data.message,
                                    icon: 'success'
                                });
                                // Elimina la fila de la tabla correspondiente al producto eliminado
                                formulario.closest('tr').remove();
                            } else {
                                // Si la eliminación no fue exitosa, lanza un error
                                throw new Error(data.message || 'Error al eliminar el producto');
                            }
                        })
                        .catch(error => {
                            // Si ocurre un error durante la eliminación, muestra un mensaje de error
                            Swal.fire({
                                title: '¡Error!',
                                text: error.message,
                                icon: 'error'
                            });
                        });
                }
            });
        }
    </script>
@endsection
