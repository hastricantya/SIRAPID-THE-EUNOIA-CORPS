<?php
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$Username = $_POST['Username'];
$Password = $_POST['Password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from tb_akun where Username='$Username' and Password='$Password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['Level']=="Admin"){
 
		// buat session login dan username
		$_SESSION['Username'] = $Username;
		$_SESSION['Level'] = "Admin";
		// alihkan ke halaman dashboard admin
		header("location:halaman_admin.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['Level']=="pasien"){
		// buat session login dan username
		$_SESSION['Username'] = $Username;
		$_SESSION['Level'] = "pasien";
		// alihkan ke halaman dashboard pegawai
		header("location:halaman_pengguna.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}
else{
	header("location:login.php?pesan=gagal");
}
?>