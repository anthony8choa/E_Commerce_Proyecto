class GuardarALocalStorage{

    botonIngresarLocalStorage(){
        let BotonIngresar = document.getElementById("BotonIngresar");
        let InvitadoBoton = document.getElementById("invitadoBoton");
        BotonIngresar.addEventListener("click",this.agregarALocalStorageUsuario.bind(this));
        InvitadoBoton.addEventListener("click",this.agregarALocalStorageInvitado.bind(this));
    }

    agregarALocalStorageUsuario(event){
        let usuario = document.getElementById("usuarioCampo").value;
        localStorage.clear();
        const esInvitado = "no";
        localStorage.setItem("esInvitado",esInvitado);
        localStorage.setItem("nombreUsuario",usuario);
        console.log(localStorage.getItem("esInvitado"));
    }

    agregarALocalStorageInvitado(event){
        localStorage.clear;
        const esInvitado = "si";
        localStorage.setItem("esInvitado",esInvitado);
        localStorage.setItem("nombreUsuario",null);
        console.log(localStorage.getItem("esInvitado"));
    }

}

let guardarALocalStorage = new GuardarALocalStorage();
guardarALocalStorage.botonIngresarLocalStorage();