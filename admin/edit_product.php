<?php
session_start();
include '../db/config.php';

// Pastikan admin sudah login


// Ambil ID produk dari URL
$product_id = $_GET['id'];

// Ambil data produk dari database
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$product = $stmt->get_result()->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    
    // Cek apakah file gambar diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);

        // Siapkan dan eksekusi pernyataan SQL untuk memperbarui produk
        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock = ?, image = ? WHERE id = ?");
        $stmt->bind_param("ssdssi", $name, $description, $price, $stock, $image, $product_id);
    } else {
        // Jika tidak ada gambar baru, hanya perbarui informasi lainnya
        $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, stock = ? WHERE id = ?");
        $stmt->bind_param("ssdii", $name, $description, $price, $stock, $product_id);
    }
    
    $stmt->execute();
    
    // Redirect ke halaman manajemen produk setelah berhasil
    header("Location: manage_products.php");
    exit();
}
?>

<?php include '../includes/admin_header.php'; ?>
<div class="admin-container">
    <h2>Edit Produk</h2>

    <form method="POST" enctype="multipart/form-data" class="product-form">
        <input type="text" name="name" placeholder="Nama Produk" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        <textarea name="description" placeholder="Deskripsi" required><?php echo htmlspecialchars($product['description']); ?></textarea>
        <input type="number" name="price" placeholder="Harga" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        <input type="number" name="stock" placeholder="Stok" value="<?php echo htmlspecialchars($product['stock']); ?>" required>
        <input type="file" name="image">
        <button type="submit" class="btn">Perbarui Produk</button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>

<!-- Internal CSS -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fa;
        margin: 0;
        padding: 0;
    }
    .admin-container {
        width: 80%;
        margin: 20px auto;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
    }
    h2 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }
    .product-form {
        display: grid;
        gap: 15px;
        margin-bottom: 20px;
    }
    .product-form input, .product-form textarea {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 16px;
    }
    .product-form button {
        padding: 12px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    .product-form button:hover {
        background-color: #218838;
    }
</style>
