<!DOCTYPE html>
<html>
<head>
    <title>Register - Earopia</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a1928 0%, #0c2a3b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-container {
            max-width: 420px;
            width: 90%;
            margin: 20px auto;
        }

        .register-card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border-top: 4px solid #5e17eb;
        }

        .logo-area {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-area img {
            height: 60px;
            width: auto;
            margin-bottom: 15px;
        }

        .logo-area h2 {
            color: #0a2a3a;
            font-size: 24px;
            font-weight: 700;
        }

        .logo-area h2 span {
            color: #5e17eb;
        }

        .logo-area p {
            color: #6a8a9a;
            font-size: 14px;
            margin-top: 5px;
        }

        .alert-error {
            background: #fee2e2;
            color: #dc2626;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 3px solid #dc2626;
        }

        .alert-success {
            background: #d1fae5;
            color: #059669;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 3px solid #059669;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #0a2a3a;
            font-weight: 600;
            font-size: 14px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e0eef5;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.2s;
            outline: none;
            font-family: inherit;
        }

        .input-group input:focus {
            border-color: #5e17eb;
            box-shadow: 0 0 0 3px rgba(0, 168, 255, 0.1);
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #5e17eb 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 10px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 168, 255, 0.3);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #6a8a9a;
            font-size: 14px;
        }

        .login-link a {
            color: #5e17eb;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .register-card {
                padding: 30px 20px;
            }
            
            .logo-area h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<div class="register-container">
    <div class="register-card">
        <div class="logo-area">
            <img src="<?= base_url('uploads/logo1.png'); ?>" alt="Earopia Logo">
            <h2>Daftar <span>Earopia</span></h2>
            <p>Buat akun baru Anda</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert-error">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="/register">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username" required>
            </div>
            
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required>
            </div>
            
            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
            
            <button type="submit" class="btn-register">
                Register
            </button>

            <div class="login-link">
                Sudah punya akun? <a href="/login">Login Sekarang</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>