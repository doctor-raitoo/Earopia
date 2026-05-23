<?= view('layout/navbar_admin'); ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .kategori-container {
        max-width: 100%;
        margin: 0;
        padding: 30px;
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

    .kategori-table {
        width: 100%;
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 100, 150, 0.08);
        border-collapse: collapse;
    }

    .kategori-table thead tr {
        background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
        color: white;
    }

    .kategori-table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
        font-size: 14px;
    }

    .kategori-table td {
        padding: 15px;
        border-bottom: 1px solid #e0eef5;
        color: #0a2a3a;
        vertical-align: middle;
    }

    .kategori-table td:last-child {
        text-align: center;
    }

    .action-buttons {
        display: flex;
        gap: 8px;
        justify-content: center;
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
        width: 400px;
        max-width: 90%;
        margin: 150px auto;
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
        margin-bottom: 20px;
    }

    .form-group input {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid #e0eef5;
        border-radius: 12px;
        font-size: 14px;
        transition: all 0.2s;
        outline: none;
    }

    .form-group input:focus {
        border-color: #00a8ff;
        box-shadow: 0 0 0 3px rgba(0, 168, 255, 0.1);
    }

    .modal-buttons {
        display: flex;
        gap: 10px;
    }

    .btn-simpan {
        background: linear-gradient(135deg, #00a8ff 0%, #0088cc 100%);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 40px;
        font-weight: 600;
        cursor: pointer;
        flex: 1;
    }

    .btn-batal {
        background: #e0eef5;
        color: #0a2a3a;
        border: none;
        padding: 10px 20px;
        border-radius: 40px;
        font-weight: 600;
        cursor: pointer;
        flex: 1;
    }

    @media (max-width: 768px) {
        .kategori-container {
            padding: 20px;
        }
        
        .kategori-table {
            display: block;
            overflow-x: auto;
        }
        
        .page-header h2 {
            font-size: 24px;
        }
        
        .modal-content {
            margin: 100px auto;
            padding: 20px;
        }
    }
</style>

<div class="kategori-container">
    <div class="page-header">
        <h2>Kelola <span>Kategori</span></h2>
        <button onclick="openModal()" class="btn-tambah">
            + Tambah Kategori
        </button>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <table class="kategori-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kategori as $k): ?>
            <tr>
                <td><?= $k['id_kategori']; ?></td>
                <td><strong><?= esc($k['nama_kategori']); ?></strong></td>
                <td>
                    <div class="action-buttons">
                        <button class="btn-edit" onclick='editKategori(<?= json_encode($k); ?>)'>
                            Edit
                        </button>
                        <a href="/admin/kategori/delete/<?= $k['id_kategori']; ?>" class="btn-delete" onclick="return confirm('Hapus kategori ini?')">
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
        <h3><span id="modal-title">Tambah</span> Kategori</h3>

        <form id="form-kategori" method="post">
            <div class="form-group">
                <input type="text" name="nama_kategori" placeholder="Nama Kategori" required>
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
    document.getElementById('form-kategori').action = '/admin/kategori/store';
    document.getElementById('modal-title').innerText = 'Tambah';
    document.querySelector('[name=nama_kategori]').value = '';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

function editKategori(data) {
    openModal();

    document.getElementById('modal-title').innerText = 'Edit';
    document.getElementById('form-kategori').action = '/admin/kategori/update/' + data.id_kategori;

    document.querySelector('[name=nama_kategori]').value = data.nama_kategori;
}
</script>