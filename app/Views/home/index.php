<?= view('layout/navbar'); ?>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f7fc;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.content {
    flex: 1;
}

.hero {
    height: 80vh;
    background: linear-gradient(rgba(10, 25, 40, 0.85), rgba(12, 42, 59, 0.9)), url('<?= base_url('uploads/hero.jpg'); ?>') no-repeat;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.hero h1 {
    font-size: 56px;
    font-weight: 800;
    margin-bottom: 15px;
    z-index: 1;
}

.hero h1 span {
    color: #00a8ff;
}

.hero p {
    font-size: 18px;
    color: #cfe8ff;
    margin-bottom: 30px;
    z-index: 1;
}

.btn-hero {
    background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
    padding: 14px 35px;
    border-radius: 50px;
    color: white;
    text-decoration: none;
    font-weight: 700;
    font-size: 16px;
    transition: all 0.3s ease;
    display: inline-block;
    z-index: 1;
    box-shadow: 0 4px 15px rgba(0, 168, 255, 0.3);
}

.btn-hero:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 168, 255, 0.4);
}

.section {
    padding: 60px 20px;
    max-width: 1200px;
    margin: auto;
}

.section h2 {
    font-size: 32px;
    color: #0a2a3a;
    margin-bottom: 30px;
    font-weight: 700;
}

.section h2 span {
    color: #00a8ff;
    border-bottom: 3px solid #00a8ff;
    padding-bottom: 5px;
}

.produk-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 30px;
}

.card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 100, 150, 0.1);
    transition: all 0.3s ease;
    cursor: pointer;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 30px rgba(0, 168, 255, 0.2);
    border-bottom: 3px solid #00a8ff;
}

.card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.card:hover img {
    transform: scale(1.03);
}

.card-body {
    padding: 18px;
}

.card-body h4 {
    font-size: 16px;
    font-weight: 700;
    color: #0a2a3a;
    margin-bottom: 8px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    min-height: 44px;
}

.card-body p {
    color: #00a8ff;
    font-weight: 800;
    font-size: 18px;
    margin-top: 8px;
}

.card-body .kategori {
    font-size: 12px;
    color: #6a8a9a;
    margin-bottom: 5px;
    display: inline-block;
    background: rgba(0, 168, 255, 0.1);
    padding: 2px 10px;
    border-radius: 20px;
}

.btn-see-all {
    text-align: center;
    margin-top: 40px;
}

.btn-see-all a {
    background: transparent;
    border: 2px solid #00a8ff;
    color: #00a8ff;
    padding: 12px 30px;
    border-radius: 40px;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.3s ease;
    display: inline-block;
}

.btn-see-all a:hover {
    background: #00a8ff;
    color: white;
    transform: translateY(-2px);
}

.footer {
    background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
    color: white;
    margin-top: 60px;
    border-top: 2px solid #00a8ff;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px 30px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
}

.footer-section h3 {
    font-size: 18px;
    margin-bottom: 20px;
    color: #00a8ff;
}

.footer-section h3 i {
    margin-right: 8px;
}

.footer-section p {
    color: #cfe8ff;
    line-height: 1.6;
    font-size: 14px;
}

.footer-section ul {
    list-style: none;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #cfe8ff;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s ease;
}

.footer-section ul li a:hover {
    color: #00a8ff;
}

.social-links {
    display: flex;
    gap: 15px;
    margin-top: 15px;
}

.social-links a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background: rgba(0, 168, 255, 0.1);
    border-radius: 50%;
    color: #00a8ff;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-links a:hover {
    background: #00a8ff;
    color: white;
    transform: translateY(-3px);
}

.footer-bottom {
    text-align: center;
    padding: 20px;
    border-top: 1px solid rgba(0, 168, 255, 0.2);
    font-size: 13px;
    color: #6a8a9a;
}

.footer-bottom span {
    color: #00a8ff;
}

@media (max-width: 768px) {
    .hero {
        background-attachment: scroll;
    }
    
    .hero h1 {
        font-size: 36px;
    }
    
    .hero p {
        font-size: 16px;
        padding: 0 20px;
    }
    
    .section h2 {
        font-size: 26px;
    }
    
    .produk-grid {
        gap: 20px;
    }
    
    .btn-hero {
        padding: 12px 25px;
    }
    
    .footer-container {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 30px;
    }
    
    .social-links {
        justify-content: center;
    }
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="content">
    <div class="hero">
        <h1><span>Welcome to </span>Earopia</h1>
        <p>Temukan pengalaman audio terbaik anda</p>
        <a href="/produk" class="btn-hero">Belanja Sekarang</a>
    </div>

    <div class="section">
        <h2 style="text-align: center;"><span>Produk Terbaru</span></h2>
        <br>

        <div class="produk-grid">
            <?php foreach ($produk as $p): ?>
            <div class="card" onclick="window.location.href='/produk/<?= $p['id_produk']; ?>'">
                <?php if ($p['gambar'] && file_exists(FCPATH . 'uploads/' . $p['gambar'])): ?>
                    <img src="/uploads/<?= $p['gambar']; ?>" alt="<?= esc($p['nama_produk']); ?>">
                <?php else: ?>
                    <img src="https://placehold.co/400x300/00a8ff/ffffff?text=No+Image" alt="No Image">
                <?php endif; ?>

                <div class="card-body">
                    <div class="kategori"><?= esc($p['nama_kategori']); ?></div>
                    <h4><?= esc($p['nama_produk']); ?></h4>
                    <p>Rp <?= number_format($p['harga'],0,',','.'); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="btn-see-all">
            <a href="/produk">Lihat Selengkapnya</a>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3><i class="fas fa-headphones"></i> Earopia</h3>
            <p>Temukan pengalaman audio terbaik dengan produk berkualitas tinggi.</p>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="footer-section">
            <h3><i class="fas fa-link"></i> Menu</h3>
            <ul>
                <li><a href="/">Beranda</a></li>
                <li><a href="/produk">Produk</a></li>
                <li><a href="/cart">Keranjang</a></li>
                <li><a href="/transaksi-saya">Transaksi Saya</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h3><i class="fas fa-envelope"></i> Kontak</h3>
            <ul>
                <li><i class="fas fa-map-marker-alt"></i> Jl. Irigasi Raya, Kota Medan</li>
                <li><i class="fas fa-phone"></i> +62 123 456 789</li>
                <li><i class="fas fa-envelope"></i> info@earopia.com</li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2026 <span>Earopia</span>. All rights reserved.</p>
    </div>
</footer>