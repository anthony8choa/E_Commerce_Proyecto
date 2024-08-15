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

    window.appConfig.urlProductosCategorias = window.appConfig.urlProductosCategorias.replace("/0","");
    window.appConfig.urlProductosCategorias = window.appConfig.urlProductosCategorias.replace("/1","");
    let url = window.appConfig.urlProductosCategorias;
    console.log(url);

    for(const datos of data){
        let li = document.createElement("li");
        li.classList.add("nav-item");

        let ancleLink = document.createElement("a");
        ancleLink.classList.add("nav-link");

        let idUsuario = 0;
        if(localStorage.getItem("codigoUsuario") != null){
            idUsuario = localStorage.getItem("codigoUsuario");
        }
        
        ancleLink.href = `${window.appConfig.urlProductosCategorias}/${datos.codigoCategoria}/${idUsuario}`;
        console.log("ancle: "+ancleLink.href);
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


