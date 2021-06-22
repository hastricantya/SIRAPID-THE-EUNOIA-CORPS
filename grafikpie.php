<?php
// include file koneksi.php agar terkoneksi dengan database yang ada perintahnya di koneksi.php
include('koneksi.php');
// mengambil data di tabel tb_data_pendaftar
$hasilrapid = mysqli_query($koneksi,"SELECT * FROM tb_data_pendaftar");
// menghasilkan data dan data disimpan pada variabel row
while($row = mysqli_fetch_array($hasilrapid)){
	
	// menjumlah nilai pada kolom jumlah berdasar hasil_rapid
	$query = mysqli_query($koneksi,"SELECT Hasil_Rapid FROM tb_data_pendaftar");
	// variabel row menyimpan hasil query dalam bentuk array
	$row = $query->fetch_array();
	// array untuk menyimpan data jumlah
	$jumlah_reaktif[] = $row['Hasil_Rapid'];
	$jumlah_nonreaktif[] = $row['Hasil_Rapid'];
}
?>
<html>
<head>
	<!-- memberi judul pada jendela browser -->
	<title>Grafik Covid-19 Bandara Halim Perdana Kusuma</title>
	<!-- memanggil javascript -->
	<script type="text/javascript" src="Chart.js"></script>
	<!-- memasukkan link untuk font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- menggunakan css untuk mendesain -->
	<style type="text/css">
	body{
		font-family: roboto;
	}
 
	table{
		margin: 0px auto;
	}
	</style>
 <br>
 <br>
 <div class="wrapper-tampil">
        <!-- memasukkan login.php untuk button kembali dan memanggil class yang ada pada font awesome -->
        <button><a href="halaman_admin.php" class="fa fa-home">Kembali</a></button>
 <!-- menggunakan h2 untuk kalimat -->
	<center>
		<h2>Grafik Pasien Reaktif dan Non-Reaktif COVID-19 Bandara Halim Perdana Kusuma</h2>
	</center>
	<!-- membbuat baris baru -->
 	<br>
 	<br>
 	<br>
 	<!-- include file koneksi.php agar terkoneksi dengan database yang ada perintahnya di koneksi.php -->
	<?php 
	include 'koneksi.php';
	?>
 
	<!-- membuat style untuk grafik -->
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
	<br/>
	<br/>

<!-- membuat table -->
<br>
<table border="1">
		<thead>
			<!-- mengisi table dengan sel -->
			<tr>
				<th>No</th>
				<th>Id Pendaftaran</th>
				<th>Hasil Rapid</th>
			</tr>
		</thead>
		<tbody>

			<!-- menjalankan fungsi backend tampilan -->
			<?php 
			// membuat variabel nomor dengan otomatis
			$no = 1;
			// menjalankan query dengan memanggil variabel koneksi
			$data = mysqli_query($koneksi,"select * from tb_data_pendaftar");
			// data ditampilkan dan dimasukkan kedalam tabel
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['Id_Pendaftaran']; ?></td>
					<td><?php echo $d['Hasil_Rapid']; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>

	<!-- mychart sebagai id dari object yang dibuat -->
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			// membuat grafik berbentuk pie
			type: 'pie',
			data: {
				// untuk menulis label chart
				labels: ["Reaktif", "Non-Reaktif"],
				datasets: [{
					
					// menjalankan perintah query dan menghitung jumlah reaktif untuk ditampilkan pada grafik
					data: [
					<?php 
					$jumlah_reaktif = mysqli_query($koneksi,"select * from tb_data_pendaftar where hasil_rapid = 'Reaktif'");
					echo mysqli_num_rows($jumlah_reaktif);
					?>, 
					
					// menjalankan perintah query dan menghitung jumlah non-reaktif untuk ditampilkan pada grafik
					<?php 
					$jumlah_nonreaktif = mysqli_query($koneksi,"select * from tb_data_pendaftar where hasil_rapid= 'Non-Reaktif'");
					echo mysqli_num_rows($jumlah_nonreaktif);
					?>
					],

					// mengatur warna background grafik
					backgroundColor: [
					'rgba(255, 99, 132, 1)',
					'rgba(54, 162, 235, 1)'
					],

					// mengatur warna border grafik
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					],

					// mengatur ketebalan border
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
<center><h4>Copyright 2021 The Eunoia Corps (Hastri & Tiara)</h4></center>
</html>