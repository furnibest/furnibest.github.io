<html>
    <head>
        
    </head>

</html>
<footer>
        <div class="container">
            <p>&copy; 2024 Furnibest. Semua Hak Dilindungi.</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <p>Dibuat dengan ❤ oleh Tim Furnibest</p>
        </div>
    </footer>

    <script>
        // Animasi logo saat halaman dimuat
        window.onload = function() {
            const logo = document.querySelector('.logo img');
            logo.style.transition = 'transform 0.5s';
            logo.style.transform = 'scale(1.1)';
            setTimeout(() => logo.style.transform = 'scale(1)', 500);
        };

        // Menu toggle untuk mobile
        const menuToggle = document.getElementById('mobile-menu');
        const navMenu = document.querySelector('nav ul');
        menuToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });
    </script>
</body>
</html>
<script>
    footer {
        background-color: #333;
        color: white;
        padding: 20px 0;
        margin-top: 20px;
    }

    footer .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    footer .social-icons {
        margin: 10px 0;
    }

    footer .social-icons a {
        text-decoration: none;
        color: white;
        margin: 0 10px;
        font-size: 20px;
        transition: color 0.3s;
    }

    footer .social-icons a:hover {
        color: #FFD700;
    }

    footer p {
        margin: 5px 0;
        font-size: 14px;
    }
</script>

