<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
/*--------------------------------------------------------------------------*/
/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
    function antiinjection($data){
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
    return $filter_sql;
}
    $no = antiinjection($_GET['nik']);
    $hasil = "Pembayaran Ditolak";
    mysqli_query($connect, "UPDATE `pengguna` SET `status_bayar` = '$hasil' WHERE nik = '$no';");
    mysqli_query($connect, "UPDATE `buktitransfer` SET `status_bayar` = '$hasil' WHERE nik = '$no';");
    echo "<script>alert('Data Terverifikasi.');</script>";
    echo "<meta http-equiv='refresh' content='0;url=?page=total-bayar'>";
?>