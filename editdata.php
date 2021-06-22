<!-- meinclude koneksi.php agar terkoneksi database -->
<?php
  include "koneksi.php";
  // membuat proses backend edit berdasar id pendaftaran
  if (!isset($_GET['Id_Pendaftaran'])) {
    header("location: login.php");
  }
  // memanggil id pendaftaran
  $Id_Pendaftaran = $_GET['Id_Pendaftaran'];
  // memanggil data dengan query dari tb_data_pendaftar berdasarkan id pendaftaran
  $sql = "SELECT * FROM tb_data_pendaftar WHERE Id_Pendaftaran='$Id_Pendaftaran'";
  // memanggil hasil query
  $result = mysqli_query($koneksi, $sql);
  $data_pendaftar = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- membuat meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- memberi judul pada jendela browser -->
    <title>SIRAPID - Edit Data</title>
    <!-- memasukkan eksternal css -->
    <link rel="stylesheet" href="style.css">
     <!-- memasukkan link untuk font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    
        
    <!-- memanggil class wrapper tambah agar didesain dengan css -->
    <div class="wrapper-tambah">
        <div class="wrapper-tampil">
        <!-- memasukkan login.php untuk button kembali dan memanggil class yang ada pada font awesome -->
        <button><a href="halaman_admin.php" class="fa fa-home">Kembali</a></button>
         <!-- membuat kalimat dengan h1 -->
        <h1>Edit Data Pendaftar</h1>
        <form action="" method="POST">
            <div>
                <!-- membuat label -->
                <label for="Id_Pendaftaran">Id Pendaftaran</label>
            </div>
            <div>
                 <!-- membuat inputan berupa text -->
                <input type="text" name="Id_Pendaftaran" id="Id_Pendaftaran" placeholder="Masukan Id Pendaftaran" value="<?= $data_pendaftar['Id_Pendaftaran'] ?>" disabled>
            </div>
            <div>
                <!-- membuat label -->
                <label for="NIK">NIK</label>
            </div>
            <div>
                 <!-- membuat inputan berupa text -->
                <input type="text" name="NIK" id="NIK" placeholder="Masukan NIK" value="<?= $data_pendaftar['NIK'] ?>" required>
            </div>
            <div>
                <!-- membuat label -->
                <label>Tanggal Registrasi</label>
            </div>
             <div>
                 <!-- membuat inputan berupa date -->
                <input type="date" name="Tanggal_Registrasi" id="Tanggal_Registrasi" value="<?= $data_pendaftar['Tanggal_Registrasi'] ?>" required>
            </div>
            <div>
                <!-- membuat label -->
                <label for="Nama_Lengkap">Nama Lengkap</label>
            </div>
            <div>
                 <!-- membuat inputan berupa text -->
                <input type="text" name="Nama_Lengkap" id="Nama_Lengkap" placeholder="Masukan Nama Lengkap" value="<?= $data_pendaftar['Nama_Lengkap'] ?>" required>
            </div>
            <div>
                <!-- membuat label -->
                <label for="Gender">Gender</label>
            </div>
            <div>
                <!-- membuat pilihan dengan radio button dan terdapat label pada setiap pilihan -->
                <input type="radio" name="Gender" value="Pria" <?php if ($data_pendaftar['Gender'] ==  "Pria"): ?>
                  checked
                <?php endif; ?>>
                <label>Pria</label>
                <input type="radio" name="Gender" value="Wanita" <?php if ($data_pendaftar['Gender'] ==  "Wanita"): ?>
                  checked
                <?php endif; ?>>
                <label>Wanita</label>
            </div>
            <div>
                <!-- membuat label -->
                <label for="Tempat_Lahir">Tempat Lahir</label>
            </div>
            <div>
                <!-- membuat inputan berupa text -->
                <input type="text" name="Tempat_Lahir" id="Tempat_Lahir" placeholder="Masukan Tempat Lahir" value="<?= $data_pendaftar['Tempat_Lahir'] ?>" required>
            </div>
            <div>
                <!-- membuat label -->
                <label>Tanggal Lahir</label>
            </div>
             <div>
                <!-- membuat inputan berupa date -->
                <input type="date" name="Tanggal_Lahir" id="Tanggal_Lahir" value="<?= $data_pendaftar['Tanggal_Lahir'] ?>" required>
            </div>
            <div>
                <!-- membuat label -->
                <label for="Alamat">Alamat</label>
            </div>
            <div>
                <!-- membuat inputan berupa text -->
                <input type="text" name="Alamat" id="Alamat" placeholder="Masukan Alamat Anda" value="<?= $data_pendaftar['Alamat'] ?>">
            </div>
            <div>
                <!-- membuat label -->
                <label for="Hasil_Rapid">Hasil Rapid</label>
            </div>
            <div>
                <!-- membuat pilihan dengan radio button dan terdapat label pada setiap pilihan -->
                <input type="radio" name="Hasil_Rapid" value="Reaktif" <?php if ($data_pendaftar['Hasil_Rapid'] ==  "Reaktif"): ?>
                  checked
                <?php endif; ?>>
                <label>Reaktif</label>
                <input type="radio" name="Hasil_Rapid" value="Non-Reaktif" <?php if ($data_pendaftar['Hasil_Rapid'] ==  "Non-Reaktif"): ?>
                  checked
                <?php endif; ?>>
                <label>Non-Reaktif</label>
            </div>
            <div>
                <!-- membuat label -->
                <label for="Username">Username</label>
            </div>
            <div>
                <!-- membuat inputan berupa text -->
                <input type="text" name="Username" id="Username" placeholder="Masukan Username" value="<?= $data_pendaftar['Username'] ?>">
            </div>
                <!-- membuat button submit untuk menyimpan perubahan -->
                <button type="submit" name="simpan" class="simpan">Simpan</button>
            </div>
        </form>

        <!-- Mengecek apakah form berhasil ditambah dan memasukkan data ke database. -->
        <?php
          if (isset($_POST['simpan'])) {
            $NIK = $_POST['NIK'];
            $Tanggal_Registrasi = $_POST['Tanggal_Registrasi'];
            $Nama_Lengkap = $_POST['Nama_Lengkap'];
            $Gender = $_POST['Gender'];
            $Tempat_Lahir = $_POST['Tempat_Lahir'];
            $Tanggal_Lahir = $_POST['Tanggal_Lahir'];
            $Alamat = $_POST['Alamat'];
            $Hasil_Rapid = $_POST['Hasil_Rapid'];
            $Username = $_POST['Username'];

            // melakukan perubahan data pendaftar pasien ke database
              $sql = "UPDATE tb_data_pendaftar SET Id_Pendaftaran='$Id_Pendaftaran', NIK='$NIK', Tanggal_Registrasi='$Tanggal_Registrasi', Nama_Lengkap='$Nama_Lengkap', Gender='$Gender', Tempat_Lahir = '$Tempat_Lahir', Tanggal_Lahir =  '$Tanggal_Lahir', Alamat = '$Alamat', Hasil_Rapid = '$Hasil_Rapid', Username = '$Username' WHERE Id_Pendaftaran='$Id_Pendaftaran'";
              // memanggil variabel koneksi dan query untuk menampilkan notifikasi berhasil atau gagal
              mysqli_query($koneksi, $sql);
              if (mysqli_error($koneksi)) {
                echo "<script>alert('Data gagal di simpan!');</script>";
              }else {
                echo "<script>alert('Data berhasil di simpan!');location.replace('halaman_admin.php');</script>";
              }
            }
        ?>
    </div>
    </div>
</body>
<center><h4>Copyright 2021 The Eunoia Corps (Hastri & Tiara)</h4></center>
</html>
