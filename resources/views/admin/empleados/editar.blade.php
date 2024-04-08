@extends('layout.admin')

@section('main_content')
    <!-- CARD FORMULARIO PARA ACTUALIZAR EMPLEADOS-->
    <div class="row justify-content-center align-items-center py-3" style="min-height: 60vh;">
        <div class="col-md-8 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 bg-warning">
                    <h5 class="mb-0">Datos del Empleado</h5>
                </div>

                <!-- FORMULARIO EMPLEADOS -->
                <form action="{{ route('empleados.update', $empleado->id) }}" method="POST" autocomplete="off" 
                    class="col-sm-9 mx-auto">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nombres:</label>
                                    <input type="text" class="form-control" name="nombres"
                                        placeholder="Nombre del Empleado" value="{{ $empleado->nombres }}" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Teléfono:</label>
                                    <input type="text" class="form-control" name="telefono" placeholder="Teléfono"
                                        minlength="10" maxlength="10" value="{{ $empleado->telefono }}" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Categoria:</label>
                                    <select class="form-select" aria-label="Default select example" name="categoria_id">
                                        <option selected>Seleccione una opción</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}"
                                                {{ $categoria->id == $empleado->categoria_id ? 'selected' : '' }}>
                                                {{ $categoria->nombreCategoria }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Apellidos:</label>
                                    <input type="text" class="form-control" name="apellidos"
                                        placeholder="Apellidos del Empleado" value="{{ $empleado->apellidos }}" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Correo Electrónico:</label>
                                    <input type="email" class="form-control" name="correo"
                                        placeholder="Correo Electrónico" value="{{ $empleado->correo }}" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Status:</label>
                                    <select class="form-select" aria-label="Default select example" name="status"
                                        value="{{ $empleado->status }}">
                                        <option selected>Seleccione una opción</option>
                                        <option value="Activo" @selected('Activo' == $empleado->status)>Activo</option>
                                        <option value="Inactivo" @selected('Inactivo' == $empleado->status)>Inactivo</option>
                                    </select>
                                </div>
                            </div>

                            <!-- BOTON PARA ACTUALIZAR DATOS O REGRESAR -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success text-light mx-3">
                                    Actualizar
                                </button>
                                <a href="javascript:history.back(-1);" class="btn btn-light text-center border">Regresar
                                </a>
                            </div>
                            <!-- FIN BOTON PARA ACTUALIZAR DATOS O REGRESAR -->
                        </div>
                    </div>
                </form>
                <!-- FIN FORMULARIO EMPLEADOS -->
            </div>
        </div>
    </div>
    <!-- FIN CARD FORMULARIO PARA ACTUALIZAR EMPLEADOS-->

    <script>
        // Espera a que el DOM esté completamente cargado
        document.addEventListener('DOMContentLoaded', function() {
            // Selecciona el formulario
            const form = document.querySelector('form');

            // Agrega un evento de escucha para el envío del formulario
            form.addEventListener('submit', function(event) {
                // Evita el comportamiento predeterminado de enviar el formulario
                event.preventDefault();

                // Envía una solicitud fetch con los datos del formulario
                fetch(form.action, {
                        method: form.method, // Método de envío del formulario (GET, POST, etc.)
                        body: new FormData(form) // Datos del formulario
                    })
                    .then(response => {
                        // Verifica si la respuesta es exitosa
                        if (!response.ok) {
                            // Si la respuesta no es exitosa, lanza un error
                            throw new Error('Error en la solicitud.');
                        }
                        // Si la respuesta es exitosa, devuelve los datos en formato JSON
                        return response.json();
                    })
                    .then(data => {
                        // Maneja la respuesta JSON
                        if (data.success) {
                            // Si la creación fue exitosa, muestra un mensaje de éxito
                            Swal.fire({
                                title: '¡Éxito!',
                                text: 'El Empleado se ha actualizado correctamente.',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                // Si se confirma, redirige a la página de listar Empleados
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('admin.empleados.listar') }}";
                                }
                            });
                        } else {
                            // Si la creación no fue exitosa, muestra un mensaje de error
                            Swal.fire({
                                title: '¡Error!',
                                text: 'Ha ocurrido un error al actualizar el Empleado',
                                icon: 'error',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    })
                    .catch(error => {
                        // Si hay un error en la solicitud, muestra un mensaje de error genérico
                        Swal.fire({
                            title: '¡Error!',
                            text: 'Por favor, rellene todos los campos',
                            icon: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar'
                        });
                    });
            });
        });
    </script>
@endsection
