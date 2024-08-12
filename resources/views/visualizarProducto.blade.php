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

        .modal .modal-dialog {
            max-width: 80%;
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
                                <li><a class="dropdown-item" href="#">Transacciones</a></li>
                                <li><a class="dropdown-item" href="#">Ver cuenta</a></li>
                                <li><a class="dropdown-item logout" href="{{route('login')}}">Cerrar sesión</a></li>
                            </ul>
                            <a id="dropdownInvitado" class="nav-link" href="{{route('login')}}" id="navbarDropdown" role="button" aria-expanded="false">
                                <!-- Invitado (generado por js) -->
                            </a>
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
    </div>
    <!-- Barra de navegación -->
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
                        <button id="nombreUsuarioBarraNavegacion" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- Nombre de usuario autogenerado por js -->
                        </button>
                        <ul id="dropdownUsuario" class="dropdown-menu d-none" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Transacciones</a></li>
                            <li><a class="dropdown-item" href="#">Ver cuenta</a></li>
                            <li><a class="dropdown-item logout" href="#">Cerrar sesión</a></li>
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
                            <a class="navbar-brand" href="#" id="iconoCarrito">
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
    <section class="container bg-primary rounded mt-4 text-white">
        <!-- Descripción del producto -->
        <section class="row p-2">
            <section class="col-6 p-3 h-100" style="width: 500px;">
                <!-- Imagen del producto -->
                <img src="{{ $producto['imagenProducto'] }}" class="img-fluid" alt="...">
            </section>
            <section class="col mt-3 pt-3 pb-3 pd-4 ps-4">
                <section class="row fs-1 mb-2">
                    <!-- Descripcion del producto -->
                    <div>
                        {{$producto['nombreProducto']}}
                    <!-- Descripción del producto -->
                    <div id="productDescripcion">
                        Zapato de Caballero
                        <!-- { {$dato['descripcion']} } -->
                    </div>
                </section>
                <section class="row border-top"></section>
                <section class="row mt-2">
                    <div class="fs-3">
                        <div>{{$producto['descripcion']}}</div>
                    </div>
                    <!-- Precio del producto -->
                    <div class="fs-3 fw-bold mt-3">
                        {{$producto['precioUnitario']}}
                        Lps.
                    <div id="productPrecio" class=" fs-3 fw-bold">
                         1536
                        <!-- { {$dato['precio']} } -->Lps.
                    </div>
                </section>
                <section class="row fs-5 fw-bold">
                    <!-- Favoritos -->
                    <section class="row mt-3 align-items-center">
                        <a href="#" class="btn btn-light">Agregar a favoritos</a>
                    </section>
                    <!-- Carrito -->
                    <section class="row mt-3 align-items-center">
                        <a href="#" class="btn btn-light" id="addToCart">Agregar al carrito</a>
                    </section>
                </section>
            </section>
        </section>

        <section class="row border-top"></section>
        <!-- Sección de comentarios -->
        <section class="row p-2">
            <section class="row">
                <section class="row fs-2 fw-bold text-center">
                    <div>Comentarios</div>
                </section>
                <!-- Sección de comentarios recursiva -->
                <section class="row mb-4">
                    <section class="row">
                        <section class="row fw-bold fs-5">
                            <div>Alejandro Baca</div>
                        </section>
                    </section>
                    <section class="row">
                        <section class="row fs-5">
                            <div>Muy buen producto!</div>
                        </section>
                    </section>
                </section>
                <!-- Sección de comentarios recursiva -->
                <section class="row mb-4">
                    <section class="row">
                        <section class="row fw-bold fs-5">
                            <div>Alejandro Baca</div>
                        </section>
                    </section>
                    <section class="row">
                        <section class="row fs-5">
                            <div>Muy buen producto!</div>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>

    <!-- Ventana Emergente del Carrito -->
    <div class="modal fade bg-warning" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
                    <button type="button" class="btn btn-primary" id="comprarCarrito">Comprar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset ('/assets/JavaScript/LeerLocalStorage.js') }}"></script>
    <script>
        window.appConfig = {
                            urlCategorias: "{{ route('obtener.nombre.categorias') }}",
                            urlProductosCategorias: "{{ route('obtener.productos.categoria', ['idCategoria' => '1']) }}"    
                            };
    </script>
    <script src="{{ asset ('/assets/JavaScript/obtenerCategorias.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carritoModal = new bootstrap.Modal(document.getElementById('carritoModal'));
        const productosCarrito = document.getElementById('productosCarrito');
        const totalCarrito = document.getElementById('totalCarrito');
        const addToCartButton = document.getElementById('addToCart');
        const iconoCarrito = document.getElementById('iconoCarrito');
        const vaciarCarritoButton = document.getElementById('vaciarCarrito');
        const comprarCarritoButton = document.getElementById('comprarCarrito');

        const updateCarritoModal = () => {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            productosCarrito.innerHTML = '';
            let total = 0;
            carrito.forEach((producto, index) => {
                const productoDiv = document.createElement('div');
                productoDiv.classList.add('row', 'mb-2');
                productoDiv.innerHTML = `
                    <div class="col-6">${producto.descripcion}</div>
                    <div class="col-3">${producto.precioEntero}</div>
                    <div class="col-2">${producto.cantidad}</div>
                    <div class="col-1">
                        <button class="btn btn-danger btn-sm eliminarProducto" data-index="${index}">Eliminar</button>
                    </div>
                `;
                productosCarrito.appendChild(productoDiv);
                total += producto.precioEntero * producto.cantidad;
            });
            totalCarrito.querySelector('strong').textContent = `Lps.${total.toFixed(2)}`;
        };

        const addProductToCart = () => {
            const descripcion = document.getElementById('productDescripcion').textContent.trim();
            const precioString = document.getElementById('productPrecio').textContent.trim(); // Elemento q capture del div pero es un string
            const precioNumerico = precioString.replace(/[^0-9.-]+/g, '');
            // Convertir a número entero 
            const precioEntero = parseInt(precioNumerico, 10);
            const cantidad = 1; 
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            carrito.push({ descripcion, precioEntero, cantidad });
            localStorage.setItem('carrito', JSON.stringify(carrito));
        };

        const vaciarCarrito = () => {
            localStorage.removeItem('carrito');
            updateCarritoModal();
        };

        const eliminarProducto = (index) => {
            const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
            carrito.splice(index, 1);
            localStorage.setItem('carrito', JSON.stringify(carrito));
            updateCarritoModal();
        };

        addToCartButton.addEventListener('click', (e) => {
            e.preventDefault();
            addProductToCart();
            updateCarritoModal();
        });

        iconoCarrito.addEventListener('click', () => {
            updateCarritoModal();
            carritoModal.show();
        });

        vaciarCarritoButton.addEventListener('click', () => {
            vaciarCarrito();
        });

        productosCarrito.addEventListener('click', (e) => {
            if (e.target.classList.contains('eliminarProducto')) {
                const index = e.target.getAttribute('data-index');
                eliminarProducto(index);
            }
        });

        comprarCarritoButton.addEventListener('click', () => {
          
        });
    });
</script>
<script src="{{ asset ('/assets/JavaScript/LeerLocalStorage.js') }}"></script>
</body>
</html>
     