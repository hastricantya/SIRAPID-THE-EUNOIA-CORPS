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
    <title>SIRAPID - Tambah Data Pendaftar Rapid</title>
    <!-- memasukkan eksternal css -->
    <link rel="stylesheet" href="style.css">
    <!-- memasukkan link untuk font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- memanggil class wrapper tambah agar didesain dengan css -->
    <div class="wrapper-tambah">
        <!-- memanggil class wrapper tampil agar didesain dengan css -->
        <div class="wrapper-tampil">
        <!-- memasukkan login.php untuk button kembali dan memanggil class yang ada pada font awesome -->
        <button><a href="halaman_admin.php" class="fa fa-home">Kembali</a></button>
        <!-- membuat kalimat dengan h1 -->
        <h1>Tambah Data Rapid</h1>
        <!-- memanggil daftardatapendaftar.php dengan method post agar berjalan -->
        <form action="daftardatapendaftar.php" method="POST" name="form1">
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
                <label>NIK</label>
            </div>
            <div>
                <!-- membuat inputan berupa text -->
                <input type="text" name="NIK" id="NIK" placeholder="Masukan Nama Anda" required>
            </div>
            <div>
                <!-- membuat label -->
                <label>Tanggal Registrasi</label>
            </div>
            <div>
                <!-- membuat inputan berupa text -->
                <input type="date" name="Tanggal_Registrasi" id="Tanggal_Registrasi" placeholder="Masukan Tanggal Registrasi Anda">
            </div>
            <div>
                <!-- membuat label -->
            <label>Nama Lengkap</label>
                <!-- membuat inputan berupa text -->
                <input type="text" name="Nama_Lengkap" id="Nama_Lengkap" placeholder="Masukan Nama Lengkap Anda">

            </div>
             <div>
                <!-- membuat label -->
			<label >Gender</label>
            </div>
            <div>
                <!-- membuat pilihan dengan radio button dan terdapat label pada setiap pilihan -->
                <input type="radio" name="Gender" value="Pria" checked>
                <label>Pria</label>
				<input type="radio" name="Gender" value="Wanita" checked>
                <label>Wanita</label>
            </div>
			<div>
                <!-- membuat label -->
            <label>Tempat Lahir</label>
                <!-- membuat inputan berupa text -->
                <input type="text" name="Tempat_Lahir" id="Tempat_Lahir" placeholder="Masukan Tempat Lahir Anda">

            </div>
			<div>
                <!-- membuat label -->
            <label>Tanggal Lahir</label>
                <!-- membuat inputan berupa date -->
                <input type="date" name="Tanggal_Lahir" id="Tanggal_Lahir" placeholder="Masukan Tanggal Lahir Anda">

            </div>
			<div>
                <!-- membuat label -->
            <label>Alamat</label>
                <!-- membuat inputan berupa text -->
                <input type="text" name="Alamat" id="Alamat" placeholder="Masukan Alamat Lengkap Anda">

            </div>
            <div>
                <!-- membuat label -->
                <label>Hasil Rapid</label>
            </div>
            <div>
                <!-- membuat pilihan dengan radio button dan terdapat label pada setiap pilihan -->
                <input type="radio" name="Hasil_Rapid" value="Reaktif" checked>
                <label>Reaktif</label>
                <input type="radio" name="Hasil_Rapid" value="Non-Reaktif" checked>
                <label>Non-Reaktif</label>
            </div>
			<div>
                <!-- membuat label -->
            <label>Nama Pengguna</label>
                <!-- membuat inputan berupa text -->
                <input type="text" name="Username" id="Username" placeholder="Masukkan Nama Pengguna">
            </div>
			<div>
                <!-- membuat button submit untuk daftar data pendaftar -->
                <button type="submit" name="submit" class="daftar">Daftar</button>
            </div>
        </form>
       
        <?php
    // Mengecek apakah form berhasil ditambah dan memasukkan data ke database.
    if(isset($_POST['submit'])) {
        $Id_Pendaftaran = $_POST['Id_Pendaftaran'];
        $NIK = $_POST['NIK'];
        $Tanggal_Registrasi = $_POST['Tanggal_Registrasi'];
        $Nama_Lengkap = $_POST['Nama_Lengkap'];
        $Gender = $_POST['Gender'];
		$Tempat_Lahir = $_POST['Tempat_Lahir'];
        $Tanggal_Lahir = $_POST['Tanggal_Lahir'];
        $Alamat = $_POST['Alamat'];
        $Hasil_Rapid = $_POST['Hasil_Rapid'];
		$Username = $_POST['Username'];
		
        // memasukkan data pendaftar pasien ke database
        $query = "INSERT INTO tb_data_pendaftar SET Id_Pendaftaran='$Id_Pendaftaran', NIK='$NIK', Tanggal_Registrasi='$Tanggal_Registrasi', Nama_Lengkap='$Nama_Lengkap', 
		Gender='$Gender', Tempat_Lahir='$Tempat_Lahir', Tanggal_Lahir='$Tanggal_Lahir', Alamat='$Alamat', Hasil_Rapid='$Hasil_Rapid', Username='$Username'";
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