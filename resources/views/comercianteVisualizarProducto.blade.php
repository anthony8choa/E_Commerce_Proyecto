<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            background-color: rgb(2, 2, 2); 
            font-family: 'Arial', sans-serif;
        }

        .navbar{
            background-color: #0056b3;  /* Azul */
            color: #fff;
        }

        .navbar-brand {
            color: #ffc107; /* Amarillo */
        }

        .navbar-nav .nav-link {
            color: #ffffff; /* Blanco */
        }

        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            color: #ffc107; /* Amarillo */
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
                <a class="navbar-brand fs-4 fw-bold" href="{{ route('comerciante.principal') }}">Vista Comerciante</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto align-items-center contenedorCategorias">
                        
                    </ul>
                    <ul class="navbar-nav">
                        <li id="nombreComercio" class="nav-item dropdown d-flex align-items-center" style="margin-right: 10px;">
                            Nombre Comercio
                        </li>
                        
                        <li class="nav-item">
                            <nav class="navbar ms-4">
                                <a id="botonSalirComerciante" class="navbar-brand" href="{{route('comerciante.login')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="40" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
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
                        {{$producto['nombreProducto']}} <span id="codigoProductoSpan" class="d-none">{{$producto['codigoProducto']}}</span>
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
                        <a id="editarProductoBoton" class="btn btn-warning" href="{{route('comerciante.producto.editar', $producto['codigoProducto'])}}">Editar Producto</a>
                    </section>
                    <!-- Carrito -->
                    <section class="row mt-3 align-items-center">
                        <a href="#" id="elimiarProductoBoton" class="btn btn-danger">Eliminar Producto</a>
                    </section>
                </section>
            </section>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.appConfig = {
                            urlCategorias: "{{ route('obtener.nombre.categorias') }}",
                            urlComercianteProductosCategorias: "{{ route('comerciante.obtener.productos.categoria', ['idCategoria' => '1', 'idUsuario' => '0']) }}",
                            urlLogin: "{{route('login')}}"
                            };
    </script>

    <script>
        document.getElementById("botonSalirComerciante").addEventListener('click', () => {localStorage.clear();});
    </script>

    <script src="{{ asset ('/assets/JavaScript/ComercianteObtenerCategorias.js') }}"></script>
    <script src="{{ asset ('/assets/JavaScript/ComercianteLeerLS.js') }}"></script>


</body>
</html>
