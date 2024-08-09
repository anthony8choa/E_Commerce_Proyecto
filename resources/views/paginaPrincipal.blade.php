<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

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

    </style>
</head>
<body>
    <!-- Barra de navegacion -->
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Alejandro
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Transacciones</a></li>
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

    <!-- Pagina principal -->
    <section class="container">
        <section class="row m-3">
            <section class="row mt-3 mb-2">
                <section class="col-6 fw-bold fs-4">
                    Ropa
                </section>
                <section class="col text-end fs-4">
                    <button type="button" class="btn btn-primary">Ver mas</button>
                </section>
            </section>
            <section class="row fs-6">
                <section class="col-md-3">
                    <div class="card h-100">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/ea/Jersei-coll-alt.jpg" class="card-img-top" alt="Sueter">
                        <div class="card-body">
                            <h5 class="card-title">Sueter</h5>
                            <p class="card-text">
                                <div>Precio: 500Lps.</div>
                            </p>
                            <a href="#" class="btn btn-primary">Ir al producto</a>
                        </div>
                    </div>
                </section>
                <section class="col-md-3">
                    <div class="card h-100">
                        <img src="https://yazbek.com.mx/cdn/shop/products/C0651-pantalon-mezclilla-caballero-100algodon-indigo-oscuro_1.jpg?v=1693281330" class="card-img-top" alt="Sueter">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </section>
                <section class="col-md-3">
                    <div class="card h-100">
                        <img src="https://paylesshn.vtexassets.com/arquivos/ids/409161/195826_1.jpg?v=638180565815400000" class="card-img-top" alt="Sueter">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </section>
                <section class="col-md-3">
                    <div class="card h-100">
                        <img src="https://www.repuestostotal.com/wp-content/uploads/MJC0112_MLS2N3XL-CHUMPA-BRIGHTON-MAN-LS2-NEGRO-A.jpg" class="card-img-top" alt="Sueter">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </section>
            </section>
        </section>

        <section class="row m-3">
            <section class="row mt-3 mb-2">
                <section class="col-6 fw-bold fs-4">
                    Alimentos
                </section>
                <section class="col text-end fs-4">
                    <button type="button" class="btn btn-primary">Ver mas</button>
                </section>
            </section>
            <section class="row fs-6">
                <section class="col-md-3">
                    <div class="card h-100">
                        <img src="https://sula.hn/wp-content/uploads/2020/01/leche-entera-elecster-946ml.jpg" class="card-img-top" alt="Sueter">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </section>
                <section class="col-md-3">
                    <div class="card h-100">
                        <img src="https://thefoodtech.com/wp-content/uploads/2020/05/carne-de-res.jpg" class="card-img-top" alt="Sueter">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </section>
            </section>
        </section>

        <section class="row m-3">

        </section>

        <section class="row m-3">

        </section>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
