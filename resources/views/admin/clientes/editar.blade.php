@extends('layout.admin')

@section('main_content')
    <!-- FORMULARIO CLIENTES -->
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" autocomplete="off">
        @csrf
        @method('PUT')


        <!-- DATOS PERSONALES -->
        <h4 class="ps-5 mt-4">Datos de Facturación</h4>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-3">
                <label class="form-label fw-bold">RFC:</label>
                <input type="text" class="form-control text-uppercase" name="rfc" maxlength="13" minlength="12"
                    placeholder="Registro Federal de Contribuyentes" value="{{ $cliente->rfc }}">
            </div>

            <div class="col-sm-3">
                <label class="form-label fw-bold">Nombre o Razón Social:</label>
                <input type="text" class="form-control" name="razonSocial" placeholder="Razón Social"
                    value="{{ $cliente->razonSocial }}">
            </div>

            <div class="col-sm-3">
                <label class="form-label fw-bold">Nombre:</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre del Cliente"
                    value="{{ $cliente->nombre }}">
            </div>
        </div>
        <br>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-3">
                <label class="form-label fw-bold">Apellidos:</label>
                <input type="text" class="form-control" name="apellido" placeholder="Apellidos del Cliente"
                    value="{{ $cliente->apellido }}">
            </div>

            <div class="col-sm-3">
                <label class="form-label fw-bold">Correo Electrónico:</label>
                <input type="email" class="form-control" name="correo" placeholder="Correo Electrónico"
                    value="{{ $cliente->correo }}">
            </div>

            <div class="col-sm-3">
                <label class="form-label fw-bold">Teléfono:</label>
                <input type="tel" class="form-control" name="telefono" placeholder="Teléfono" minlength="10"
                    maxlength="10" value="{{ $cliente->telefono }}">
            </div>
        </div>
        <br>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-9">
                <label class="form-label fw-bold">Régimen Fiscal:</label>
                <select class="form-select" aria-label="Default select example" name="regimenFiscal_id">
                    <option selected>Seleccione una opción</option>
                    @foreach ($regimenFiscal as $regimenFiscal)
                        <option value="{{ $regimenFiscal->id }}"
                            {{ $regimenFiscal->id == $cliente->regimenFiscal_id ? 'selected' : '' }}>
                            {{ $regimenFiscal->nombreFiscal }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>

        <h4 class="ps-5">Datos de Domicilio</h4>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-3">
                <label class="form-label fw-bold">Calle:</label>
                <input type="text" class="form-control" name="calle" placeholder="Calle"
                    value="{{ $cliente->calle }}">
            </div>

            <div class="col-sm-3">
                <label class="form-label fw-bold">Código Postal:</label>
                <input type="text" class="form-control" name="codigoPostal" placeholder="Código Postal" minlength="5"
                    maxlength="5" value="{{ $cliente->codigoPostal }}">
            </div>

            <div class="col-sm-3">
                <label class="form-label fw-bold">Colonia:</label>
                <input type="text" class="form-control" name="colonia" placeholder="Colonia"
                    value="{{ $cliente->colonia }}">
            </div>
        </div>
        <br>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-3">
                <label class="form-label fw-bold">N° Exterior:</label>
                <input type="text" class="form-control" name="nExterior" placeholder="Número Exterior"
                    value="{{ $cliente->nExterior }}">
            </div>

            <div class="col-sm-3">
                <label class="form-label fw-bold">N° Interior:</label>
                <input type="text" class="form-control" name="nInterior" placeholder="Número Interior"
                    value="{{ $cliente->nInterior }}">
            </div>

            <div class="col-sm-3">
                <label class="form-label fw-bold">Localidad:</label>
                <input type="text" class="form-control" name="localidad" placeholder="Localidad"
                    value="{{ $cliente->localidad }}">
            </div>
        </div>
        <br>

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-3">
                <label class="form-label fw-bold">Municipio:</label>
                <input type="text" class="form-control" name="municipio" placeholder="Municipio"
                    value="{{ $cliente->municipio }}">
            </div>

            <div class="col-sm-3">
                <label class="form-label fw-bold">Entidad Federativa:</label>
                <select class="form-select" aria-label="Default select example" name="entidadFederativa_id">
                    <option selected>Seleccione una opción</option>
                    @foreach ($entidadesFederativas as $entidadFederativa)
                        <option value="{{ $entidadFederativa->id }}"
                            {{ $entidadFederativa->id == $cliente->entidadFederativa_id ? 'selected' : '' }}>
                            {{ $entidadFederativa->nombreEstado }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div><br>

        <!-- BOTON PARA REGISTRAR O REGRESAR -->
        <div class="row d-flex justify-content-center">
            <div class="col-sm-5 pe-5 py-4">
                <div class="text-center">
                    <button type="submit" class="btn btn-success mx-auto">
                        Actualizar
                    </button>
                    <a href="javascript:history.back(-1);" class="btn btn-light text-center border">Regresar</a>
                </div>
            </div>
        </div>
        <!-- BOTON PARA REGISTRAR O REGRESAR -->
    </form>
    <!-- FIN FORMULARIO CLIENTES -->


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
                            throw new Error('Error en la solicitud');
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
                                text: 'El Cliente se ha actualizado correctamente',
                                icon: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                // Si se confirma, redirige a la página de listar clientes
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('admin.clientes.listar') }}";
                                }
                            });
                        } else {
                            // Si la creación no fue exitosa, muestra un mensaje de error
                            Swal.fire({
                                title: '¡Error!',
                                text: 'Ha ocurrido un error al actualizar el Cliente',
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
                            text: 'Ha ocurrido un error al procesar la solicitud',
                            icon: 'error',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Aceptar'
                        });
                    });
            });
        });
    </script>
@endsection
