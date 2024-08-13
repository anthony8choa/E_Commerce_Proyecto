document.addEventListener('DOMContentLoaded', function () {
    const carritoModal = new bootstrap.Modal(document.getElementById('carritoModal'));
    const productosCarrito = document.getElementById('productosCarrito');
    const totalCarrito = document.getElementById('totalCarrito');
    const vaciarCarritoButton = document.getElementById('vaciarCarrito');
    const comprarCarritoButton = document.getElementById('comprarCarrito');

    const updateCarritoModal = () => {
        const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        productosCarrito.innerHTML = '';
        let total = 0;
        //Aqui se leen todos los datos del carrito en localStorage
        carrito.forEach((producto, index) => {
            const productoDiv = document.createElement('div');
            productoDiv.classList.add('row', 'mb-2');
            productoDiv.innerHTML = `
                <div class="col-5">${producto.descripcion}</div>
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

    comprarCarritoButton.addEventListener('click', () => {
        
    });

});