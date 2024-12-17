<?php
include 'db/config.php';

$search = '';
$category = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE ?");
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("s", $searchTerm);
} elseif (isset($_GET['category'])) {
    $category = $_GET['category'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
    $stmt->bind_param("s", $category);
} else {
    $stmt = $conn->prepare("SELECT * FROM products");
}

$stmt->execute();
$result = $stmt->get_result();
?>

<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .header {
            color: gray;
            padding: 20px 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .search-section {
            background-color: #f1f1f1;
            padding: 20px;
        }

        .search-form {
            display: flex;
            max-width: 600px;
            margin: 0 auto;
            align-items: center;
            gap: 10px;
        }

        .search-input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #0056b3;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 40px 20px;
            background-color: #ffffff;
        }

        .product-card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .product-card:hover {
            transform: translateY(-10px);
        }

        .product-image {
            width: 100%;
            object-fit: cover;
        }

        .product-content {
            padding: 15px;
            text-align: center;
        }

        .product-title {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }

        .product-description {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 15px;
        }

        .product-price {
            font-size: 1.2em;
            color: #28a745;
            font-weight: bold;
        }

        .product-action {
            margin-top: 15px;
        }

        .product-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .product-button:hover {
            background-color: #0056b3;
        }

        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 20px 0;
            color: #555;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Katalog Produk</h1>
</div>

<div class="search-section">
    <form method="GET" class="search-form">
        <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Cari produk..." class="search-input">
        <button type="submit" class="search-button">Cari</button>
    </form>
</div>

<div class="product-grid">
    <?php while ($product = $result->fetch_assoc()): ?>
    <div class="product-card">
        <?php 
        $imagePath = "images/" . $product['image']; // Menyusun jalur gambar
        ?>
        <img src="<?php echo $imagePath; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
        <div class="product-content">
            <h2 class="product-title"><?php echo $product['name']; ?></h2>
            <p class="product-description"><?php echo $product['description']; ?></p>
            <p class="product-price">Rp <?php echo number_format($product['price'], 2, ',', '.'); ?></p>
            <div class="product-action">
                <a href="detail_produk.php?id=<?php echo $product['id']; ?>" class="product-button">Lihat Detail</a>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
