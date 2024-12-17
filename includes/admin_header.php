<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: #f8f9fa; /* Warna latar belakang */
            color: #333;
        }
        a {
            text-decoration: none;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #6a11cb, #2575fc); /* Gradient modern */
            color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .header h1 {
            font-size: 2em;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .header h1 i {
            color: #ffdd59; /* Warna ikon */
        }

        /* Navigation Menu */
        .nav {
            display: flex;
            gap: 20px;
        }

        .nav a {
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
        }
        .nav a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }
        .nav a i {
            font-size: 1.1em;
        }

        /* Logout Button */
        .logout {
            background-color: #e74c3c;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .logout:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        /* Main Content Placeholder */
        .main-content {
            padding: 30px;
            text-align: center;
        }
        .main-content h2 {
            font-size: 2.2em;
            margin: 20px 0;
            color: #6a11cb;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <h1><i class="fas fa-cogs"></i> Admin Dashboard</h1>
        <nav class="nav">
            <a href="manage_products.php"><i class="fas fa-boxes"></i> Manajemen Produk</a>
            <a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </header>

    <!-- Main Content Placeholder -->
    <section class="main-content">
        <h2>Selamat Datang di Admin Panel</h2>
        <p>Gunakan menu navigasi di atas untuk mengelola aplikasi Anda.</p>
    </section>
</body>
</html>
