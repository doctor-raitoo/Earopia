<?= view('layout/navbar'); ?>

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

    .tracking {
        display: flex;
        justify-content: space-between;
        margin: 25px 0 30px;
        position: relative;
    }

    .tracking::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        width: 100%;
        height: 4px;
        background: #e0eef5;
        z-index: 0;
    }

    .step {
        position: relative;
        z-index: 1;
        text-align: center;
        width: 100%;
    }

    .circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #ccc;
        margin: 0 auto;
        line-height: 40px;
        color: white;
        font-weight: bold;
        transition: 0.3s;
    }

    .active .circle {
        background: #00a8ff;
        box-shadow: 0 0 0 4px rgba(0, 168, 255, 0.2);
    }

    .done .circle {
        background: #28a745;
    }

    .label {
        margin-top: 8px;
        font-size: 12px;
        font-weight: 600;
        color: #6a8a9a;
    }

    .done .label {
        color: #28a745;
    }

    .active .label {
        color: #00a8ff;
    }

    .tracking-status-text {
        margin-bottom: 30px;
        padding: 12px 16px;
        background: #f0f7fc;
        border-radius: 12px;
        text-align: center;
        font-weight: 700;
        color: #00a8ff;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
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

    .status-barang-diproses {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        background: #e0eef5;
        color: #0a2a3a;
    }

    .status-barang-dikirim {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        background: #fef3c7;
        color: #d97706;
    }

    .status-barang-diterima {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        background: #d1fae5;
        color: #059669;
    }

    .detail-table {
        width: 100%;
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
        text-decoration: none;
        margin-top: 30px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }

    .btn-back:hover {
        background: #00a8ff;
        color: white;
    }

    @media (max-width: 768px) {
        .detail-body {
            padding: 20px;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
            gap: 12px;
        }
        
        .tracking {
            margin: 15px 0 20px;
        }
        
        .circle {
            width: 32px;
            height: 32px;
            line-height: 32px;
            font-size: 12px;
        }
        
        .tracking::before {
            top: 16px;
        }
        
        .label {
            font-size: 10px;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<?php
$statusBarang = $transaksi['status_barang'];

$step = [
    'diproses' => 1,
    'dikirim' => 2,
    'diterima' => 3
];

$currentStep = $step[$statusBarang] ?? 1;

$statusText = [
    'diproses' => 'Pesanan sedang diproses oleh admin',
    'dikirim' => 'Pesanan sedang dalam perjalanan',
    'diterima' => 'Pesanan telah diterima'
];

$statusClassMap = [
    'diproses' => 'status-barang-diproses',
    'dikirim' => 'status-barang-dikirim',
    'diterima' => 'status-barang-diterima'
];

$statusLabelMap = [
    'diproses' => 'Diproses',
    'dikirim' => 'Sedang Dikirim',
    'diterima' => 'Diterima dan Selesai'
];
?>

<div class="detail-container">
    <div class="detail-card">
        <div class="detail-header">
            <h2>Detail <span>Transaksi</span></h2>
        </div>

        <div class="detail-body">
            <div class="tracking">
                <div class="step <?= $currentStep >= 1 ? 'done' : ''; ?>">
                    <div class="circle">1</div>
                    <div class="label">Pesanan Diproses</div>
                </div>

                <div class="step <?= $currentStep >= 2 ? ($currentStep == 2 ? 'active' : 'done') : ''; ?>">
                    <div class="circle">2</div>
                    <div class="label">Barang Dikirimkan</div>
                </div>

                <div class="step <?= $currentStep == 3 ? 'done' : ''; ?>">
                    <div class="circle">3</div>
                    <div class="label">Barang Diterima</div>
                </div>
            </div>

            <div class="tracking-status-text">
                <i class="fas fa-info-circle"></i> <?= $statusText[$statusBarang] ?? 'Status tidak diketahui'; ?>
            </div>

            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Status Pembayaran</span>
                    <span class="status-badge status-<?= $transaksi['status']; ?>">
                        <?= $transaksi['status']; ?>
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">Status Pengiriman</span>
                    <span class="<?= $statusClassMap[$statusBarang] ?? 'status-barang-diproses'; ?>">
                        <?= $statusLabelMap[$statusBarang] ?? ucfirst($statusBarang); ?>
                    </span>
                </div>
                <div class="info-item">
                    <span class="info-label">Total Belanja</span>
                    <span class="info-value">Rp <?= number_format($transaksi['total'],0,',','.'); ?></span>
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

            <a href="/transaksi-saya" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Riwayat
            </a>
        </div>
    </div>
</div>