document.addEventListener('DOMContentLoaded', function() {
    // Verify that "Add to Cart" buttons are correctly selected
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    console.log('Buttons found:', addToCartButtons);

    if (addToCartButtons.length === 0) {
        console.error('No "Add to Cart" buttons found. Check your HTML structure and class names.');
    }

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productItem = this.closest('.product-item'); // Verify product-item selection
            if (!productItem) {
                console.error('No product-item found for button:', this);
                return;
            }

            const product = {
                id: productItem.getAttribute('data-id'),
                name: productItem.getAttribute('data-name'),
                price: productItem.getAttribute('data-price')
            };
            console.log('Product added:', product);

            addToCart(product);
            alert(`${product.name} has been added to your cart.`);
        });
    });

    // Update cart count in the navbar
    function updateCartCount() {
        const cartCount = document.querySelector('.cart-count');
        if (!cartCount) {
            console.error('Cart count element not found.');
            return;
        }
        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        cartCount.textContent = cartItems.length;
    }

    function addToCart(product) {
        const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        cartItems.push(product);
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        updateCartCount();
    }

    // Initialize cart count
    updateCartCount();
});
