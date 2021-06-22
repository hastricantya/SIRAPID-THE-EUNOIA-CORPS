<?php
// mengaktifkan session pada php
session_start();
// merequire koneksi.php agar terkoneksi database
require "koneksi.php";
?>
<!DOCTYPE html>
<head>
    <!-- memberi judul pada jendela browser -->
    <title>SIRAPID - Halaman Pasien</title>
     <!-- memasukkan eksternal css -->
    <link rel="stylesheet" href="style.css">
    <!-- memasukkan link untuk font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- memanggil class wrapper tampil agar didesain dengan css -->
    <div class="wrapper-tampil">
        <button><a href="login.php" class="fa fa-home">Kembali</a></button>
    <!-- memanggil class wrapper tampil agar didesain dengan css -->   
    <div class="wrapper-tampil">
        <!-- membuat kalimat dengan h1 -->
        <h1>Data Pendaftar</h1>
        <div>
            <!-- membuat table -->
            <table>
                <thead>
                    <!-- mengisi isi sel table -->
                    <tr>
                        <th>No</th>
                        <th>Id Pendaftaran</th>
                        <th>Hasil Rapid Test</th>
                    </tr>
                    <!-- membuat proses backend tampilan php -->
                    <?php
                      // meinclude koneksi.php agar terkoneksi database
                      include "koneksi.php";
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
                        <td><?= $data['Hasil_Rapid'] ?></td>
                    <!-- membuat isian momor secara otomatis ketika ada data masuk -->    
                    <?php
                        $number++;
                      }
                    ?>
                </thead>
            </table>
        </div>
    </div>
    </div>
</body>
<center><h4>Copyright 2021 The Eunoia Corps (Hastri & Tiara)</h4></center>
</html