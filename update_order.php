<?php
session_start();
include '../db/config.php';

// Pastikan admin sudah login
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    // Update status pesanan di database
    $stmt = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $order_id);

    if ($stmt->execute()) {
        header("Location: manage_orders.php");
        exit();
    } else {
        echo "Error updating order: " . $stmt->error;
    }
}
?> 