document.addEventListener('DOMContentLoaded', function () {
    const carritoModal = new bootstrap.Modal(document.getElementById('carritoModal'));
    const productosCarrito = document.getElementById('productosCarrito');
    const totalCarrito = document.getElementById('totalCarrito');
    const addToCartButton = document.getElementById('addToCart');
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
            productoDiv.innerHTML = `
                <div class="col-6">${producto.descripcion}</div>
                <div class="col-3">${producto.precioEntero}</div>
                <div class="col-2">${producto.cantidad}</div>
                <div class="col-1">
                    <button class="btn btn-danger btn-sm eliminarProducto" data-index="${index}">Eliminar</button>
                </div>
            `;
            productosCarrito.appendChild(productoDiv);
            total += producto.precioEntero * producto.cantidad;
        });
        totalCarrito.querySelector('strong').textContent = `Lps.${total.toFixed(2)}`;
    };

    const addProductToCart = () => {
        const descripcion = document.getElementById('productDescripcion').textContent.trim();
        const precioString = document.getElementById('productPrecio').textContent.trim(); // Elemento q capture del div pero es un string
        const precioNumerico = precioString.replace(/[^0-9.-]+/g, '');
        // Convertir a número entero 
        const precioEntero = parseInt(precioNumerico, 10);
        const cantidad = 1; 
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        carrito.push({ descripcion, precioEntero, cantidad });
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
        alert("Se ha agregado exitosamente");
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

    comprarCarritoButton.addEventListener('click', () => {
        
    });
});