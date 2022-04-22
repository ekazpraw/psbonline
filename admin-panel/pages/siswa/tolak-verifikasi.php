<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
/*--------------------------------------------------------------------------*/
/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
    function antiinjection($data){
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
    return $filter_sql;
}
    $no = antiinjection($_POST['no_daftar']);
    $hasil = "Verifikasi Ditolak";
    mysqli_query($connect, "UPDATE `pendaftar_siswa` SET `keterangan` = '$hasil' WHERE no_daftar = '$no';");
    echo "<script>alert('Data Verifikasi Telah Ditolak!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=?page=total-siswa'>";
?>