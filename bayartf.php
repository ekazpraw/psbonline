<?php 
include 'conf/koneksi.php';
$nik = $_GET['nik'];
$tglbayar = date('Y-m-d');
$namafilebaru = "Sudah TF";
$titik = ".";
$verifikasi = "Menunggu Verifikasi";
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['struk']['name'];
$ukuran = $_FILES['struk']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!in_array($ext,$ekstensi) ) {
    echo "<script>alert('Ekstensi Upload Salah, Periksa Kembali!');</script>";
    echo "<meta http-equiv='refresh' content='0; url=pembayaran.php'>";
}else{		
    $xx = $nik.'_'.$tglbayar.'_'.$namafilebaru.$titik.$ext;
    move_uploaded_file($_FILES['struk']['tmp_name'], 'uploads/struk/'.$nik.'_'.$tglbayar.'_'.$namafilebaru.$titik.$ext);
    $input = mysqli_query($connect, "INSERT INTO buktitransfer (nik, status_bayar, struk, tgl_bayar) VALUES ('$nik','$verifikasi','$xx','$tglbayar')");
    if($input){
        $update = mysqli_query($connect, "UPDATE pengguna SET status_bayar='$verifikasi' WHERE nik='$nik'");
        echo "<script>alert('Berhasil Mengunggah Bukti Transfer, Harap Menunggu Hasil Verifikasi Data 1x24 Jam!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=pembayaran.php'>";
    }if($update){
        echo "<script>alert('Berhasil Memperbaharui Status Pengguna!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=pembayaran.php'>";
    }else{
        echo "<script>alert('Ukuran Terlalu Besar! dan Gagal Memperbaharui Status Pengguna!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=pembayaran.php'>";
	}
}