<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        .navbar{
            background-color: #ffc107;
            color: #fff;
        }

        .navbar-brand {
            color: #0056b3;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            color: #0056b3;
        }

        .btn-primary:hover {
            background-color: #004494; /* Azul más oscuro */
            border-color: #004494;
        }

        .dropdown-menu .dropdown-item.logout:hover {
            color: #fff; /* Cambia el texto a blanco */
            background-color: red; /* Cambia el fondo a rojo */
        }

    </style>
</head>
<body>
    <!-- Barra de navegacion -->
    <nav class="navbar navbar-expand-lg fs-5">
        <div class="container-fluid">
            <a class="navbar-brand fs-4 fw-bold" href="#">E commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ropa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Alimentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tecnología</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Oficina</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accesorios de cocina</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown d-flex align-items-center" style="margin-right: 10px;">
                        <a id="nombreUsuarioBarraNavegacion" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Nombre de usuario autogenerado por js -->
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Transacciones</a></li>
                            <li><a class="dropdown-item" href="#">Ver cuenta</a></li>
                            <li><a class="dropdown-item logout" href="{{route('login')}}">Cerrar sesión</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <nav class="navbar ms-4">
                            <a class="navbar-brand" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                </svg>
                            </a>
                        </nav>
                    </li>
                    <li class="nav-item ms-1">
                        <nav class="navbar">
                            <a class="navbar-brand" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                </svg>
                            </a>
                        </nav>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Vista del producto -->
    <section class="container bg-primary rounded mt-4 text-white ">
        <!-- Descripcion del producto -->
        <section class="row p-2">
            <section class="col-6 p-3 h-100" style="width: 500px;">
                <!-- Imagen del producto -->
                <img src="https://hushpuppies.hn/cdn/shop/products/300450171.jpg?v=1679272084" class="img-fluid" alt="...">
            </section>
            <section class="col mt-3 pt-3 pb-3 pd-4 ps-4">
                <section class="row fs-1 mb-2">
                    <!-- Descripcion del producto -->
                    <div>
                        Ejemplo producto Descripcion
                        <!-- { {$dato['descripcion']} } -->
                    </div>
                </section>
                <section class="row border-top"></section>
                <section class="row mt-2">
                    <!-- Precio del producto -->
                    <div class="fs-3 fw-bold">
                        Precio ejemplo 1400
                        <!-- { {$dato['precio']} } -->
                        Lps.
                    </div>
                </section>
                <section class="row fs-5 fw-bold">
                    <!-- Favoritos -->
                    <section class="row mt-3 align-items-center">
                        <a href="#" class="btn btn-light">Agregar a favoritos</a>
                    </section>
                    <!-- Carrito -->
                    <section class="row mt-3 align-items-center">
                        <a href="#" class="btn btn-light">Agregar al carrito</a>
                    </section>
                </section>
            </section>
        </section>

        <section class="row border-top"></section>
        <!-- Seccion de comentarios -->
        <section class="row p-2">
            <section class="row">
                <section class="row fs-2 fw-bold text-center">
                    <div>Comentarios</div>
                </section>

                <!-- Seccion de comentarios recursiva -->
                <section class="row mb-4">
                    <section class="row">
                        <section class="row fw-bold fs-5">
                            <!-- Nombre de usuario -->
                            <div>
                                Alejandro Baca
                            </div>
                        </section>
                    </section>
                    <section class="row">
                        <section class="row fs-5">
                            <!-- Comentario texto -->
                            <div>
                                Muy buen producto!
                            </div>
                        </section>
                    </section>
                </section>
                
                <!-- Seccion de comentarios recursiva -->
                <section class="row mb-4">
                    <section class="row">
                        <section class="row fw-bold fs-5">
                            <div>
                                Alejandro Baca
                            </div>
                        </section>
                    </section>
                    <section class="row">
                        <section class="row fs-5">
                            <div>
                                Muy buen producto!
                            </div>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset ('/assets/JavaScript/LeerLocalStorage.js') }}"></script>
</body>
</html>

