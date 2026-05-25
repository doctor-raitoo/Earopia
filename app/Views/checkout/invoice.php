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

.invoice-container {
    max-width: 900px;
    margin: 40px auto;
    background: white;
    border-radius: 24px;
    box-shadow: 0 8px 30px rgba(0, 100, 150, 0.12);
    overflow: hidden;
}

.invoice-header {
    background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
    color: white;
    padding: 30px;
    text-align: center;
}

.invoice-header h2 {
    font-size: 28px;
    font-weight: 700;
}

.invoice-header h2 span {
    color: #00a8ff;
}

.invoice-header p {
    margin-top: 8px;
    opacity: 0.8;
    font-size: 14px;
}

.invoice-body {
    padding: 30px;
}

.top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.btn-back {
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

.btn-back:hover {
    background: #00a8ff;
    color: white;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 25px;
    padding-bottom: 20px;
    border-bottom: 2px solid #e0eef5;
}

.info-item {
    display: flex;
    flex-direction: column;
}

.info-label {
    font-size: 12px;
    color: #6a8a9a;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 5px;
}

.info-value {
    font-size: 16px;
    font-weight: 600;
    color: #0a2a3a;
}

.status-badge {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
}

.status-badge.pending {
    background: #fef3c7;
    color: #d97706;
}

.status-badge.dibayar {
    background: #d1fae5;
    color: #059669;
}

.status-badge.batal {
    background: #fee2e2;
    color: #dc2626;
}

.invoice-table {
    width: 100%;
    border-collapse: collapse;
    margin: 25px 0;
}

.invoice-table th {
    text-align: left;
    padding: 12px 0;
    color: #6a8a9a;
    font-weight: 600;
    font-size: 13px;
    border-bottom: 2px solid #e0eef5;
}

.invoice-table td {
    padding: 12px 0;
    border-bottom: 1px solid #f0f0f0;
    color: #0a2a3a;
}

.total-section {
    text-align: right;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 2px solid #e0eef5;
}

.total-section h3 {
    font-size: 24px;
    color: #0a2a3a;
}

.total-section h3 span {
    color: #00a8ff;
    font-size: 28px;
}

.bukti-section {
    margin: 25px 0;
    padding: 20px;
    background: #f8fafc;
    border-radius: 16px;
}

.bukti-section h4 {
    color: #0a2a3a;
    margin-bottom: 15px;
    font-size: 16px;
}

.bukti-section img {
    max-width: 100%;
    max-height: 300px;
    border-radius: 12px;
    border: 1px solid #e0eef5;
}

.print-btn {
    background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
    color: white;
    border: none;
    padding: 12px 28px;
    border-radius: 40px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.print-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(0, 168, 255, 0.3);
}

@media print {
    body {
        background: white;
    }
    
    .navbar {
        display: none;
    }
    
    .print-btn {
        display: none;
    }
    
    .btn-back {
        display: none;
    }
    
    .top-bar {
        display: none;
    }
    
    .invoice-container {
        margin: 0;
        box-shadow: none;
        border-radius: 0;
    }
    
    .invoice-header {
        background: #0a1928;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
    
    .status-badge {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
}

@media (max-width: 600px) {
    .invoice-body {
        padding: 20px;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
        gap: 12px;
    }
    
    .invoice-table th,
    .invoice-table td {
        font-size: 13px;
    }
    
    .total-section h3 {
        font-size: 20px;
    }
    
    .top-bar {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
    }
}
</style>

<div class="invoice-container">
    <div class="invoice-header">
        <h2>Invoice <span>Earopia</span></h2>
        <p>ID Transaksi: <?= $transaksi['id_transaksi']; ?></p>
    </div>

    <div class="invoice-body">
        <div class="top-bar">
            <div></div>
            <a href="/transaksi-saya" class="btn-back">
                ← Kembali
            </a>
        </div>

        <div class="info-grid">
            <div class="info-item">
                <span class="info-label">Tanggal</span>
                <span class="info-value"><?= $transaksi['tanggal']; ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Status</span>
                <span class="status-badge <?= $transaksi['status']; ?>">
                    <?= $transaksi['status']; ?>
                </span>
            </div>
            <div class="info-item">
                <span class="info-label">Alamat Pengiriman</span>
                <span class="info-value"><?= esc($transaksi['alamat']); ?></span>
            </div>
            <div class="info-item">
                <span class="info-label">Metode Pembayaran</span>
                <span class="info-value"><?= $transaksi['metode_pembayaran']; ?></span>
            </div>
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detail as $item): ?>
                <tr>
                    <td><?= esc($item['nama_produk']); ?></td>
                    <td><?= $item['jumlah']; ?></td>
                    <td>Rp <?= number_format($item['harga'],0,',','.'); ?></td>
                    <td>Rp <?= number_format($item['harga'] * $item['jumlah'],0,',','.'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total-section">
            <h3>Total: <span>Rp <?= number_format($transaksi['total'],0,',','.'); ?></span></h3>
        </div>

        <?php if ($transaksi['bukti_pembayaran']): ?>
        <div class="bukti-section">
            <h4>Bukti Pembayaran</h4>
            <img src="/uploads/<?= $transaksi['bukti_pembayaran']; ?>" alt="Bukti Pembayaran">
        </div>
        <?php endif; ?>

        <button onclick="window.print()" class="print-btn">
            🖨 Cetak Invoice
        </button>
    </div>
</div>