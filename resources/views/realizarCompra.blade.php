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
            max-width: 700px;
            margin: 0 auto;
            margin-top: 50px;
        }
        .bordered-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
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
                                <a id="botonListaFavoritos" class="navbar-brand" href="{{route('favoritos', '1')}}">
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
     

    <div class="mb-5 container form-container">
        <div class="bordered-container">
            <h1 class="text-center">Resumen Compra</h1>
            <form>
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <label for="cliente" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="cliente" placeholder="Nombre asociado" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <!-- puse el correo porq por lo gneral cuando compraas algo te cae un correo-->
                            <label for="correo" class="form-label">Correo Asociado</label>
                            <input type="email" class="form-control" id="correo" placeholder="Correo asociado" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tarjetas" class="form-label">Tarjetas Asociadas</label>
                            <select class="form-select" id="tarjetas">
                                <option selected>Selecciona una tarjeta</option>
                                <option value="1">Tarjeta 1</option>
                                <option value="2">Tarjeta 2</option>
                                <option value="3">Tarjeta 3</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="direcciones" class="form-label">Dirección de Envío</label>
                            <select class="form-select" id="direcciones">
                                <option selected>Selecciona una dirección</option>
                                <option value="1">Dirección 1</option>
                                <option value="2">Dirección 2</option>
                                <option value="3">Dirección 3</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody id="productos">
                        <tr>
                            
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{route('principal')}}" type="button" class="btn btn-primary">Seguir comprando</a>  <!--este boton lo va llevar al index-->
                    <button id="realizarCompraBoton" type="submit" class="btn btn-success">Realizar compra</button> <!--este boton le va decir compra exitosa y lo va mandar a la base de datos-->
                </div>
            </form>
        </div>
    </div>

    <!-- Ventana Emergente del Carrito -->
    <div style="max-width: 100%;" class="modal fade bg-warning" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
        <div style="max-width: 80%;" class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="carritoModalLabel">Carrito de Compras</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="productosCarrito"></div>
                    <div id="totalCarrito" class="fs-4 mt-3">Total: <strong>Lps.0</strong></div>
                    <button class="btn btn-danger mt-3" id="vaciarCarrito">Vaciar Carrito</button>
                </div>
                <div class="modal-footer">
                    <a href="{{route('realizar.compra', '0')}}" type="button" class="btn btn-primary" id="comprarCarrito">Comprar</a>
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
                            urlLogin: "{{route('login')}}",
                            urlProductoVisualizar: "{{route('producto.visualizar', '0')}}"
                            };
    </script>
    <script src="{{ asset ('/assets/JavaScript/LeerLocalStorage.js') }}"></script>
    <script>
        // Borra el localStorage al hacer click en cerrar sesion
        document.getElementById("cerrarSesionBoton").addEventListener('click', () => {localStorage.clear();});
    </script>
    <script src="{{ asset ('/assets/JavaScript/obtenerCategorias.js') }}"></script>
    <script src="{{ asset ('/assets/JavaScript/carritoGeneral.js') }}"></script>
    <script src="{{ asset ('/assets/JavaScript/realizarCompra.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        // Obtén el valor del carrito desde localStorage
        let carrito = localStorage.getItem("carrito");

        // Obtén una referencia al botón
        let realizarCompraBoton = document.getElementById('realizarCompraBoton');

        // Verifica si el carrito es null
        if (carrito === null) {
            // Deshabilita el botón si es asi
            realizarCompraBoton.disabled = true;

        }
    });
    </script>

</body>
</html>

