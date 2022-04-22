<?php
include "header.php";
include "lib/inc.session.php";
include "conf/koneksi.php";
$sql  = mysqli_query($connect, "select * from pengguna where nik = '$_SESSION[nik]'");
$r    = mysqli_fetch_array($sql);
$sql = mysqli_query($connect, "SELECT * FROM pendaftaran WHERE aktif = 'Ya'");
$s = mysqli_fetch_array($sql);
?>
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    if ($("#status_sekolah").val() == "Pindahan") {
        $('#nama_sekolah').removeAttr('readonly');
        $('#nis_lama').removeAttr('readonly');
        $('#alamat_sekolah').removeAttr('readonly');
        $('#tgl_pindah').removeAttr('readonly');
        $('#tingkat_kelas').removeAttr('readonly');
        $('#alasan_pindah').removeAttr('readonly');
    }else{
        $('#nama_sekolah').attr('readonly','readonly');
        $('#nis_lama').attr('readonly','readonly');
        $('#alamat_sekolah').attr('readonly','readonly');
        $('#tgl_pindah').attr('readonly','readonly');
        $('#tingkat_kelas').attr('readonly','readonly');
        $('#alasan_pindah').attr('readonly','readonly');
    }
    $("#status_sekolah").change(function() {
        if (this.value == "Kelas 1 Baru") {
            $('#nama_sekolah').attr('readonly','readonly'); 
            $('#nis_lama').attr('readonly','readonly'); 
            $('#alamat_sekolah').attr('readonly','readonly');
            $('#tgl_pindah').attr('readonly','readonly');
            $('#tingkat_kelas').attr('readonly','readonly');
            $('#alasan_pindah').attr('readonly','readonly');
            $('#alamat_sekolah').val('-');
            $('#tgl_pindah').val('-');
            $('#nama_sekolah').val('-');
            $('#nis_lama').val('-');
            $('#tingkat_kelas').val('-');
            $('#alasan_pindah').val('-');
        }else{
            $('#nama_sekolah').removeAttr('readonly');
            $('#nis_lama').removeAttr('readonly');
            $('#alamat_sekolah').removeAttr('readonly');
            $('#tgl_pindah').removeAttr('readonly');
            $('#tingkat_kelas').removeAttr('readonly');
            $('#alasan_pindah').removeAttr('readonly');
            $('#nama_sekolah').focus();
            $('#nis_lama').focus();
            $('#alamat_sekolah').focus();
            $('#tgl_pindah').focus();
            $('#tingkat_kelas').focus();
            $('#alasan_pindah').focus();
        } 
    });
}); 
</script>
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
    <h1><a class="navbar-brand" href="index.php"><img src="images/logo-panjang.png" width="200"></a></h1>
</div>
<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
    <nav>
    <ul class="top_nav">
        <li><a href="dashboard-siswa" class="active">Dasbor Siswa</a></li>
        <li><a href="logout.php">Keluar</a></li>
    </ul>
    </nav>
</div>
    </nav>
</div>
</div>
</div>
<div class="services-breadcrumb-w3ls-agile">
<div class="inner_breadcrumb">
    <ul class="short">
        <li><a href="dashboard-siswa">Dasbor Siswa</a><span>|</span></li>
        <li>Formulir Pendaftaran</li>
    </ul>
</div>
</div>
<?php
$carikode = mysqli_query($connect, "SELECT no_daftar from pendaftar_siswa") or die (mysqli_error());
  $datakode = mysqli_fetch_array($carikode);
  $jumlah_data = mysqli_num_rows($carikode);
  if ($datakode) {
   $nilaikode = substr($jumlah_data[0], 1);
   $kode = (int) $nilaikode;
   $kode = $jumlah_data + 1;
   $kode_otomatis = "PSA".date('dmY').str_pad($kode, 3, "0", STR_PAD_LEFT);
  }else{
   $kode_otomatis = "PSA".date('dmY')."001";
  }
?>
<div class="banner_bottom">
<div class="container">
<div class="col-md-10 col-md-offset-1">
    <h3 class="text-center">Formulir Pendaftaran Siswa Baru:</h3><br>
    <div class="alert alert-info">
        <strong>A. DATA SISWA / SISWI</strong>
    </div>
    <form enctype="multipart/form-data" class="contact-form" action="simpan-siswa.php" method="post">
    <div class="row">
    <div class="col-md-3">
        <label>Nomor Pendaftaran:</label>
        <input type="text" class="form-control" name="nodaftar" value="<?= $kode_otomatis ?>" readonly>
    </div>
    <div class="col-md-3">
        <label>NIK:</label>
        <input type="text" class="form-control" name="nik" value="<?= $r['nik']; ?>" readonly>
    </div>
    <div class="col-md-6">
        <label>Nama Lengkap:</label>
        <input type="text" class="form-control" name="nama" value="<?= $r['nama_pengguna']; ?>" >
    </div>
    </div><br>
    <div class="row">
    <div class="col-md-3">
        <label>Nama Panggilan:</label>
        <input type="text" class="form-control" name="nama2" >
    </div>
    <div class="col-md-3">
        <label>Jenis Kelamin:</label> <br>
    <div class="col-sm-6">
        <label class="radio">
        <input type="radio" name="jk" data-toggle="radio" value="Laki - laki" checked>
            Laki-laki
        </label>
    </div>
    <div class="col-sm-2">
        <label class="radio">
        <input type="radio" name="jk" data-toggle="radio" value="Perempuan">
            Perempuan
        </label>
    </div>
    </div>
    <div class="col-md-6">
        <label>Alamat:</label>
        <textarea class="form-control" placeholder="Masukkan Alamat Rumah Anda" rows="4" name="alamat" ></textarea>
    </div>
    </div><br>
    <div class="row">
    <div class="col-md-5">
        <label>Tempat Lahir:</label>
        <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir" >
    </div>
    <div class="col-md-3">
        <label>Tanggal Lahir:</label>
        <input class="datepicker form-control" type="date" name="tgl_lahir" />
        <input type="hidden" class="form-control" name="id_daftar" value="<?= $s['id_pendaftaran'] ?>">
        <input name="tgl_daftar" type="hidden" value="<?= date('mdY') ?>" />
    </div>
    <div class="col-md-4">
        <label>No. Akte Lahir:</label>
        <input type="text" class="form-control" name="akte_lahir" placeholder="Masukan Nomor Akte Lahir" >
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-2">
        <label>Tinggi Badan:</label>
        <input class="form-control" type="text" name="tinggi" placeholder="Tinggi badan" />
    </div>
    <div class="col-md-2">
        <label>Berat Badan:</label>
        <input class="form-control" type="text" name="berat" placeholder="Berat badan" />
    </div>
    <div class="col-md-2">
        <label>Anak Ke:</label>
        <input class="form-control" type="text" name="anak_ke" placeholder="Anak ke - " />
    </div>
    <div class="col-md-2">
        <label>Dari:</label>
        <input class="form-control" type="text" name="jml_saudara" placeholder="Total Saudara" />
    </div>
    <div class="col-md-4">
        <label>Penyakit Yang Pernah Diderita:</label>
        <input class="form-control" type="text" name="penyakit" placeholder="Penyakit yang Pernah Anda Derita" />
    </div>
    </div><br>
    
    <div class="row">
    <div class="col-md-3">
        <label>Status Sekolah:</label><br>
        <select class="form-control" id="status_sekolah" name="status_sekolah" >
            <option value="Kelas 1 Baru">Kelas 1 Baru</option>
            <option value="Pindahan">Pindahan</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Nama Sekolah Asal:</label>
        <input class="form-control" type="text" name="nama_sekolah" id="nama_sekolah" placeholder="Masukkan Nama Sekolah" value="-"/>
    </div>
    <div class="col-md-2">
        <label>NIS Asal:</label>
        <input class="form-control" type="text" name="nis_lama" id="nis_lama" placeholder="Input NIS Asal" value="-"/>
    </div>
    <div class="col-md-4">
        <label>Alamat Sekolah Asal:</label>
        <textarea class="form-control" placeholder="Masukkan Alamat Sekolah Asal" rows="4" name="alamat_sekolah" id="alamat_sekolah"><?php echo "-"; ?></textarea>
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-3">
        <label>Tanggal Surat Pindah:</label>
        <input class="datepicker form-control" type="date" name="tgl_pindah" id="tgl_pindah" value="-"/>
    </div>
    <div class="col-md-3">
        <label>Tingkat Kelas yang Lama:</label>
        <select class="form-control" name="tingkat_kelas" id="tingkat_kelas">
        <option value="-">-</option>
            <option value="2">2</option>
            <option value="3">2</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
    </div>
    <div class="col-md-6">
        <label>Alasan Pindah Sekolah:</label>
        <textarea class="form-control" placeholder="Masukkan Alamat Sekolah Asal" rows="4" name="alasan_pindah" id="alasan_pindah"><?php echo "-"; ?></textarea>
    </div>
    </div><br>
    
    <div class="alert alert-info">
        <strong>B. DATA ORANG TUA SISWA / SISWI</strong>
    </div>
        
    <div class="row">
    <div class="col-md-12">
        <label>No. Kartu Keluarga:</label>
        <input class="form-control" type="text" name="nomor_kk" placeholder="Masukkan Nomor KK Anda" />
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-3">
    <label>Nama Ayah Kandung:</label>
        <input class="form-control" type="text" name="nama_ayah" placeholder="Sebutkan Nama Ayah" />
    </div>
    <div class="col-md-3">
        <label>Nomor NIK Ayah:</label>
        <input class="form-control" type="text" name="nik_ayah" placeholder="Masukkan Nomor NIK Ayah" />
    </div>
    <div class="col-md-3">
        <label>Nama Ibu Kandung:</label>
        <input class="form-control" type="text" name="nama_ibu" placeholder="Sebutkan Nama Ibu" />
    </div>
    <div class="col-md-3">
        <label>Nomor NIK Ibu:</label>
        <input class="form-control" type="text" name="nik_ibu" placeholder="Masukkan Nomor NIK Ibu" />
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-3">
    <label>Pendidikan Ayah:</label>
        <select class="form-control" name="pen_ayah" >
        <option value="-">Pilih Pendidikan</option>
            <option value="SD">SD</option>
            <option value="SLTP">SLTP</option>
            <option value="SLTA">SLTA</option>
            <option value="D1">D1</option>
            <option value="D2">D2</option>
            <option value="D3">D3</option>
            <option value="D4">D4</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
            <option value="Lain - lain">Lain - lain</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Pekerjaan Ayah:</label>
        <input class="form-control" type="text" name="pek_ayah" placeholder="Sebutkan Pekerjaan Ayah" />
    </div>
    <div class="col-md-3">
        <label>Pendidikan Ibu:</label>
        <select class="form-control" name="pen_ibu" >
        <option value="-">Pilih Pendidikan</option>
            <option value="SD">SD</option>
            <option value="SLTP">SLTP</option>
            <option value="SLTA">SLTA</option>
            <option value="D1">D1</option>
            <option value="D2">D2</option>
            <option value="D3">D3</option>
            <option value="D4">D4</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
            <option value="Lain - lain">Lain - lain</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Pekerjaan Ibu:</label>
        <input class="form-control" type="text" name="pek_ibu" placeholder="Sebutkan Pendidikan Ibu" />
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-3">
    <label>Jabatan Pekerjaan Ayah:</label>
        <input class="form-control" type="text" name="jab_ayah" placeholder="Tulis Jabatan Kerja Ayah" />
    </div>
    <div class="col-md-3">
        <label>Alamat Kantor Ayah:</label>
        <input class="form-control" type="text" name="alkan_ayah" placeholder="Tulis Alamat Kantor Ayah" />
    </div>
    <div class="col-md-3">
        <label>Jabatan Pekerjaan Ibu:</label>
        <input class="form-control" type="text" name="jab_ibu" placeholder="Tulis Jabatan Kerja Ibu" />
    </div>
    <div class="col-md-3">
        <label>Alamat Kantor Ibu:</label>
        <input class="form-control" type="text" name="alkan_ibu" placeholder="Tulis Alamat Kantor Ibu" />
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-6">
    <label>Nomor Telepon Ayah:</label>
        <input class="form-control" type="text" name="telp_ayah" placeholder="Sebutkan Nomor Telepon Ayah" />
    </div>
    <div class="col-md-6">
        <label>Nomor Telepon Ibu:</label>
        <input class="form-control" type="text" name="telp_ibu" placeholder="Sebutkan Nomor Telepon Ibu" />
    </div>
    <div class="col-md-12">
        <p> <i>*) Dianjurkan untuk Nomor Telepon yang Juga Menggunakan / Tersedia di Dalam Fitur Whatsapp</i> </p>
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-3">
        <label>Penghasilan Ayah Perbulan:</label>
        <select class="form-control" name="gaji_ayah" >
        <option value="-">Pilih Penghasilan</option>
            <option value="Di Bawah 1 JT">Di Bawah 1 JT</option>
            <option value="1 - 3 JT">1 - 3 JT</option>
            <option value="3 - 5 JT">3 - 5 JT</option>
            <option value="> 5 JT">> 5 JT</option>
            <option value="Lain - lain">Lain - lain</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>dan Penghasilan Ibu Perbulan:</label>
        <select class="form-control" name="gaji_ibu" >
        <option value="-">Pilih Penghasilan</option>
            <option value="Di Bawah 1 JT">Di Bawah 1 JT</option>
            <option value="1 - 3 JT">1 - 3 JT</option>
            <option value="3 - 5 JT">3 - 5 JT</option>
            <option value="> 5 JT">> 5 JT</option>
            <option value="Lain - lain">Lain - lain</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Jarak Tempuh Menuju ke Sekolah:</label>
        <select class="form-control" name="jarak" >
        <option value="-">Pilih Jarak</option>
            <option value="0 - 1 Km">0 - 1 Km</option>
            <option value="1 - 3 Km">1 - 3 Km</option>
            <option value="3 - 5 Km">3 - 5 Km</option>
            <option value="5 - 10 Km">5 - 10 Km</option>
            <option value="Lebih dari 10 Km">Lebih dari 10 Km</option>
            <option value="Lain - lain">Lain - lain</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Status Rumah Tinggal Anda:</label>
        <select class="form-control" name="status_rumah" >
        <option value="-">Pilih Status</option>
            <option value="Rumah Sendiri">Rumah Sendiri</option>
            <option value="Rumah Sewa">Rumah Sewa</option>
            <option value="Rumah Orang Tua">Rumah Orang Tua</option>
        </select>
    </div>
    </div><br>
        
    <div class="alert alert-info">
        <strong>C. DATA BERKAS</strong>
    </div>    
    
    <div class="row">
    <div class="col-md-12">
        <label>Lengkapi Data Berkas Berikut Ini:</label>
    </div><br>
    
    <div class="col-md-12" style="padding-top: 20px;">
    <div class="col-md-6">
        <label>Scan Kartu Keluarga</label>
        <p style="color: red">*) Contoh:</p>
    <div class="avatar">
        <img src="images/kk.jpg" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
    </div><br>
        <input type="file" name="kk" id="fileToUpload" accept="image/*" ><br>
    </div>
    <div class="col-md-6">
        <label>Scan Akte Kelahiran</label>
        <p style="color: red">*) Contoh:</p>
        <div class="avatar">
            <img src="images/ak.jpg" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
        </div><br>
            <input type="file" name="ak" id="fileToUpload" accept="image/*" ><br>
    </div>
    </div>
    
    <div class="col-md-12" style="padding-top: 20px;">
    <div class="col-md-6">
        <label>Scan E-KTP Orang Tua</label>
        <p style="color: red">*) Contoh:</p>
    <div class="avatar">
        <img src="images/ektp.jpg" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
    </div><br>
        <input type="file" name="ektp" id="fileToUpload" accept="image/*" ><br>
    </div>
    <div class="col-md-6">
        <label>Scan Surat Keterangan Asal Sekolah</label>
        <p style="color: red">*) Contoh:</p>
        <div class="avatar">
            <img src="images/skas.jpg" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
        </div><br>
            <input type="file" name="skas" id="fileToUpload" accept="image/*" ><br>
    </div>
    </div>  
    </div><br>
    
    <div class="col-md-12">
        <label>Foto</label>
        <p style="color: red">*) Contoh </p>
        <div class="avatar">
            <img src="images/pass.png" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="15%">
        </div><br>
            <input type="file" name="foto" id="fileToUpload" accept="image/*" ><br>
    <div class="row">
    <div class="col-md-2">
        <label><input type="checkbox" =""> &nbsp; Setuju</label>
    </div>
    <div class="col-md-9">
    <ul>
        <li>Saya telah mengisi data dengan sebenar-benarnya dan dapat dipertanggungjawabkan;</li>
        <li>Jika data dinyatakan tidak valid dengan berkas aslinya maka peserta dapat dinyatakan gugur oleh pihak sekolah;</li>
        <li>Saya telah mengingat atau mencatat password untuk login nanti setelah formulir dikirimkan.</li>
        </ul>
    </div>
    </div><br>
    <div class="row" align="center">
    <div class="edu_button">
        <input type="submit" name="submit" class="btn btn-primary hvr-underline-from-center" value="Kirimkan Formulir Saya">
    </div>
    </div>
    </div><br>
</form>
</div>
</div>
</div>
<div class="contact-footer-w3layouts-agile">
<?php include "media.php" ?>