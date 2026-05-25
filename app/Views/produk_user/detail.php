<?= view('layout/navbar'); ?>
<title>Earopia - Detail Produk</title>

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

    .detail-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .breadcrumb a {
        color: #00a8ff;
        text-decoration: none;
        font-size: 14px;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
    }

    .breadcrumb span {
        color: #6a8a9a;
        font-size: 14px;
    }

    .btn-back-top {
        background: transparent;
        border: 1.5px solid #00a8ff;
        color: #00a8ff;
        padding: 8px 20px;
        border-radius: 40px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    .btn-back-top:hover {
        background: #00a8ff;
        color: white;
    }

    .product-detail {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 100, 150, 0.12);
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
    }

    .product-gallery {
        background: linear-gradient(135deg, #d4e4f0 0%, #b8d4e8 100%);
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        min-height: 400px;
    }

    .product-gallery img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .product-info {
        padding: 40px;
    }

    .product-category {
        display: inline-block;
        background: rgba(0, 168, 255, 0.1);
        color: #00a8ff;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .product-title {
        font-size: 32px;
        font-weight: 700;
        color: #0a2a3a;
        margin-bottom: 15px;
        line-height: 1.3;
    }

    .product-price {
        font-size: 32px;
        font-weight: 800;
        color: #00a8ff;
        margin-bottom: 20px;
    }

    .product-stock {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #f0f7fc;
        padding: 8px 16px;
        border-radius: 30px;
        margin-bottom: 20px;
    }

    .product-stock span {
        font-size: 14px;
        font-weight: 600;
    }

    .stock-tersedia {
        color: #00a8ff;
    }

    .stock-habis {
        color: #ff6b6b;
    }

    .product-description {
        border-top: 1px solid #e0eef5;
        padding-top: 20px;
        margin-top: 20px;
    }

    .product-description h3 {
        font-size: 18px;
        color: #0a2a3a;
        margin-bottom: 10px;
    }

    .product-description p {
        color: #5a6e7a;
        line-height: 1.6;
        font-size: 15px;
    }

    .product-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .qty-selector {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #f0f7fc;
        padding: 5px 15px;
        border-radius: 40px;
    }

    .qty-selector button {
        background: white;
        border: 1px solid #d4e4f0;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        font-size: 18px;
        font-weight: bold;
        color: #00a8ff;
        cursor: pointer;
        transition: all 0.2s;
    }

    .qty-selector button:hover {
        background: #00a8ff;
        color: white;
        border-color: #00a8ff;
    }

    .qty-selector input {
        width: 50px;
        text-align: center;
        border: none;
        background: transparent;
        font-weight: 600;
        font-size: 16px;
        outline: none;
    }

    .btn-add-cart {
        flex: 1;
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        color: white;
        border: none;
        padding: 14px 28px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .btn-add-cart:hover {
        transform: scale(1.02);
        box-shadow: 0 5px 20px rgba(0, 168, 255, 0.3);
    }

    .btn-add-cart:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    @media (max-width: 768px) {
        .product-detail {
            grid-template-columns: 1fr;
        }
        
        .product-gallery {
            min-height: 300px;
        }
        
        .product-info {
            padding: 25px;
        }
        
        .product-title {
            font-size: 24px;
        }
        
        .product-price {
            font-size: 26px;
        }
        
        .detail-container {
            margin: 20px auto;
        }
        
        .top-bar {
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
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

    .product-detail {
        animation: fadeIn 0.5s ease forwards;
    }
</style>

<?php if (session()->getFlashdata('success')): ?>
    <div style="background:#00a8ff; color:white; padding:12px 20px; margin:20px auto; max-width:1200px; border-radius:12px;">
        ✔ <?= session()->getFlashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="detail-container">
    <div class="top-bar">
        <div class="breadcrumb">
            <a href="/produk">Produk</a>
            <span> / </span>
            <span><?= esc($produk['nama_produk']); ?></span>
        </div>
        
        <a href="/produk" class="btn-back-top">
            ← Kembali
        </a>
    </div>

    <div class="product-detail">
        <div class="product-gallery">
            <?php if ($produk['gambar'] && file_exists(FCPATH . 'uploads/' . $produk['gambar'])): ?>
                <img src="/uploads/<?= $produk['gambar']; ?>" alt="<?= esc($produk['nama_produk']); ?>">
            <?php else: ?>
                <img src="https://placehold.co/600x500/00a8ff/ffffff?text=No+Image" alt="No Image">
            <?php endif; ?>
        </div>

        <div class="product-info">
            <div class="product-category">
                <?= esc($produk['nama_kategori']); ?>
            </div>
            
            <h1 class="product-title"><?= esc($produk['nama_produk']); ?></h1>
            
            <div class="product-price">
                Rp <?= number_format($produk['harga'], 0, ',', '.'); ?>
            </div>
            
            <div class="product-stock">
                <?php if ($produk['stok'] > 0): ?>
                    <span class="stock-tersedia">Stok Tersedia: <?= $produk['stok']; ?> unit</span>
                <?php else: ?>
                    <span class="stock-habis">Stok Produk Sedang Habis</span>
                <?php endif; ?>
            </div>
            
            <div class="product-description">
                <h3>Deskripsi Produk</h3>
                <p><?= nl2br(esc($produk['deskripsi'])); ?></p>
            </div>
            
            <div class="product-actions">
                <?php if ($produk['stok'] > 0): ?>
                    <form action="/cart/add" method="post" style="display: flex; gap: 15px; flex: 1; flex-wrap: wrap;">
                        <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">
                        
                        <div class="qty-selector">
                            <button type="button" class="qty-minus">−</button>
                            <input type="number" name="qty" class="qty-input" value="1" min="1" max="<?= $produk['stok']; ?>">
                            <button type="button" class="qty-plus">+</button>
                        </div>
                        
                        <button type="submit" class="btn-add-cart">
                            Tambah ke Keranjang
                        </button>
                    </form>
                <?php else: ?>
                    <button class="btn-add-cart" disabled>
                        Stok Produk Sedang Habis
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.qty-minus').forEach(btn => {
        btn.addEventListener('click', function() {
            let input = this.closest('.qty-selector').querySelector('.qty-input');
            let value = parseInt(input.value) - 1;
            let min = parseInt(input.min) || 1;
            if (value >= min) {
                input.value = value;
                input.dispatchEvent(new Event('change'));
            }
        });
    });

    document.querySelectorAll('.qty-plus').forEach(btn => {
        btn.addEventListener('click', function() {
            let input = this.closest('.qty-selector').querySelector('.qty-input');
            let value = parseInt(input.value) + 1;
            let max = parseInt(input.max);
            if (!max || value <= max) {
                input.value = value;
                input.dispatchEvent(new Event('change'));
            }
        });
    });
</script>