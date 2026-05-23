<?= view('layout/navbar'); ?>

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

    .checkout-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .checkout-card {
        background: white;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 8px 30px rgba(0, 100, 150, 0.12);
    }

    .checkout-header {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #e0eef5;
    }

    .checkout-header h2 {
        font-size: 28px;
        color: #0a2a3a;
        font-weight: 700;
    }

    .checkout-header h2 span {
        color: #00a8ff;
    }

    .cart-items {
        margin-bottom: 20px;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #f0f0f0;
    }

    .cart-item-name {
        font-weight: 600;
        color: #0a2a3a;
    }

    .cart-item-qty {
        color: #6a8a9a;
        font-size: 14px;
    }

    .cart-item-price {
        font-weight: 700;
        color: #00a8ff;
    }

    .divider {
        height: 1px;
        background: #e0eef5;
        margin: 20px 0;
    }

    .total-section {
        margin: 20px 0;
        text-align: right;
    }

    .total-section h3 {
        font-size: 24px;
        color: #0a2a3a;
    }

    .total-section h3 span {
        color: #00a8ff;
        font-size: 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #0a2a3a;
    }

    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid #e0eef5;
        border-radius: 12px;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.2s;
        outline: none;
    }

    .form-group textarea:focus,
    .form-group select:focus {
        border-color: #00a8ff;
        box-shadow: 0 0 0 3px rgba(0, 168, 255, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .payment-info {
        background: linear-gradient(135deg, #f0f7ff 0%, #e6f0fa 100%);
        padding: 20px;
        border-radius: 16px;
        margin-bottom: 20px;
        border: 1px solid #00a8ff;
    }

    .payment-info strong {
        display: block;
        color: #0a2a3a;
        margin-bottom: 10px;
    }

    .payment-info p {
        color: #00a8ff;
        font-weight: 600;
        margin: 5px 0;
    }

    .file-input {
        width: 100%;
        padding: 10px 0;
    }

    .btn-checkout {
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        color: white;
        border: none;
        padding: 14px 28px;
        border-radius: 40px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
        width: 100%;
    }

    .btn-checkout:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(0, 168, 255, 0.3);
    }

    @media (max-width: 768px) {
        .checkout-card {
            padding: 25px;
        }
        
        .checkout-header h2 {
            font-size: 24px;
        }
        
        .total-section h3 {
            font-size: 20px;
        }
        
        .total-section h3 span {
            font-size: 24px;
        }
    }
</style>

<div class="checkout-container">
    <div class="checkout-card">
        <div class="checkout-header">
            <h2>Checkout <span>Earopia</span></h2>
        </div>

        <div class="cart-items">
            <?php foreach ($cart as $item): ?>
                <div class="cart-item">
                    <div>
                        <span class="cart-item-name"><?= esc($item['nama_produk']); ?></span>
                        <span class="cart-item-qty"> (x<?= $item['qty']; ?>)</span>
                    </div>
                    <div class="cart-item-price">
                        Rp <?= number_format($item['harga'] * $item['qty'],0,',','.'); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="divider"></div>

        <div class="total-section">
            <h3>Total: <span>Rp <?= number_format($total,0,',','.'); ?></span></h3>
        </div>

        <div class="divider"></div>

        <form method="post" action="/checkout/process" enctype="multipart/form-data">
            <div class="form-group">
                <label>Alamat Pengiriman</label>
                <textarea name="alamat" placeholder="Masukkan alamat lengkap Anda" required></textarea>
            </div>

            <div class="form-group">
                <label>Metode Pembayaran</label>
                <select name="metode_pembayaran" required>
                    <option value="">-- Pilih Metode Pembayaran --</option>
                    <option value="BCA">Transfer Bank BCA</option>
                    <option value="BRI">Transfer Bank BRI</option>
                    <option value="DANA">DANA</option>
                    <option value="OVO">OVO</option>
                </select>
            </div>

            <div class="payment-info">
                <strong>Informasi Pembayaran</strong>
                <p>BCA: 1234567890 a.n Earopia Store</p>
                <p>BRI: 0987654321 a.n Earopia Store</p>
                <p>DANA / OVO: 08123456789 a.n Earopia Store</p>
            </div>

            <div class="form-group">
                <label>Upload Bukti Pembayaran</label>
                <input type="file" name="bukti" class="file-input" required>
            </div>

            <button type="submit" class="btn-checkout">
                Konfirmasi Pembayaran
            </button>
        </form>
    </div>
</div>