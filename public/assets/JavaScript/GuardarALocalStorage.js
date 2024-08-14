class GuardarALocalStorage{

    botonIngresarLocalStorage(){
        let BotonIngresar = document.getElementById("BotonIngresar");
        let InvitadoBoton = document.getElementById("invitadoBoton");
        BotonIngresar.addEventListener("click",this.agregarALocalStorageUsuario.bind(this));
        InvitadoBoton.addEventListener("click",this.agregarALocalStorageInvitado.bind(this));
    }

    agregarALocalStorageUsuario(event){
        let usuario = document.getElementById("usuarioCampo").value;
        //localStorage.clear();
        const esInvitado = "no";
        localStorage.setItem("esInvitado",esInvitado);
        localStorage.setItem("nombreUsuario",usuario);
        //console.log(localStorage.getItem("esInvitado"));


        const url = window.appConfig.urlObtenerUsuarioPorNombre.replace("/1",`/${usuario}`);
        console.log(url);

        //Se guarda el idUsuario al hacer el logeo correcto
        fetch(url, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log("Success:", data);
            console.log(url);

            if(data!=null){
                localStorage.setItem("codigoUsuario",`${data.codigoUsuario}`);
            }
        
        })
        .catch((error) => {
            console.warn("Error:"+ error);
            alert("Su contraseña o usuario es incorrecto")
            localStorage.setItem("codigoUsuario",null);
        });

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