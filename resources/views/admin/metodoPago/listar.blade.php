@extends('layout.admin')

@section('main_content')
    <!-- BOTON NUEVO METODO DE PAGO -->
    <div class="col-sm-3 ps-5 my-4">
        <a href="{{ route('metodoPago.create') }}" class="btn btn-success">
            <i class="bi bi-plus-square"></i> Nuevo Método de Pago</a>
    </div>
    <!-- FIN BOTON NUEVO METODO DE PAGO -->

    <!-- TABLAS METODO DE PAGO -->
    <div class="col-sm-12 ps-5 pe-4">
        <table class="table table-bordered table-striped" id="MiTabla">
            <thead class="text-center">
                <th>#</th>
                <th>Forma de Pago</th>
                <th>Acciones</th>
            </thead>
            <tbody class="text-center">
                @foreach ($metodoPago as $metodoPago)
                    <tr>
                        <td>{{ $metodoPago->id }}</td>
                        <td>{{ $metodoPago->formaPago }}</td>
                        <td>
                            <a href="{{ route('metodoPago.edit', $metodoPago->id) }}" class="btn btn-success btn-sm"
                                data-bs-toggle="tooltip" data-bs-title="Editar datos">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('metodoPago.destroy', $metodoPago->id) }}" method="POST"
                                style="display: inline;" id="formEliminar{{ $metodoPago->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="confirmarEliminacion('{{ $metodoPago->id }}')" data-bs-toggle="tooltip"
                                    data-bs-title="Eliminar Método de Pago">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- FIN TABLAS METODO DE PAGO -->

    <!-- Script para confirmar eliminación de método de pago -->
    <script>
        // Función para confirmar la eliminación de un método de pago
        function confirmarEliminacion(metodoPagoId) {
            // Obtiene el formulario de eliminación utilizando el ID
            var formulario = document.getElementById('formEliminar' + metodoPagoId);

            // Muestra un diálogo de confirmación utilizando SweetAlert
            Swal.fire({
                title: '¿Estás seguro de eliminar este Método de Pago?',
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
                                throw new Error('Error al eliminar el método de pago');
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
                                // Elimina la fila de la tabla correspondiente al método de pago eliminado
                                formulario.closest('tr').remove();
                            } else {
                                // Si la eliminación no fue exitosa, lanza un error
                                throw new Error(data.message || 'Error al eliminar el Método de Pago.');
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
