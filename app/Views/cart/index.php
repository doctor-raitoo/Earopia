<?= view('layout/navbar'); ?>

<style>
    .cart-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .cart-header {
        margin-bottom: 30px;
    }

    .cart-header h2 {
        font-size: 32px;
        color: #0a2a3a;
        font-weight: 700;
    }

    .cart-header h2 span {
        color: #00a8ff;
    }

    .alert-success {
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        color: white;
        padding: 15px 20px;
        border-radius: 12px;
        margin-bottom: 25px;
        font-weight: 500;
        box-shadow: 0 2px 8px rgba(0,168,255,0.2);
    }

    .cart-empty {
        background: white;
        border-radius: 20px;
        padding: 60px 20px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,100,150,0.1);
    }

    .cart-empty p {
        font-size: 18px;
        color: #6a8a9a;
        margin-bottom: 20px;
    }

    .cart-empty a {
        display: inline-block;
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        color: white;
        text-decoration: none;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 600;
        transition: transform 0.2s;
    }

    .cart-empty a:hover {
        transform: scale(1.05);
    }

    .cart-items {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .cart-item {
        background: white;
        border-radius: 20px;
        padding: 20px;
        display: flex;
        gap: 20px;
        align-items: center;
        box-shadow: 0 4px 12px rgba(0,100,150,0.08);
        transition: all 0.3s ease;
        border: 1px solid #e0eef5;
    }

    .cart-item:hover {
        box-shadow: 0 8px 25px rgba(0,168,255,0.15);
        transform: translateY(-2px);
        border-color: #00a8ff;
    }

    .cart-item-image {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #d4e4f0 0%, #b8d4e8 100%);
        border-radius: 12px;
        overflow: hidden;
        flex-shrink: 0;
    }

    .cart-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .cart-item-details {
        flex: 1;
    }

    .cart-item-details h4 {
        font-size: 18px;
        color: #0a2a3a;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .cart-item-price {
        color: #00a8ff;
        font-weight: 700;
        font-size: 16px;
        margin-bottom: 12px;
    }

    .cart-item-qty {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .qty-btn {
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        border: none;
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .qty-btn:hover {
        transform: scale(0.95);
        background: linear-gradient(135deg, #0088cc 0%, #006699 100%);
    }

    .cart-item-qty span {
        font-size: 18px;
        font-weight: 600;
        color: #0a2a3a;
        min-width: 30px;
        text-align: center;
    }

    .cart-item-subtotal {
        text-align: right;
        flex-shrink: 0;
    }

    .cart-item-subtotal strong {
        font-size: 20px;
        color: #0a2a3a;
        display: block;
        margin-bottom: 10px;
    }

    .delete-link {
        color: red;
        text-decoration: none;
        font-size: 20px;
        display: inline-block;
        transition: color 0.2s;
    }

    .delete-link:hover {
        color: #ff4444;
        text-decoration: underline;
    }

    .cart-footer {
        margin-top: 30px;
        background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
        padding: 25px 30px;
        border-radius: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        border: 1px solid #00a8ff;
    }

    .cart-total h3 {
        color: white;
        font-size: 24px;
    }

    .cart-total h3 span {
        color: #00d4ff;
        font-size: 28px;
    }

    .checkout-btn {
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        color: white;
        text-decoration: none;
        padding: 14px 32px;
        border-radius: 40px;
        font-weight: 700;
        font-size: 16px;
        transition: all 0.3s;
        display: inline-block;
    }

    .checkout-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 20px rgba(0,168,255,0.4);
    }

    @media (max-width: 768px) {
        .cart-item {
            flex-wrap: wrap;
        }
        
        .cart-item-subtotal {
            text-align: left;
            width: 100%;
            margin-top: 10px;
        }
        
        .cart-footer {
            flex-direction: column;
            text-align: center;
        }
    }
</style>

<div class="cart-container">
    <div class="cart-header">
        <h2><span>Keranjang Belanja</span></h2>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert-success">
            ✓ <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <?php if (empty($cart)): ?>
        <div class="cart-empty">
            <p>🛍️ Keranjang belanja masih kosong</p>
            <a href="/produk">Mulai Belanja</a>
        </div>
    <?php else: ?>

        <div class="cart-items">
            <?php foreach ($cart as $item): ?>
                <div class="cart-item">
                    <div class="cart-item-image">
                        <img src="/uploads/<?= $item['gambar']; ?>" alt="<?= esc($item['nama_produk']); ?>">
                    </div>

                    <div class="cart-item-details">
                        <h4><?= esc($item['nama_produk']); ?></h4>
                        <div class="cart-item-price">Rp <?= number_format($item['harga'],0,',','.'); ?></div>
                        
                        <form action="/cart/update" method="post" class="cart-item-qty">
                            <input type="hidden" name="id_cart" value="<?= $item['id_cart']; ?>">
                            <button type="submit" name="qty" value="<?= $item['qty'] - 1; ?>" class="qty-btn">−</button>
                            <span><?= $item['qty']; ?></span>
                            <button type="submit" name="qty" value="<?= $item['qty'] + 1; ?>" class="qty-btn">+</button>
                        </form>
                    </div>

                    <div class="cart-item-subtotal">
                        <strong>Rp <?= number_format($item['harga'] * $item['qty'],0,',','.'); ?></strong>
                        <br>
                        <a href="/cart/delete/<?= $item['id_cart']; ?>" 
                        onclick="return confirm('Hapus item ini?')" 
                        class="delete-link">
                        Hapus
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="cart-footer">
            <div class="cart-total">
                <h3>Total Belanja: <span>Rp <?= number_format($total,0,',','.'); ?></span></h3>
            </div>
            <a href="/checkout" class="checkout-btn">Checkout</a>
        </div>

    <?php endif; ?>
</div>