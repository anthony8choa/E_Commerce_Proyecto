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

    <section class="bg-body-secondary container rounded mt-4 mb-5">
        <section class="row p-5">
            <section class="col">
                <div class="text-center mb-4 fs-2 fw-bold">Producto con id: {{$producto['codigoProducto']}}</div>
                <form>
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" style="width: 50%">Producto Actualmente</th>
                                <th scope="col" style="width: 50%">Producto Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width: 50%">Nombre Producto: <strong> {{$producto['nombreProducto']}}</strong></td>
                                <td style="width: 50%">
                                    <input type="text" class="form-control" name="nombreProducto" placeholder="Nuevo nombre del producto" required>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%">Descripción: <strong> {{$producto['descripcion']}}</strong></td>
                                <td style="width: 50%">
                                    <textarea class="form-control" name="descripcion" placeholder="Nueva descripción" required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%">Src de la imagen del producto: <strong> {{$producto['imagenProducto']}}</strong></td>
                                <td style="width: 50%">
                                    <input type="text" class="form-control" name="imagenProducto" placeholder="Nuevo src de la imagen" required>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 50%">Precio unitario: <strong>Lps.{{$producto['precioUnitario']}}</strong></td>
                                <td style="width: 50%">
                                    <input type="number" class="form-control" name="precioUnitario" placeholder="Nuevo precio unitario" required>
                                </td style="50%">
                            </tr>
                            <tr>
                                <td style="width: 50%">Cantidad Disponible: <strong> {{$producto['cantidadDisponible']}}</strong></td>
                                <td style="width: 50%">
                                    <input type="number" class="form-control" name="cantidadDisponible" min="0" placeholder="Nueva cantidad disponible" required>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </form>
            </section>
        </section>
    </section>

    <section class="row mt-3">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        //Info necesaria para la navbar dinamica
        window.appConfig = {
                            urlCategorias: "{{ route('obtener.nombre.categorias') }}",
                            urlComercianteProductosCategorias: "{{ route('comerciante.obtener.productos.categoria', ['idCategoria' => '1', 'idUsuario' => '0']) }}",
                            urlLogin: "{{ route('login') }}"
                            };
    </script>
    
    <script>
        document.getElementById("botonSalirComerciante").addEventListener('click', () => {localStorage.clear();});
    </script>
    
    <script src="{{ asset ('/assets/JavaScript/ComercianteObtenerCategorias.js') }}"></script>
    <script src="{{ asset ('/assets/JavaScript/ComercianteLeerLS.js') }}"></script>
    
    
    
</body>
</html>