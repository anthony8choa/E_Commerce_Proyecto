document.addEventListener('DOMContentLoaded', function () {
    const carritoModal = new bootstrap.Modal(document.getElementById('carritoModal'));
    const productosCarrito = document.getElementById('productosCarrito');
    const totalCarrito = document.getElementById('totalCarrito');
    const iconoCarrito = document.getElementById('iconoCarrito');
    const vaciarCarritoButton = document.getElementById('vaciarCarrito');
    const comprarCarritoButton = document.getElementById('comprarCarrito');

    const updateCarritoModal = () => {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        productosCarrito.innerHTML = '';
        let total = 0;
        carrito.forEach((producto, index) => {

            const productoDiv = document.createElement('div');
            productoDiv.classList.add('row', 'mb-2');

            const precioTotalProducto = producto.precioEntero;

            let mensaje = "";

            if(producto.cantidad > 1){
                mensaje = `(Precio unitario: Lps.${producto.precioEntero/producto.cantidad})`;
            }

            productoDiv.innerHTML = `
                <div id="productoNombreCarrito" class="col-6">${producto.nombreProducto} (codigo de producto: ${producto.codigoProducto})</div>
                <div id="productoPrecioCarrito" class="col-3">Lps.${producto.precioEntero} ${mensaje}</div>
                <div id="productoCantidadCarrito" class="col-2">${producto.cantidad}</div>
                <div id="productoBotonEliminarProductoCarrito" class="col-1">
                    <button class="btn btn-danger btn-sm eliminarProducto" data-index="${index}">Eliminar</button>
                </div>
            `;
            productosCarrito.appendChild(productoDiv);
            total += precioTotalProducto;
        });
        totalCarrito.querySelector('strong').textContent = `Lps.${total.toFixed(2)}`;
    };

    iconoCarrito.addEventListener('click', () => {
        updateCarritoModal();
        carritoModal.show();
    });

    const vaciarCarrito = () => {
        localStorage.removeItem('carrito');
        updateCarritoModal();
    };

    const eliminarProducto = (index) => {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carrito.splice(index, 1);
        localStorage.setItem('carrito', JSON.stringify(carrito));
        updateCarritoModal();
    };

    vaciarCarritoButton.addEventListener('click', () => {
        vaciarCarrito();
    });

    productosCarrito.addEventListener('click', (e) => {
        if (e.target.classList.contains('eliminarProducto')) {
            const index = e.target.getAttribute('data-index');
            eliminarProducto(index);
        }
    });

    if(localStorage.getItem("codigoUsuario") != null){
        comprarCarritoButton.href = comprarCarritoButton.href.replace("/0", `/${localStorage.getItem("codigoUsuario")}`)
    }else{
        comprarCarritoButton.href = window.appConfig.urlLogin;  
    }

});