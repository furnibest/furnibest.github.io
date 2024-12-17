<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 3em;
            font-weight: bold;
            color: #333;
            margin-top: 30px;
        }

        .cart-items {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .cart-item {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .cart-item:hover {
            transform: translateY(-10px);
        }

        .cart-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .cart-item-info {
            padding: 20px;
            flex-grow: 1;
        }

        .cart-item-name {
            font-size: 1.6em;
            font-weight: bold;
            color: #333;
        }

        .cart-item-price {
            font-size: 1.2em;
            color: #e74c3c;
            margin-top: 10px;
        }

        .cart-item-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-top: 1px solid #ddd;
            background-color: #fafafa;
        }

        .remove-button, .checkout-button {
            padding: 10px 20px;
            font-size: 1.1em;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .remove-button {
            background-color: #e74c3c;
            color: white;
        }

        .remove-button:hover {
            background-color: #c0392b;
        }

        .checkout-button {
            background-color: #27ae60;
            color: white;
        }

        .checkout-button:hover {
            background-color: #2ecc71;
        }

        .empty-cart {
            text-align: center;
            font-size: 1.5em;
            color: #888;
            margin-top: 50px;
        }

        .total-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            align-items: center;
            position: sticky;
            bottom: 0;
            z-index: 10;
        }

        .total-container span {
            font-size: 1.6em;
            font-weight: bold;
            color: #333;
        }

        .checkout-container {
            text-align: center;
            margin-top: 30px;
        }

        .checkout-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 768px) {
            .cart-items {
                grid-template-columns: 1fr;
            }

            .total-container {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
<div class="">
    <h2 class="section-title">Keranjang Belanja</h2>
    <div id="cartItems" class="cart-items"></div>
    <div id="emptyCart" class="empty-cart" style="display: none;">Keranjang Anda kosong.</div>
    <!-- Display Total Price -->
    <div class="total-container">
        <span>Total: Rp <span id="totalPriceDisplay"><?php echo number_format($total, 2, ',', '.'); ?></span></span>
        <form id="checkoutForm" method="POST" action="checkout.php" class="checkout-form">
            <input type="hidden" name="cart" id="cartData" value="">
            <button class="checkout-button" type="submit">Checkout</button>
        </form>
    </div>
</div>

<script>
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartItemsContainer = document.getElementById('cartItems');
    const emptyCartMessage = document.getElementById('emptyCart');
    const totalPriceDisplay = document.getElementById('totalPriceDisplay');
    const cartDataInput = document.getElementById('cartData');

    function renderCart() {
        if (cart.length === 0) {
            emptyCartMessage.style.display = 'block';
        } else {
            cartItemsContainer.innerHTML = '';
            let total = 0;
            cart.forEach((product, index) => {
                total += product.price;
                const itemDiv = document.createElement('div');
                itemDiv.className = 'cart-item';
                itemDiv.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <div class="cart-item-info">
                        <div class="cart-item-name">${product.name}</div>
                        <div class="cart-item-price">Harga: Rp ${product.price.toLocaleString('id-ID', { minimumFractionDigits: 2 })}</div>
                    </div>
                    <div class="cart-item-actions">
                        <button class="remove-button" onclick="removeFromCart(${index})">Hapus</button>
                        <button class="checkout-button" onclick="checkoutItem(${index})">Checkout</button>
                    </div>
                `;
                cartItemsContainer.appendChild(itemDiv);
            });
            totalPriceDisplay.textContent = total.toLocaleString('id-ID', { minimumFractionDigits: 2 });
            cartDataInput.value = JSON.stringify(cart); // Set data keranjang ke input tersembunyi
        }
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        renderCart();
    }

    function checkoutItem(index) {
        const selectedItem = cart[index];
        alert("Fitur ini sedang dalam tahap pengembangan");
    }

    renderCart();
</script>

<?php include 'includes/footer.php'; ?>
</body>
</html>
