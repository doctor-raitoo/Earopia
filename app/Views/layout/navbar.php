<!DOCTYPE html>
<html>
<head>
    <title>Earopia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fc;
            padding-top: 74px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
            padding: 12px 40px;
            box-shadow: 0 4px 12px rgba(0, 100, 150, 0.2);
            border-bottom: 2px solid #00a8ff;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .logo img {
            height: 50px;
            width: auto;
            max-height: 50px;
            object-fit: contain;
            transition: transform 0.2s ease;
            display: block;
        }

        .logo img:hover {
            transform: scale(1.2);
        }

        .menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .menu a {
            color: #e0f0ff;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 0.5px;
            padding: 8px 0;
            transition: all 0.2s ease;
            position: relative;
        }

        .menu a:hover {
            color: #00d4ff;
        }

        .menu a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #00a8ff;
            transition: width 0.2s ease;
        }

        .menu a:hover::after {
            width: 100%;
        }

        .menu a.active {
            color: #00d4ff;
        }

        .menu a.active::after {
            width: 100%;
            background: #00d4ff;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-greeting {
            color: #e0f0ff;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .user-greeting i {
            font-size: 24px;
            color: #00d4ff;
        }

        .user-greeting span {
            color: #00d4ff;
            font-weight: 700;
        }

        .icon-link {
            color: #e0f0ff;
            text-decoration: none;
            font-size: 18px;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .icon-link i {
            font-size: 20px;
        }

        .icon-link:hover {
            color: #00d4ff;
        }

        .logout-link {
            color: #e0f0ff;
            text-decoration: none;
            font-size: 15px;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-link i {
            font-size: 18px;
        }

        .logout-link:hover {
            color: #00d4ff;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 12px 20px;
                flex-direction: column;
                gap: 10px;
            }
            
            .menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }
            
            body {
                padding-top: 110px;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">
        <img src="<?= base_url('uploads/logo1.png') ?>" alt="Earopia Logo">
    </div>

    <div class="menu">
        <a href="/">
            <i class="fas fa-home"></i> Beranda
        </a>
        <a href="/produk" class="<?= strpos(current_url(), '/produk') !== false ? 'active' : '' ?>">
            <i class="fas fa-headphones"></i> Produk
        </a>
        <a href="/cart" class="<?= strpos(current_url(), '/cart') !== false ? 'active' : '' ?>">
            <i class="fas fa-shopping-cart"></i> Cart
        </a>
        <a href="/transaksi-saya">
            <i class="fas fa-file-invoice"></i> Transaksi Saya
        </a>
        
        <?php if (session()->get('logged_in')): ?>
            <div class="user-info">
                <span class="user-greeting">
                    <i class="fas fa-user-circle"></i> Halo, <span><?= session()->get('username'); ?></span>
                </span>
                <a href="/logout" class="logout-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        <?php else: ?>
            <a href="/login" class="icon-link <?= strpos(current_url(), '/login') !== false ? 'active' : '' ?>">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>