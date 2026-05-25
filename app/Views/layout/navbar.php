<!DOCTYPE html>
<html>
<head>
    <title>Earopia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <?php
    $cartModel = new \App\Models\CartModel();

    $totalCart = 0;

    if (session()->get('id_user')) {
        $result = $cartModel
            ->selectSum('qty')
            ->where('id_user', session()->get('id_user'))
            ->first();

        $totalCart = $result['qty'] ?? 0;
    }

    $currentUrl = current_url();
    $baseUrl = base_url();
    ?>

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
            object-fit: contain;
        }

        .menu {
            display: flex;
            gap: 30px;
            align-items: center;
            flex-wrap: wrap;
        }

        .menu a {
            color: #e0f0ff;
            text-decoration: none;
            font-size: 15px;
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
            padding-bottom: 4px;
        }

        .menu a:hover {
            color: #00d4ff;
        }

        .menu a.active {
            color: #00d4ff;
        }

        .menu a.active::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 100%;
            height: 2px;
            background: #00d4ff;
            border-radius: 2px;
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -14px;
            background: #ff4444;
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 50%;
            font-weight: bold;
            min-width: 18px;
            text-align: center;
            animation: pop 0.3s ease;
        }

        @keyframes pop {
            0% { transform: scale(0.5); }
            100% { transform: scale(1); }
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-left: 20px;
            padding-left: 20px;
            border-left: 1px solid rgba(0, 168, 255, 0.3);
        }

        .user-info span {
            color: #e0f0ff;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .user-info span i {
            font-size: 18px;
            color: #00d4ff;
        }

        .logout-link {
            color: #e0f0ff;
            text-decoration: none;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: color 0.2s ease;
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
                gap: 20px;
                justify-content: center;
            }
            
            .user-info {
                margin-left: 0;
                padding-left: 0;
                border-left: none;
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
        <a href="/" class="<?= $currentUrl == $baseUrl . '/' || $currentUrl == $baseUrl . '/' ? 'active' : '' ?>">
            <i class="fas fa-home"></i> Beranda
        </a>

        <a href="/produk" class="<?= strpos($currentUrl, '/produk') !== false ? 'active' : '' ?>">
            <i class="fas fa-headphones"></i> Produk
        </a>

        <a href="/cart" style="position:relative;" class="<?= strpos($currentUrl, '/cart') !== false ? 'active' : '' ?>">
            <i class="fas fa-shopping-cart"></i> Cart
            <?php if ($totalCart > 0): ?>
                <span class="cart-badge"><?= $totalCart; ?></span>
            <?php endif; ?>
        </a>

        <a href="/transaksi-saya" class="<?= strpos($currentUrl, '/transaksi-saya') !== false || strpos($currentUrl, '/invoice') !== false ? 'active' : '' ?>">
            <i class="fas fa-file-invoice"></i> Transaksi Saya
        </a>

        <?php if (session()->get('logged_in')): ?>
            <div class="user-info">
                <span>
                    <i class="fas fa-user-circle"></i> <?= session()->get('username'); ?>
                </span>
                <a href="/logout" class="logout-link">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        <?php else: ?>
            <a href="/login" class="<?= strpos($currentUrl, '/login') !== false || strpos($currentUrl, '/register') !== false ? 'active' : '' ?>">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>