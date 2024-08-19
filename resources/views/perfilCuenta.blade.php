<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta</title>
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
      
        <div>
            <h1 class="display-4 mt-4 text-center text-white ">Perfil de Cuenta</h1>
        </div>
        
        <!--Datos Personales -->
        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">Datos Personales</div>
                    <div class="col text-end fw-bold">Cuenta creada el {{ $datosUsuario['usuarios']['fecha_creacion'] }}</div>
                </div>                
            </div>
            <div class="card-body">
                <p><strong>Nombre de Usuario:</strong> <span id="username">{{ $datosUsuario['usuarios']['nombreusuario'] }} </span></p>
                <p><strong>Nombre completo:</strong> <span id="lastname">{{ $datosUsuario['usuarios']['nombrecompleto'] }}</span></p>
                <p><strong>Contraseña:</strong> <span id="password" >{{ $datosUsuario['usuarios']['contrasenia'] }}</span></p>
                <p><strong>Teléfono:</strong> <span id="phone">{{ $datosUsuario['usuarios']['telefono'] }}</span></p>
                <p><strong>Correo Electrónico:</strong> <span id="email">{{ $datosUsuario['usuarios']['correo'] }}</span></p>
            </div>
            <div class="card-footer text-end">
                <a href="{{route('usuario.editar.datos.personales', $datosUsuario['usuarios']['codigoUsuario'])}}" class="btn btn-primary">Editar</a>
            </div>
        </div>

        <!--  Direcciones -->
        <div class="card mb-4">
            <div class="card-header">
                Direcciones
            </div>

            <div class="card-body">
                <ul class="list-group">

            @php
                $i = 1;
            @endphp
            @if ($datosUsuario['direcciones'] != null)

                @foreach ($datosUsuario['direcciones'] as $lugares)
                    
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Dirección {{$i}}:</strong> {{$lugares['lugar']['departamento']}}, {{$lugares['lugar']['codigoPostal']}}, {{$lugares['lugar']['nombrePais']}}
                                </div>
                                <div>
                                    <a href="{{ route('editar.direccion', ['idLugar' => $lugares['lugar']['codigoLugar'], 'idUsuario' => $datosUsuario['usuarios']['codigoUsuario'] ]) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <a href="{{ route('usuario.eliminar.direcion', ['idDireccion' => $lugares['codigoDireccion'], 'idUsuario' => $datosUsuario['usuarios']['codigoUsuario'] ]) }}" class="btn btn-danger btn-sm">Eliminar</a>
                                </div>
                            </li>

                    @php
                        $i+=1;
                    @endphp
                
                @endforeach
            @else
                
            @endif

                </ul>
            </div>
            
            <div class="card-footer text-end">
                <a href="{{ route('usuario.agregar.direccion', $datosUsuario['usuarios']['codigoUsuario']) }}" class="btn btn-secondary">Agregar direccion</a>
            </div>
        </div>

        <!-- Tarjetas de Crédito -->
        <div class="card mb-4">
            <div class="card-header">
                Tarjetas
            </div>

            <div class="card-body">
                <ul class="list-group">

                @php
                $j = 1;
                @endphp
                @if ($datosUsuario['tarjetasCredito'] != null)
    
                    @foreach ($datosUsuario['tarjetasCredito'] as $tarjetas)


                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>Tarjeta {{$j}}: </strong><span>{{ $tarjetas['numeroTarjeta'] }}, {{ $tarjetas['anyoVencimiento'] }}/{{ $tarjetas['mesVencimiento'] }}, ***</span>
                        </div>
                        <div>
                            <a href="{{ route('usuario.editar.tarjeta', ['idTarjeta' => $tarjetas['codigoTarjeta'], 'idUsuario' => $datosUsuario['usuarios']['codigoUsuario']  ]) }}" class="btn btn-primary btn-sm">Editar</a>
                            <a href="{{ route('usuario.eliminar.tarjeta', ['idTarjeta' => $tarjetas['codigoTarjeta'], 'idUsuario' => $datosUsuario['usuarios']['codigoUsuario'] ]) }}" class="btn btn-danger btn-sm">Eliminar</a>
                        </div>
                    </li>

                    @php
                    $j+=1;
                    @endphp
            
                    @endforeach
                @else
                    
                @endif


                </ul>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('usuario.agregar.tarjeta', $datosUsuario['usuarios']['codigoUsuario']) }}" class="btn btn-secondary">Agregar tarjeta</a>
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

