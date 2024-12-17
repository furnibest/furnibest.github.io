<?php
include 'db/config.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$product = $stmt->get_result()->fetch_assoc();
?>

<?php include 'includes/header.php'; ?>
<div class="product-detail-container">
    <div class="product-image">
        <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" id="productImage">
    </div>
    <div class="product-info">
        <h2 class="product-name" id="productName"><?php echo $product['name']; ?></h2>
        <p class="description" id="productDescription"><?php echo $product['description']; ?></p>
        <p class="price" id="productPrice">Harga: Rp <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
        <p class="stock" id="productStock">Stok: <?php echo $product['stock']; ?> unit</p>
        <a href="#" class="btn add-to-cart" id="addToCartButton" onclick="addToCart(<?php echo $product['id']; ?>)">Tambah ke Keranjang</a>
    </div>
</div>

<!-- Internal CSS -->
<style>
/* General Styling */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 0;
}

.product-detail-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 30px;
    max-width: 1200px;
    margin: 0 auto;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.product-image {
    flex: 1 1 45%;
    text-align: center;
}

.product-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.product-info {
    flex: 1 1 45%;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.product-name {
    font-size: 2em;
    color: #333;
    margin-bottom: 15px;
}

.description {
    font-size: 1.1em;
    color: #666;
    margin-bottom: 20px;
}

.price {
    font-size: 1.3em;
    color: #e74c3c;
    margin-bottom: 20px;
}

.stock {
    font-size: 1.1em;
    color: #333;
    margin-bottom: 25px;
}

.btn {
    text-decoration: none;
    display: inline-block;
    padding: 12px 30px;
    font-size: 1.1em;
    color: #fff;
    background-color: #3498db;
    border-radius: 5px;
    text-align: center;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn:hover {
    background-color: #2980b9;
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .product-detail-container {
        flex-direction: column;
        padding: 20px;
    }

    .product-image {
        margin-bottom: 20px;
    }

    .product-info {
        padding: 10px;
    }
}
</style>

<!-- Internal JavaScript -->
<script>
// JavaScript for adding to cart functionality
let cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(productId) {
    const product = {
        id: productId,
        name: document.getElementById('productName').innerText,
        price: parseFloat(document.getElementById('productPrice').innerText.replace('Harga: Rp ', '').replace('.', '').replace(',', '.')),
        image: document.getElementById('productImage').src,
    };
    
    cart.push(product);
    localStorage.setItem('cart', JSON.stringify(cart));
    alert(`${product.name} telah ditambahkan ke keranjang!`);
}
</script>

<?php include 'includes/footer.php'; ?>
