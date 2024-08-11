class ManejoLocalStorage{

    botonIngresarLocalStorage(){
        let BotonIngresar = document.getElementById("BotonIngresar");
        BotonIngresar.addEventListener("click",this.agregarALocalStorageUsuario.bind(this));
    }

    agregarALocalStorageUsuario(event){
        let usuario = document.getElementById("usuarioCampo").value;
        localStorage.clear;
        localStorage.setItem("tipoIngreso",usuario);
        console.log(localStorage.getItem("tipoIngreso"));
    }

}

let manejoLocalStorage = new ManejoLocalStorage();
manejoLocalStorage.botonIngresarLocalStorage();