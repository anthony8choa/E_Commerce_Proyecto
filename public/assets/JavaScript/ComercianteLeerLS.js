class ComercioLeerLS{

    constructor(){
        let nombreComercio = document.getElementById("nombreComercio");
        if(localStorage.getItem("nombreComercio")!=null){
            nombreComercio.innerText = localStorage.getItem("nombreComercio");
        }
    }

}
let comercioLeerLS = new ComercioLeerLS();