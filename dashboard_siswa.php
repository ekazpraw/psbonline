<?php
include "header.php";
include "conf/koneksi.php";
include "lib/inc.session.php";
include "format_tanggal.php";
    $sql  = mysqli_query($connect, "select * from pengguna where nik = '$_SESSION[nik]' and hak_akses = 'Siswa'");
    $r    = mysqli_fetch_array($sql);
    $query = mysqli_query($connect, "SELECT * FROM pendaftar_siswa WHERE pendaftar_siswa.nik = '$_SESSION[nik]'");
    $cek = mysqli_num_rows($query);
    $p = mysqli_fetch_array($query);
		$sql = mysqli_query($connect, "SELECT * FROM pendaftaran WHERE aktif = 'Ya'");
		$s = mysqli_fetch_array($sql);
		$tgl = date('YMD');
		$wkt = $s['tgl_selesai'];
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
        <?php if ($p['keterangan'] == "") { ?>
        <li><a href="dashboard-siswa" class="active">Dasbor Siswa</a></li>
        <li><a href="logout.php">Keluar</a></li>
        <?php }else{ ?>
        <li><a href="dashboard-siswa" class="active">Dasbor Siswa</a></li>
        <li><a href="hasil-pengumuman.html">Pengumuman</a></li>
        <li><a href="logout.php">Keluar</a></li>
        <?php } ?>
    </ul>
    </nav>
    </div>
    </nav>
</div>
</div>
</div>
<div class="banner_bottom">
    <div class="banner_bottom_in">
        <h3 class="headerw3">Selamat datang, <i><?php echo $r['nama_pengguna'] ?></i> </h3>
            <p>Pada halaman ini anda dapat melakukan pengisian formulir, melihat data diri, merubah data diri apabila ada kesalahan, kemudian melihat hasil pengumuman setelah dilakukan verifikasi oleh panitia penerimaan siswa baru SD Islam Terpadu</p>
        <?php
            $start_date = $s['tgl_mulai'];
            $end_date = $s['tgl_selesai'];
            $todays_date = date("Y-m-d");
            if ($todays_date >= $start_date && $todays_date <= $end_date) { ?>
            <div class="edu_button">
                <?php if ($p['keterangan'] == ""){ ?>
                    <a class="btn btn-primary btn-lg hvr-underline-from-left" href="formulir.html" role="button">Isi Formulir</a>
                <?php } else { ?>
				    <a class="btn btn-primary btn-lg hvr-underline-from-left" href="hasil-pengumuman.html" role="button">Pengumuman</a>
                <?php } ?>
            </div>
            <?php }else{ if($todays_date < $start_date) { ?>
            <br>
        <h2><span class="label label-primary">Pendaftaran Belum Dibuka</span></h2>
            <?php }else{ ?>
            <br>
        <h2><span class="label label-warning">Pendaftaran Sudah Ditutup</span></h2>
        <?php }}?>
    </div>
</div>
<hr>
<div class="top_spl_courses">
<div class="container"><br>
<?php if ($cek > 0) { ?>
<div class="row owner">
<div class="col-md-2 col-md-offset-5 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3 text-center">
    <div class="avatar">
        <img src="uploads/foto/<?php echo $p['foto'];?>" alt="Thumbnail Image" class="img-thumbnail img-responsive">
        <br><br>
        Status Siswa/i Ini:
        <br><br>
        <h3><?php echo $p['keterangan'];?></h3>
    </div><br>
</div>
</div>
<div class="profile-tabs">
<div id="my-tab-content" class="tab-content">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <table class="table">
    <tr>
        <td width="250">Nomor Pendaftaran</td>
        <td><?php echo $p['no_daftar'];?></td>
    </tr>
    <tr>
        <td width="150">Nomor Induk Siswa</td>
        <td><?php echo $p['nik'];?></td>
    </tr>
    <tr>
        <td width="250">Nama Siswa</td>
        <td><?php echo $p['nama'];?></td>
    </tr>
    <tr>
        <td width="250">Nama Panggilan</td>
        <td><?php echo $p['nama2'];?></td>
    </tr>
    <tr>
        <td width="150">Jenis Kelamin</td>
        <td><?php echo $p['jk'];?></td>
    </tr>
    <tr>
        <td width="150">Alamat</td>
        <td><?php echo $p['alamat'];?></td>
    </tr>
    <tr>
        <td width="150">TTL</td>
        <td><?php echo $p['tempat_lahir'];?>, <?php echo indonesian_date($p['tgl_lahir']);?></td>
    </tr>
    <tr>
        <td width="250">No. Akte Lahir</td>
        <td><?php echo $p['akte_lahir'];?></td>
    </tr>
    <tr>
        <td width="150">Tinggi Badan</td>
        <td><?php echo $p['tinggi'];?> CM</td>
    </tr>
    <tr>
        <td width="150">Berat Badan</td>
        <td><?php echo $p['berat'];?> KG</td>
    </tr>
    <tr>
        <td width="150">Anak Ke - </td>
        <td><?php echo $p['anak_ke'];?> dari <?php echo $p['jml_saudara'];?> bersaudara</td>
    </tr>
    <tr>
        <td width="250">Penyakit yang Pernah Diderita</td>
        <td><?php echo $p['penyakit'];?></td>
    </tr>
    <tr>
        <td width="250">Status Sekolah</td>
        <td><?php echo $p['status_sekolah'];?></td>
    </tr>
    <tr>
        <td width="250">Nama Sekolah Asal</td>
        <td><?php echo $p['nama_sekolah'];?></td>
    </tr>
    <tr>
        <td width="250">NIS Sekolah Asal</td>
        <td><?php echo $p['nis_lama'];?></td>
    </tr>
    <tr>
        <td width="250">Alamat Sekolah Asal</td>
        <td><?php echo $p['alamat_sekolah'];?></td>
    </tr>                        
    <tr>
        <td width="250">Tanggal SP Pindah</td>
        <td><?php echo $p['tgl_pindah'];?></td>
    </tr>               
    <tr>
        <td width="250">Tingkatan Kelas Asal</td>
        <td><?php echo $p['tingkat_kelas'];?></td>
    </tr>               
    <tr>
        <td width="250">Alasan Pindah</td>
        <td><?php echo $p['alasan_pindah'];?></td>
    </tr>
    <tr>
        <td width="250">No. KK</td>
        <td><?php echo $p['nomor_kk'];?></td>
    </tr>               
    <tr>
        <td width="250">Nama Ayah</td>
        <td><?php echo $p['nama_ayah'];?></td>
    </tr>               
    <tr>
        <td width="250">NIK Ayah</td>
        <td><?php echo $p['nik_ayah'];?></td>
    </tr>               
    <tr>
        <td width="250">Nama Ibu</td>
        <td><?php echo $p['nama_ibu'];?></td>
    </tr>               
    <tr>
        <td width="250">NIK Ibu</td>
        <td><?php echo $p['nik_ibu'];?></td>
    </tr>               
    <tr>
        <td width="250">Pendidikan Ayah</td>
        <td><?php echo $p['pen_ayah'];?></td>
    </tr>               
    <tr>
        <td width="250">Pekerjaan Ayah</td>
        <td><?php echo $p['pek_ayah'];?></td>
    </tr>               
    <tr>
        <td width="250">Pendidikan Ibu</td>
        <td><?php echo $p['pen_ibu'];?></td>
    </tr>               
    <tr>
        <td width="250">Pekerjaan Ibu</td>
        <td><?php echo $p['pek_ibu'];?></td>
    </tr>               
    <tr>
        <td width="250">Jabatan Kerja Ayah</td>
        <td><?php echo $p['jab_ayah'];?></td>
    </tr>               
    <tr>
        <td width="250">Alamat Kerja Ayah</td>
        <td><?php echo $p['alkan_ayah'];?></td>
    </tr>               
    <tr>
        <td width="250">Jabatan Kerja Ibu</td>
        <td><?php echo $p['jab_ibu'];?></td>
    </tr>               
    <tr>
        <td width="250">Alamat Kerja Ibu</td>
        <td><?php echo $p['alkan_ibu'];?></td>
    </tr>               
    <tr>
        <td width="250">Nomor Telepon Ayah</td>
        <td><?php echo $p['telp_ayah'];?></td>
    </tr>               
    <tr>
        <td width="250">Nomor Telepon Ibu</td>
        <td><?php echo $p['telp_ibu'];?></td>
    </tr>               
    <tr>
        <td width="250">Gaji Ayah</td>
        <td><?php echo $p['gaji_ayah'];?></td>
    </tr>               
    <tr>
        <td width="250">Gaji Ibu</td>
        <td><?php echo $p['gaji_ibu'];?></td>
    </tr>               
    <tr>
        <td width="250">Jarak ke Sekolah</td>
        <td><?php echo $p['jarak'];?></td>
    </tr>               
    <tr>
        <td width="250">Status Rumah Tinggal</td>
        <td><?php echo $p['status_rumah'];?></td>
    </tr>               
    <tr>
        <td width="150">Kartu Keluarga</td>
        <td>
            <a href="uploads/kk/<?php echo $p['kk'];?>"><img src="uploads/kk/<?php echo $p['kk'];?>" width="100px"  alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
        </td>
    </tr>		        
    <tr>
        <td width="150">Akte Kelahiran</td>
        <td>
           <a href="uploads/ak/<?php echo $p['ak'];?>"><img src="uploads/ak/<?php echo $p['ak'];?>" width="100px"  alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
        </td>
    </tr>           
    <tr>
        <td width="150">E-KTP Orang Tua</td>
        <td>
           <a href="uploads/ektp/<?php echo $p['ektp'];?>"><img src="uploads/ektp/<?php echo $p['ektp'];?>" width="100px"  alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
        </td>
    </tr>		        
    <tr>
        <td width="150">SKAS</td>
        <td>
           <a href="uploads/skas/<?php echo $p['skas'];?>"><img src="uploads/skas/<?php echo $p['skas'];?>" width="100px" alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
        </td>
    </tr>                    
    <tr>
        <td width="150">PAS FOTO MERAH 4X6</td>
        <td>
           <a href="uploads/foto/<?php echo $p['foto'];?>"><img src="uploads/foto/<?php echo $p['foto'];?>" width="100px" alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
        </td>
    </tr>
    </table>
    <center>
    <hr>
    <?php if ($p['keterangan'] == "Belum Terverifikasi" or $p['keterangan'] == "Verifikasi Ditolak") { ?>
        <div class="edu_button">
            <a class="btn btn-primary btn-lg hvr-underline-from-left" href="edit-data.html" role="button">Edit Data</a>
        </div>
    <?php }else{ ?>
        <div class="edu_button">
    <form action="pdf_formulir.php" method="post" name="postform">
        <input type="hidden" name="tid" value="<?php echo $p['nik']; ?>">
        <input type="submit" class="btn btn-primary btn-lg hvr-underline-from-left" name="getPdf" value="Cetak Hasil Formulir">
    </form>
        </div>
    <?php } ?>
    </center>
</div>
</div>
</div>
</div>
<?php }else{ ?>
<div class="tab-pane text-center" id="following">
    <h3>Belum Ada Data!</h3><br>
    <div class="avatar">
        <img src="images/file_empty.png" alt="Thumbnail Image" class="img-thumbnail img-responsive" style="width:30%">
    </div>
</div>
<?php } ?>
</div>
</div>
<div class="contact-footer-w3layouts-agile">
<?php include "media.php" ?>