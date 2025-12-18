<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">SIAKAD</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Data Mahasiswa</a></li>
        <li class="nav-item"><a class="nav-link active" href="view_prodi.php">Data Program Studi</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
    <?php if (isset($_GET['pesan'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Pesan: <strong><?= $_GET['pesan']; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Program Studi</h5>
            <a href="create_prodi.php" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Tambah Prodi
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3">No</th>
                            <th>Nama Prodi</th>
                            <th>Jenjang</th>
                            <th>Keterangan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include "koneksi_akademik.php";
                        $no = 1;
                        $sql = "SELECT * FROM prodi ORDER BY jenjang ASC";
                        $tampil = $db->query($sql);
                        while ($data = $tampil->fetch_assoc()) :
                    ?>
                        <tr>
                            <td class="ps-3"><?= $no++; ?></td>
                            <td><?= htmlspecialchars($data['nama_prodi']); ?></td>
                            <td><span class="badge bg-secondary"><?= $data['jenjang']; ?></span></td>
                            <td><?= htmlspecialchars($data['keterangan']); ?></td>
                            <td class="text-center">
                                <a href="edit_prodi.php?id=<?= $data['id']; ?>" class="btn btn-warning btn-sm text-white"><i class="bi bi-pencil-fill"></i></a>
                                <a href="delete_prodi.php?id=<?= $data['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus prodi ini?');"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>