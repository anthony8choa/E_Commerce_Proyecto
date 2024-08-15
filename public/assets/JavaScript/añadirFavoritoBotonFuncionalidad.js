class BotonFavoritos{

    constructor(){
        let botonAgregarAFavoritos = document.getElementById("botonAgregarAFavoritos");

        if(localStorage.getItem("codigoUsuario") != null || localStorage.getItem("esInvitado") == "no"){
            botonAgregarAFavoritos.href = botonAgregarAFavoritos.href.replace("producto/1",`producto/${localStorage.getItem("codigoUsuario")}`);
            botonAgregarAFavoritos.addEventListener("click",this.mostrarModalExito.bind(this));
        }else{
            //Si es invitado lo manda al login al hacer click
            botonAgregarAFavoritos.href = window.appConfig.urlLogin;
        }

        
    }

    mostrarModalExito(){
        alert("Se ha agregado exitosamente el producto a la lista de favoritos");
        
    }

}
let botonFavoritos = new BotonFavoritos();