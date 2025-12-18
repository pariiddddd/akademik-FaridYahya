<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Input Program Studi</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="proses_prodi.php">
                        <div class="mb-3">
                            <label class="form-label">Nama Program Studi</label>
                            <input type="text" class="form-control" name="nama_prodi" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jenjang</label>
                            <select class="form-select" name="jenjang" required>
                                <option value="D2">D2</option>
                                <option value="D3">D3</option>
                                <option value="D4">D4</option>
                                <option value="S2">S2</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="3"></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="view_prodi.php" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary" name="simpan_prodi">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>