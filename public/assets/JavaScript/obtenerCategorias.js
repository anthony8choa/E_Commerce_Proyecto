document.querySelector("#navBar").classList.remove("d-none");

let contenedorCategorias = document.querySelector(".contenedorCategorias");

fetch(window.appConfig.urlCategorias, {
    method: "GET",
    headers: {
        "Content-Type": "application/json",
    }
})
.then(response => response.json())
.then(data => {

    window.appConfig.urlProductosCategorias = window.appConfig.urlProductosCategorias.replace("/1","");

    for(const datos of data){
        let li = document.createElement("li");
        li.classList.add("nav-item");

        let ancleLink = document.createElement("a");
        ancleLink.classList.add("nav-link");
        
        ancleLink.href = `${window.appConfig.urlProductosCategorias}/${datos.codigoCategoria}`;
        ancleLink.innerText = `${datos.nombreCategoria}`;

        li.appendChild(ancleLink);
        contenedorCategorias.appendChild(li);
    }



})
.catch((error) => {
    console.warn("Error:"+ error);
});

/*
    <li class="nav-item">
        <a class="nav-link" href="#">categoria</a>
    </li>
*/


