<?php
// memanggil file koneksi.php agar file report terkoneksi dengan database
include('koneksi.php');
// memasukkan dompdf/autoload.inc.php untuk menjalankan perintah
require_once("dompdf/autoload.inc.php");
// menggunakan namespace dompdf
use Dompdf\Dompdf;
// membuat object dompdf dengan class dompdf
$dompdf = new Dompdf();
// menuliskan perintah query untuk mendapatkan data di tabel tb_data_pendaftar dan hasilnya disimpan kedalam variabel $query
$query = mysqli_query($koneksi,"select * from tb_data_pendaftar");
// membuat variabel html yang berisi kode html untuk membuat judul tabel dan header tabel untuk diconvert ke bentuk pdf
$html = '<center><h4>Daftar Nama Pasien Rapid Test Covid-19 Bandara Halim Perdana Kusuma</h4></center><hr/><br/><br/><br/>';
$html .= '<table border="1" width="100%">
 <tr>
 <th>No</th>
 <th>Id Pendaftaran</th>
 <th>NIK</th>
 <th>Tanggal Registrasi</th>
 <th>Nama Lengkap</th>
 <th>Gender</th>
 <th>Tempat Lahir</th>
 <th>Tanggal Lahir</th>
 <th>Alamat</th>
 <th>Hasil Rapid</th>
 <th>Nama Pengguna</th>
 </tr>';
 // Untuk memberi nomor urut tiap data yang akan ditampilkan
$no = 1;
// extract variabel $query yang akan disimpan di variabel row dan data akan digabung di variabel html dengan mysqli_fetch_array
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['Id_Pendaftaran']."</td>
 <td>".$row['NIK']."</td>
 <td>".$row['Tanggal_Registrasi']."</td>
 <td>".$row['Nama_Lengkap']."</td>
 <td>".$row['Gender']."</td>
 <td>".$row['Tempat_Lahir']."</td>
 <td>".$row['Tanggal_Lahir']."</td>
 <td>".$row['Alamat']."</td>
 <td>".$row['Hasil_Rapid']."</td>
 <td>".$row['Username']."</td>
 </tr>";
 $no++;
}
// memberi tutup html dengan string variabel html
$html .= "</html>";
// konversi kode html pada variabel html menjadi bentuk pdf
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A3', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Data_Pendaftar_Rapid-Test_Covid-19.pdf');
?>