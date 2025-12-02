<?php
include "koneksi_akademik.php";

if (isset($_POST['submit'])) { 
    $nim = $_POST['nim'];
    $nama = $_POST['nama_mahasiswa'];
    $tgl = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (nim, nama_mahasiswa, tanggal_lahir, alamat) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $nim, $nama, $tgl, $alamat);

        if ($stmt->execute()) {
            header("Location: index.php?pesan=sukses_input");
            exit();
        } else {
            echo "Gagal menyimpan data (Cek apakah NIM Duplikat): " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $db->error;
    }
} else {
    header("Location: index.php");
    exit();
}
$db->close();
?>