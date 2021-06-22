<!-- merequire koneksi.php agar terkoneksi database -->
<?php
require "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- membuat meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- memberi judul pada jendela browser -->
    <title>SIRAPID - Tambah Data Akun Rapid</title>
    <!-- memasukkan eksternal css -->
    <link rel="stylesheet" href="style.css">
    <!-- memasukkan link untuk font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- memanggil class wrapper tambah agar dapat didesain dengan css -->
    <div class="wrapper-tambah">
        <!-- memanggil class wrapper tampil agar didesain dengan css -->
        <div class="wrapper-tampil"><button>
        <!-- memasukkan login.php untuk button kembali dan memanggil class yang ada pada font awesome -->
        <a href="login.php" class="fa fa-home">Kembali</a></button>
        <!-- membuat kalimat dengan h1 -->
        <h1>Daftar Akun Pasien Rapid Test</h1>
        <!-- memanggil daftarakun.php dengan method post agar berjalan -->
        <form action="daftarakun.php" method="POST" name="form1">
            <div>
                <!-- membuat label -->
                <label>Id Pendaftaran</label>
            </div>
            <div>
                <!-- membuat inputan berupa text -->
                <input type="text" name="Id_Pendaftaran" id="Id_Pendaftaran" placeholder="Masukan Id Anda" required>
            </div>
            <div>
                <!-- membuat label -->
                <label>Nama</label>
            </div>
            <div>
                <!-- membuat inputan berupa text -->
                <input type="text" name="Nama" id="Nama" placeholder="Masukan Nama Anda" required>
            </div>
            <div>
                <!-- membuat label -->
                <label>Nama Pengguna</label>
            </div>
            <div>
                <!-- membuat inputan berupa text -->
                <input type="text" name="Username" id="username" placeholder="Masukan Nama Pengguna Anda">
            </div>
            <div>
                <!-- membuat label -->
            <label>Kata Kunci</label>
                 <!-- membuat inputan berupa text -->
                <input type="text" name="Password" id="Password" placeholder="Masukan Kata Kunci Anda">

            </div>
             <div>
                <!-- membuat label -->
                <label >Level</label>
            </div>
            <div>
                <!-- membuat inputan berupa radio -->
                <input type="radio" name="Level" value="pasien" checked>
                <!-- membuat label -->
                <label>Pasien</label>
            </div> 
            <div>
                <!-- membuat button submit untuk daftar akun -->
                <button type="submit" name="submit" class="daftar">Daftar</button>
            </div>
        </form>
       
    <!-- membuat aksi backend php -->
    <?php
    // Mengecek apakah form berhasil ditambah dan memasukkan data ke database.
    if(isset($_POST['submit'])) {
        $Id_Pendaftaran = $_POST['Id_Pendaftaran'];
        $Nama = $_POST['Nama'];
        $Username= $_POST['Username'];
        $Password = $_POST['Password'];
        $Level= $_POST['Level'];
        // memasukkan data akun baru ke database
        $query = "INSERT INTO tb_akun SET Id_Pendaftaran='$Id_Pendaftaran', Nama='$Nama', Username='$Username', Password='$Password', Level='$Level'";
        // memanggil variabel koneksi dan query untuk menampilkan notifikasi berhasil atau gagal
        mysqli_query($koneksi, $query);
         if (mysqli_error($koneksi)) {
                echo "<script>alert('Data gagal di simpan!');</script>";
              }else {
                echo "<script>alert('Data berhasil di simpan!');location.replace('login.php');</script>";
              }
      } 
    ?>
    </div>
</body>
<center><h4>Copyright 2021 The Eunoia Corps (Hastri & Tiara)</h4></center>
</html>