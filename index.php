<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>CRUD Bootstrap + PDF</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3 class="mb-3">Form Input Siswa</h3>
<form method="POST" action="simpan.php" class="row g-3">
  <div class="col-md-4">
    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
  </div>
  <div class="col-md-4">
    <input type="text" name="kelas" class="form-control" placeholder="Kelas" required>
  </div>
  <div class="col-md-4">
    <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Simpan</button>
  </div>
</form>

<hr>
<h3 class="mb-3">Data Siswa</h3>
<table class="table table-bordered">
  <tr>
    <th>No</th><th>Nama</th><th>Kelas</th><th>Jurusan</th>
  </tr>
  <?php 
  $no=1; $data=mysqli_query($koneksi,"SELECT * FROM siswa");
  while($d=mysqli_fetch_array($data)){
    echo "<tr>
            <td>$no</td>
            <td>$d[nama]</td>
            <td>$d[kelas]</td>
            <td>$d[jurusan]</td>
          </tr>";
    $no++;
  }
  ?>
</table>

<a href="cetak_pdf.php" class="btn btn-danger">Export ke PDF</a>

</body>
</html>
