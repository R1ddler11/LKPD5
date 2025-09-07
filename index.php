<?php 
include "koneksi.php";

// Handle Hapus
if (isset($_GET['hapus'])) {
  $id = intval($_GET['hapus']);
  mysqli_query($koneksi, "DELETE FROM siswa WHERE id=$id");
  header("Location: index.php");
  exit;
}



$total_siswa = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM siswa"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Manajemen Data Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
    .main-container { background: rgba(255,255,255,0.95); border-radius: 15px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
    .header-section { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); border-radius: 15px 15px 0 0; color: white; padding: 2rem; margin: -1rem -1rem 2rem -1rem; }
    .table thead { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color:white; }
    .btn-custom { border-radius: 25px; padding: 8px 20px; font-weight: 600; }
  </style>
</head>
<body>
<div class="container mt-4">
  <div class="main-container p-4">

    <!-- Header -->
    <div class="header-section mb-4">
      <h1><i class="fas fa-graduation-cap me-2"></i> Sistem Manajemen Data Siswa</h1>
      <p class="mb-0">Kelola data siswa dengan mudah dan efisien</p>
    </div>

    <!-- Stats -->
    <div class="alert alert-info text-center">
      <h4>Total Siswa Terdaftar: <strong><?php echo $total_siswa; ?></strong></h4>
    </div>

    <!-- Form Tambah -->
    <form method="POST" action="simpan.php" class="row g-3 mb-4">
      <div class="col-md-4">
        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
      </div>
      <div class="col-md-4">
        <input type="text" name="kelas" class="form-control" placeholder="Kelas" required>
      </div>
      <div class="col-md-4">
        <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" required>
      </div>
      <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary btn-custom"><i class="fas fa-save"></i> Simpan Data</button>
      </div>
    </form>
    <div class="d-flex justify-content-between align-items-center mb-3">
  <h4><i class="fas fa-list me-2 text-primary"></i> Daftar Siswa</h4>
  <a href="cetak_pdf.php" class="btn btn-danger btn-custom">
    <i class="fas fa-file-pdf me-2"></i> Export PDF
  </a>
</div>

    <!-- Data Table -->
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th>No</th><th>Nama</th><th>Kelas</th><th>Jurusan</th><th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        $data = mysqli_query($koneksi,"SELECT * FROM siswa ORDER BY id DESC");
        while($d = mysqli_fetch_array($data)) {
          echo "<tr>
                  <td>$no</td>
                  <td>$d[nama]</td>
                  <td>$d[kelas]</td>
                  <td>$d[jurusan]</td>
                  <td>
                    <button class='btn btn-sm btn-warning' data-bs-toggle='modal' data-bs-target='#editModal$d[id]'>
                      <i class='fas fa-edit'></i>
                    </button>
                    <a href='?hapus=$d[id]' class='btn btn-sm btn-danger' onclick='return confirm(\"Hapus data ini?\")'>
                      <i class='fas fa-trash-alt'></i>
                    </a>
                  </td>
                </tr>";

          // Modal Edit
          echo "
          <div class='modal fade' id='editModal$d[id]' tabindex='-1'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header bg-warning'>
                  <h5 class='modal-title'><i class='fas fa-edit me-2'></i>Edit Data</h5>
                  <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                </div>
                <form method='POST' action='edit.php'>
                  <div class='modal-body'>
                    <input type='hidden' name='id' value='$d[id]'>
                    <div class='mb-3'>
                      <label>Nama</label>
                      <input type='text' name='nama' class='form-control' value='$d[nama]' required>
                    </div>
                    <div class='mb-3'>
                      <label>Kelas</label>
                      <input type='text' name='kelas' class='form-control' value='$d[kelas]' required>
                    </div>
                    <div class='mb-3'>
                      <label>Jurusan</label>
                      <input type='text' name='jurusan' class='form-control' value='$d[jurusan]' required>
                    </div>
                  </div>
                  <div class='modal-footer'>
                    <button type='submit' name='update' class='btn btn-success'>Simpan Perubahan</button>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Batal</button>
                  </div>
                </form>
              </div>
            </div>
          </div>";
          $no++;
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
