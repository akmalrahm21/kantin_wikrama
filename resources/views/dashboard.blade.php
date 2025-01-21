<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantin Wikrama</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFFAF2;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 99%;
            background: #0DC1DD;
            color: white;
            padding: 1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 1em;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #adb5bd;
        }

        .header {
            background-color: #2c3e50;
            color: white;
            padding: 2em;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        .banner {
            position: relative;
            width: 100%;
            height: 500px;
            background: url('/images/banner.png') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            font-size: 2em;
            font-weight: bold;
            margin-top: 1.6em; /* Offset for the navbar */
        }

        .banner-text {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2em;
        }

        .banner-button {
            margin-top: 20px;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
        }

        .container {
            max-width: 1200px;
            margin: 2em auto;
            padding: 0 1em;
        }

        .description, .menu {
            margin-bottom: 2em;
            background-color: white;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .description img {
            width: 100%;
            border-radius: 8px;
        }

        .description p {
            font-size: 1.1em;
            line-height: 1.6;
        }

        .footer {
            background-color: #0DC1DD;
            color: white;
            text-align: center;
            padding: 1em;
            width: 100%;
            bottom: 0;
        }

        @media (min-width: 768px) {
            .description, .menu {
                display: flex;
                align-items: center;
            }

            .description img {
                width: 50%;
                margin-right: 2em;
            }
        }
    </style>
    <script>
        function confirmLogout(event) {
            event.preventDefault();
            if (confirm("Yakin ingin logout?")) {
                document.getElementById('logout-form').submit();
            }
        }

        // Smooth scroll function
        document.addEventListener('DOMContentLoaded', function() {
            const aboutLink = document.querySelector('.navbar-menu a[href="#tentang"]');
            if (aboutLink) {
                aboutLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    const target = document.querySelector('#tentang');
                    if (target) {
                        window.scrollTo({
                            top: target.offsetTop - document.querySelector('.navbar').offsetHeight,
                            behavior: 'smooth'
                        });
                    }
                });
            }
        });
    </script>
</head>
<body>
    <div class="navbar">
        <div class="navbar-brand">
            <a href="">Kantin HEBAT</a>
        </div>
        <div class="navbar-menu">
            <a href="login">Login</a>
            <a href="#tentang">Tentang</a>
        </div>
    </div>
    <div class="banner">
        Selamat Datang di Kantin HEBAT
        <a href="login" class="banner-button">MASUK</a>
    </div>
    <div class="container">
        <div id="tentang" class="description">
            <img src="/images/kantin.jpeg" alt="Selamat Datang di Kantin Wikrama">
            <p>Kantin HEBAT <b>(Hemat,Enak,Bergizi,Aman,Terjangkau)</b> adalah tempat favorit bagi siswa dan staf untuk menikmati makanan dan minuman yang lezat. Dengan berbagai pilihan menu yang tersedia setiap hari, kantin ini memastikan semua orang dapat menemukan sesuatu yang mereka sukai. Dari makanan ringan hingga hidangan utama, semuanya disiapkan dengan bahan-bahan segar dan berkualitas.</p>
        </div>
    </div>
    <div class="footer">
        &copy; 2024 Kantin HEBAT. All Rights Reserved.
    </div>
</body>
</html>
