<?php

include 'koneksi.php';
 
 // Handle Update (Edit)
if (isset($_POST['update'])) {
  $id      = intval($_POST['id']);
  $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
  $kelas   = mysqli_real_escape_string($koneksi, $_POST['kelas']);
  $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);
  mysqli_query($koneksi, "UPDATE siswa SET nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE id=$id");
  header("Location: index.php");
  exit;
}
?>