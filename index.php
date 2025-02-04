<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Laundry Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
    body {
        background: #f0f2f5;
        overflow-x: hidden;
    }

    .login-container {
        min-height: 100vh;
    }

    .left-side {
        background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
        padding: 3rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .left-side::before {
        content: '';
        position: absolute;
        width: 1000px;
        height: 1000px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        top: -40%;
        right: -40%;
    }

    .right-side {
        padding: 3rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-form {
        width: 100%;
        max-width: 400px;
        background: white;
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .form-control {
        background: #f8fafc;
        border: none;
        padding: 0.8rem 1rem;
        border-radius: 10px;
        margin-bottom: 1rem;
    }

    .form-control:focus {
        background: #fff;
        box-shadow: 0 0 0 2px #6366f1;
    }

    .btn-login {
        background: #6366f1;
        border: none;
        padding: 0.8rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-login:hover {
        background: #4f46e5;
        transform: translateY(-2px);
    }

    .brand-logo {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 2rem;
    }

    @media (max-width: 768px) {
        .left-side {
            padding: 2rem;
            min-height: 200px;
        }

        .right-side {
            padding: 2rem;
        }
    }
    </style>
</head>

<body>
    <div class="login-container row g-0">
        <div class="col-md-6 left-side">
            <div class="position-relative">
                <div class="brand-logo">🧺 Laundry Pro</div>
                <h2 class="mb-4">
                    <span id="welcome-text"></span>
                </h2>
                <p class="lead mb-4">Silahkan masuk ke akun anda untuk melanjutkan</p>
            </div>
        </div>

        <div class="col-md-6 right-side">
            <div class="login-form">
                <h4 class="text-center mb-4">Sign In</h4>
                <form method="POST" action="ceklogin.php">
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text border-0 bg-light">
                                <i class="bi bi-person text-muted"></i>
                            </span>
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text border-0 bg-light">
                                <i class="bi bi-lock text-muted"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>

                    <?php if (isset($_GET['msg'])): ?>
                    <div class="alert alert-danger py-2 mb-3"><?= $_GET['msg']; ?></div>
                    <?php endif ?>

                    <button type="submit" class="btn btn-primary w-100 btn-login mb-3">
                        Sign In <i class="bi bi-arrow-right-circle ms-1"></i>
                    </button>

                    <div class="text-center">
                        <span class="text-muted small">Don't have an account?</span>
                        <a href="#" class="text-decoration-none small">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
    let typed = new Typed('#welcome-text', {
        strings: [
            'Selamat Datang!',
            'Wilujeng Sumping!', // Sunda
            'Sugeng Rawuh!', // Jawa
            'Rahajeng Rauh!', // Bali
            'Salamat Datang!', // Batak
            'Tabea Polak!', // Toraja
            'Bak Keuno!', // Aceh
            'Salamaik Datang!', // Minang
            'Sono Siat!' // Manado
        ],
        typeSpeed: 50,
        backSpeed: 30,
        backDelay: 2000,
        loop: true
    });
    </script>
</body>

</html>