fetch(window.appConfig.urlCategorias, {
    method: "GET",
    headers: {
        "Content-Type": "application/json",
    }
})
.then(response => response.json())
.then(data => {
    //console.log("Success:", data);
    let i = 1;

    let rutaCategoriaEspecifica = window.appConfig.urlProductosCategorias;
    rutaCategoriaEspecifica.replace("/1","");

    for(const datos of data){
        document.querySelector("#categoriasProductosPrincipalContainer").innerHTML +=
        `
            <section id="categoriaContainer${i}" class="row m-3">

                    <section class="row mt-3 mb-2">
                        <section class="col-6 fw-bold fs-4">
                            <!-- nombre categoria 1 -->
                            ${datos.nombreCategoria}
                        </section>
                        <section class="col text-end fs-4">
                            <a type="button" href="${rutaCategoriaEspecifica}/${i}" class="btn btn-primary">Ver mas</a>
                        </section>
                    </section>
                    <section class="row fs-6 mb-5">
                        <!-- Producto, notar que esta secuencia html se repite -->
                        <section class="col-md-3">
                            <div id="imagenProductoPPContainer${i}" class="shadow-lg card h-100">
                                <!-- Imagen del producto -->
                                <img src="https://upload.wikimedia.org/wikipedia/commons/e/ea/Jersei-coll-alt.jpg" height="300" width="300" class="card-img-top" alt="Sueter">
                                <div class="card-body">
                                    <!-- Nombre del producto -->
                                    <h5 id="nombreProductoPPContainer${i}" class="card-title">Sueter</h5>
                                    <p class="card-text">
                                        <!-- Precio del producto -->
                                        <div>
                                            Precio: <div id="precioProductoPPContainer${i}"> 500Lps.</div>
                                        </div>
                                    </p>
                                    <a href="#" class="btn btn-primary">Ir al producto</a>
                                </div>
                            </div>
                        </section>
                        <!-- Producto 2, notar que esta secuencia html se repite -->
                        <section class="col-md-3">
                            <div class="shadow-lg card h-100">
                                <img src="https://yazbek.com.mx/cdn/shop/products/C0651-pantalon-mezclilla-caballero-100algodon-indigo-oscuro_1.jpg?v=1693281330" height="300" width="300" class="card-img-top" alt="Sueter">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </section>
                        <!-- Producto 3, notar que esta secuencia html se repite -->
                        <section class="col-md-3">
                            <div class="shadow-lg card h-100">
                                <img src="https://paylesshn.vtexassets.com/arquivos/ids/409161/195826_1.jpg?v=638180565815400000" height="300" width="300" class="card-img-top" alt="Sueter">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </section>
                        <!-- Producto 4, notar que esta secuencia html se repite -->
                        <section class="col-md-3">
                            <div class="shadow-lg card h-100">
                                <img src="https://www.repuestostotal.com/wp-content/uploads/MJC0112_MLS2N3XL-CHUMPA-BRIGHTON-MAN-LS2-NEGRO-A.jpg" height="300" width="300" class="card-img-top" alt="Sueter">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </section>
                    </section>
                </section>
                <section class="m-3 border border-secondary"></section"
        `
        i++;
    }



})
.catch((error) => {
    console.warn("Error:" + error);
});

