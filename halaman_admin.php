<!-- merequire koneksi.php agar terkoneksi database -->
<?php
  require "koneksi.php";
?>
<!DOCTYPE html>
<head>
    <!-- memberi judul pada jendela browser -->
    <title>SIRAPID - Halaman Admin</title>
    <!-- memasukkan eksternal css -->
    <link rel="stylesheet" href="style.css">
    <!-- memasukkan link untuk font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- memanggil class wrapper tampil agar didesain dengan css -->
    <div class="wrapper-tampil">
        <!-- memasukkan login.php untuk button kembali dan memanggil class yang ada pada font awesome -->
        <button><a href="login.php" class="fa fa-home">Kembali</a></button>
        <!-- membuat kalimat dengan h1 -->
        <h1>Data Pendaftar</h1>
        <!-- membuat button tambah data dengan mengarah ke daftardatapendaftar.php -->
        <a href="daftardatapendaftar.php" class="btn-tambah"><strong>+ </strong>Tambah Data</a>
        <!-- membuat button export excel dengan mengarah ke reportdataexcel.php -->
        <a href="reportdataexcel.php" class="btn-edit"><strong>+ </strong>Laporan Excel</a> 
        <!-- membuat button export pdf dengan mengarah ke exportpdf.php -->
        <a href="exportpdf.php" class="btn-hapus"><strong>+ </strong>Laporan PDF</a> 
        <!-- membuat button lihat grafik dengan mengarah ke grafikbar.php -->
        <a href="grafikbar.php" class="btn-tambah"><strong>+ </strong>Lihat Grafik</a>
        <div>
            <!-- membuat table -->
            <table>
                <thead>
                    <!-- mengisi isi sel table -->
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
                        <th>Hasil Rapid Test</th>
                        <th>Nama Pengguna</th>
                        <th>Aksi</th>
                    </tr>
                    <!-- membuat proses backend tampilan php -->
                    <?php
                    // menjalankan query dengan membuat nomor otomatis dan menghasilkan query sebagi variabel data
                      $sql = "SELECT * FROM tb_data_pendaftar";
                      $result = mysqli_query($koneksi, $sql);
                      $number = 1;
                      foreach ($result as $data) {
                    ?>
                    <!-- memasukkan hasil query kedalam table -->
                    <tr>
                        <td><?= $number ?></td>
                        <td><?= $data['Id_Pendaftaran'] ?></td>
                        <td><?= $data['NIK'] ?></td>
                        <td><?= $data['Tanggal_Registrasi'] ?></td>
                        <td><?= $data['Nama_Lengkap'] ?></td>
                        <td><?= $data['Gender'] ?></td>
                        <td><?= $data['Tempat_Lahir'] ?></td>
                        <td><?= $data['Tanggal_Lahir'] ?></td>
                        <td><?= $data['Alamat'] ?></td>
                        <td><?= $data['Hasil_Rapid'] ?></td>
                        <td><?= $data['Username'] ?></td>
                        <!-- membuat tampilan button edit dan hapus rata tengah -->
                        <td align="center">
                            <!-- membuat button edit dengan mengarah ke editdata.php -->
                            <center><a href="editdata.php?Id_Pendaftaran=<?= $data['Id_Pendaftaran'] ?>" class="btn-edit">Edit</a></center>
                            <!-- membuat button hapus data dengan mengarah ke hapus.php -->
                            <center><a href="hapus.php?Id_Pendaftaran=<?= $data['Id_Pendaftaran'] ?>" class="btn-hapus">Hapus</a></center>
                        </td>
                    </tr>
                    <!-- membuat isian momor secara otomatis ketika ada data masuk -->
                    <?php
                        $number++;
                      }
                    ?>
                </thead>
            </table>
        </div>
    </div>
</body>
<center><h4>Copyright 2021 The Eunoia Corps (Hastri & Tiara)</h4></center>
</html>
