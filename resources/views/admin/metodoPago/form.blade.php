@extends('layout.admin')

@section('main_content')
    <!-- CARD FORMULARIO PARA REGISTRAR METODOS DE PAGO-->
    <div class="row justify-content-center align-items-center py-3" style="min-height: 60vh;">
        <div class="col-md-8 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 bg-warning">
                    <h5 class="mb-0">Datos de los Métodos de Pago</h5>
                </div>

                <!-- FORMULARIO METODOS DE PAGO -->
                <form action="{{ route('metodoPago.store') }}" method="POST" autocomplete="off" class="col-sm-9 mx-auto">
                    <!-- Este campo CSRF ayuda a proteger contra ataques CSRF.
                         Se agrega automáticamente a todos los formularios POST en Laravel.
                         Asegura que la solicitud provenga de la propia aplicación y no de una fuente externa. -->
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Método de Pago:</label>
                            <input type="text" class="form-control" name="formaPago" placeholder="Ejemplo: Efectivo, Transferencia, Tarjeta..." />
                        </div>

                        <!-- BOTON PARA REGISTRAR O REGRESAR -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success text-light mx-3">
                                Guardar
                            </button>
                            <a href="javascript:history.back(-1);" class="btn btn-light text-center border">Regresar
                            </a>
                        </div>
                        <!-- FIN BOTON PARA REGISTRAR O REGRESAR -->
                    </div>
                </form>
                <!-- FIN FORMULARIO METODOS DE PAGO -->
            </div>
        </div>
    </div>
    <!-- FIN CARD FORMULARIO PARA METODOS DE PAGO-->


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
                                text: 'El Método de Pago se ha creado correctamente.',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                // Si se confirma, redirige a la página de listar metodo de pago
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('admin.metodoPago.listar') }}";
                                }
                            });
                        } else {
                            // Si la creación no fue exitosa, muestra un mensaje de error
                            Swal.fire({
                                title: '¡Error!',
                                text: 'Ha ocurrido un error al crear el Método de Pago.',
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
