<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetodoPagoController extends Controller
{
    /**
     * Esta funcion agrega un metodo de pago a un usuario existente
     * @param request Esta variable contiene todos los datos del metodo de pago a registrar
     * @param codigoUsuario Contiene el codigo del usuario a asociarle el nuevo metodo de pago
     * @return boolean Retorna true si se guardó con éxito
     */
    public function agregarMetodoPago(Request $request, $codigoUsuario){

    }
}
