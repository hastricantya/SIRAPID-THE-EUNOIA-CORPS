<!-- meincludekan koneksi.php agar terkoneksi database -->
<?php
include('koneksi.php');
// memasukkan vendor/autoload.php untuk menjalankan perintah
require 'vendor/autoload.php';
// menggunakan fungsi dibawah ini
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// membuat variabel spreadsheet baru dan mengaktifkan sheetnya dimana didalam sheet dideklarasikan pada cell A1 hingga K1
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Id_Pendaftaran');
$sheet->setCellValue('C1', 'NIK');
$sheet->setCellValue('D1', 'Tanggal_Registrasi');
$sheet->setCellValue('E1', 'Nama_Lengkap');
$sheet->setCellValue('F1', 'Gender');
$sheet->setCellValue('G1', 'Tempat_Lahir');
$sheet->setCellValue('H1', 'Tanggal_Lahir');
$sheet->setCellValue('I1', 'Alamat');
$sheet->setCellValue('J1', 'Hasil_Rapid');
$sheet->setCellValue('K1', 'Nama Pengguna');

// menjalankan query dan melakukan pemanggilan data pada tb_data_pendaftar
$query = mysqli_query($koneksi, "select * from tb_data_pendaftar");
// agar data tampil menggunakan mysqli_query pada tabel tb_data_pendaftar dan tiap sel telah dideklarasikan untuk masing" isi dari entitas yang ada
$i = 2;
$no = 1;
while($row=mysqli_fetch_array($query)) 
{
	$sheet->setCellValue('A'.$i, $no++);
	$sheet->setCellValue('B'.$i, $row['Id_Pendaftaran']);
	$sheet->setCellValue('C'.$i, $row['NIK']);
	$sheet->setCellValue('D'.$i, $row['Tanggal_Registrasi']);
	$sheet->setCellValue('E'.$i, $row['Nama_Lengkap']);
	$sheet->setCellValue('F'.$i, $row['Gender']);
	$sheet->setCellValue('G'.$i, $row['Tempat_Lahir']);
	$sheet->setCellValue('H'.$i, $row['Tanggal_Lahir']);
	$sheet->setCellValue('I'.$i, $row['Alamat']);
	$sheet->setCellValue('J'.$i, $row['Hasil_Rapid']);
	$sheet->setCellValue('K'.$i, $row['Username']);
	$i++;
}

// membuat style border untuk sel hasil data tabel tb_data_pendaftar
$styleArray = [
			'borders' => [
				'allBorders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
$sheet->getStyle('A1:K'.$i)->applyFromArray($styleArray);

// membuat file xslx dengan variabel spreadsheet dan diberi nama file Report Data Pendaftar Rapid
$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Pendaftar Rapid.xlsx');
?>