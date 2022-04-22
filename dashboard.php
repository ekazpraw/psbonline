<?php include "header.php" ?>
<style type="text/css">
	.count_down{
		padding: 5px;
		font-size:50px;
		font-weight:bold;
		color:#222;
	}
	.count_down div{
		width:75px;
		height:50px;
		display:inline-block;
	}
	.count_down span{
		color:rgba(0,0,0,.8);
	}
	.count_down sup{
		color:rgba(0,0,0,.8);
		font-size:20px;
	}
</style>
	<script type="text/javascript" src="js/count/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/count/js/countdown.js"></script>
	<script type="text/javascript" src="js/count/js/script.js"></script>
<div class="header" id="home">
<div class="top-bar">
<div class="header-nav-agileits">
    <nav class="navbar navbar-default">
<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
        <h1><a class="navbar-brand" href="index.php"><img src="images/logo-panjang.png" width="400"></a></h1>
</div>
<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
</div>
    </nav>
</div>
</div>
<div class="slider">
<div class="callbacks_container">
<ul class="rslides callbacks callbacks1" id="slider4">
    <li>
    <div class="banner-top">
    <div class="banner-info-w3ls-agileinfo">
    <h3>Selamat Datang</h3>
        <p style="font-size: 20px">Di Situs Pendaftaran Penerimaan Siswa Baru (PSB)
        pada SD Islam Terpadu Al-Fatih</p>
    <?php if(isset($_SESSION['nik'])){ ?>
        <a href="logout.html" data-toggle="modal" data-target="#myModal3"> <i class="fa fa-edit" aria-hidden="true"></i>
            &nbsp;Keluar</a>
    <?php }else{ ?>
        <a href="#" data-toggle="modal" data-target="#myModal3"> <i class="fa fa-edit" aria-hidden="true"></i>
            &nbsp;Daftar Sekarang</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" data-toggle="modal" data-target="#myModal2"> <i class="fa fa-external-link" aria-hidden="true"></i>
            &nbsp;Masuk</a>
    <?php } ?>
    </div>
    </div>
    </li>
</ul>
</div>
<div class="clearfix"> </div>
</div>
</div>

<!-- MODAL 1 -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="signin-form profile">
    <div class="login-m_page_img">
        <img src="images/logo_modal.png" alt=" " class="img-responsive" />
    </div>
    <div class="login-m_page">
        <h3 class="sign">Masuk Akun:</h3>
    <div class="login-form-wthree-agile">
    <form action="log_validate.php" method="post">
        <input type="text" name="nik" placeholder="Masukkan NIK Anda" required="">
        <input type="password" name="pass" placeholder="Masukkan Kata Sandi Anda" required="">
        <div class="tp">
            <input type="submit" value="Masuk">
        </div>
    </form>
    </div>
    </div>
    <div class="clearfix"></div>
    </div>
    </div>
</div>
</div>
</div>
<!-- AKHIR MODAL 1 -->

<!-- MODAL 2 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="signin-form profile">
    <div class="login-m_page_img">
        <img src="images/logo_modal.png" alt=" " class="img-responsive" width="20px" />
    </div>
    <div class="login-m_page">
        <h3 class="sign">Daftar Akun:</h3>
    <div class="login-form-wthree-agile">
    <form action="save_siswa.php" method="post">
        <input type="text" name="nik" placeholder="Masukkan NIK Anda" required="">
        <input type="text" name="nama" placeholder="Masukkan Nama Anda" required="">
        <input type="email" name="email" placeholder="Masukkan Email Anda" required="">
        <input type="password" name="pass" placeholder="Masukkan Kata Sandi Anda" required="">
        <input type="submit" value="Daftarkan">
    </form>
    </div>
    </div>
<div class="clearfix"></div>
    </div>
</div>
</div>
</div>
</div>
<!-- AKHIR MODAL 2 -->

<!-- QUICK COUNT PENDAFTARAN -->
<div class="banner_bottom">
<div class="banner_bottom_in">
<?php
include "conf/koneksi.php";
include "format_tanggal.php";
    $sql = mysqli_query($connect, "SELECT * FROM pendaftaran WHERE aktif = 'Ya'");
    $s = mysqli_fetch_array($sql);
    $tgl = date('YMD');
    $wkt = $s['tgl_selesai'];
?>
    <h3>Jadwal Pendaftaran PSB Online di SD Islam Terpadu Al-Fatih:</h3>
    <b><hr></b>
<div class="about-sub-gd">
<?php
    $start_date = $s['tgl_mulai'];
    $end_date = $s['tgl_selesai'];
    $todays_date = date("Y-m-d");
    if ($todays_date >= $start_date && $todays_date <= $end_date) { ?>
        <h1 style="color: #000">Pendaftaran dibuka mulai <?= indonesian_date($s['tgl_mulai']); ?> s/d <?= indonesian_date($s['tgl_selesai']); ?></h1><br>
        <h3>Sisa Waktu Pendaftaran:</h3>
<div align="center" class="col-md-12">
<div id="count-down-container"></div><br><br>
<script type="text/javascript">
    var currentyear=new Date().getFullYear()
    var target_date=new cdtime("count-down-container", "<?= $wkt ;?>")
    target_date.displaycountdown("days", displayCountDown)
</script>
<?php } else { if($todays_date < $start_date) { ?>
<br>
    <h2><span class="label label-primary">Pendaftaran Belum Dibuka!</span></h2>
<?php } else { ?>
    <br><h2><span class="label label-warning">Pendaftaran Sudah Ditutup!</span></h2>
<?php }} ?>
</div></div></div><br><br>
<div class="banner_bottom_in">
<?php
    $sql1 = mysqli_query($connect, "SELECT *, count(pendaftar_siswa.nik) as jml from pendaftar_siswa WHERE arsip = 'Tidak' AND keterangan = 'Sudah Terverifikasi' ");
        $r = mysqli_fetch_array($sql1);
        $jml = $r['jml'];
    $sql1 = mysqli_query($connect, "SELECT *, count(pendaftar_siswa.nik) as jml_cowo from pendaftar_siswa WHERE jk = 'Laki - laki' AND arsip = 'Tidak' AND keterangan = 'Sudah Terverifikasi'");
        $r = mysqli_fetch_array($sql1);
        $jmlcowo = $r['jml_cowo'];
    $sql1 = mysqli_query($connect, "SELECT *, count(pendaftar_siswa.nik) as jml_cewe from pendaftar_siswa WHERE jk = 'Perempuan' AND arsip = 'Tidak' AND keterangan = 'Sudah Terverifikasi'");
        $r = mysqli_fetch_array($sql1);
        $jmlcewe = $r['jml_cewe'];
?>
<?php
    $start_date = $s['tgl_mulai'];
    $end_date = $s['tgl_selesai'];
    $todays_date = date("Y-m-d");
    if ($todays_date >= $start_date && $todays_date <= $end_date) { ?>
    <h1>Jumlah Pendaftar Hingga Saat Ini:<font style="color: red"> <?= $jml; ?></font> Siswa/i</h1>
</div>
<br><br>
<?php } ?>
</div>
<!-- AKHIR QUICK COUNT PENDAFTARAN -->

<!-- PANDUAN PENDAFTARAN -->
<div class="services">
<div class="container">
<div class="about-main about1">
<div class="col-md-12 about-gd">
    <font color="white">
    <div class="about-sub-gd">
    <h1>Panduan PPBD Online di SDIT Al-Fatih:</h1>
    <br>
    <table class="table" style="text-align: left;">
    <tr>
        <td></td> 
        <td align="center"><h2><b>Tata Cara Pendaftaran:</b></h2></td>
    </tr>
    <tr>
        <td><span class="fa fa-check" aria-hidden="true"></span></td>
        <td><h3>Siswa mendaftarkan di halaman utama untuk mendapatkan akun dengan memasukan NIK, Nama Pengguna, Email serta Password.<br>*Perlu Diperhatikan NIK dan Password ini Bersifat <u>Rahasia!</u></h3></td>
    </tr>
    <tr>
        <td><span class="fa fa-check" aria-hidden="true"></span></td>
        <td><h3>Untuk Calon Siswa yang Sudah Registrasi Maka Akan Secara Otomatis Akan Dialihlan Kepada Menu Pembayaran dan Melakukan Transfer Pembayaran Sesuai Nominal Yang Ditampilkan Untuk Membuka Dasbor Siswa dan Dapat Melakukan Pengisian Formulir.</h3></td>
    </tr>
    <tr>
        <td><span class="fa fa-check" aria-hidden="true"></span></td>
        <td><h3>Setelah Membayar Biaya yang Ditentukan, Siswa Masih Menunggu Verifikasi Pembayaran oleh Admin.</h3></td>
    </tr>
    <tr>
        <td><span class="fa fa-check" aria-hidden="true"></span></td>
        <td><h3>Setelah Verifikasi, Siswa Dapat Masuk dengan NIK dan Password yang Telah Didaftarkan Sebelumnya dan Dapat Langsung Mengisi Formulir Pendaftaran Siswa Baru (PSB) Online ini.<br>*Diwajibkan untuk Mengisi Semua Data dengan Data yang Valid dan Dapat Dipertanggung-jawabkan.</h3></td>
    </tr>
    <tr>
        <td><span class="fa fa-check" aria-hidden="true"></span></td>
        <td><h3>Setelah Proses Pengisian Formulir Berhasil, maka: Data Diri Anda akan Muncul. Kemudian, Jika Ingin Mengubah Data Diri dapat Dilakukan Melalui Tombol Edit yang Ada.</h3></td>
    </tr>
    <tr>
        <td><span class="fa fa-check" aria-hidden="true"></span></td>
        <td><h3>Tunggu sampai Waktu Pengumuman Tiba, maka Hasil akan Diumumkan di Halaman Pengumuman yang Dapat Diakses Di Dalam Menu Setelah Login Siswa.</h3></td>
    </tr>
    <tr>
        <td><span class="fa fa-check" aria-hidden="true"></span></td>
        <td><h3>Verifikasi Data oleh Admin Pihak Sekolah.</h3></td>
    </tr>
    <tr>
        <td><span class="fa fa-check" aria-hidden="true"></span></td>
        <td><h3>Untuk Calon Siswa yang Telah Terverifikasi Dokumennya, Akan Ada Tombol untuk Bergabung Dengan Grup Whatsapp untuk Pengarahan Selanjutnya.</h3></td>
    </tr>
    <tr>
        <td><span class="fa fa-check" aria-hidden="true"></span></td>
        <td><h3>*Keputusan Pihak Sekolah Dalam Menyatakan Calon Siswa Lolos Seleksi Berkas / Tidak (Pengesahan Verifikasi Berkas) adalah <u>Mutlak.</u></h3></td>
    </tr>
    <tr>
        <td></td> 
        <td align="center"><h2><b>- Selesai -</b></h2></td>
    </tr>
    </table>
    </div>
    </font>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
<!-- AKHIR PANDUAN PENDAFTARAN -->




<!-- FOOTER -->
<div class="contact-footer-w3layouts-agile">
<div class="bottom-social-agileits-w3ls">
<div class="container">
<div class="col-md-8 botttom-nav-w3ls-agileits">
<ul class="f_links thrd col-md-8">
    <li style="color: #fff; ">
        <img src="images/logo-panjang.png">
    </li><br>
    <li style="color: #fff; ">
        <span class="fa fa-location-arrow"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jl.&nbsp;&nbsp;Kav.&nbsp;&nbsp;Rawageni,&nbsp;&nbsp;Ratu&nbsp;&nbsp;Jaya,&nbsp;&nbsp;Kec.&nbsp;&nbsp;Cipayung,<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kota&nbsp;&nbsp;Depok.&nbsp;&nbsp;Jawa&nbsp;&nbsp;Barat,&nbsp;&nbsp;16439.
    </li>
    <li style="color: #fff; ">
        <span class="fa fa-envelope-o"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:&nbsp;&nbsp;sditalfatih11@gmail.com
    </li>
    <li style="color: #fff; ">
        <span class="fa fa-phone"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telp:&nbsp;&nbsp;(021)&nbsp;&nbsp;2940&nbsp;&nbsp;2217
    </li>
    <li style="color: #fff; ">
        <span class="fa fa-whatsapp"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Whatsapp:&nbsp;&nbsp;0877&nbsp;&nbsp;8837&nbsp;&nbsp;2748
    </li>
</ul>
</div>
<div class="col-md-4 social-icons-wthree">
<h6>Hubungi Kami di:</h6>
    <a class="maps" href="https://goo.gl/maps/tjiRqvShkuzMZhVZ8"><span class="fa fa-location-arrow" target='_blank'></span></a>
    <a class="facebook" href="https://mobile.facebook.com/profile.php?id=100029604904593"><span class="fa fa-facebook" target='_blank'></span></a>
    <a class="youtube" href="https://www.youtube.com/channel/UCcH9p4w_-Pu51b5xirCRUCg"><span class="fa fa-youtube" target='_blank'></span></a>
    <a class="email" href="mailto:sditalfatih11@gmail.com"><span class="fa fa-envelope-o" target='_blank'></span></a>
    <a class="instagram" href="https://www.instagram.com/sdit_al.fatih_depok/"><span class="fa fa-instagram" target='_blank'></span></a>
    <a class="whatsapp" href="https://api.whatsapp.com/send?phone=+6287788372748"><span class="fa fa-whatsapp" target='_blank'></span></a>
</div>
<div class="clearfix"></div>
</div>
</div>
<?php include "media.php"; ?>