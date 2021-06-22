<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Memberi judul pada jendela browser -->
    <title>SIRAPID - Login</title>
    <!-- memasukkan style.css -->
    <link rel="stylesheet" href="style.css">
</head>
<div class="wall"></div>
<body>
	
	<div class="wrapper-tambah">
		<center><h1>SELAMAT DATANG</h1></center>
		<center><h2>Sistem Informasi Registrasi Rapid Test Covid-19 Bandara Halim Perdana Kusuma</h2></center>
	<br/>
	<!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>
	<!-- melakukan aksi ceklogin.php dengan method post -->
	<form action="ceklogin.php" method="POST"> 
	<!-- membuat table sesuai code -->
	<table width="400" align="center" cellpadding="2" cellspacing="2">
		<!-- memasukkan isi dari sel tabel -->
		<tr>
			<td>Nama Pengguna</td>
			<td>:</td>
			<td><input type="text" name="Username" placeholder="Masukkan nama pengguna"></td>
		</tr>
		<tr>
			<td>Kata Kunci</td>
			<td>:</td>
			<td><input type="password" name="Password" placeholder="Masukkan kata kunci"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<!-- membuat button login untuk submit -->
			<td><input type="submit" value="Masuk"></td>
			
		</tr>
	</table>			
	</form>
	<br>
	<!-- membuat class daftarlogin untuk di css pada kalimat -->
	<div class="daftarlogin"><p>Belum Punya Akun?</p>
	<!-- membuat button daftar dengan mengarah ke daftarakun.php -->
    <a href="daftarakun.php"><button type="submit" value="daftar" href="daftarakun.php">Daftar</button></a>
</div>
	</div>
	<center><h4>Copyright 2021 The Eunoia Corps (Hastri & Tiara)</h4></center>
</body>
</html>