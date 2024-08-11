class LeerLocalStorage{

    constructor(){

        let dropdownUsuarioBoton = document.getElementById("dropdownUsuarioBoton");
        let dropdownUsuario = document.getElementById("dropdownUsuario");
        let tipoIngresoDropdown = document.getElementById("tipoIngresoDropdown");
        let dropdownInvitado = document.getElementById("dropdownInvitado");

        if(localStorage.getItem("esInvitado") === "si" || localStorage.getItem("esInvitado") === null){
            dropdownInvitado.innerHTML = "Invitado";

        }else if(localStorage.getItem("esInvitado") === "no"){
            if(localStorage.getItem("nombreUsuario") != null){
                dropdownUsuarioBoton.innerHTML = `${localStorage.getItem("nombreUsuario")}`;
                dropdownUsuarioBoton.classList.add("dropdown-toggle");
                dropdownUsuarioBoton.classList.toggle('d-none');

                dropdownUsuario.classList.toggle('d-none');

                dropdownInvitado.classList.add('d-none');

            }else{
                dropdownUsuarioBoton.innerHTML = "usuario";
            }
        }else{
            console.warn("Advertencia");
        }
    }

}

let leerLocalStorage = new LeerLocalStorage();