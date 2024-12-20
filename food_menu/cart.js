const cart = [];

function addToCart(id) {
    const product = document.querySelector(`.product[data-id="${id}"]`);
    const productName = product.getAttribute('data-name');
    const productPrice = parseFloat(product.getAttribute('data-price'));
    
    const cartItem = cart.find(item => item.id === id);
    if (cartItem) {
        cartItem.quantity += 1;
    } else {
        cart.push({ id, name: productName, price: productPrice, quantity: 1 });
    }
    updateCart();
}

function removeFromCart(id) {
    const itemIndex = cart.findIndex(item => item.id === id);
    if (itemIndex > -1) {
        cart[itemIndex].quantity -= 1;
        if (cart[itemIndex].quantity <= 0) {
            cart.splice(itemIndex, 1);
        }
    }
    updateCart();
}

function updateCart() {
    const cartItems = document.getElementById('cart-items');
    const totalPrice = document.getElementById('total-price');
    cartItems.innerHTML = '';
    let total = 0;

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        cartItems.innerHTML += `
            <div class="cart-item">
                <p>${item.name} - ₵{item.price} x ${item.quantity}</p>
                <button onclick="removeFromCart(${item.id})">Remove</button>
            </div>
        `;
    });
    totalPrice.innerText = total.toFixed(2);
}

function checkout() {
    document.getElementById('cart').style.display = 'none';
    document.getElementById('payment').style.display = 'block';
}

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
    alert("Cart saved!");
}

function loadCart() {
    const savedCart = JSON.parse(localStorage.getItem('cart'));
    if (savedCart) {
        savedCart.forEach(item => cart.push(item));
        updateCart();
    }
}
// Load saved cart on page load
window.onload = loadCart;