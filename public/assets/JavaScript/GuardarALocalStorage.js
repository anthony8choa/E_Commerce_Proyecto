class GuardarALocalStorage{

    botonIngresarLocalStorage(){
        let BotonIngresar = document.getElementById("BotonIngresar");
        let InvitadoBoton = document.getElementById("invitadoBoton");
        BotonIngresar.addEventListener("click",this.agregarALocalStorageUsuario.bind(this));
        InvitadoBoton.addEventListener("click",this.agregarALocalStorageInvitado.bind(this));
    }

    agregarALocalStorageUsuario(event){
        let usuario = document.getElementById("usuarioCampo").value;
        let contraseniaCampo = document.getElementById("contraseniaCampo").value;

        const urlInicial = window.appConfig.urlObtenerUsuarioPorNombreLogin.replace("/nombreEjemplo",`/${usuario}`);
        const urlFinal = urlInicial.replace("/contrasenia",`/${contraseniaCampo}`);
        
        fetch(urlFinal, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            }
        })
        .then(response => response.json())
        .then(data => {

            if(data!=null){
                
                localStorage.setItem("codigoUsuario",`${data.codigoUsuario}`);
                const esInvitado = "no";
                localStorage.setItem("esInvitado",esInvitado);
                localStorage.setItem("nombreUsuario",usuario);

            }
        
        })
        .catch((error) => {
            alert("Su contraseña o usuario es incorrecto");
            
        });

    }

    agregarALocalStorageInvitado(event){
        const esInvitado = "si";
        localStorage.setItem("esInvitado",esInvitado);
        localStorage.setItem("nombreUsuario",null);
        localStorage.setItem("codigoUsuario",null);
        localStorage.removeItem("codigoUsuario");
        localStorage.removeItem("nombreUsuario");
        console.log(localStorage.getItem("esInvitado"));
    }

}

let guardarALocalStorage = new GuardarALocalStorage();
guardarALocalStorage.botonIngresarLocalStorage();