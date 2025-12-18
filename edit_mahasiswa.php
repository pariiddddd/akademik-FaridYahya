<?php
include "koneksi_akademik.php";
if (!isset($_GET['nim'])) { header("Location: index.php"); exit(); }
$nim = $_GET['nim'];

$stmt = $db->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
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
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">SIAKAD</a>
  </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Edit Data Mahasiswa</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="update_mahasiswa.php"> 
                        
                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" class="form-control bg-light" name="nim" value="<?= $data['nim']; ?>" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_mahasiswa" value="<?= htmlspecialchars($data['nama_mahasiswa']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Program Studi</label>
                            <select class="form-select" name="prodi_id" required>
                                <option value="" disabled>-- Pilih Prodi --</option>
                                <?php
                                $res = $db->query("SELECT * FROM prodi ORDER BY nama_prodi ASC");
                                while($p = $res->fetch_assoc()) {
                                    // Logika memilih prodi yang sudah tersimpan
                                    $selected = ($data['prodi_id'] == $p['id']) ? "selected" : "";
                                    echo "<option value='".$p['id']."' $selected>".$p['jenjang']." - ".$p['nama_prodi']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" rows="3" required><?= htmlspecialchars($data['alamat']); ?></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary" name="update">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>