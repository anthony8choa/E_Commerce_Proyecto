<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            background-color:  rgb(35,47,62);
            font-family: 'Arial', sans-serif;
        }

        .navbar{
            background-color: #ffc107; /* Azul */
            color: #fff;
        }

        .navbar-brand {
            color: #0056b3; /* Amarillo */
        }

        .navbar-nav .nav-link {
            color: #ffffff; /* Blanco */
        }

        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            color: #0056b3; /* Amarillo */
        }

        .btn-primary:hover {
            background-color: #004494; /* Azul más oscuro */
            border-color: #004494;
        }

        .dropdown-menu .dropdown-item.logout:hover {
            color: #fff; /* Cambia el texto a blanco */
            background-color: red; /* Cambia el fondo a rojo */
        }

        .modal-body img {
            max-width: 100%;
            height: auto;
        }
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            margin-top: 50px; 
        }
    </style>
</head>
<body>
    <!-- Barra de navegacion -->
    <div id="navBarContainer">
        <nav id="navBar" class="navbar navbar-expand-lg fs-5 d-none">
            <div class="container-fluid">
                <a class="navbar-brand fs-4 fw-bold" href="{{ route('principal') }}">E commerce</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto align-items-center contenedorCategorias">
                        
                    </ul>
                    <ul class="navbar-nav">
                        <li id="tipoIngresoDropdown" class="nav-item dropdown d-flex align-items-center" style="margin-right: 10px;">
                            <a id="dropdownUsuarioBoton" class="nav-link d-none" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Nombre de usuario autogenerado por js -->
                            </a>
                            <ul id="dropdownUsuario" class="dropdown-menu d-none" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Transacciones</a></li>
                                <li><a class="dropdown-item" href="#">Ver cuenta</a></li>
                                <li><a id="cerrarSesionBoton" class="dropdown-item logout" href="{{route('login')}}">Cerrar sesión</a></li>
                            </ul>
                            <a id="dropdownInvitado" class="nav-link" href="{{route('login')}}" id="navbarDropdown" role="button" aria-expanded="false">
                                <!-- Invitado (generado por js) -->
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <nav class="navbar ms-4">
                                <a id="botonListaFavoritos" class="navbar-brand" href="{{route('favoritos', '1') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                    </svg>
                                </a>
                            </nav>
                        </li>
                        <li class="nav-item ms-1">
                            <nav class="navbar">
                                <a id="iconoCarrito" class="navbar-brand" href="#">
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
    </div>

    <div class="container form-container">
        <div class="card">
            <div class="card-header text-center">
                <h2>Editar Direccion</h2>
            </div>
            <div class="card-body">
              
                <form>
                    <div class="mb-3">
                        <label for="country" class="form-label">Pais</label>
                        <input type="text" class="form-control" id="country" placeholder="Ingrese su pais" required>
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">Departamento</label>
                        <input type="text" class="form-control" id="state" placeholder="Ingrese su departamento" required>
                    </div>
                    <div class="mb-3">
                        <label for="postalCode" class="form-label">Codigo Postal</label>
                        <input type="text" class="form-control" id="postalCode" placeholder="Ingrese su codigo postal" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Ventana emergente del carrito -->
    <div style="max-width: 100%;" class="modal fade bg-warning" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
        <div style="max-width: 80%;" class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="carritoModalLabel">Carrito de Compras</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Cabecera de la "tabla" -->
                    <div class="row font-weight-bold fw-bold mb-2">
                        <div class="col-6">Descripción</div>
                        <div class="col-3">Precio</div>
                        <div class="col-2">Cantidad</div>
                        <div class="col-1"></div> <!-- Columna para el botón de eliminar -->
                    </div>
                    <!-- Aquí se van a insertar dinámicamente los productos -->
                    <div id="productosCarrito"></div>
                    <div id="totalCarrito" class="fs-4 mt-3">Total: <strong>Lps.0</strong></div>
                    <button class="btn btn-danger mt-3" id="vaciarCarrito">Vaciar Carrito</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="comprarCarrito">Comprar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.appConfig = {
                            urlCategorias: "{{ route('obtener.nombre.categorias') }}",
                            urlProductosCategorias: "{{ route('obtener.productos.categoria', ['idCategoria' => '1', 'idUsuario' => '0']) }}",
                            urlLogin: "{{route('login')}}"
                            };
    </script>
    <script src="{{ asset ('/assets/JavaScript/LeerLocalStorage.js') }}"></script>
    <script>
        // Borra el localStorage al hacer click en cerrar sesion
        document.getElementById("cerrarSesionBoton").addEventListener('click', () => {localStorage.clear();});
    </script>
    <script src="{{ asset ('/assets/JavaScript/obtenerCategorias.js') }}"></script>
    <script src="{{ asset ('/assets/JavaScript/carritoGeneral.js') }}"></script>

</body>
</html>
