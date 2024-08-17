class ComercianteGuardarALocalStorage{

    botonIngresarLocalStorage(){
        let BotonIngresar = document.getElementById("BotonIngresar");
        BotonIngresar.addEventListener("click",this.agregarALocalStorageComerciante.bind(this));
    }

    agregarALocalStorageComerciante(event){
        let comerciante = document.getElementById("usuarioCampo").value;
        let contraseniaCampo = document.getElementById("contraseniaCampo").value;

        let urlInicial = window.appConfig.urlObtenerComerciantePorNombreLogin.replace("/0",`/${comerciante}`);
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
                
                localStorage.setItem("nombreComercio",data.nombreComercio);
                localStorage.setItem("codigoComercio",data.codigoComercio);

            }
        
        })
        .catch((error) => {
            alert("Su contraseña o nombre de comercio es incorrecto");
            
        });

    }

}

let comercianteGuardarALocalStorage = new ComercianteGuardarALocalStorage();
comercianteGuardarALocalStorage.botonIngresarLocalStorage();