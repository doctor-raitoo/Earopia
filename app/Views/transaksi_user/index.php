<?= view('layout/navbar'); ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .riwayat-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .page-header {
        margin-bottom: 30px;
    }

    .page-header h2 {
        font-size: 28px;
        color: #0a2a3a;
        font-weight: 700;
    }

    .page-header h2 span {
        color: #00a8ff;
    }

    .page-header p {
        color: #6a8a9a;
        margin-top: 5px;
    }

    .riwayat-table {
        width: 100%;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 100, 150, 0.08);
        border-collapse: collapse;
        margin-top: 20px;
    }

    .riwayat-table thead tr {
        background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
        color: white;
    }

    .riwayat-table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
    }

    .riwayat-table td {
        padding: 15px;
        border-bottom: 1px solid #e0eef5;
        color: #0a2a3a;
        vertical-align: middle;
    }

    .empty-row td {
        text-align: center;
        padding: 40px;
        color: #6a8a9a;
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

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .btn-detail {
        background: transparent;
        border: 1px solid #00a8ff;
        color: #00a8ff;
        padding: 6px 12px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-detail:hover {
        background: #00a8ff;
        color: white;
    }

    .btn-invoice {
        background: transparent;
        border: 1px solid #059669;
        color: #059669;
        padding: 6px 12px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .btn-invoice:hover {
        background: #059669;
        color: white;
    }

    @media (max-width: 768px) {
        .riwayat-container {
            margin: 20px auto;
        }
        
        .riwayat-table {
            display: block;
            overflow-x: auto;
        }
        
        .page-header h2 {
            font-size: 24px;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 5px;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="riwayat-container">
    <div class="page-header">
        <h2>Riwayat <span>Transaksi</span></h2>
        <p>Lihat semua pesanan yang telah Anda lakukan</p>
    </div>

    <table class="riwayat-table">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Total</th>
                <th>Status</th>
                <th>Status Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($transaksi)): ?>
                <tr class="empty-row">
                    <td colspan="5">
                        <i class="fas fa-receipt" style="font-size: 40px; opacity: 0.5; display: block; margin-bottom: 10px;"></i>
                        Belum ada transaksi
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($transaksi as $t): ?>
                    <?php
                    $statusBarangClass = '';
                    $statusBarangLabel = '';
                    if ($t['status_barang'] == 'diproses') {
                        $statusBarangClass = 'status-barang-diproses';
                        $statusBarangLabel = 'Diproses';
                    } elseif ($t['status_barang'] == 'dikirim') {
                        $statusBarangClass = 'status-barang-dikirim';
                        $statusBarangLabel = 'Sedang Dikirim';
                    } elseif ($t['status_barang'] == 'diterima') {
                        $statusBarangClass = 'status-barang-diterima';
                        $statusBarangLabel = 'Diterima Dan Selesai';
                    } else {
                        $statusBarangClass = 'status-barang-diproses';
                        $statusBarangLabel = ucfirst($t['status_barang']);
                    }
                    ?>
                    <tr>
                        <td><strong><?= $t['id_transaksi']; ?></strong></td>
                        <td>Rp <?= number_format($t['total'],0,',','.'); ?></td>
                        <td>
                            <span class="status-badge status-<?= $t['status']; ?>">
                                <?= $t['status']; ?>
                            </span>
                        </td>
                        <td>
                            <span class="<?= $statusBarangClass; ?>">
                                <?= $statusBarangLabel; ?>
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="/transaksi-saya/detail/<?= $t['id_transaksi']; ?>" class="btn-detail">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="/invoice/<?= $t['id_transaksi']; ?>" class="btn-invoice">
                                    <i class="fas fa-file-pdf"></i> Invoice
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>