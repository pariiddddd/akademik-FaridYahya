<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #0d6efd 0%, #0dcaf0 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0; /* Memberi jarak atas bawah agar tidak kepotong di HP */
        }
        .card-register {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .card-header-custom {
            background: #fff;
            color: #198754; /* Warna hijau untuk register agar beda sedikit dari login */
            border-bottom: none;
            padding-top: 25px;
            padding-bottom: 10px;
            text-align: center;
        }
        .icon-logo {
            font-size: 45px;
            margin-bottom: 5px;
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
        <div class="col-md-6 col-lg-5">
            <div class="card card-register">
                
                <div class="card-header card-header-custom">
                    <div class="icon-logo">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>
                    <h4 class="fw-bold">BUAT AKUN</h4>
                    <p class="text-muted small mb-0">Isi data diri Anda untuk mendaftar</p>
                </div>

                <div class="card-body p-4">
                    
                    <?php if(isset($_GET['pesan'])): ?>
                        <div class="alert alert-warning text-center py-2" role="alert">
                            <small><i class="bi bi-exclamation-triangle me-1"></i> <?= htmlspecialchars($_GET['pesan']); ?></small>
                        </div>
                    <?php endif; ?>

                    <form action="proses_register.php" method="POST">
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama" name="nama_lengkap" placeholder="Nama Lengkap" required>
                            <label for="nama">Nama Lengkap</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                            <label for="email">Alamat Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="konfirmasi" name="konfirmasi_password" placeholder="Ulangi Password" required>
                            <label for="konfirmasi">Konfirmasi Password</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" name="register" class="btn btn-success btn-custom">
                                DAFTAR SEKARANG
                            </button>
                        </div>

                        <div class="mt-4 text-center">
                            <small class="text-muted">Sudah punya akun?</small><br>
                            <a href="login.php" class="text-decoration-none fw-semibold">Login di sini</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>