<?= view('layout/navbar_admin'); ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .transaksi-container {
        max-width: 100%;
        margin: 0;
        padding: 30px;
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

    .alert-success {
        background: #d1fae5;
        color: #059669;
        padding: 12px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        border-left: 4px solid #059669;
    }

    .transaksi-table {
        width: 100%;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 100, 150, 0.08);
        border-collapse: collapse;
    }

    .transaksi-table thead tr {
        background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
        color: white;
    }

    .transaksi-table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
    }

    .transaksi-table td {
        padding: 15px;
        border-bottom: 1px solid #e0eef5;
        color: #0a2a3a;
        vertical-align: middle;
    }

    .transaksi-table td:last-child {
        text-align: center;
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

    .status-barang {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        background: #e0eef5;
        color: #0a2a3a;
    }

    .bukti-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        border: 1px solid #e0eef5;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-btn {
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        border: none;
        width: 110px;
        justify-content: center;
    }

    .dropdown-btn:hover {
        background: linear-gradient(135deg, #0088cc 0%, #006699 100%);
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background: white;
        min-width: 140px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        border-radius: 12px;
        z-index: 1;
        right: 0;
        overflow: hidden;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        color: #0a2a3a;
        padding: 10px 16px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        transition: all 0.2s;
        border-bottom: 1px solid #f0f0f0;
    }

    .dropdown-content a:last-child {
        border-bottom: none;
    }

    .dropdown-content a:hover {
        background: #f0f7ff;
        color: #00a8ff;
    }

    .btn-verifikasi {
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        color: white;
        padding: 6px 12px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
        transition: all 0.2s;
        margin-bottom: 8px;
    }

    .btn-verifikasi:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 168, 255, 0.3);
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
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
    }

    .btn-detail:hover {
        background: #00a8ff;
        color: white;
    }

    @media (max-width: 768px) {
        .transaksi-container {
            padding: 20px;
        }
        
        .transaksi-table {
            display: block;
            overflow-x: auto;
        }
        
        .page-header h2 {
            font-size: 24px;
        }
        
        .dropdown-content {
            right: auto;
            left: 0;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="transaksi-container">
    <div class="page-header">
        <h2>Data <span>Transaksi</span></h2>
        <p>Kelola dan verifikasi semua transaksi pelanggan</p>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <table class="transaksi-table">
        <thead>
            <tr>
                <th style="text-align: center;">ID Transaksi</th>
                <th style="text-align: center;">Pelanggan</th>
                <th style="text-align: center;">Total</th>
                <th style="text-align: center;">Status</th>
                <th style="text-align: center;">Status Barang</th>
                <th style="text-align: center;">Bukti</th>
                <th style="text-align: center;">Aksi</th>
                <th style="text-align: center;">Detail Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $t): ?>
            <tr>
                <td style="text-align: center;"><strong><?= $t['id_transaksi']; ?></strong></td>
                <td style="text-align: center;">
                    <strong><?= $t['username']; ?></strong>
                </td>
                <td style="text-align: center;">Rp <?= number_format($t['total'],0,',','.'); ?></td>
                <td style="text-align: center;">
                    <span class="status-badge status-<?= $t['status']; ?>">
                        <?= $t['status']; ?>
                    </span>
                </td>
                <td style="text-align: center;">
                    <span class="status-barang">
                        <?= $t['status_barang']; ?>
                    </span>
                </td>
                <td style="text-align: center;">
                    <?php if ($t['bukti_pembayaran']): ?>
                        <img src="/uploads/<?= $t['bukti_pembayaran']; ?>" class="bukti-img" alt="Bukti">
                    <?php else: ?>
                        <span style="color:#999;">-</span>
                    <?php endif; ?>
                </td>
                <td style="text-align: center;">
                    <?php if ($t['status'] == 'pending'): ?>
                        <a href="/admin/verifikasi/<?= $t['id_transaksi']; ?>" class="btn-verifikasi">
                            <i class="fas fa-check-circle"></i> Verifikasi
                        </a>
                    <?php endif; ?>
                    
                    <div class="dropdown">
                        <button class="dropdown-btn">
                            <i class="fas fa-cog"></i> Status
                        </button>
                        <div class="dropdown-content">
                            <a href="/admin/status-barang/<?= $t['id_transaksi']; ?>/diproses">
                                <i class="fas fa-box"></i> Diproses
                            </a>
                            <a href="/admin/status-barang/<?= $t['id_transaksi']; ?>/sedang dikirim">
                                <i class="fas fa-truck"></i> Kirim
                            </a>
                            <a href="/admin/status-barang/<?= $t['id_transaksi']; ?>/diterima">
                                <i class="fas fa-check-circle"></i> Selesai
                            </a>
                        </div>
                    </div>
                </td>
                <td>
                    <a href="/admin/transaksi/detail/<?= $t['id_transaksi']; ?>" class="btn-detail">
                        <i class="fas fa-eye"></i> Detail
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>