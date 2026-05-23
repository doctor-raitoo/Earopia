<?= view('layout/navbar_admin'); ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .produk-container {
        max-width: 1400px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .page-header {
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .page-header h2 {
        font-size: 28px;
        color: #0a2a3a;
        font-weight: 700;
    }

    .page-header h2 span {
        color: #00a8ff;
    }

    .btn-tambah {
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 40px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-tambah:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 168, 255, 0.3);
    }

    .alert-success {
        background: #d1fae5;
        color: #059669;
        padding: 12px 20px;
        border-radius: 12px;
        margin-bottom: 20px;
        border-left: 4px solid #059669;
    }

    .produk-table {
        width: 100%;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 100, 150, 0.08);
        border-collapse: collapse;
    }

    .produk-table thead tr {
        background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
        color: white;
    }

    .produk-table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
    }

    .produk-table td {
        padding: 15px;
        border-bottom: 1px solid #e0eef5;
        color: #0a2a3a;
        vertical-align: middle;
    }

    .produk-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #e0eef5;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-edit {
        background: transparent;
        border: 1px solid #00a8ff;
        color: #00a8ff;
        padding: 6px 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .btn-edit:hover {
        background: #00a8ff;
        color: white;
    }

    .btn-delete {
    background: transparent;
        border: 1px solid #dc2626;
        color: #dc2626;
        padding: 6px 12px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        transition: all 0.2s;
        display: inline-block;
    }

    .btn-delete:hover {
        background: #dc2626;
        color: white;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 1000;
    }

    .modal-content {
        background: white;
        padding: 30px;
        width: 500px;
        max-width: 90%;
        margin: 80px auto;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .modal-content h3 {
        font-size: 24px;
        color: #0a2a3a;
        margin-bottom: 20px;
    }

    .modal-content h3 span {
        color: #00a8ff;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid #e0eef5;
        border-radius: 12px;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.2s;
        outline: none;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #00a8ff;
        box-shadow: 0 0 0 3px rgba(0, 168, 255, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 80px;
    }

    .modal-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-simpan {
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 40px;
        font-weight: 600;
        cursor: pointer;
        flex: 1;
    }

    .btn-batal {
        background: #e0eef5;
        color: #0a2a3a;
        border: none;
        padding: 12px 20px;
        border-radius: 40px;
        font-weight: 600;
        cursor: pointer;
        flex: 1;
    }

    @media (max-width: 768px) {
        .produk-table {
            display: block;
            overflow-x: auto;
        }
        
        .page-header h2 {
            font-size: 24px;
        }
        
        .modal-content {
            margin: 40px auto;
            padding: 20px;
        }
    }
</style>

<div class="produk-container">
    <div class="page-header">
        <h2>Kelola <span>Produk</span></h2>
        <button onclick="openModal()" class="btn-tambah">
            + Tambah Produk
        </button>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <table class="produk-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produk as $p): ?>
            <tr>
                <td><strong><?= esc($p['nama_produk']); ?></strong></td>
                <td><?= esc($p['nama_kategori']); ?></td>
                <td>Rp <?= number_format($p['harga'],0,',','.'); ?></td>
                <td><?= $p['stok']; ?></td>
                <td>
                    <?php if ($p['gambar']): ?>
                        <img src="/uploads/<?= $p['gambar']; ?>" class="produk-img">
                    <?php else: ?>
                        <span style="color:#999;">-</span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="action-buttons">
                        <button class="btn-edit" onclick='editData(<?= json_encode($p); ?>)'>
                            Edit
                        </button>
                        <a href="/admin/produk/delete/<?= $p['id_produk']; ?>" class="btn-delete" onclick="return confirm('Hapus produk ini?')">
                            Hapus
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div id="modal" class="modal">
    <div class="modal-content">
        <h3><span id="modal-title">Tambah</span> Produk</h3>

        <form id="form-produk" method="post" enctype="multipart/form-data">
            <input type="hidden" name="gambar_lama" id="gambar_lama">

            <div class="form-group">
                <input type="text" name="nama_produk" placeholder="Nama Produk" required>
            </div>

            <div class="form-group">
                <select name="id_kategori" required>
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id_kategori']; ?>">
                            <?= esc($k['nama_kategori']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <input type="number" name="harga" placeholder="Harga" required>
            </div>

            <div class="form-group">
                <input type="number" name="stok" placeholder="Stok" required>
            </div>

            <div class="form-group">
                <textarea name="deskripsi" placeholder="Deskripsi Produk"></textarea>
            </div>

            <div class="form-group">
                <input type="file" name="gambar">
            </div>

            <div class="modal-buttons">
                <button type="submit" class="btn-simpan">Simpan</button>
                <button type="button" class="btn-batal" onclick="closeModal()">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('modal').style.display = 'block';
    document.getElementById('form-produk').action = '/admin/produk/store';
    document.getElementById('modal-title').innerText = 'Tambah';
    document.getElementById('form-produk').reset();
    document.getElementById('gambar_lama').value = '';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

function editData(data) {
    openModal();

    document.getElementById('modal-title').innerText = 'Edit';
    document.getElementById('form-produk').action = '/admin/produk/update/' + data.id_produk;

    document.querySelector('[name=nama_produk]').value = data.nama_produk;
    document.querySelector('[name=id_kategori]').value = data.id_kategori;
    document.querySelector('[name=harga]').value = data.harga;
    document.querySelector('[name=stok]').value = data.stok;
    document.querySelector('[name=deskripsi]').value = data.deskripsi;
    document.getElementById('gambar_lama').value = data.gambar;
}
</script>