<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Furnibest</title>
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f7f7f7;
            color: #333;
        }

        header {
            background-color: #1a1a1a;
            color: #fff;
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .logo {
            font-size: 2rem;
            font-weight: 700;
            font-family: 'Montserrat', sans-serif;
            color: #f39c12;
        }

        .logo a {
            text-decoration: none;
            color: inherit;
            display: flex;
            align-items: center;
        }

        .logo i {
            font-size: 2.5rem;
            margin-right: 10px;
        }

        .logo a:hover {
            color: #f39c12;
            opacity: 0.9;
            transform: scale(1.05);
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            align-items: center;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #ecf0f1;
            font-weight: 600;
            font-size: 1.1rem;
            padding: 12px 18px;
            border-radius: 30px;
            position: relative;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        nav ul li a::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: #f39c12;
            bottom: 0;
            left: 0;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-in-out;
        }

        nav ul li a:hover {
            color: #fff;
            background-color: #333;
        }

        nav ul li a:hover::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
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

        .menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: center;
            cursor: pointer;
        }

        .menu-toggle span {
            background-color: #fff;
            height: 4px;
            width: 30px;
            margin: 6px 0;
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            nav ul {
                display: none;
                flex-direction: column;
                background-color: #1a1a1a;
                position: absolute;
                top: 60px;
                left: 0;
                width: 100%;
                padding: 20px 0;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            }

            nav ul.active {
                display: flex;
            }

            .menu-toggle {
                display: flex;
            }

            .menu-toggle.active span:nth-child(1) {
                transform: rotate(45deg) translateY(8px);
            }

            .menu-toggle.active span:nth-child(2) {
                opacity: 0;
            }

            .menu-toggle.active span:nth-child(3) {
                transform: rotate(-45deg) translateY(-8px);
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="index.php">
                    <i class="fas fa-couch"></i> Furni<span style="color: #f39c12;">BEST</span>
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="katalog.php"><i class="fas fa-th-large"></i> Produk</a></li>
                    <li><a href="keranjang.php"><i class="fas fa-shopping-cart"></i> Keranjang</a></li>
                </ul>
            </nav>
            <div class="menu-toggle" id="mobile-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <script>
        const menuToggle = document.getElementById('mobile-menu');
        const navMenu = document.querySelector('nav ul');

        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            menuToggle.classList.toggle('active');
        });
    </script>
</body>
</html>
