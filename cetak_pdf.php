<?php
require_once __DIR__ . '/vendor/autoload.php';
include "koneksi.php";

$mpdf = new \Mpdf\Mpdf();
$html = "<h3>Data Siswa</h3><table border='1' cellpadding='10'><tr>
<th>No</th><th>Nama</th><th>Kelas</th><th>Jurusan</th></tr>";

$no=1;
$data = mysqli_query($koneksi,"SELECT * FROM siswa");
while($d=mysqli_fetch_array($data)){
  $html .= "<tr>
              <td>".$no++."</td>
              <td>".$d['nama']."</td>
              <td>".$d['kelas']."</td>
              <td>".$d['jurusan']."</td>
            </tr>";
}
$html .= "</table>";

$mpdf->WriteHTML($html);
$mpdf->Output("data-siswa.pdf","D");
?>