<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {

            background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card-login {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .card-header-custom {
            background: #fff;
            color: #0d6efd;
            border-bottom: none;
            padding-top: 30px;
            padding-bottom: 10px;
            text-align: center;
        }
        .icon-logo {
            font-size: 50px;
            margin-bottom: 10px;
        }
        .btn-custom {
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: bold;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card card-login">
                
                <div class="card-header card-header-custom">
                    <div class="icon-logo">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <h4 class="fw-bold">SIAKAD</h4>
                    <p class="text-muted small mb-0">Silakan login untuk melanjutkan</p>
                </div>

                <div class="card-body p-4">
                    
                    <?php if(isset($_GET['pesan'])): ?>
                        <div class="alert alert-danger text-center py-2" role="alert">
                            <small><i class="bi bi-exclamation-circle me-1"></i> <?= htmlspecialchars($_GET['pesan']); ?></small>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(isset($_GET['sukses'])): ?>
                        <div class="alert alert-success text-center py-2" role="alert">
                            <small><i class="bi bi-check-circle me-1"></i> <?= htmlspecialchars($_GET['sukses']); ?></small>
                        </div>
                    <?php endif; ?>

                    <form action="proses_login.php" method="POST">
                        
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                            <label for="email">Alamat Email</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Kata Sandi</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="login" class="btn btn-primary btn-custom">
                                MASUK <i class="bi bi-arrow-right-short"></i>
                            </button>
                        </div>

                        <div class="mt-4 text-center">
                            <small class="text-muted">Belum punya akun?</small><br>
                            <a href="register.php" class="text-decoration-none fw-semibold">Daftar Sekarang</a>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="text-center mt-3 text-white opacity-75">
                <small>&copy; 2026 Sistem Akademik Kampus</small>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>