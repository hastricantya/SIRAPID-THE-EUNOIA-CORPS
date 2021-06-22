<!-- merequire koneksi.php agar terkoneksi database -->
<?php
  require "koneksi.php";
  // membuat proses backend edit berdasar id pendaftaran
  if (isset($_GET['Id_Pendaftaran'])) {
     // memanggil id pendaftaran
    $Id_Pendaftaran = $_GET['Id_Pendaftaran'];
     // memanggil data dengan query dari tb_data_pendaftar berdasarkan id pendaftaran dan menghapusnya
    $sql = "DELETE FROM tb_data_pendaftar WHERE Id_Pendaftaran = '$Id_Pendaftaran'";
     // memanggil variabel koneksi dan query untuk menampilkan notifikasi berhasil atau gagal
    mysqli_query($koneksi, $sql);
    if (mysqli_error($koneksi)) {
      echo "<script>alert('Data gagal di hapus!');</script>";
    }else {
      echo "<script>alert('Data berhasil di hapus!');location.replace('halaman_admin.php');</script>";
    }
  }
?>