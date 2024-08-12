class localAlmacenamiento{

    constructor(){
        //localStorage.clear;

        //localAlmacenamiento.mostrarElementoLS();
        this.datoEnviar();
    }

    datoEnviar(){
        let datoLocalStorage = localStorage.getItem("nombre");//Depende de como se llame el dato en LS

        if (datoLocalStorage) {
            // Obtén la URL base desde el meta tag
            //EJEMPLO METATAG:
            //<meta name="route-url" content="{{ route('ruta.ejemplo', ['llave' => 'invitado']) }}">
            let routeUrl = document.querySelector(`meta[name="route-url"]`).getAttribute(`content`);
            let urlReplace = routeUrl.replace("invitado", datoLocalStorage);//Siempre se llama invitado si ocurre algun error
            console.log(urlReplace);
            console.log(datoLocalStorage);

            let botonEnviar = document.getElementById("botonEnviar"); //Se pone el id del boton que enviara informacion por la url(get o post)
            botonEnviar.setAttribute("href", urlReplace);

        } else {
            console.log(`No se encontró el nombre en localStorage.`);
        }
    }

    /*static mostrarLS(){
        document.body.innerHTML += `${localStorage.getItem("nombre")}`;//Depende de como se llame el dato en LS
    }*/ //Si se quiere mostrar el dato

}

let localAlmacenamientoObjeto = new localAlmacenamiento();
