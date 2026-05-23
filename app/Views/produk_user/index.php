<?= view('layout/navbar'); ?>
<title>Earopia - Produk</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #f0f7ff 0%, #e6f0fa 100%);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .produk-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    .page-header {
        text-align: center;
        margin-bottom: 40px;
        position: relative;
    }

    .page-header h1 {
        font-size: 36px;
        color: #0a2a3a;
        margin-bottom: 10px;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .page-header h1 span {
        color: #00a8ff;
        border-bottom: 3px solid #00a8ff;
        display: inline-block;
        padding-bottom: 5px;
    }

    .page-header p {
        color: #4a6a7a;
        font-size: 16px;
        margin-top: 10px;
    }

    .produk-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 20px;
    }

    .produk-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 100, 150, 0.1);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .produk-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 168, 255, 0.2);
        border-bottom: 3px solid #00a8ff;
    }

    .produk-gambar {
        width: 100%;
        height: 220px;
        background: linear-gradient(135deg, #d4e4f0 0%, #b8d4e8 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
    }

    .produk-gambar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .produk-card:hover .produk-gambar img {
        transform: scale(1.02);
    }

    .badge-stok {
        position: absolute;
        top: 10px;
        right: 10px;
        background: rgba(0, 42, 58, 0.9);
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
        backdrop-filter: blur(5px);
        z-index: 1;
    }

    .badge-stok.habis {
        background: rgba(200, 60, 60, 0.9);
    }

    .badge-stok.tersedia {
        background: rgba(0, 168, 255, 0.9);
    }

    .produk-info {
        padding: 20px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .produk-nama {
        font-size: 18px;
        font-weight: 700;
        color: #0a2a3a;
        margin-bottom: 10px;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 48px;
    }

    .produk-harga {
        font-size: 22px;
        font-weight: 800;
        color: #00a8ff;
        margin: 10px 0;
    }

    .produk-harga small {
        font-size: 14px;
        font-weight: normal;
        color: #6a8a9a;
    }

    .produk-deskripsi {
        color: #5a6e7a;
        font-size: 14px;
        line-height: 1.5;
        margin: 12px 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 42px;
    }

    .produk-actions {
        display: flex;
        gap: 10px;
        margin-top: auto;
        padding-top: 15px;
    }

    .btn-cart {
        width: 100%;
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        color: white;
        border: none;
        padding: 12px 15px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-cart:hover {
        background: linear-gradient(135deg, #0088cc 0%, #006699 100%);
        transform: scale(0.98);
    }

    .btn-cart:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    .empty-produk {
        text-align: center;
        padding: 60px;
        background: white;
        border-radius: 20px;
        grid-column: 1 / -1;
    }

    .empty-produk div {
        font-size: 64px;
        color: #00a8ff;
        opacity: 0.5;
        margin-bottom: 20px;
        display: inline-block;
    }

    @media (max-width: 768px) {
        .produk-container {
            padding: 20px 15px;
        }
        
        .page-header h1 {
            font-size: 28px;
        }
        
        .produk-grid {
            gap: 20px;
        }
        
        .produk-nama {
            font-size: 16px;
            min-height: 42px;
        }
        
        .produk-harga {
            font-size: 18px;
        }
        
        .produk-deskripsi {
            font-size: 13px;
            min-height: 38px;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .produk-card {
        animation: fadeIn 0.5s ease forwards;
    }

    .produk-actions form {
        width: 100%;
    }

    .kategori-filter {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 30px;
        justify-content: center;
    }

    .kategori-filter a {
        padding: 8px 16px;
        border-radius: 20px;
        background: white;
        text-decoration: none;
        color: #00a8ff;
        font-weight: 600;
        border: 1px solid #00a8ff;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .kategori-filter a:hover {
        background: #00a8ff;
        color: white;
    }

    .kategori-filter a.active {
        background: #00a8ff;
        color: white;
    }

    .filter-bar {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .search-box {
        display: flex;
        background: white;
        border-radius: 8px;
        overflow: hidden;
        border: 1px solid #ccc;
    }

    .search-box input {
        border: none;
        padding: 10px;
        outline: none;
        width: 200px;
    }

    .search-box button {
        background: #00a8ff;
        color: white;
        border: none;
        padding: 0 15px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .filter-bar select {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
    }
</style>

<?php if (session()->getFlashdata('success')): ?>
    <div style="background:#00a8ff; color:white; padding:10px; margin:20px; border-radius:8px;">
        ✔ <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="produk-container">
    <div class="page-header">
        <h1><span>Daftar Produk</span> Earopia</h1>
        <p>Temukan koleksi headphone terbaik dengan kualitas suara premium</p>
    </div>

    <div class="filter-bar">
        <form method="get" action="/produk" class="search-box">
            <input type="text" name="search" placeholder="Cari produk..." value="<?= esc($keyword); ?>">
            
            <input type="hidden" name="kategori" value="<?= $kategori_aktif; ?>">
            <input type="hidden" name="sort" value="<?= $sort; ?>">

            <button type="submit">🔍</button>
        </form>

        <form method="get">
            <input type="hidden" name="search" value="<?= $keyword; ?>">
            <input type="hidden" name="kategori" value="<?= $kategori_aktif; ?>">

            <select name="sort" onchange="this.form.submit()">
                <option value="">Urutkan</option>
                <option value="harga_asc" <?= $sort == 'harga_asc' ? 'selected' : ''; ?>>Harga Termurah</option>
                <option value="harga_desc" <?= $sort == 'harga_desc' ? 'selected' : ''; ?>>Harga Termahal</option>
                <option value="nama_asc" <?= $sort == 'nama_asc' ? 'selected' : ''; ?>>Nama A-Z</option>
                <option value="nama_desc" <?= $sort == 'nama_desc' ? 'selected' : ''; ?>>Nama Z-A</option>
            </select>
        </form>
    </div>

    <div class="kategori-filter">
        <a href="/produk" class="<?= !$kategori_aktif ? 'active' : ''; ?>">Semua</a>

        <?php foreach ($kategori as $k): ?>
            <a href="/produk?kategori=<?= $k['id_kategori']; ?>" 
            class="<?= $kategori_aktif == $k['id_kategori'] ? 'active' : ''; ?>">
            <?= esc($k['nama_kategori']); ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="produk-grid">
        <?php if (empty($produk)): ?>
            <div class="empty-produk">
                <div>📦</div>
                <h3>Belum ada produk</h3>
                <p>Silakan tambahkan produk terlebih dahulu</p>
            </div>
        <?php else: ?>
            <?php foreach ($produk as $p): ?>
                <div class="produk-card" onclick="window.location.href='/produk/<?= $p['id_produk']; ?>'">
                    <div class="produk-gambar">
                        <?php if ($p['gambar'] && file_exists(FCPATH . 'uploads/' . $p['gambar'])): ?>
                            <img src="/uploads/<?= $p['gambar']; ?>" alt="<?= esc($p['nama_produk']); ?>">
                        <?php else: ?>
                            <img src="https://placehold.co/400x300/00a8ff/ffffff?text=No+Image" alt="No Image">
                        <?php endif; ?>
                        
                        <div class="badge-stok <?= $p['stok'] > 0 ? 'tersedia' : 'habis'; ?>">
                            <?= $p['stok'] > 0 ? '✔ Stok: ' . $p['stok'] : '✘ Habis'; ?>
                        </div>
                    </div>

                    <div class="produk-info">
                        <div style="font-size:12px; color:#00a8ff; font-weight:bold; margin-bottom:5px;">
                            <?= esc($p['nama_kategori']); ?>
                        </div>
                        <div class="produk-nama"><?= esc($p['nama_produk']); ?></div>
                        <div class="produk-harga">
                            Rp <?= number_format($p['harga'], 0, ',', '.'); ?>
                            <small></small>
                        </div>
                        <div class="produk-deskripsi">
                            <?= esc($p['deskripsi']); ?>
                        </div>
                        <div class="produk-actions" onclick="event.stopPropagation()">
                            <form action="/cart/add" method="post">
                                <input type="hidden" name="id_produk" value="<?= $p['id_produk']; ?>">
                                <input type="hidden" name="qty" value="1">

                                <button type="submit" class="btn-cart" <?= $p['stok'] <= 0 ? 'disabled' : ''; ?>>
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>