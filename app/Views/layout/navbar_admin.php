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

    .navbar {
        background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
        padding: 16px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 12px rgba(0, 100, 150, 0.2);
        border-bottom: 2px solid #00a8ff;
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .logo-area {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .logo-area img {
        height: 45px;
        width: auto;
        object-fit: contain;
        transition: transform 0.2s ease;
    }

    .logo-area img:hover {
        transform: scale(1.05);
    }

    .nav-links {
        display: flex;
        gap: 25px;
        align-items: center;
    }

    .nav-links a {
        color: #e0f0ff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        padding: 8px 0;
        transition: all 0.2s ease;
        position: relative;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .nav-links a i {
        font-size: 16px;
    }

    .nav-links a:hover {
        color: #00d4ff;
    }

    .nav-links a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: #00a8ff;
        transition: width 0.2s ease;
    }

    .nav-links a:hover::after {
        width: 100%;
    }

    .nav-links a.active {
        color: #00d4ff;
    }

    .nav-links a.active::after {
        width: 100%;
        background: #00d4ff;
    }

    .logout-link {
        padding: 8px 18px;
    }

    @media (max-width: 768px) {
        .navbar {
            padding: 12px 20px;
            flex-direction: column;
            gap: 12px;
        }
        
        .nav-links {
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }
        
        .logo-area img {
            height: 35px;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div class="navbar">
    <div class="logo-area">
        <img src="<?= base_url('uploads/logo.png'); ?>" alt="Earopia Logo">
    </div>

    <div class="nav-links">
        <a href="/admin/dashboard">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="/admin/kategori">
            <i class="fas fa-tags"></i> Kelola Kategori
        </a>
        <a href="/admin/produk">
            <i class="fas fa-box"></i> Kelola Produk
        </a>
        <a href="/admin/transaksi">
            <i class="fas fa-file-invoice-dollar"></i> Data Transaksi
        </a>
        <a href="/logout" class="logout-link">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
</div>