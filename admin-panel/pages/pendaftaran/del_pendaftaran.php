<?php
	include "../conf/koneksi.php";
    include "../lib/inc.session.php";
    mysqli_query($connect, "DELETE FROM pendaftaran WHERE id_pendaftaran = '$_GET[tid]'");
	echo "<script>alert('Data Sudah Dihapus!');</script>";
	echo "<meta http-equiv='refresh' content='0;url=?page=view-pendaftaran'>";
?>
