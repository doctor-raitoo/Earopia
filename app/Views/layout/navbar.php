<!DOCTYPE html>
<html>
<head>
    <title>Earopia</title>
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
    </style>
</head>
<body>

<div class="navbar">
    <div class="logo">
        <img src="<?= base_url('uploads/logo1.png') ?>" alt="Earopia Logo">
    </div>

    <div class="menu">
        <a href="/" class="<?= current_url() == base_url('/') || current_url() == base_url('beranda') ? 'active' : '' ?>">Beranda</a>
        <a href="/produk" class="<?= strpos(current_url(), '/produk') !== false ? 'active' : '' ?>">Produk</a>
        <a href="/cart" class="<?= strpos(current_url(), '/cart') !== false ? 'active' : '' ?>">Cart</a>
            <?php if (session()->get('logged_in')): ?>
                <span style="color:white;">Hi, <?= session()->get('username'); ?></span>
                <a href="/logout">Logout</a>
            <?php else: ?>
                <a href="/login">Login</a>
            <?php endif; ?>
    </div>
</div>

</body>
</html>