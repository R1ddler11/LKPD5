<?php 
include "koneksi.php";
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

mysqli_query($koneksi, "INSERT INTO siswa VALUES('', '$nama', '$kelas', '$jurusan')");
header("location:index.php");
?>