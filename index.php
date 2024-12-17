<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furnibest</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Menggunakan font Roboto */
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Warna latar belakang */
        }
        .hero {
            background-image: url('images/hero-bg.jpg'); /* Ganti dengan path gambar latar belakang */
            background-size: cover; /* Mengatur ukuran gambar agar menutupi area */
            background-position: center; /* Memusatkan gambar */
            color: white; /* Warna teks */
            text-align: center;
            padding: 160px 20px; /* Padding atas dan bawah */
            position: relative; /* Untuk posisi elemen anak */
            overflow: hidden; /* Menyembunyikan elemen yang melampaui batas */
        }
        .hero h1 {
            margin: 0;
            font-size: 2.5em;
            animation: fadeIn 1s ease-in-out; /* Animasi muncul */
        }
        .hero p {
            font-size: 1.2em;
            animation: fadeIn 1.5s ease-in-out; /* Animasi muncul */
        }
        .btn {
            background-color: #007bff; /* Warna tombol */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            animation: fadeIn 2s ease-in-out; /* Animasi muncul */
        }
        .btn:hover {
            background-color: #0056b3; /* Warna tombol saat hover */
        }
        @keyframes fadeIn {
            from {
                opacity: 0; /* Mulai dari transparan */
                transform: translateY(-20px); /* Gerakan dari atas */
            }
            to {
                opacity: 1; /* Menjadi terlihat */
                transform: translateY(0); /* Kembali ke posisi normal */
            }
        }
        .about-us {
            display: flex;
            align-items: center; /* Vertikal align gambar dan teks */
            justify-content: center; /* Mengatur konten agar terpusat */
            padding: 40px;
            background-color: #fff;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
            text-align: left; /* Agar teks tidak terpusat */
        }

        .about-us img {
            max-width: 40%; /* Ukuran gambar 40% dari lebar kontainer */
            height: auto;
            border-radius: 8px;
            margin-left: 20px; /* Spasi antara gambar dan teks */
        }

        .about-us .text {
            max-width: 55%; /* Lebar teks yang tersisa */
        }

        .about-us h2 {
            margin-bottom: 20px;
            font-size: 2em; /* Ukuran font yang lebih besar */
            color: #333; /* Warna teks */
        }
        .about-us p {
            color: #555; /* Warna teks */
            line-height: 1.6; /* Jarak antar baris */
            margin: 10px 0; /* Margin atas dan bawah */
        }
    </style>
</head>
<body>
<div class="hero">
    <h1>Welcome to Furnibest</h1>
    <p>Find the best furniture for your home.</p>
    <a href="katalog.php" class="btn">Explore Product</a>
</div>

<section class="about-us">
    <div class="text">
        <h2>About Us</h2>
        <p>We are Furnibest, a provider of high quality furniture for your home. With a wide choice of designs and materials, we are committed to providing the best products that meet your needs and tastes.</p>
        <p>Our vision is to create a comfortable and aesthetic space for every customer. We believe that good furniture can improve your quality of life.</p>
    </div>
    <img src="images/logo.png" alt="Tentang Kami"> <!-- Ganti dengan path gambar yang sesuai -->
</section>

<section class="contact">
    <style>
        .contact {
            padding: 40px;
            background: linear-gradient(135deg, #007bff, #0056b3); /* Gradient background */
            color: white; /* Warna teks */
            border-radius: 12px; /* Sudut melengkung */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
            max-width: 800px; /* Lebar maksimal */
            text-align: center; /* Teks terpusat */
        }

        .contact h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #fff;
            text-transform: uppercase; /* Teks huruf besar */
        }

        .contact-icons {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin: 30px 0;
        }

        .contact-icons div {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .contact-icons i {
            font-size: 2em;
            color: #ffcc00; /* Warna ikon */
        }

        .contact-icons span {
            font-size: 1.1em;
        }

        .contact a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background-color: #ffcc00;
            color: #0056b3;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            transition: transform 0.3s, background-color 0.3s;
        }

        .contact a:hover {
            transform: translateY(-3px);
            background-color: #ffe680;
        }
    </style>
    <h2>Kontak Kami</h2>
    <p>Jika Anda memiliki pertanyaan atau ingin informasi lebih lanjut, silakan hubungi kami melalui salah satu cara berikut:</p>
    <div class="contact-icons">
        <div>
            <i class="fas fa-envelope"></i>
            <span>Email: <a href="mailto:cacamfurniture@gmail.com">cacamfurniture@gmail.com</a></span>
        </div>
        <div>
            <i class="fas fa-phone"></i>
            <span>Telepon: <a href="https://wa.me/6282128139206" target="_blank">0821 2813 9206</a></span>
        </div>
       
    </div>
</section>

<!-- Pastikan Anda sudah menyertakan Font Awesome untuk ikon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<?php include 'includes/footer.php'; ?>
</body>
</html>
