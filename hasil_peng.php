<?php
include("header.php");
include "conf/koneksi.php";
include "lib/inc.session.php";
include "format_tanggal.php";
$sql  = mysqli_query($connect, "select * from pengguna where nik = '$_SESSION[nik]'");
$r    = mysqli_fetch_array($sql);
    $query = mysqli_query($connect, "SELECT * FROM `pendaftar_siswa` WHERE pendaftar_siswa.nik = '$_SESSION[nik]'");
$cek = mysqli_num_rows($query);
$p = mysqli_fetch_array($query);
?>
<div class="header inner_banner" id="home">
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
        <h1><a class="navbar-brand" href="index.php"><img src="images/logo-panjang.png" width="300"></a></h1>
    </div>
    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
    <nav>
    <ul class="top_nav">
        <li><a href="dashboard-siswa">Dasbor Siswa</a></li>
        <li><a href="pengumuman.html" class="active">Pengumuman</a></li>
        <li><a href="logout.php">Keluar</a></li>
    </ul>
    </nav>
    </div>
</nav>
</div>
</div>
</div>
<div class="banner_bottom">
<div class="banner_bottom_in">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<?php if ($cek > 0){ ?>
<div class="panel panel-primary">
<div class="panel-heading" align="center">Pengumuman Kelulusan SDIT AL-FATIH <?php echo date('Y') ?></div>
<div class="panel-body">
    <table class="table">
    <tr>
        <td>Nomor Pendaftaran </td>
        <td> :</td>
        <td><?php echo $p['no_daftar'];?></td>
    </tr>
    <tr>
        <td>NIK </td>
        <td> :</td>
        <td><?php echo $p['nik'];?></td>
    </tr>
    <tr>
        <td>Nama </td>
        <td> :</td>
        <td><?php echo $p['nama'];?></td>
    </tr>
    <tr>
        <td>Asal Sekolah</td>
        <td> :</td>
        <td><?php echo $p['nama_sekolah'];?></td>
    </tr>
    </table>
<?php if ($p['keterangan'] == "Sudah Terverifikasi"){ ?>
    <h3 align="center"><span class="label label-info">Selamat! Berkas Anda Sudah Terverifikasi!</span></h3><br>
    <h3 align="center"><span class="label label-success"><a href="https://chat.whatsapp.com/CwqHVPofvhG1eXAhPKm5Tu"><font color="white">Bergabung Grup Whatsapp</font></a></span></h3><br>
<?php }else{ ?>
    <h3 align="center"><span class="label label-warning">Menunggu Verifikasi</span></h3><br>
<?php } ?>
</div>
</div>
<?php }else{ ?>
<div class="tab-pane text-center" id="following">
    <h3>Belum Ada Isi Data Formulir!</h3>
    <div class="avatar">
        <img src="images/file_empty.png" alt="Thumbnail Image" class="img-thumbnail img-responsive" style="width:100%">
    </div>
</div>
<?php } ?>
</div>
</div>
<br><br>
<?php if ($p['keterangan'] == "Sudah Terverifikasi") { ?>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-success">
    <div class="panel-heading" align="center">Pemberitahuan:</div>
    <div class="panel-body" align="left" style="padding-left:100px;padding-right:100px;">
        <ul>
        <li>Setelah Berkas Sudah Terverifikasi Bisa Langsung untuk Bergabung Dengan Grup Whatsapp Sekolah</li>
        <li>Info Lebih Lanjut:<small> <i>klik link <b>Grup Whatsapp</b> yang ada di atas</i> </small></li>
    </ul>
    </div>
</div>
</div>
</div>
<div class="edu_button">
    <form action="pdf_formulir.php" method="post" name="postform">
        <input type="hidden" name="tid" value="<?php echo $p['nik']; ?>">
        <input type="submit" class="btn btn-primary btn-lg hvr-underline-from-left" name="getPdf" value="Cetak Hasil Formulir">
    </form>
</div>
<?php } ?>
</div>
</div>
<div class="contact-footer-w3layouts-agile">
<?php include "media.php" ?>