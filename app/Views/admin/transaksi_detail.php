<?= view('layout/navbar_admin'); ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .detail-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .detail-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 8px 30px rgba(0, 100, 150, 0.12);
    }

    .detail-header {
        background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
        color: white;
        padding: 25px 30px;
    }

    .detail-header h2 {
        font-size: 24px;
        font-weight: 700;
    }

    .detail-header h2 span {
        color: #00a8ff;
    }

    .detail-body {
        padding: 30px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 30px;
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
        font-weight: 700;
        color: #0a2a3a;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: capitalize;
    }

    .status-pending {
        background: #fef3c7;
        color: #d97706;
    }

    .status-dibayar {
        background: #d1fae5;
        color: #059669;
    }

    .status-batal {
        background: #fee2e2;
        color: #dc2626;
    }

    .detail-table {
        width: 100%;
        background: white;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .detail-table thead tr {
        background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
        color: white;
    }

    .detail-table th {
        padding: 12px 15px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
    }

    .detail-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #e0eef5;
        color: #0a2a3a;
    }

    .btn-back {
        background: transparent;
        border: 1.5px solid #00a8ff;
        color: #00a8ff;
        padding: 10px 24px;
        border-radius: 40px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
        margin-top: 30px;
    }

    .btn-back:hover {
        background: #00a8ff;
        color: white;
    }

    @media (max-width: 768px) {
        .detail-container {
            margin: 20px auto;
        }
        
        .detail-body {
            padding: 20px;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }
        
        .detail-header h2 {
            font-size: 20px;
        }
    }
</style>

<div class="detail-container">
    <div class="detail-card">
        <div class="detail-header">
            <h2>Detail <span>Transaksi</span></h2>
        </div>

        <div class="detail-body">
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Pelanggan</span>
                    <span class="info-value"><?= $transaksi['username']; ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Total Belanja</span>
                    <span class="info-value">Rp <?= number_format($transaksi['total'],0,',','.'); ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Status</span>
                    <span class="status-badge status-<?= $transaksi['status']; ?>">
                        <?= $transaksi['status']; ?>
                    </span>
                </div>
                <div class="info-item" style="grid-column: span 3;">
                    <span class="info-label">
                        <i class="fas fa-map-marker-alt"></i>
                        Alamat Pengiriman
                    </span>
                    <span class="info-value" style="font-weight: 500;">
                        <?= esc($transaksi['alamat'] ?? '-'); ?>
                    </span>
                </div>
            </div>

            <table class="detail-table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail as $d): ?>
                    <tr>
                        <td><?= esc($d['nama_produk']); ?></td>
                        <td><?= $d['jumlah']; ?></td>
                        <td>Rp <?= number_format($d['harga'],0,',','.'); ?></td>
                        <td>Rp <?= number_format($d['harga'] * $d['jumlah'],0,',','.'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <a href="/admin/transaksi" class="btn-back">
                ← Kembali ke Transaksi
            </a>
        </div>
    </div>
</div>