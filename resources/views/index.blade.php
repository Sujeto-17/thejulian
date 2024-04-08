<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- BOOTSTRATP CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- BOOTSTRATP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- FAVICON LOGO -->
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon" />
</head>

<body>
    <!-- HEADER -->
    <header class="py-2 bg-primary text-center">
        <div class="container">
            <h1 class="text-light ps-2">Inicio de sesión</h1>
        </div>
    </header>
    <!-- FIN HEADER -->

    <div class="container-fluid pt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid mb-4" alt="Logo The Julian'S"
                        width="300">
                </div>

                <!-- FORMULARIO PARA INICIAR SESIÓN -->
                <form action="" method="POST" autocomplete="off">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Correo Electrónico:</label>
                        <input type="email" class="form-control" name="correo" placeholder="Correo Electrónico"
                            required><br>

                        <label class="form-label fw-bold">Contraseña:</label>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="enviar">Acceder</button>
                    </div>
                </form>
                <!-- FIN FORMULARIO PARA INICIAR SESIÓN -->
            </div>
        </div>
    </div>
    <br><br>


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
    <!-- TOOLTIPS -->
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
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
