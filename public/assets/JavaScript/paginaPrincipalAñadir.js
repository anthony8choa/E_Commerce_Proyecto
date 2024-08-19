fetch(window.appConfig.urlObtenerProductosDeTodasCategorias, {
    method: "GET",
    headers: {
        "Content-Type": "application/json",
    }
})
.then(response => response.json())
.then(data => {
    //console.log("Success:", data);
    let i = 1;

    window.appConfig.urlProductosCategorias = window.appConfig.urlProductosCategorias.replace("/1/0","")
    let rutaCategoriaEspecifica = window.appConfig.urlProductosCategorias;

    let idUsuario = "0";

    if(localStorage.getItem("codigoUsuario") != null){
        idUsuario = localStorage.getItem("codigoUsuario");
    }

    
    for(const categoria of data){
        document.querySelector("#categoriasProductosPrincipalContainer").innerHTML +=
        `
            <section id="categoriaContainer${i}" class="row m-3">

                    <section class="row mt-3 mb-2">
                        <section id="nombreCateogoria${i}" class="col-6 fw-bold fs-4">
                            <!-- nombre categoria 1 -->
                            ${categoria.nombreCategoria}
                        </section>
                        <section class="col text-end fs-4">
                            <a type="button" href="${rutaCategoriaEspecifica}/${i}/${idUsuario}" class="btn btn-primary">Ver mas</a>
                        </section>
                    </section>
                    <section id="productosDeUnaCategoriaContainer${i}" class="row fs-6 mb-5">
                        
                    </section>
                </section>
                <section class="m-3 border border-secondary"></section"
        `
        i++;
    }

    var j = 1;
    for(const categoria of data){

        let i = 1;
        for(const producto of categoria.productos){
            if(i > 4){
                break;
            }

            CrearTarjetaInformacion(producto, j);
            
            i++;
        }
    
    j++;

    }

    

})
.catch((error) => {
    console.warn("Error:" + error);
});

function CrearTarjetaInformacion(producto, j){
    let contenedorPorProducto = document.createElement("section");
    contenedorPorProducto.classList.add("col-md-3");

    let imagenProductoPPContainer = document.createElement("div");
    imagenProductoPPContainer.classList.add("shadow-lg","card","h-100");

    let imagenProducto = document.createElement("img");
    imagenProducto.src = `${producto.imagenProducto}`;
    imagenProducto.height = "300";
    imagenProducto.width = "300";
    imagenProducto.classList.add("card-img-top");
    imagenProducto.alt = "...";

    let cuerpoCard = document.createElement("div");
    cuerpoCard.classList.add("card-body");

    let nombreProducto = document.createElement("h5");
    nombreProducto.classList.add("card-title");
    nombreProducto.innerText = `${producto.nombreProducto}`;

    let textoCard = document.createElement("p");
    textoCard.classList.add("card-text");

    let precioProductoDiv = document.createElement("div");
    precioProductoDiv.classList.add("mt-2");
    precioProductoDiv.innerText = "Precio:";

    let precioProducto = document.createElement("div");
    precioProducto.innerText = `Lps.${producto.precioUnitario}`;

    let irProducto = document.createElement("a");
    let codigoUsuario = localStorage.getItem("codigoUsuario");
    if(codigoUsuario == null){
        codigoUsuario = 0;
    }

    irProducto.href = `${window.appConfig.urlProductoVisualizar.replace("/0",`/${producto.codigoProducto}`)}`; //ir al producto
    irProducto.href = irProducto.href.replace("/-1",`/${codigoUsuario}`);
    irProducto.classList.add("btn","btn-primary");
    irProducto.innerText = "Ir al producto";

    precioProductoDiv.appendChild(precioProducto);

    textoCard.appendChild(precioProductoDiv);

    cuerpoCard.appendChild(nombreProducto);
    cuerpoCard.appendChild(textoCard);
    cuerpoCard.appendChild(irProducto);

    imagenProductoPPContainer.appendChild(imagenProducto);
    imagenProductoPPContainer.appendChild(cuerpoCard);

    contenedorPorProducto.appendChild(imagenProductoPPContainer);

    let todo = document.createElement("div");
    todo.appendChild(contenedorPorProducto);

    document.getElementById("productosDeUnaCategoriaContainer"+j).innerHTML += todo.innerHTML;
}


