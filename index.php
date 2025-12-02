<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        .card-header {
            background: linear-gradient(45deg, #009688, #20c997);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 1.5rem;
        }
        .btn-custom-add {
            background-color: #fff;
            color: #009688;
            font-weight: bold;
            border: none;
            transition: all 0.3s;
        }
        .btn-custom-add:hover {
            background-color: #e0f2f1;
            color: #00796b;
            transform: translateY(-2px);
        }
        .table thead {
            background-color: #e0f2f1;
            color: #00695c;
        }
        .btn-action-edit {
            background-color: #ffb74d;
            border: none;
            color: white;
        }
        .btn-action-del {
            background-color: #ef5350;
            border: none;
            color: white;
        }
        .alert-custom {
            border-radius: 10px;
            border: none;
        }
    </style>
</head>
<body>

<div class="container my-5">
    
    <?php
    if (isset($_GET['pesan'])) {
        $pesan = $_GET['pesan'];
        $alertType = "success";
        $icon = "bi-check-circle-fill";
        $text = "";
        
        if ($pesan == "sukses_input") {
            $text = "Data mahasiswa baru berhasil ditambahkan!";
        } elseif ($pesan == "sukses_update") {
            $text = "Data mahasiswa berhasil diperbarui!";
        } elseif ($pesan == "sukses_hapus") {
            $text = "Data mahasiswa berhasil dihapus!";
        } elseif ($pesan == "gagal") {
            $alertType = "danger";
            $icon = "bi-exclamation-triangle-fill";
            $text = "Terjadi kesalahan sistem.";
        }

        if ($text) {
            echo "<div class='alert alert-$alertType alert-custom alert-dismissible fade show shadow-sm' role='alert'>
                    <i class='bi $icon me-2'></i> $text
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        }
    }
    ?>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-mortarboard-fill me-2"></i>Data Mahasiswa</h4>
            <a href="create_mahasiswa.php" class="btn btn-custom-add shadow-sm">
                <i class="bi bi-plus-lg"></i> Tambah Data
            </a>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th class="text-center py-3 rounded-start">No</th>
                            <th class="py-3">NIM</th>
                            <th class="py-3">Nama Mahasiswa</th>
                            <th class="py-3">Tanggal Lahir</th>
                            <th class="py-3">Alamat</th>
                            <th class="text-center py-3 rounded-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include "koneksi_akademik.php";
                        $no = 1;
                        $tampil = $db->query("SELECT * FROM mahasiswa ORDER BY nim ASC");
                        while ($data = $tampil->fetch_assoc()) :
                    ?>
                        <tr>
                            <td class="text-center fw-bold text-secondary"><?= $no++; ?></td>
                            <td><span class="badge bg-light text-dark border"><?= $data['nim']; ?></span></td>
                            <td class="fw-semibold text-dark"><?= htmlspecialchars($data['nama_mahasiswa']); ?></td>
                            <td class="text-muted"><i class="bi bi-calendar3 me-1"></i> <?= $data['tanggal_lahir']; ?></td>
                            <td class="text-muted small"><?= htmlspecialchars($data['alamat']); ?></td>
                            <td class="text-center">
                                <a href="edit_mahasiswa.php?nim=<?= $data['nim']; ?>" class="btn btn-action-edit btn-sm me-1 shadow-sm" title="Edit">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="delete_mahasiswa.php?nim=<?= $data['nim']; ?>" class="btn btn-action-del btn-sm shadow-sm" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            
            <?php if ($tampil->num_rows == 0): ?>
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                    Belum ada data mahasiswa.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>