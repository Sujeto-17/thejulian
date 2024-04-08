@extends('layout.admin')

@section('main_content')
    <!-- CARD FORMULARIO PARA ACTUALIZAR SUCURSALES-->
    <div class="row justify-content-center align-items-center py-3" style="min-height: 60vh;">
        <div class="col-md-8 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 bg-warning">
                    <h5 class="mb-0">Datos de la Sucursal</h5>
                </div>

                <!-- FORMULARIO SUCURSAL -->
                <form action="{{ route('sucursal.update', $sucursal->id) }}" method="POST" autocomplete="off"
                    class="col-sm-9 mx-auto">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nombre de la Sucursal:</label>
                                    <input type="text" class="form-control" name="nombreSucursal"
                                        placeholder="Ejemplo: Imprenta Julian" value="{{ $sucursal->nombreSucursal }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Código Postal:</label>
                                    <input type="text" class="form-control" name="codigoPostal" minlength="5"
                                        maxlength="5" placeholder="Código Postal" value="{{ $sucursal->codigoPostal }}" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Municipio:</label>
                                    <input type="text" class="form-control" name="municipio" placeholder="Municipio"
                                        value="{{ $sucursal->municipio }}" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Calle:</label>
                                    <input type="text" class="form-control" name="calle"
                                        placeholder="Ejemplo: Boulevard Carlos A. Madrazo" value="{{ $sucursal->calle }}" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Colonia:</label>
                                    <input type="text" class="form-control" name="colonia" placeholder="Colonia"
                                        value="{{ $sucursal->colonia }}" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Localidad:</label>
                                    <input type="text" class="form-control" name="localidad" placeholder="Localidad"
                                        value="{{ $sucursal->localidad }}" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Entidad Federativa:</label>
                                <select class="form-select" aria-label="Default select example" name="entidadFederativa_id">
                                    <option selected>Seleccione una opción</option>
                                    @foreach ($entidadesFederativas as $entidadFederativa)
                                        <option value="{{ $entidadFederativa->id }}"
                                            {{ $entidadFederativa->id == $sucursal->entidadFederativa_id ? 'selected' : '' }}>
                                            {{ $entidadFederativa->nombreEstado }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Referencias:</label>
                                <input type="text" class="form-control" name="referencias"
                                    placeholder="Referencias para especificar la ubicación de la sucursal"
                                    value="{{ $sucursal->referencias }}" />
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
                <!-- FIN FORMULARIO SUCURSAL -->
            </div>
        </div>
    </div>
    <!-- FIN CARD FORMULARIO PARA REGISTRAR CATEGORIA-->

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
                                text: 'La Sucursal se ha actualizado correctamente.',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                // Si se confirma, redirige a la página de listar sucursal
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('admin.sucursal.listar') }}";
                                }
                            });
                        } else {
                            // Si la creación no fue exitosa, muestra un mensaje de error
                            Swal.fire({
                                title: '¡Error!',
                                text: 'Ha ocurrido un error al actualizar la sucursal.',
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
