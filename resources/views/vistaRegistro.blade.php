<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - E-commerce</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:  rgb(35,47,62);
            font-family: 'Arial', sans-serif;
        }
        .register-container {
            margin-top: 50px;
            max-width: 800px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .section-title {
            font-size: 1.25rem;
            margin-top: 20px;
            margin-bottom: 15px;
            color: #343a40;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>

    <div>
        <div class="col-md-12 bg-warning d-flex justify counting-center p-3"> 
            <div>
                <h4 class="" style="color: #0056b3">E-commerce UNAH</h4>
            </div>
            
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="register-container">
            <h4 class="text-center mb-4">Registro de Usuario</h4>
            
            
            <form id="registerForm" action="{{route('registro.confirmacion')}}" method="POST">
                @csrf


                <div class="section-title">Crear Usuario y Contraseña</div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="nombreusuario" name="nombreusuario" placeholder="Ingresa un nombre de usuario" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="contrasenia" name="contrasenia" placeholder="Crea una contraseña" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombrecompleto" name="nombrecompleto" placeholder="Ingresa tu nombre completo" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su teléfono" pattern="[0-9]{1,15}" title="Ingrese un número de teléfono válido (maximo de 15 dígitos)" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" required>
                    </div>
                </div>

                <div class="section-title">Información de la Direccion</div>
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="pais">Pais</label>
                        <input type="text" class="form-control" id="nombrePais" name="nombrePais" placeholder="Ingresa el pais" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="departamento">Departamento</label>
                        <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Ingresa el departamento " required>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="codigo">Codigo Postal</label>
                        <input type="number" class="form-control" id="codigoPostal" name="codigoPostal" placeholder="Ingrese su código postal" min="0" step="1" required>
                    </div>

                </div>

                <button type="submit" class="btn btn-custom btn-block">Registrar</button>
            </form>

        </div>
    </div>


    <div class="mb-2"></div>
        <div class="row m-3 d-flex justify-content-center">
            <div class="text-center mb-4 text-white"> 
                <h5>Regresar a login <a href="{{route('login')}}">usuario</a></h5>
            </div>
        </div>

    <!-- Modal a mostrar si ya existe el usuario o correo registrado en otra cuenta -->
    <div class="modal fade" id="userExistsModal" tabindex="-1" aria-labelledby="userExistsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userExistsModalLabel">Atención</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Usuario o correo ya registrado.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        @if(session('usuarioExiste'))
            var userExistsModal = new bootstrap.Modal(document.getElementById('userExistsModal'));
            userExistsModal.show();
            // Borra el valor de la sesión para evitar que la alerta se muestre en futuras visitas
            @php session()->forget('usuarioExiste'); @endphp
        @endif

        @if(session('telefonoIngresadoConLetras'))
            alert('Ingrese un numero telefonico valido');
            @php session()->forget('telefonoIngresadoConLetras'); @endphp
        @endif

    </script>
    

 
</body>
</html>
