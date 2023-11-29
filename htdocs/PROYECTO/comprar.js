let carrito = [];

document.querySelectorAll('.agregar').forEach((boton) => {
    boton.addEventListener('click', (e) => {
        let producto = e.target.parentElement;
        let nombre = producto.querySelector('h2').textContent;
        let precio = producto.querySelector('h3').textContent;
        agregarAlCarrito(nombre, precio);
    });
});

function agregarAlCarrito(nombre, precio) {
    let item = { nombre, precio };
    carrito.push(item);
    actualizarCarritoUI();
}

function actualizarCarritoUI() {
    let itemsDiv = document.querySelector('#items');
    itemsDiv.innerHTML = '';

    carrito.forEach((item) => {
        itemsDiv.innerHTML += `<p>${item.nombre} - ${item.precio}<button class="eliminar">Eliminar</button></p>`;
    });

    document.querySelectorAll('.eliminar').forEach((boton) => {
        boton.addEventListener('click', (e) => {
            let itemName = e.target.parentElement.textContent.split(' - ')[0];
            carrito = carrito.filter((item) => item.nombre !== itemName);
            actualizarCarritoUI();
        });
    });
}

document.querySelector('#pagar').addEventListener('click', () => {
    if (carrito.length > 0) {
        document.querySelector('#carrito_input').value = JSON.stringify({ items: carrito });
        document.querySelector('#carrito_form').submit();
    } else {
        console.log('El carrito está vacío.');
    }
});