<?php
	include "../conf/koneksi.php";
	include "../lib/inc.session.php";
function antiinjection($data){
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
    return $filter_sql;
}
    $id = antiinjection($_POST['id']);
    $periode = antiinjection($_POST['periode']);
    $awal = antiinjection($_POST['awal']);
    $akhir = antiinjection($_POST['akhir']);
    $kuota = antiinjection($_POST['kuota']);
    mysqli_query($connect, "UPDATE pendaftaran SET
        periode = '$periode',
        tgl_mulai = '$awal',
        tgl_selesai = '$akhir',
        kuota = '$kuota'
            WHERE id_pendaftaran = '$id'");
    echo "<script>alert('Data Sudah Diperbaharui!');</script>";
    echo "<meta http-equiv='refresh' content='0;url=?page=view-pendaftaran'>";
?>