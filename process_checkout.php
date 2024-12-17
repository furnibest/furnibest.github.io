<?php
session_start();
include 'db/config.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil data keranjang dari POST
$cart = json_decode($_POST['cart'], true);
$total = 0;

// Hitung total
foreach ($cart as $item) {
    $total += $item['price'];
}

// Simpan pesanan ke database
$stmt = $conn->prepare("INSERT INTO orders (customer_name, customer_email, address, total, status) VALUES (?, ?, ?, ?, 'pending')");
$stmt->bind_param("sssd", $_SESSION['username'], $_SESSION['email'], $_SESSION['address'], $total);

if ($stmt->execute()) {
    // Kosongkan keranjang setelah pemrosesan selesai
    unset($_SESSION['cart']);
    header("Location: thank_you.php"); // Redirect ke halaman terima kasih
    exit();
} else {
    echo "Error: " . $stmt->error;
}
?> 