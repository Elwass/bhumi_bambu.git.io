<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhumi Bambu Baturraden</title>

    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #f5f5f5; }
        header { background: #2f5d3f; padding: 20px; color: white; display: flex; justify-content: space-between; align-items: center; }
        header a { color: white; margin-left: 20px; text-decoration: none; }
        .hero { position: relative; }
        .hero img { width: 100%; height: 550px; object-fit: cover; filter: brightness(60%); }
        .hero-text {
            position: absolute;
            top: 40%; left: 50%; transform: translate(-50%, -50%);
            color: white; text-align: center;
        }
        .btn {
            background: #39a86b; padding: 12px 25px; color: white; border-radius: 10px;
            text-decoration: none; font-weight: bold;
        }
        .section { padding: 50px 80px; }
        .flex { display: flex; gap: 30px; justify-content: center; flex-wrap: wrap; }
        .card {
            background: white; padding: 20px; border-radius: 10px;
            width: 280px; box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        footer {
            background: #1f2c2d;
            color: white;
            padding: 50px 80px;
            margin-top: 50px;
        }
        footer a { color: #ffce83; display: block; text-decoration: none; margin: 5px 0; }
    </style>
</head>

<body>

    <!-- HEADER -->
    <header>
        <h2>Bhumi Bambu Baturraden</h2>
        <nav>
            <a href="#">Beranda</a>
            <a href="#">Tentang Kami</a>
            <a href="#">Bantuan</a>
            <a href="#" style="background:white; padding:8px 12px; border-radius:5px; color:#2f5d3f;">Masuk</a>
            <a href="#" style="background:#39a86b; padding:8px 12px; border-radius:5px;">Daftar</a>
        </nav>
    </header>

    <!-- HERO -->
    <div class="hero">
        <img src="aset/bg.jpeg" alt="Hero Image">
        <div class="hero-text">
            <h1>Rasakan Harmoni Alam di Bhumi Bambu</h1>
            <p>Wisata edukasi dan alam terbaik di Baturraden</p>
            <a href="#" class="btn">Pesan Sekarang →</a>
        </div>
    </div>

    <!-- PENGALAMAN -->
    <div class="section">
        <h2 style="text-align: center;">Pengalaman yang Bisa Kamu Nikmati</h2>

        <div class="flex" style="margin-top: 30px;">
            <img src="aset/gambar1.jpeg" width="250">
            <img src="aset/gambar2.jpeg" width="250">
            <img src="aset/gambar3.jpeg" width="250">
        </div>
    </div>

    <!-- FITUR -->
    <div class="section" style="background:white;">
        <h3>Kegiatan di Bhumi Bambu</h3>
        <ul>
            <li>Beristirahat</li>
            <li>Edukasi Bambu</li>
            <li>Outbound & Gathering</li>
            <li>Wisata Air</li>
            <li>Silver Roof Café</li>
            <li>Pondok Kayu</li>
        </ul>
    </div>

    <!-- PROMO -->
    <div class="section">
        <h2 style="text-align:center;">Promo Buat Kamu!</h2>

        <div class="flex">
            <div class="card">
                <h3>Diskon Pengguna Baru</h3>
                <p>Hingga 20%</p>
                <button class="btn">Claim</button>
            </div>
            <div class="card">
                <h3>Flash Sale</h3>
                <p>Harga Spesial Hari Ini</p>
                <button class="btn">Claim</button>
            </div>
            <div class="card">
                <h3>Promo Event</h3>
                <p>Hemat untuk Momen Spesial</p>
                <button class="btn">Claim</button>
            </div>
        </div>
    </div>

    <!-- TESTIMONI -->
    <div class="section" style="background:white;">
        <h2 style="text-align:center;">Apa Kata Mereka?</h2>

        <div class="flex">
            <div class="card">"Tempatnya asri banget!" — Rania</div>
            <div class="card">"Camping nyaman & fasilitas lengkap." — Dimas</div>
            <div class="card">"Outbound seru banget!" — Nayla</div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div style="display:flex; justify-content:space-between; flex-wrap: wrap;">
            
            <div>
                <h3>Layanan Kami</h3>
                <a href="#">Berkemah</a>
                <a href="#">Outbound</a>
                <a href="#">Edukasi Bambu</a>
                <a href="#">Wisata Alam</a>
                <a href="#">Pondok Kayu</a>
            </div>

            <div>
                <h3>Kontak</h3>
                <a href="#">Instagram</a>
                <a href="#">TikTok</a>
                <a href="#">Whatsapp</a>
                <a href="#">bambubumi@gmail.com</a>
            </div>

            <div>
                <h3>Jam Operasional</h3>
                <p>Minggu – Senin</p>
                <p>08.00 – 17.00 WIB</p>
            </div>

            <div>
                <h3>Lokasi</h3>
                <iframe 
                    src="https://maps.google.com/maps?q=Bhumi%20Bambu%20Baturraden&z=15&output=embed"
                    width="300" height="200" style="border:0;">
                </iframe>
            </div>
        </div>

        <p style="text-align:center; margin-top:30px;">© 2025 Bhumi Bambu</p>
    </footer>

</body>
</html>