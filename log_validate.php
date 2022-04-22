<?php
include ('conf/koneksi.php');
function antiinjection($data){
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  	return $filter_sql;
}
    $uname = antiinjection($_POST['nik']);
    $pass = antiinjection($_POST['pass']);
    $salt ='psbsditalfatih';
    $hash = md5($salt . $pass);
    $sql = mysqli_query($connect, "SELECT * FROM pengguna WHERE nik='$uname' AND password='$hash' AND hak_akses='Siswa'");
    $r=mysqli_num_rows($sql);
    if($r > 0){
	    $data = mysqli_fetch_assoc($sql);
	if($data['nik']==$uname and $data['password']==$hash and $data['status_bayar']=='Sudah Membayar'){
        session_start();
        $_SESSION['nik']=$data['nik'];
        $_SESSION['password']=$data['password'];
        $_SESSION['hak']=$data['hak_akses'];
        $_SESSION['sbayar']=$data['status_bayar'];
        echo "<script>alert('Anda Berhasil Masuk, Silakan Melanjutkan!');
        window.location = 'dashboard-siswa'</script>";
	}else if($data['nik']==$uname and $data['password']==$hash and $data['status_bayar']=='Menunggu Verifikasi' or $data['status_bayar']=='Belum Membayar' or $data['status_bayar']=='Pembayaran Ditolak'){
        session_start();
        $_SESSION['nik']=$data['nik'];
        $_SESSION['password']=$data['password'];
        $_SESSION['hak']=$data['hak_akses'];
        $_SESSION['sbayar']=$data['status_bayar'];
        echo "<script>alert('Maaf! Masuk Gagal! Status Anda Masih Sedang Tahap Verifikasi Pembayaran!');
        window.location = 'pembayaran.php'</script>";
	}else{
		echo "<script>alert('Maaf! Masuk Gagal! Silakan Cek Lagi NIK dan Kata Sandi Anda!');
        window.location = 'beranda'</script>";
	}	
}else{
	echo "<script>alert('Maaf, NIK atau Kata Sandi Tidak Ditemukan! Masuk Gagal! Silakan Cek Lagi NIK dan Kata Sandi Anda!');
        window.location = 'beranda'</script>";
}
?>