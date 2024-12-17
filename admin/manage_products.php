<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include '../db/config.php';

// Pastikan admin sudah login
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: login.php");
//     exit();
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = (float)$_POST['price'];
    $stock = (int)$_POST['stock'];

    // Buat slug dari nama produk (untuk URL)
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

    // Set gambar kosong jika tidak ada gambar yang diupload
    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $uploadPath = "../images/" . $image;

        // Pastikan direktori images bisa ditulis
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
            echo "Gagal mengunggah gambar.";
            exit();
        }
    }

    // Insert data ke database
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, stock, image, slug) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdiss", $name, $description, $price, $stock, $image, $slug);

    if ($stmt->execute()) {
        header("Location: manage_products.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Query untuk statistik
$total_items = $conn->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];
$total_inventory = $conn->query("SELECT SUM(price * stock) AS total_value FROM products")->fetch_assoc()['total_value'];
$low_stock = $conn->query("SELECT COUNT(*) AS low_stock FROM products WHERE stock <= 10")->fetch_assoc()['low_stock'];

// Query untuk tabel produk
$result = $conn->query("SELECT * FROM products");
?>

<?php include '../includes/admin_header.php'; ?>
<div class="admin-container">
    <h2>Manajemen Produk</h2>

    <!-- Panel Statistik -->
    <div class="dashboard-summary">
        <div class="summary-card">
            <h3>Total Item</h3>
            <p><?php echo $total_items; ?></p>
        </div>
        <div class="summary-card">
            <h3>Total Inventory</h3>
            <p>Rp <?php echo number_format($total_inventory, 2, ',', '.'); ?></p>
        </div>
        <div class="summary-card">
            <h3>Stok Menipis</h3>
            <p><?php echo $low_stock; ?></p>
        </div>
    </div>

    <!-- Form Tambah Produk -->
    <form method="POST" enctype="multipart/form-data" class="product-form">
        <input type="text" name="name" placeholder="Nama Produk" required>
        <textarea name="description" placeholder="Deskripsi" required></textarea>
        <input type="number" name="price" placeholder="Harga" required>
        <input type="number" name="stock" placeholder="Stok" required>
        <input type="file" name="image">
        <button type="submit" class="btn">Tambah Produk</button>
    </form>

    <!-- Tabel Produk -->
    <table class="product-table">
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php while ($product = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['description']; ?></td>
            <td>Rp <?php echo number_format($product['price'], 2, ',', '.'); ?></td>
            <td><?php echo $product['stock']; ?></td>
            <td>
                <?php if ($product['image']): ?>
                    <img src="../images/<?php echo $product['image']; ?>" width="100">
                <?php else: ?>
                    <p>No image</p>
                <?php endif; ?>
            </td>
            <td>
                <a href="edit_product.php?id=<?php echo $product['id']; ?>" class="btn-edit">Edit</a>
                <a href="delete_product.php?id=<?php echo $product['id']; ?>" class="btn-delete" onclick="return confirmDelete()">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
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
    .dashboard-summary {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
    }
    .summary-card {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: white;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 30%;
    }
    .summary-card h3 {
        margin: 0 0 10px;
        font-size: 1.2em;
    }
    .summary-card p {
        margin: 0;
        font-size: 1.5em;
        font-weight: bold;
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
    .product-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .product-table th, .product-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .product-table th {
        background-color: #f8f9fa;
    }
    .product-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .product-table td img {
        border-radius: 5px;
    }
    .btn {
        text-decoration: none;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .btn:hover {
        background-color: #0056b3;
    }
    .btn-edit {
        background-color: #ffc107;
    }
    .btn-edit:hover {
        background-color: #e0a800;
    }
    .btn-delete {
        background-color: #dc3545;
    }
    .btn-delete:hover {
        background-color: #c82333;
    }
</style>

<!-- Internal JavaScript -->
<script>
    function confirmDelete() {
        return confirm("Apakah Anda yakin ingin menghapus produk ini?");
    }
</script>
