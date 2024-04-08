<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titulo ?? '' }}</title>
    <!-- BOOTSTRATP CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- BOOTSTRATP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- SWEETALERT 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- FAVICON LOGO -->
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon" />
    <!-- DATATABLES -->
    <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.bootstrap5.min.css') }}">
</head>

<body>

    <!-- HEADER - NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">

            <!-- BOTON PARA ABRIR EL SIDEBEAR -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <!-- FIN BOTON PARA ABRIR EL SIDEBEAR -->

            <a class="navbar-brand me-auto ms-lg-0 ms-3 fw-bold fst-italic">Administrador</a>

            <!-- BOTON PARA ABRIR PERFIL -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- FIN BOTON PARA ABRIR PERFIL -->

            <div class="collapse navbar-collapse" id="topNavBar">
                <!-- ABRIR PERFIL -->
                <ul class="navbar-nav d-flex ms-auto my-3 my-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-fill text-light">CORREO USUARIO</i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Cambiar Contraseña</a></li>
                            <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- FIN ABRIR PERFIL -->
            </div>
        </div>
    </nav>
    <!-- FIN HEADER NAVBAR -->

    <!-- SIDEBEAR -->
    <div class="offcanvas offcanvas-start sidebar-nav bg-light" id="sidebar">
        <div class="offcanvas-body p-0">
            <nav class="navbar-light">
                <ul class="navbar-nav">
                    <!-- LOGO -->
                    <li>
                        <a href="{{ route('admin.index') }}"
                            class="nav-link active text-danger small fw-bold mt-1 text-center">
                            <img src="{{ asset('img/logo.png') }}" width="150px" />
                        </a>
                    </li>
                    <!-- LOGO -->

                    <!-- PEDIDOS -->
                    <li class="border-bottom py-2">
                        <a href="#submenu2" data-bs-toggle="collapse"
                            class="nav-link px-0 align-middle fw-semibold fs-5">
                            <img src="{{ asset('img/firma.png') }}" width="50" class="ms-3"> Pedidos
                            <i class="bi bi-chevron-down"></i></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2">
                            <li>
                                <a href="{{ route('admin.pedidos.listar') }}" class="nav-link px-0 ps-5 link-danger ms-4">
                                    Pedidos</a>
                            </li>
                        </ul>
                    </li>
                    <!-- FIN PEDIDOS -->

                    <!-- VENTAS -->
                    <li class="border-bottom pb-2">
                        <a href="#submenu3" data-bs-toggle="collapse"
                            class="nav-link px-0 align-middle link-danger fs-5">
                            <img src="{{ asset('img/bolsa.png') }}" width="50" class="ms-3"> Ventas <i
                                class="bi bi-chevron-down"></i></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu3">
                            <li>
                                <a href="{{ route('admin.ventas.listar') }}" class="nav-link px-0 ps-5 link-danger ms-4">
                                    Ventas</a>
                            </li>
                        </ul>
                    </li>
                    <!-- FIN VENTAS -->

                    <!-- CLIENTES -->
                    <li class="border-bottom pb-2">
                        <a href="#submenu4" data-bs-toggle="collapse"
                            class="nav-link px-0 align-middle link-danger fs-5">
                            <img src="{{ asset('img/cliente.png') }}" width="50" class="ms-3"> Clientes <i
                                class="bi bi-chevron-down"></i></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu4">
                            <li>
                                <a href="{{ route('admin.clientes.listar') }}" class="nav-link px-0 ps-5 link-danger ms-4">
                                    Clientes</a>
                            </li>
                        </ul>
                    </li>
                    <!-- FIN CLIENTES -->

                    <!-- EMPLEADOS -->
                    <li class="border-bottom py-2">
                        <a href="#submenu5" data-bs-toggle="collapse"
                            class="nav-link px-0 align-middle link-danger fs-5">
                            <img src="{{ asset('img/empleados.png') }}" width="50" class="ms-3"> Empleados <i
                                class="bi bi-chevron-down"></i></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu5">
                            <li>
                                <a href="{{ route('admin.empleados.listar') }}"
                                    class="nav-link px-0 ps-5 link-danger ms-4">
                                    Empleados</a>
                            </li>
                        </ul>
                    </li>
                    <!-- FIN EMPLEADOS -->

                    <!-- USUARIOS -->
                    <li class="border-bottom pb-2">
                        <a href="#submenu6" data-bs-toggle="collapse"
                            class="nav-link px-0 align-middle link-danger fs-5">
                            <img src="{{ asset('img/usuario.png') }}" width="50" class="ms-3"> Usuarios <i
                                class="bi bi-chevron-down"></i></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu6">
                            <li>
                                <a href="{{ route('admin.usuarios.listar') }}" class="nav-link px-0 ps-5 link-danger ms-4">
                                    Usuarios</a>
                            </li>
                        </ul>
                    </li>
                    <!-- FIN USUARIOS -->

                    <!-- OTROS -->
                    <li class="py-2">
                        <a href="#submenu7" data-bs-toggle="collapse"
                            class="nav-link px-0 align-middle link-danger fs-5">
                            <img src="{{ asset('img/ajustes.png') }}" width="50" class="ms-3"> Otros <i
                                class="bi bi-chevron-down"></i></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu7">
                            <li>
                                <a href="{{ route('admin.productos.listar') }}"
                                    class="nav-link px-0 ps-5 link-danger ms-4">
                                    Productos</a>
                                <a href="{{ route('admin.categorias.listar') }}"
                                    class="nav-link px-0 ps-5 link-danger ms-4">
                                    Categorías</a>
                                <a href="{{ route('admin.sucursal.listar') }}" class="nav-link px-0 ps-5 link-danger ms-4">
                                    Sucursal</a>
                                <a href="{{ route('admin.metodoPago.listar') }}"
                                    class="nav-link px-0 ps-5 link-danger ms-4">
                                    Métodos de pago</a>
                            </li>
                        </ul>
                    </li>
                    <!-- FIN OTROS -->
                </ul>
            </nav>
        </div>
    </div>
    <!-- FIN SIDEBEAR -->

    <!-- CONTENIDO -->
    <main class="mt-5 pt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 bg-danger">
                    <h4 class="text-center fw-bold my-2 text-light">{{ $titulo }}</h4>
                </div>
            </div>
            @yield('main_content')
        </div>
    </main>
    <!-- FIN CONTENIDO -->

    <!-- FOOTER -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="" class="rounded mx-auto d-block" width="120px">
                    <h3 class="text-center">Sistema Administrativo de Control de Ventas</h3>
                    <div class="mt-3">
                        <a href="https://www.facebook.com/TheJuliansOfficial" class="fs-5 px-3 text-light"
                            target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="https://maps.app.goo.gl/f1taX1t8M86JcAeu5" class="fs-5 px-3 text-light"
                            target="_blank"><i class="bi bi-geo-alt-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--FIN FOOTER-->


    <!-- BOOTSTRATP JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- JQUERY 3.3.1 JS -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
    <!-- POPPER JS -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- TOOLTIPS -->
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <!-- DATATABLES JS -->
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#MiTabla').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                order: [
                    [0, 'desc']
                ] // Ordenar por la primera columna en orden descendente
            });
        });
    </script>
    <!-- AJUSTAR POSICION DEL FOOTER -->
    <script>
        // Función para ajustar la posición del footer
        function ajustarFooter() {
            var footer = document.querySelector('footer');
            var contenido = document.querySelector('main');
            var windowHeight = window.innerHeight;
            var contenidoHeight = contenido.offsetHeight;
            var footerHeight = footer.offsetHeight;

            if (contenidoHeight + footerHeight < windowHeight) {
                footer.style.position = 'absolute';
                footer.style.bottom = '0';
            } else {
                footer.style.position = 'static';
            }
        }

        // Ajusta la posición del footer cuando se cargue la página y cuando se cambie el tamaño de la ventana
        window.addEventListener('load', ajustarFooter);
        window.addEventListener('resize', ajustarFooter);
    </script>
</body>

</html>
