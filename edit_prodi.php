<?php
include "koneksi_akademik.php";
if (!isset($_GET['id'])) { header("Location: view_prodi.php"); exit(); }
$id = $_GET['id'];

$stmt = $db->prepare("SELECT * FROM prodi WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$data = $stmt->get_result()->fetch_assoc();
if (!$data) { echo "Data tidak ditemukan!"; exit(); }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="view_prodi.php">SIAKAD</a>
  </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Edit Program Studi</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="update_prodi.php">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                        
                        <div class="mb-3">
                            <label class="form-label">Nama Program Studi</label>
                            <input type="text" class="form-control" name="nama_prodi" value="<?= htmlspecialchars($data['nama_prodi']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenjang</label>
                            <select class="form-select" name="jenjang" required>
                                <option value="D2" <?= ($data['jenjang'] == 'D2') ? 'selected' : '' ?>>D2</option>
                                <option value="D3" <?= ($data['jenjang'] == 'D3') ? 'selected' : '' ?>>D3</option>
                                <option value="D4" <?= ($data['jenjang'] == 'D4') ? 'selected' : '' ?>>D4</option>
                                <option value="S2" <?= ($data['jenjang'] == 'S2') ? 'selected' : '' ?>>S2</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="3"><?= htmlspecialchars($data['keterangan']); ?></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="view_prodi.php" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary" name="update_prodi">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>