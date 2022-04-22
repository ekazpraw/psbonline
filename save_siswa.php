<?php
	include "conf/koneksi.php";
    function antiinjection($data){
        $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
        return $filter_sql;
    }
        $nik = antiinjection($_POST['nik']);
        $nama = antiinjection($_POST['nama']);
        $email = antiinjection($_POST['email']);
        $pass = antiinjection($_POST['pass']);
        $hak = "Siswa";
        $statusbayar = "Belum Membayar";
        $tgl = date('Y-m-d');
        $salt ='psbsditalfatih';
        $hash = md5($salt . $pass);
        $cek_user=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM pengguna WHERE nik='$nik'"));
        if ($cek_user > 0){
            echo "<script>alert('NIK Sudah Terdaftar!');</script>";
      		echo "<meta http-equiv='refresh' content='0; url=beranda'>";
        }else{
        mysqli_query($connect, "INSERT INTO pengguna
            (nik,nama_pengguna,email, password, pass_asli, hak_akses, status_bayar, tgl_daftar) VALUES ('$nik','$nama','$email','$hash','$pass','$hak','$statusbayar','$tgl')");
                echo "<script>alert('Data Pendaftaran sudah Tersimpan. Silakan Masuk Dengan NIK dan Kata Sandi Anda, Lalu Lanjutkan Membayar Pendaftaran Untuk Dapat Mengisi Formulir Anda.');</script>";
                echo "<meta http-equiv='refresh' content='0; url=beranda'>";
        }
?>