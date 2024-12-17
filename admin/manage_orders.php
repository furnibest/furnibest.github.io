<?php
session_start();
include '../db/config.php';

// Pastikan admin sudah login
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: login.php");
//     exit();
// }

// Ambil semua pesanan dari database dengan pencarian
if ($search) {
    $stmt = $conn->prepare("SELECT * FROM orders WHERE customer_name LIKE ? OR customer_email LIKE ? ORDER BY created_at DESC");
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
} else {
    $stmt = $conn->prepare("SELECT * FROM orders ORDER BY created_at DESC");
}

$stmt->execute();
$result = $stmt->get_result();
?>

<?php include '../includes/admin_header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 8px 12px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-complete {
            background-color: #28a745;
        }
        .btn-complete:hover {
            background-color: #218838;
        }
        .btn-cancel {
            background-color: #dc3545;
        }
        .btn-cancel:hover {
            background-color: #c82333;
        }
        .search-form {
            margin-bottom: 20px;
        }
        .search-input {
            padding: 8px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .search-button {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .search-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Manage Orders</h1>

<!-- Form Pencarian -->
<form method="GET" class="search-form">
    <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Cari berdasarkan nama atau email..." class="search-input">
    <button type="submit" class="search-button">Cari</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Total</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php while ($order = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $order['id']; ?></td>
        <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
        <td><?php echo htmlspecialchars($order['customer_email']); ?></td>
        <td><?php echo htmlspecialchars($order['address']); ?></td>
        <td>Rp <?php echo number_format($order['total'], 2, ',', '.'); ?></td>
        <td><?php echo htmlspecialchars(ucfirst($order['status'])); ?></td>
        <td>
            <form method="POST" action="update_order.php" style="display:inline;">
                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                <input type="hidden" name="status" value="completed">
                <button type="submit" class="btn btn-complete">Complete</button>
            </form>
            <form method="POST" action="update_order.php" style="display:inline;">
                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">
                <input type="hidden" name="status" value="canceled">
                <button type="submit" class="btn btn-cancel">Cancel</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</table>



</body>
</html>
