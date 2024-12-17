<?php
session_start();
include 'db/config.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data yang di-post
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Simpan data ke sesi
    $_SESSION['email'] = $email;
    $_SESSION['address'] = $address;

    // Simpan data ke database (opsional, jika ingin disimpan permanen)
    $stmt = $conn->prepare("UPDATE users SET email = ?, address = ? WHERE user_id = ?");
    $stmt->bind_param("ssi", $email, $address, $_SESSION['user_id']);
    $stmt->execute();

    echo "Profil Anda telah diperbarui.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Profil</title>
</head>
<body>
    <h1>Pengaturan Profil</h1>
    <form method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo $_SESSION['email'] ?? ''; ?>" required><br><br>
        <label>Alamat:</label><br>
        <input type="text" name="address" value="<?php echo $_SESSION['address'] ?? ''; ?>" required><br><br>
        <button type="submit">Perbarui Profil</button>
    </form>
</body>
</html>
