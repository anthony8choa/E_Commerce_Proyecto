<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - E-commerce</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
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
                <h4><a class="" href="#">E-commerce UNAH</a></h4>
            </div>
            
        </div>
    </div>

    <div class="container d-flex justify-content-center">
        <div class="register-container">
            <h4 class="text-center mb-4">Registro de Usuario</h4>
            <form id="registerForm" action="/register" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre completo" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingresa tu número de teléfono" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresa tu dirección" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="correo">Correo Electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" required>
                    </div>
                </div>

                <div class="section-title">Información de la Tarjeta</div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tarjeta">Número de Tarjeta</label>
                        <input type="text" class="form-control" id="tarjeta" name="tarjeta" placeholder="Ingresa tu número de tarjeta" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fecha_vencimiento">Fecha de Vencimiento</label>
                        <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento" required>
                    </div>
                </div>

       
                <div class="section-title">Crear Usuario y Contraseña</div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Ingresa un nombre de usuario" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Crea una contraseña" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-custom btn-block">Registrar</button>
            </form>
        </div>
    </div>

 
</body>
</html>
