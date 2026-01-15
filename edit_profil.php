<?php
session_start();
include "koneksi_akademik.php";

if ($_SESSION['status'] != "login") {
    header("Location: login.php?pesan=Belum Login");
    exit();
}

// Ambil data user yang sedang login
$id = $_SESSION['id_user'];
$stmt = $db->prepare("SELECT * FROM pengguna WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="index.php">SIAKAD</a>
    <div class="d-flex">
        <span class="navbar-text text-white me-3">Halo, <?= $_SESSION['nama']; ?></span>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
  </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Edit Profil Pengguna</h5>
                </div>
                <div class="card-body">
                    <?php if(isset($_GET['pesan'])): ?>
                        <div class="alert alert-success"><?= $_GET['pesan']; ?></div>
                    <?php endif; ?>

                    <form action="update_profil.php" method="POST">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">

                        <div class="mb-3">
                            <label>Email (Tidak dapat diubah)</label>
                            <input type="email" class="form-control bg-light" value="<?= $data['email']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" value="<?= $data['nama_lengkap']; ?>" required>
                        </div>

                        <hr>
                        <p class="text-muted small">Kosongkan password jika tidak ingin menggantinya.</p>

                        <div class="mb-3">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" name="password_baru">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Kembali ke Dashboard</a>
                            <button type="submit" class="btn btn-primary" name="update_profil">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>