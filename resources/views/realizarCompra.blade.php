<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar compra</title>
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
     

    <div class="mb-5 container form-container">
        <div class="bordered-container">
            <h1 class="text-center">Resumen Compra</h1>
            <form action="{{ route('realizar.compra.confirmar', $usuario['usuarios']['codigoUsuario']) }}" method="POST">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <label for="cliente" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="cliente" placeholder="{{ $usuario['usuarios']['nombreusuario'] }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="correo" class="form-label">Correo Asociado</label>
                            <input type="email" class="form-control" id="correo" placeholder="{{ $usuario['usuarios']['correo'] }}" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>

                            @if ($usuario['tarjetasCredito']!=null)

                                <label for="tarjetas" class="form-label">Tarjetas Asociadas</label>
                                <select name="tarjeta" class="form-select" name="" id="tarjetas" required>
                                    <option value="" disabled selected>Selecciona una tarjeta</option>

                                    @foreach ($usuario['tarjetasCredito'] as $tarjetasCredito)

                                        <option value="{{ $tarjetasCredito['codigoTarjeta'] }}">Tarjeta con descripcion: {{ $tarjetasCredito['numeroTarjeta'] }}, {{ $tarjetasCredito['anyoVencimiento'] }}/{{ $tarjetasCredito['mesVencimiento'] }}, ***</option>

                                    @endforeach


                                </select>

                            @else
                                <label id="alertaTarjeta" for="tarjetas" class="form-label fw-bold ms-2 text-danger">ATENCION: registra una tarjeta para comprar</label>
                            @endif                            

                        </td>
                    </tr>
                    <tr>
                        <td>

                            @if ($usuario['direcciones']!=null)

                                <label for="direcciones" class="form-label">Dirección de Envío</label>
                                <select name="direccion" class="form-select" id="direcciones" required>
                                    <option value="" disabled selected>Selecciona una dirección</option>

                                    @foreach ($usuario['direcciones'] as $direccion)

                                        <option value="{{ $direccion['lugar']['codigoLugar'] }}"> {{ $direccion['lugar']['departamento'] }}, {{  $direccion['lugar']['codigoPostal'] }}, {{  $direccion['lugar']['nombrePais'] }}  </option>

                                    @endforeach
                                    

                                </select>

                            @else
                                <label id="alertaDireccion" for="tarjetas" class="form-label fw-bold ms-2 text-danger">ATENCION: registra una direccion para comprar</label>
                            @endif 

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
                        
                    </tbody>
                </table>
                <div id="infoMonto">
                    <div class="mt-4 fs-5">
                        <strong>
                        Subtotal: 
                        </strong>
                        <span id="subtotal">

                        </span>
                    </div>
                    <div class="fs-5">
                        <strong>
                        ISV: 
                        </strong>
                        <span id="ISV">
                            15%
                        </span>
                    </div>
                    <div class="fs-5">
                        <strong>
                        Costo envio: 
                        </strong>
                        <span id="ISV">
                            L. 500
                        </span>
                    </div>
                    <div class="fs-5">
                        <strong>
                        Total: 
                        </strong>
                        <span id="total">

                        </span>
                    </div>
                </div>

                <input type="hidden" id="subTotalInput" name="monto" value="">
                
                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{route('principal')}}" type="button" class="btn btn-primary">Seguir comprando</a>
                    <button id="realizarCompraBoton" type="submit" class="btn btn-success">Realizar compra</button>
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


    <!-- Modal a mostrar si no hay stock de algun producto -->
    <div class="modal fade" id="noStockModal" tabindex="-1" aria-labelledby="noStockModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="noStockModalLabel">Atención</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    No se encuentra suficiente stock de uno, o unos de tus productos en carrito
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warn" data-bs-dismiss="modal">Cerrar</button>
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
                            urlProductoVisualizar: "{{route('producto.visualizar', '0')}}",
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
    <script src="{{ asset ('/assets/JavaScript/realizarCompra.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        // Obtener el valor del carrito desde localStorage
        let carrito = localStorage.getItem("carrito");

        // Obtener una referencia al botón
        let realizarCompraBoton = document.getElementById('realizarCompraBoton');

        //Info del monto
        const infoMonto = document.getElementById("infoMonto");

        // Verifica si el carrito es null
        if (carrito === null) {
            // Deshabilita el botón si es asi
            realizarCompraBoton.disabled = true;
            //Se desactiva la info del monto tambien
            infoMonto.classList.add("d-none");
        }

        const alertaTarjeta = document.getElementById('alertaTarjeta'); //Esta alerta existe si no hay tarjeta asociada
        const alertaDireccion = document.getElementById('alertaDireccion'); //Esta alerta existe si no hay direccion asociada

        if (alertaTarjeta || alertaDireccion) {
            // Ocultar el botón si cualquiera de los alertas existe
            realizarCompraBoton.disabled = true;
            infoMonto.classList.add("d-none");
        }

    });
    
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener todas las filas del cuerpo de la tabla
            const filas = document.querySelectorAll('#productos tr');

            // Contar cuántas filas hay
            const totalFilas = filas.length;
            console.log("Total de filas en la tabla:", totalFilas);

            // Crear y agregar inputs ocultos dinámicamente
            const form = document.querySelector('form');
            filas.forEach((fila, index) => {
                // Obtener el código y la cantidad de unidades de cada fila
                const codigo = fila.cells[0].textContent.trim();
                const cantidad = fila.cells[2].textContent.trim(); // La cantidad está en la tercera columna, por eso acceder a esa posicion

                // Crear un input hidden para el código
                const inputCodigo = document.createElement('input');
                inputCodigo.type = 'hidden';
                inputCodigo.name = `productos[${index}][codigoProducto]`;
                inputCodigo.value = codigo;

                // Crear un input hidden para la cantidad
                const inputCantidad = document.createElement('input');
                inputCantidad.type = 'hidden';
                inputCantidad.name = `productos[${index}][cantidadUnidades]`;
                inputCantidad.value = cantidad;

                // Agregar los inputs ocultos al formulario para el backend
                form.appendChild(inputCodigo);
                form.appendChild(inputCantidad);
            });

        });

        function calcularSubtotalYTotal() {
            const filas = document.querySelectorAll('#productos tr');
            let subtotal = 0;

            filas.forEach(fila => {
                const monto = parseFloat(fila.cells[3].textContent.replace('L. ', '').trim());
                subtotal += monto;
            });

            // Mostrar el subtotal
            document.getElementById('subtotal').textContent = `L. ${subtotal.toFixed(2)}`;

            // Calcular el total (subtotal + 15%)
            const total = (subtotal * 1.15) + 500;

            // Mostrar el total
            document.getElementById('total').textContent = `L. ${total.toFixed(2)}`;
            document.getElementById('subTotalInput').value = subtotal.toFixed(2);
            
        }

        // Llamar a la función para calcular el subtotal y total al cargar la página
        calcularSubtotalYTotal();


    </script>
    <script>
        @if(session('noStock'))
            var noStock = new bootstrap.Modal(document.getElementById('noStockModal'));
            noStock.show();
            // Borra el valor de la sesión para evitar que la alerta se muestre en futuras visitas
            @php session()->forget('noStock'); @endphp
        @endif
    </script>

</body>
</html>

