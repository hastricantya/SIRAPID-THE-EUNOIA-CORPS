<?php
// Konfigurasi Database
$host = "localhost";
$user = "id17098643_root";
$password = "ceIP|Ff_||4iN^y?";
$database = "id17098643_db_sirapid";
// perintah php untuk mengakses database
$koneksi = mysqli_connect($host, $user, $password, $database);
if (!$koneksi) {
	die ("Koneksi Gagal:".mysqli_connect_error());
}
?>