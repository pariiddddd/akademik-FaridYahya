<?php
include "koneksi_akademik.php";
if (!isset($_GET['nim'])) { header("Location: index.php"); exit(); }
$nim = $_GET['nim'];

$stmt = $db->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
// PERBAIKAN: Ubah "i" menjadi "s"
$stmt->bind_param("s", $nim);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
if (!$data) { echo "Data tidak ditemukan!"; exit(); }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { background-color: #f0f4f8; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .form-label { font-weight: 600; color: #546e7a; }
        .input-group-text { background-color: #fff3e0; color: #ff9800; border: 1px solid #ced4da; } 
        .form-control:focus { border-color: #ffb74d; box-shadow: 0 0 0 0.25rem rgba(255, 183, 77, 0.25); }
        .btn-warning-custom { background-color: #ffb74d; color: white; border: none; }
        .btn-warning-custom:hover { background-color: #ffa726; color: white; }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold" style="color: #ff9800;"><i class="bi bi-pencil-square"></i> Edit Data</h3>
                    <p class="text-muted">Perbarui data mahasiswa</p>
                </div>

                <form method="POST" action="update_mahasiswa.php"> 
                    
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control bg-light text-secondary" name="nim" value="<?= $data['nim']; ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama_mahasiswa" value="<?= htmlspecialchars($data['nama_mahasiswa']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3" required><?= htmlspecialchars($data['alamat']); ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-light text-secondary fw-bold"><i class="bi bi-arrow-left"></i> Batal</a>
                        <button type="submit" class="btn btn-warning-custom px-4 fw-bold shadow-sm" name="update"><i class="bi bi-check-lg"></i> Update Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>