<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-commerce</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:  rgb(35,47,62);
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
            background-color: #ffc107;
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
            <h4 class="text-center mb-4">como Usuario</h4>

            <!-- Peticion get al backend para verificar si el usuario y contraseña se encuentra registrado -->
            <form action="{{route('usuario.verificar')}}" method="GET" id="loginForm">
                <div class="form-group">
                    <label for="nombre">Usuario</label>
                    <input name="nombre" id="usuarioCampo" type="text" class="form-control" id="nombre" placeholder="Ingresa tu usuario" required>
                </div>
                <div class="form-group">
                    <label for="contrasenia">Contraseña</label>
                    <input name="contrasenia" type="password" class="form-control" id="contraseniaCampo" placeholder="Ingresa tu contraseña" required>
                </div>
                <button id="BotonIngresar" type="submit" class="btn boton btn-block">Ingresar</button>
            </form>

        </div>
    </div>

    <div class="container">
        <div class="row m-3 d-flex justify-content-center">
            <div class="text-center mb-4 text-white"> 
                <h5>¿No tienes una cuenta de Usuario? 
                    <a href="{{route('registro')}}">Registrarse</a>
                </h5>
                <h5>
                    O
                </h5>
                <h5>
                    Ingresar como <a id="invitadoBoton" href="{{route('principal')}}">invitado</a>
                    |
                    Ingresar como <a id="comercianteBoton" href="{{route('comerciante.login')}}">comerciante</a>
                </h5>
            </div>
        </div>
            
    </div>

    <script>
        //Info necesaria para la navbar dinamica
        window.appConfig = {
                            //Obtener los datos del usuario que se logeo (primero se verifica si se encuentra registrado mediante esta ruta)
                            //Los parametros se cambian luego en un js
                            urlObtenerUsuarioPorNombreLogin: "{{ route('usuario.obtener.nombre.login', ['nombre' => 'nombreEjemplo', 'contrasenia' => 'contrasenia']) }}",
                            };

        document.getElementById("comercianteBoton").addEventListener("click", function borrarLocalStorage() {
            localStorage.clear();
        })

    </script>
    <script src="{{ asset ('/assets/JavaScript/GuardarALocalStorage.js') }}"></script>

</body>
</html>
