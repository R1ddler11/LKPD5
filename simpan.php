<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kelas   = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);

    $query = "INSERT INTO siswa (nama, kelas, jurusan) VALUES ('$nama','$kelas','$jurusan')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: tab.php"); // balik ke halaman utama setelah simpan
        exit;
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
