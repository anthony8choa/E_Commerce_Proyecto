<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            background-color:  rgb(35,47,62);
            font-family: 'Arial', sans-serif;
        }

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

    <!-- Vista del producto -->
    <section class="container bg-body-secondary rounded mt-4 mb-5 text-dark ">
        <section class="row p-2">
            <section class="col-6 p-3 h-100" style="width: 500px;">
                <!-- Imagen del producto -->
                <section class="m-3 border border-secondary">
                    <img src="{{ $producto['imagenProducto'] }}" class="img-fluid" height="900" width="500" alt="...">
                </section>
            </section>
            <section class="col mt-3 pt-3 pb-3 pd-4 ps-4">
                <section class="row fs-1 mb-2">
                    <!-- Nombre del producto -->
                    <div>
                        <span id="productName">{{$producto['nombreProducto']}}</span>
                        <strong>
                            (en stock:  <span id="cantidadDisponible">{{$producto['cantidadDisponible']}}</span>) <span id="codigoProductoSpan" class="d-none">{{$producto['codigoProducto']}}</span>
                        </strong>
                    </div>
                </section>
                <section class="row border-top"></section>
                <section class="row mt-2">
                    <div id="productDescripcion" class="fs-3">
                        <!-- Descripcion del producto -->
                        <div>{{$producto['descripcion']}}</div>
                    </div>
                    <!-- Precio del producto -->
                    <div class="mt-3 fs-3 fw-bold">
                        Lps. 
                        <span id="productPrecio" class="fs-3 fw-bold">
                            {{$producto['precioUnitario']}}
                            
                        </span>
                    </div>
                </section>
                <section class="row fs-5 fw-bold">
                    <!-- Favoritos -->
                    <section class="row mt-3 align-items-center">
                        <!-- Inicialmente tiene el valor de 1 al enviar codigoProducto, pero con js se cambian automaticamente al user logeado -->
                        <a id="botonAgregarAFavoritos" href="{{ route('favoritos.agregar.producto', ['codigoUsuario' => '1', 'codigoProducto' => $producto['codigoProducto'] ]) }}" class="btn btn-primary">Agregar a favoritos</a>
                    </section>
                    <!-- Carrito -->
                    <section class="row mt-3 align-items-center">
                        <a href="#" id="addToCart" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregadoExitosamenteModal">Agregar al carrito</a>
                    </section>
                </section>
            </section>
        </section>

        <section class="m-3 border border-secondary"></section>
        <!-- Seccion de comentarios -->
        <section class="row p-2">
            <section class="col">
                    <section class="row fs-2 fw-bold text-center">
                        <div>Comentarios</div>
                    </section>

                    <!-- Con JS se cambian los parametros de la ruta -->
                    <form id="formularioComentarios" method="POST" class="d-none" action="{{ route('resenias.crear',  ['idUsuario' => '999', 'idProducto' => $producto['codigoProducto'] ])}}">
                        @csrf
                        <div class="form-floating">
                            <select name="cantidadEstrellas" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
                            <option value="">Selecciona una opción</option>
                            <option value="0">0</option>
                            <option value="1">⭐</option>
                            <option value="2">⭐⭐</option>
                            <option value="3">⭐⭐⭐</option>
                            <option value="4">⭐⭐⭐⭐</option>
                            <option value="5">⭐⭐⭐⭐⭐</option>
                            </select>
                            <label for="floatingSelect">Estrellas</label>
                        </div>
                        <div id="dejarComentarioContainer" class="mt-3 mb-2 form-floating">
                            <textarea name="comentario" id="dejarComentario" class="form-control" style="height:100%;" placeholder="Deja un comentario aqui" id="floatingTextarea" required></textarea>
                            <label for="floatingTextarea">Deja un comentario aqui</label>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Añadir reseña">
                    </form>

                    <div class="mt-5"></div>

                    <a id="mensajeRegistroComentario" href="{{route('login')}}" class="fs-4 fw-bold mt-4 mb-4 ms-1">
                        Registrate o inicia sesión aquí si quieres comentar
                    </a>

                    <div class="mb-3"></div>

                    
                    @if ($reseniasDeProducto!=null)
                        @foreach($reseniasDeProducto as $resenias)
                        <!-- Seccion de comentarios recursiva -->
                        <section class="row mb-4">
                            <section class="row">
                                <section class="row fw-bold fs-5">
                                    <!-- Nombre de usuario -->
                                    <div> 
                                    
                                        {{$resenias['nombreUsuario']}} · 

                                        @if ($resenias['cantidadEstrellas'] > 0)
                                            @for ($i = 0; $i < $resenias['cantidadEstrellas']; $i++)
                                            ⭐
                                            @endfor
                                        @else
                                            (0 estrellas)
                                        @endif
                                        
                                        
                                    </div>
                                </section>
                            </section>
                            <section class="row">
                                <section class="row fs-5">
                                    <!-- Comentario texto -->
                                    <div>
                                        {{$resenias['comentario']}}
                                    </div>
                                </section>
                            </section>
                        </section>
                        @endforeach
                    @else
                        <section class="row mb-4">
                            <section class="row">
                                <section class="row fw-bold fs-5">
                                    <div>
                                        Este producto aún no tiene reseñas
                                    </div>
                                </section>
                            </section>
                        </section>
                    @endif
            </section>
        </section>
    </section>

    <!-- Ventana Emergente del Carrito -->
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

    <!-- Modal de agregado exitoso al carrito -->
    <div class="modal fade" id="agregadoExitosamenteModal" tabindex="-1" aria-labelledby="agregadoExitosamenteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="agregadoExitosamenteModalLabel">Confirmación</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Se ha agregado exitosamente el producto al carrito
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
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
                            urlAñadirProductoAFavoritos: "{{ route('favoritos.agregar.producto', ['codigoUsuario' => '1', 'codigoProducto' => '1']) }}",
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
    <script src="{{ asset ('/assets/JavaScript/carritoProducto.js') }}"></script>
    <script src="{{ asset ('/assets/JavaScript/añadirFavoritoBotonFuncionalidad.js') }}"></script>
    <script>

        if(localStorage.getItem("esInvitado") === "no"){
            document.getElementById("formularioComentarios").classList.toggle("d-none");
            document.getElementById("mensajeRegistroComentario").classList.add("d-none");

            let formularioComentarios = document.getElementById("formularioComentarios");
            formularioComentarios.action = formularioComentarios.action.replace("/999",`/${localStorage.getItem("codigoUsuario")}`);

        }

    </script>
    <script>
        let cantidadDisponible = document.getElementById("cantidadDisponible").innerText;
        if(cantidadDisponible == 0){
            let añadirACarritoBoton = document.getElementById("addToCart");
            añadirACarritoBoton.classList.add('disabled');
            // Cambia el estilo del enlace para hacerlo parecer deshabilitado
            añadirACarritoBoton.style.pointerEvents = 'none';
            añadirACarritoBoton.style.cursor = 'not-allowed';
        }
    </script>
</body>
</html>

