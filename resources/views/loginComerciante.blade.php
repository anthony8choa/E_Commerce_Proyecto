<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-commerce</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: rgb(35,47,62);
            font-family: 'Arial', sans-serif;
        }
        .contenedor-login {
            margin-top: 100px;
            max-width: 400px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .boton {
            background-color: #ffee00;
            color: white;
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
        <div class="contenedor-login">
            <h4 class="text-center">Iniciar sesión</h4>
            <h4 class="text-center mb-4">como Comerciante</h4>

            <!-- Peticion get al backend para verificar si el usuario y contraseña se encuentra registrado -->
            <form action="{{route('comerciante.login.confirmacion')}}" method="GET" id="loginForm">
                <div class="form-group">
                    <label for="nombreComercio">Nombre del Comercio</label>
                    <input name="nombreComercio" id="usuarioCampo" type="text" class="form-control" id="username" placeholder="Ingresar Comercio" required>
                </div>
                <div class="form-group">
                    <label for="nombreComercio">Contraseña </label>
                    <input name="contrasenia" type="password" class="form-control" id="contraseniaCampo" placeholder="Ingresa tu contraseña" required>
                </div>
                <button id="BotonIngresar" type="submit" class="btn boton btn-block">Ingresar</button>
            </form>

        </div>
    </div>

    <div class="container">
        <div class="row m-3 d-flex justify-content-center">
            <div class="text-center mb-4 text-white"> 
                <h5>Regresar a <a href="{{route('login')}}">usuario</a></h5>
            </div>
        </div>
            
    </div>

    <script>
        window.appConfig = {
                            urlObtenerComerciantePorNombreLogin: "{{ route('comerciante.obtener.por.nombre', ['codigoComerciante' => '0', 'contrasenia' => 'contrasenia'] ) }}"
                            };
    </script>
    <script src="{{ asset ('/assets/JavaScript/ComercianteGuardarAlLS.js') }}"></script>

</body>
</html>
