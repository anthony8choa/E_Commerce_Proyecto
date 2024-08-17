if (localStorage.getItem('carrito') !== null) {
    // Recupera el carrito desde localStorage y parsea el JSON
    let carrito = JSON.parse(localStorage.getItem('carrito'));

    // Obtén la referencia al cuerpo de la tabla
    let tbody = document.getElementById('productos');

    // Recorre los productos del carrito y agrégalos a la tabla
    carrito.forEach(producto => {
        // Crea una nueva fila
        let fila = document.createElement('tr');

        // Crea celdas y añade los valores correspondientes
        let codigoCell = document.createElement('td');
        codigoCell.textContent = producto.codigoProducto;
        fila.appendChild(codigoCell);

        let nombreCell = document.createElement('td');
        nombreCell.textContent = producto.nombreProducto;
        fila.appendChild(nombreCell);

        let cantidadCell = document.createElement('td');
        cantidadCell.textContent = producto.cantidad;
        fila.appendChild(cantidadCell);

        let precioCell = document.createElement('td');
        precioCell.textContent = 'L. ' + producto.precioEntero;
        fila.appendChild(precioCell);

        // Crea la celda del botón
        let botonCell = document.createElement('td');

        // Crea el botón de "Ir a Producto"
        let boton = document.createElement('a');
        boton.textContent = 'Ir a Producto';
        boton.className = 'btn btn-primary btn-sm';

        let codigoProducto = producto.codigoProducto;

        // Opcional: Asigna una URL dinámica según el código del producto
        boton.href = window.appConfig.urlProductoVisualizar.replace("/0",`/${codigoProducto}`);

        // Añade el botón a la celda y la celda a la fila
        botonCell.appendChild(boton);
        fila.appendChild(botonCell);

        // Añade la fila completa al tbody
        tbody.appendChild(fila);
    });
}