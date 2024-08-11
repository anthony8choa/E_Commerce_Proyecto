class LeerLocalStorage{

    constructor(){

        let nombreUsuarioBarraNavegacion = document.getElementById("nombreUsuarioBarraNavegacion");

        if(localStorage.getItem("esInvitado") === "si" || localStorage.getItem("esInvitado") === null){
            nombreUsuarioBarraNavegacion.innerHTML = "Invitado";
        }else if(localStorage.getItem("esInvitado") === "no"){
            if(localStorage.getItem("nombreUsuario") != null){
                nombreUsuarioBarraNavegacion.innerHTML = `${localStorage.getItem("nombreUsuario")}`;
            }else{
                nombreUsuarioBarraNavegacion.innerHTML = "usuario";
            }
        }else{
            console.warn("Advertencia");
        }
    }

}

let leerLocalStorage = new LeerLocalStorage();