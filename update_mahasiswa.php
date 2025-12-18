<?php
include "koneksi_akademik.php";

if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mahasiswa'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $prodi_id = $_POST['prodi_id']; // Tangkap prodi_id

    // Update query
    $sql = "UPDATE mahasiswa SET nama_mahasiswa=?, tanggal_lahir=?, alamat=?, prodi_id=? WHERE nim=?";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        // urutan: nama(s), tgl(s), alamat(s), prodi_id(i), nim(s)
        $stmt->bind_param("sssis", $nama, $tgl, $alamat, $prodi_id, $nim);
        
        if ($stmt->execute()) {
            header("Location: index.php?pesan=sukses_update");
        } else {
            header("Location: index.php?pesan=gagal");
        }
        $stmt->close();
    } else {
        echo "Error: " . $db->error;
    }
}
$db->close();
?>