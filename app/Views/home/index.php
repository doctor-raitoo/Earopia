<?= view('layout/navbar'); ?>

<style>
.hero {
    height: 80vh;
    background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
}

.hero h1 {
    font-size: 48px;
}

.hero span {
    color: #00a8ff;
}

.hero p {
    margin-top: 15px;
    color: #cfe8ff;
}

.btn-hero {
    margin-top: 25px;
    background: #00a8ff;
    padding: 12px 25px;
    border-radius: 30px;
    color: white;
    text-decoration: none;
}

.section {
    padding: 50px 20px;
    max-width: 1200px;
    margin: auto;
}

.produk-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px,1fr));
    gap: 20px;
}

.card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
}

.card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.card-body {
    padding: 15px;
}

.card-body h4 {
    font-size: 16px;
    margin-bottom: 8px;
}

.card-body p {
    color: #00a8ff;
    font-weight: bold;
}
</style>

<div class="hero">
    <h1>Welcome to <span>Earopia</span> 🎧</h1>
    <p>Temukan pengalaman audio terbaik untuk hidupmu</p>
    <a href="/produk" class="btn-hero">Belanja Sekarang</a>
</div>

<div class="section">
    <h2>Produk Terbaru</h2>

    <div class="produk-grid">
        <?php foreach ($produk as $p): ?>
        <div class="card">
            <?php if ($p['gambar']): ?>
                <img src="/uploads/<?= $p['gambar']; ?>">
            <?php else: ?>
                <img src="https://placehold.co/400x300">
            <?php endif; ?>

            <div class="card-body">
                <h4><?= esc($p['nama_produk']); ?></h4>
                <p>Rp <?= number_format($p['harga'],0,',','.'); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>