const products = [
    { id: 1, name: 'Producto 1', description: 'Descripción del producto 1.', price: 20 },
    { id: 2, name: 'Producto 2', description: 'Descripción del producto 2.', price: 30 },
    { id: 3, name: 'Producto 3', description: 'Descripción del producto 3.', price: 40 }
];

const cart = {
    items: [],
    total: 0,
    add: function(product) {
        const item = this.items.find(item => item.id === product.id);
        if (item) {
            item.quantity++;
        } else {
            this.items.push({...product, quantity: 1 });
        }
        this.calculateTotal();
        this.render();
    },
    remove: function(id) {
        const index = this.items.findIndex(item => item.id === id);
        if (index !== -1) {
            this.items.splice(index, 1);
        }
        this.calculateTotal();
        this.render();
    },
    clear: function() {
        this.items = [];
        this.total = 0;
        this.render();
    },
    calculateTotal: function() {
        this.total = this.items.reduce((total, item) => total + (item.price * item.quantity), 0);
    },
    render: function() {
        const cartList = document.querySelector('.cart-list');
        cartList.innerHTML = '';
        this.items.forEach(item => {
            const cartItem = document.createElement('li');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
          <span class="name">${item.name}</span>
          <span class="quantity">${item.quantity} x $${item.price.toFixed(2)}</span>
          <span class="price">$${(item.price * item.quantity).toFixed(2)}</span>
          <button class="remove-from-cart" data-id="${item.id}">Eliminar</button>
        `;
            cartList.appendChild(cartItem);
        });
        const total = document.querySelector('.total');
        total.textContent = `Total: $${this.total.toFixed(2)}`;
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            const product = products.find(product => product.id === parseInt(id));
            cart.add(product);
        });
    });

    const clearCartButton = document.querySelector('.clear-cart');
    clearCartButton.addEventListener('click', () => {
        cart.clear();
    });

    const cartList = document.querySelector('.cart-list');
    cartList.addEventListener('click', event => {
        if (event.target.classList.contains('remove-from-cart')) {
            const id = event.target.dataset.id;
            cart.remove(parseInt(id));
        }
    });
});