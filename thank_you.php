
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
            flex-direction: column;
        }

        .thank-you-containers {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            max-width: 600px;
            width: 90%;
            transform: scale(0.9);
            animation: fadeIn 1s forwards;
            margin-top: 20px; /* Memberikan jarak antara header dan container */
        }

        .thank-you-containers h1 {
            font-size: 2.5em;
            color: #27ae60;
            margin-bottom: 20px;
        }

        .thank-you-containers p {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 30px;
        }

        .thank-you-containers a {
            background-color: #3498db;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            font-size: 1.1em;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .thank-you-containers a:hover {
            background-color: #2980b9;
        }

        /* Animation for fade-in effect */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .thank-you-containers {
                padding: 20px;
            }

            .thank-you-containers h1 {
                font-size: 2em;
            }

            .thank-you-containers p {
                font-size: 1em;
            }

            .thank-you-containers a {
                font-size: 1em;
                padding: 10px 25px;
            }
        }
    </style>
</head>
<body>
    <div class="thank-you-containers">
        <h1>Perhatian</h1>
        <p>Maaf fitur ini masih dalam proses pengembangan</p>
        <a href="index.php">Kembali ke Beranda</a>
    </div>

    <script>
        // JavaScript untuk efek tambahan atau interaksi bisa ditempatkan di sini
        document.querySelector('a').addEventListener('click', function() {
            // Efek animasi atau loading bisa ditambahkan jika diperlukan
            alert("Terima kasih telah berbelanja! Kembali ke beranda.");
        });
    </script>
</body>
</html>
