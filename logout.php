<?php
    session_start();
unset($_SESSION['nik']);
	echo "<script>alert('Anda Menuju Halaman Utama'); window.location = 'beranda'</script>";
	exit;
?>