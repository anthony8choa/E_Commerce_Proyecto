<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:  rgb(35,47,62);
            font-family: 'Arial', sans-serif;
        }
        .contenedor-formulario {
            max-width: 500px;
            margin: 0 auto;
            margin-top: 50px;
        }
        .grupo-hora {
            display: flex;
            align-items: center;
        }
        .grupo-hora span {
            margin: 0 5px;
            font-size: 1.25rem;
        }
        .titulo-seccion {
            font-size: 1.25rem;
            margin-top: 20px;
            margin-bottom: 15px;
            color: #343a40;
            padding-bottom: 5px;
        }
        .titulo-seccion::after {
            content: "";
            display: block;
            width: 100%;
            height: 2px;
            background-color: #007bff;
            margin-top: 5px;
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
    
    <div class="container contenedor-formulario">
        <div class="card">
            <div class="card-header text-center">
                <h2>Registro de Ventas</h2>
            </div>
            <div class="card-body">
                <form>
          
                    <div class="mb-3">
                        <h5 class="titulo-seccion">Filtrar por Fecha y Hora de Inicio</h5>
                        <div class="mb-3">
                            <label for="fecha-inicio">Fecha de Inicio:</label>
                            <input type="date" id="fecha-inicio" name="fecha-inicio" class="form-control" value="2024-08-19" min="2018-01-01" max="2024-12-31" />
                        </div>
                        <div class="grupo-hora">
                            <div class="form-group">
                                <label for="hora-inicio">Hora</label>
                                <input type="tel" class="form-control" id="hora-inicio" name="hora-inicio" placeholder="HH" required>
                            </div>
                            <span>:</span>
                            <div class="form-group">
                                <label for="minutos-inicio">Minutos</label>
                                <input type="text" class="form-control" id="minutos-inicio" name="minutos-inicio" placeholder="MM" required>
                            </div>
                        </div>
                    </div>

               
                    <div class="mb-3">
                        <h5 class="titulo-seccion">Filtrar por Fecha y Hora Final</h5>
                        <div class="mb-3">
                            <label for="fecha-final">Fecha Final:</label>
                            <input type="date" id="fecha-final" name="fecha-final" class="form-control" value="2024-08-19" min="2018-01-01" max="2024-12-31" />
                        </div>
                        <div class="grupo-hora">
                            <div class="form-group">
                                <label for="hora-final">Hora</label>
                                <input type="tel" class="form-control" id="hora-final" name="hora-final" placeholder="HH" required>
                            </div>
                            <span>:</span>
                            <div class="form-group">
                                <label for="minutos-final">Minutos</label>
                                <input type="text" class="form-control" id="minutos-final" name="minutos-final" placeholder="MM" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Ver Registro</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


