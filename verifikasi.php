<?php 
include 'conf/koneksi.php';
include 'bayartf.php';
$nik = $_GET['nik'];
$verifikasi = "Menunggu Verifikasi";
mysqli_query($connect, "UPDATE pengguna SET status_bayar='$verifikasi' WHERE nis='$nik')");
echo "<meta http-equiv='refresh' content='0; url=pembayaran.php'>";
?>