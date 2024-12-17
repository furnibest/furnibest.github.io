<?php
session_start();
include '../db/config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    
}

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
header("Location: manage_products.php");
?>
