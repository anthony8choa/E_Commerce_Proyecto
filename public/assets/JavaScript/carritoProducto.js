document.addEventListener('DOMContentLoaded', function () {
    // Inicializa la ventana modal
    const carritoModal = new bootstrap.Modal(document.getElementById('carritoModal'));
    //obtiene los productos del carrito
    const productosCarrito = document.getElementById('productosCarrito');
    const totalCarrito = document.getElementById('totalCarrito');
    const addToCartButton = document.getElementById('addToCart');
    const iconoCarrito = document.getElementById('iconoCarrito');
    const vaciarCarritoButton = document.getElementById('vaciarCarrito');
    const comprarCarritoButton = document.getElementById('comprarCarrito');
    const transaccionesBoton = document.getElementById("transaccionesBoton");

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

            // Agrega el producto al contenedor de productos en la ventana modal
            productosCarrito.appendChild(productoDiv);
            total += precioTotalProducto;
        });
        totalCarrito.querySelector('strong').textContent = `Lps.${total.toFixed(2)}`;
    };

    const addProductToCart = () => {

        const nombreProducto = document.getElementById('productName').textContent.trim();
        const precioString = document.getElementById('productPrecio').textContent.trim(); // Elemento q capture del div pero es un string
        const codigoProducto = document.getElementById('codigoProductoSpan').innerText;
        const precioNumerico = precioString.replace(/[^0-9.-]+/g, '');
        const precioEntero = parseFloat(precioNumerico);
        
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    
        // Buscar si el producto ya existe en el carrito
        const productoExistente = carrito.find(producto => 
            producto.codigoProducto === codigoProducto && 
            producto.nombreProducto === nombreProducto
        );
    
        if (productoExistente) {
            // Si el producto ya existe, incrementar la cantidad y actualizar el precio
            productoExistente.cantidad += 1;
            productoExistente.precioEntero = productoExistente.cantidad * precioEntero;
        } else {
            // Si el producto no existe, agregarlo al carrito
            carrito.push({ codigoProducto, nombreProducto, precioEntero, cantidad: 1 });
        }
        
        // Guarda el carrito actualizado en localStorage
        localStorage.setItem('carrito', JSON.stringify(carrito));
        
    };

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

    addToCartButton.addEventListener('click', (e) => {
        e.preventDefault();
        addProductToCart();
        updateCarritoModal();
    });

    iconoCarrito.addEventListener('click', () => {
        updateCarritoModal();
        carritoModal.show();
    });

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
        comprarCarritoButton.href = comprarCarritoButton.href.replace("/0", `/${localStorage.getItem("codigoUsuario")}`);
        transaccionesBoton.href = window.appConfig.urlVerTransacciones.replace("/0",`/${localStorage.getItem("codigoUsuario")}`);
    }else{
        comprarCarritoButton.href = window.appConfig.urlLogin;  
    }

});