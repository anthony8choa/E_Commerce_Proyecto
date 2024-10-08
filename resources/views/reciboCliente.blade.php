<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Compra</title>
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
        .encabezado-recibo {
            position: relative;
            margin-bottom: 20px;
            padding-top: 60px; /* Espaciado superior */
            padding-bottom: 10px;
        }

        .encabezado-recibo::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50px; /* Ancho de la barra */
            background: #fff;
            border-top: 2px solid #ccc;
            z-index: 1;
        }

        .encabezado-recibo::after {
            content: "";
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 20px);
            height: 50px; /* Altura de la barra */
            background-image: radial-gradient(circle at 10px 25px, rgb(35,47,62) 8px, transparent 10px);
            background-size: 40px 50px; /* Tamaño y espaciado de los círculos */
            z-index: 2;
        }

        .linea-punteada {
            border-top: 2px dashed #000; /* Línea punteada */
            position: absolute;
            top: 50px; /* Exactamente donde termina la parte gris */
            left: 0;
            width: 100%;
            z-index: 3;
        }

        .info-recibo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            z-index: 4;
            position: relative;
        }

        .info-recibo h3 {
            margin-bottom: 0;
        }

        .numero-recibo {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .numero-recibo input,
        .numero-recibo p {
            margin-bottom: 0;
        }

        .numero-recibo label {
            font-weight: bold;
            margin-right: 10px;
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
                                <li><a id="transaccionesBoton" class="dropdown-item" href="#">Transacciones</a></li>
                                <li><a id="verCuentaBoton" class="dropdown-item" href="#">Ver cuenta</a></li>
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header text-center encabezado-recibo">
                        <div class="linea-punteada"></div>
                        <div class="info-recibo">
                            <h3>Recibo de Compra</h3>
                            <div class="numero-recibo">
                                <label for="numero-recibo">Número de Factura:</label>
                                <input type="text" id="numero-recibo" class="form-control form-control-sm" value="{{ $factura['codigoFactura'] }}" readonly>
                                <p>Fecha de emisión: {{ $factura['fechaemision'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="fs-5">Comprado usando la tarjeta: <strong>{{ $factura['tarjetasCredito']['numeroTarjeta'] }}, {{ $factura['tarjetasCredito']['anyoVencimiento'] }}/{{ $factura['tarjetasCredito']['mesVencimiento'] }}, ***</strong> </p>
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5">Nombre del Cliente:</label>
                            <p class="fs-5" >{{ $cliente['nombrecompleto'] }}</p>
                            
                        </div>
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <th class="fw-bold fs-5">Descripción</th>
                                    <th class="fw-bold fs-5">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>L. {{ $factura['subTotal'] }}</td>
                                </tr>
                                <tr>
                                    <td>ISV (15%)</td>
                                    <td>L. {{ $factura['isv'] }}</td>
                                </tr>
                                <tr>
                                    <td>Coste de Envío</td>
                                    <td>L. {{ $factura['costoEnvio'] }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Monto Total</strong></td>
                                    <td><strong>L. {{ $factura['montoTotal'] }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="mt-3 ms-3 card-footer text-start col-6">
                            <p>Gracias por su compra</p>
                        </div>
                        <div class="mt-3 me-3 card-footer text-end col">
                            <p><a class="btn btn-primary" role="button" href="{{ route('principal') }}">Regresar a pagina principal</a></p>
                        </div>
                    </div>
                </div>
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
                            urlVerCuenta: "{{ route('usuario.perfil', '0') }}",
                            urlVerTransacciones: "{{ route('usuario.ver.transacciones', '0') }}"
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


