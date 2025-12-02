<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body { background-color: #f0f4f8; }
        .card { border: none; border-radius: 15px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
        .form-label { font-weight: 600; color: #546e7a; }
        .input-group-text { background-color: #e0f2f1; color: #009688; border: 1px solid #ced4da; }
        .form-control:focus { border-color: #20c997; box-shadow: 0 0 0 0.25rem rgba(32, 201, 151, 0.25); }
        .btn-teal { background-color: #009688; color: white; border: none; }
        .btn-teal:hover { background-color: #00796b; color: white; }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold" style="color: #009688;"><i class="bi bi-person-plus-fill"></i> Input Data</h3>
                    <p class="text-muted">Silakan isi formulir di bawah ini</p>
                </div>
                
                <form method="POST" action="proses_mahasiswa.php"> 
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="Contoh: 10123456" maxlength="10" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_mahasiswa" class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Nama Mahasiswa" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar-event"></i></span>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat lengkap..." required></textarea>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-between">
                        <a href="index.php" class="btn btn-light text-secondary fw-bold">
                             <i class="bi bi-arrow-left"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-teal px-5 fw-bold shadow-sm" name="submit">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>