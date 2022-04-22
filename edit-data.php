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
    <h1><a class="navbar-brand" href="index.php"><img src="images/logo-panjang.png" width="300"></a></h1>
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
        <li>Edit Data: Formulir Pendaftaran</li>
    </ul>
</div>
</div>
<div class="banner_bottom">
<div class="container">
<div class="col-md-10 col-md-offset-1">
    <h3 class="text-center">Edit Data: Formulir Pendaftaran Siswa Baru:</h3><br>
    <div class="alert alert-info">
        <strong>A. DATA SISWA / SISWI</strong>
    </div>
    <form enctype="multipart/form-data" class="contact-form" action="edit-siswa.php" method="post">
    <div class="row">
    <div class="col-md-3">
        <label>Nomor Pendaftaran:</label>
        <input type="hidden" class="form-control" name="id_daftar" value="<?= $p['id_pendaftaran']; ?>" readonly>
        <input type="text" class="form-control" name="no_daftar" value="<?= $p['no_daftar']; ?>" readonly>
    </div>
    <div class="col-md-3">
        <label>NIS:</label>
        <input type="text" class="form-control" name="nik" value="<?= $r['nik']; ?>" readonly>
    </div>
    <div class="col-md-6">
        <label>Nama Lengkap:</label>
        <input type="text" class="form-control" name="nama" value="<?= $p['nama']; ?>" required>
    </div>
    </div><br>
    <div class="row">
    <div class="col-md-3">
        <label>Nama Panggilan:</label>
        <input type="text" class="form-control" name="nama2" value="<?= $p['nama2']; ?>"  required>
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
        <textarea class="form-control" placeholder="Masukkan Alamat Rumah Anda" rows="4" name="alamat" required><?php echo $p['alamat']; ?></textarea>
    </div>
    </div><br>
    <div class="row">
    <div class="col-md-5">
        <label>Tempat Lahir:</label>
        <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir" value="<?= $p['tempat_lahir']; ?>"  required>
    </div>
    <div class="col-md-3">
        <label>Tanggal Lahir:</label>
        <input class="datepicker form-control" type="date" name="tgl_lahir" value="<?= $p['tgl_lahir']; ?>" required/>
        <input name="tgl_daftar" type="hidden" value="<?= date('mdY') ?>" required/>
    </div>
    <div class="col-md-4">
        <label>No. Akte Lahir:</label>
        <input type="text" class="form-control" name="akte_lahir" placeholder="Masukan Nomor Akte Lahir" value="<?= $p['akte_lahir']; ?>"  required>
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-2">
        <label>Tinggi Badan:</label>
        <input class="form-control" type="text" name="tinggi" value="<?= $p['tinggi']; ?>" placeholder="Tinggi badan" required/>
    </div>
    <div class="col-md-2">
        <label>Berat Badan:</label>
        <input class="form-control" type="text" name="berat" value="<?= $p['berat']; ?>" placeholder="Berat badan" required/>
    </div>
    <div class="col-md-2">
        <label>Anak Ke:</label>
        <input class="form-control" type="text" name="anak_ke" value="<?= $p['anak_ke']; ?>" placeholder="Anak ke - " required/>
    </div>
    <div class="col-md-2">
        <label>Dari:</label>
        <input class="form-control" type="text" name="jml_saudara" value="<?= $p['jml_saudara']; ?>" placeholder="Total Saudara" required/>
    </div>
    <div class="col-md-4">
        <label>Penyakit Yang Pernah Diderita:</label>
        <input class="form-control" type="text" name="penyakit" value="<?= $p['penyakit']; ?>" placeholder="Penyakit yang Pernah Anda Derita" required/>
    </div>
    </div><br>
    
    <div class="row">
    <div class="col-md-3">
        <label>Status Sekolah:</label><br>
        <select class="form-control" id="status_sekolah" name="status_sekolah" required>
            <option value="Kelas 1 Baru">Kelas 1 Baru</option>
            <option value="Pindahan">Pindahan</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Nama Sekolah Asal:</label>
        <input class="form-control" type="text" name="nama_sekolah" value="<?= $p['nama_sekolah']; ?>" id="nama_sekolah" placeholder="Masukkan Nama Sekolah" value="-"/>
    </div>
    <div class="col-md-2">
        <label>NIS Asal:</label>
        <input class="form-control" type="text" name="nis_lama" id="nis_lama" placeholder="Input NIS Asal" value="<?= $p['nis_lama']; ?>"/>
    </div>
    <div class="col-md-4">
        <label>Alamat Sekolah Asal:</label>
        <textarea class="form-control" placeholder="Masukkan Alamat Sekolah Asal" rows="4" name="alamat_sekolah" id="alamat_sekolah"><?php echo $p['alamat_sekolah']; ?></textarea>
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-3">
        <label>Tanggal Surat Pindah:</label>
        <input class="form-control" type="text" name="tgl_pindah" id="tgl_pindah" value="<?= $p['tgl_pindah']; ?>"/>
    </div>
    <div class="col-md-3">
        <label>Tingkat Kelas yang Lama:</label>
        <select class="form-control" name="tingkat_kelas" id="tingkat_kelas" value="-">
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
        <textarea class="form-control" placeholder="Masukkan Alamat Sekolah Asal" rows="4" name="alasan_pindah" id="alasan_pindah"><?php echo $p['alasan_pindah']; ?></textarea>
    </div>
    </div><br>
    
    <div class="alert alert-info">
        <strong>B. DATA ORANG TUA SISWA / SISWI</strong>
    </div>
        
    <div class="row">
    <div class="col-md-12">
        <label>No. Kartu Keluarga:</label>
        <input class="form-control" type="text" name="nomor_kk" value="<?= $p['nomor_kk']; ?>" placeholder="Masukkan Nomor KK Anda" required/>
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-3">
    <label>Nama Ayah Kandung:</label>
        <input class="form-control" type="text" name="nama_ayah" value="<?= $p['nama_ayah']; ?>" placeholder="Sebutkan Nama Ayah" required/>
    </div>
    <div class="col-md-3">
        <label>Nomor NIK Ayah:</label>
        <input class="form-control" type="text" name="nik_ayah" value="<?= $p['nik_ayah']; ?>" placeholder="Masukkan Nomor NIK Ayah" required/>
    </div>
    <div class="col-md-3">
        <label>Nama Ibu Kandung:</label>
        <input class="form-control" type="text" name="nama_ibu" value="<?= $p['nama_ibu']; ?>" placeholder="Sebutkan Nama Ibu" required/>
    </div>
    <div class="col-md-3">
        <label>Nomor NIK Ibu:</label>
        <input class="form-control" type="text" name="nik_ibu" value="<?= $p['nik_ibu']; ?>" placeholder="Masukkan Nomor NIK Ibu" required/>
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-3">
    <label>Pendidikan Ayah:</label>
        <select class="form-control" name="pen_ayah" required>
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
        <input class="form-control" type="text" name="pek_ayah" value="<?= $p['pek_ayah']; ?>" placeholder="Sebutkan Pekerjaan Ayah" required/>
    </div>
    <div class="col-md-3">
        <label>Pendidikan Ibu:</label>
        <select class="form-control" name="pen_ibu" required>
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
        <input class="form-control" type="text" name="pek_ibu" value="<?= $p['pek_ibu']; ?>" placeholder="Sebutkan Pendidikan Ibu" required/>
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-3">
    <label>Jabatan Pekerjaan Ayah:</label>
        <input class="form-control" type="text" name="jab_ayah" value="<?= $p['jab_ayah']; ?>" placeholder="Tulis Jabatan Kerja Ayah" required/>
    </div>
    <div class="col-md-3">
        <label>Alamat Kantor Ayah:</label>
        <input class="form-control" type="text" name="alkan_ayah" value="<?= $p['alkan_ayah']; ?>" placeholder="Tulis Alamat Kantor Ayah" required/>
    </div>
    <div class="col-md-3">
        <label>Jabatan Pekerjaan Ibu:</label>
        <input class="form-control" type="text" name="jab_ibu" value="<?= $p['jab_ibu']; ?>" placeholder="Tulis Jabatan Kerja Ibu" required/>
    </div>
    <div class="col-md-3">
        <label>Alamat Kantor Ibu:</label>
        <input class="form-control" type="text" name="alkan_ibu" value="<?= $p['alkan_ibu']; ?>" placeholder="Tulis Alamat Kantor Ibu" required/>
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-6">
    <label>Nomor Telepon Ayah:</label>
        <input class="form-control" type="text" name="telp_ayah" value="<?= $p['telp_ayah']; ?>" placeholder="Sebutkan Nomor Telepon Ayah" required/>
    </div>
    <div class="col-md-6">
        <label>Nomor Telepon Ibu:</label>
        <input class="form-control" type="text" name="telp_ibu" value="<?= $p['telp_ibu']; ?>" placeholder="Sebutkan Nomor Telepon Ibu" required/>
    </div>
    <div class="col-md-12">
        <p> <i>*) Dianjurkan untuk Nomor Telepon yang Juga Menggunakan / Tersedia di Dalam Fitur Whatsapp</i> </p>
    </div>
    </div><br>
        
    <div class="row">
    <div class="col-md-3">
        <label>Penghasilan Ayah Perbulan:</label>
        <select class="form-control" name="gaji_ayah" required>
        <option value="-">Pilih Penghasilan</option>
            <option value="< 1 JT">< 1 JT</option>
            <option value="1 - 3 JT">1 - 3 JT</option>
            <option value="3 - 5 JT">3 - 5 JT</option>
            <option value="> 5 JT">> 5 JT</option>
            <option value="Lain - lain">Lain - lain</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>dan Penghasilan Ibu Perbulan:</label>
        <select class="form-control" name="gaji_ibu" required>
        <option value="-">Pilih Penghasilan</option>
            <option value="< 1 JT">< 1 JT</option>
            <option value="1 - 3 JT">1 - 3 JT</option>
            <option value="3 - 5 JT">3 - 5 JT</option>
            <option value="> 5 JT">> 5 JT</option>
            <option value="Lain - lain">Lain - lain</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Jarak Tempuh Menuju ke Sekolah:</label>
        <select class="form-control" name="jarak" required>
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
        <select class="form-control" name="status_rumah" required>
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
        <label> * Wajib Edit Minimal 1 (Maksimal Edit Berkas 3 Dokumen x 1 Edit):</label>
    </div><br>
        
    <div class="col-md-12" style="padding-top: 20px;">
    <div class="col-md-6">
        <label>Scan Kartu Keluarga</label>
        <p style="color: red">*) Preview Berkas Anda:</p>
    <div class="avatar">
        <img src="uploads/kk/<?= $p['kk'] ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
    </div><br>
        <label><input type="checkbox" id="toggle" name="ubah_kk" value="true"> * Ceklis Jika Ingin Mengubah Berkas<br></label>
        <br><br>
        <script type="text/javascript">
        $('#toggle').click(function (){
        if ($(this).is(':checked')){ $('#kk').removeAttr('disabled'); }else{ $('#kk').attr('disabled', true); }});
        </script>
        <input type="file" name="kk" id="kk" accept="image/*" disabled required><br>
    </div>
    <div class="col-md-6">
        <label>Scan Akte Kelahiran</label>
        <p style="color: red">*) Preview Berkas Anda:</p>
        <div class="avatar">
            <img src="uploads/ak/<?= $p['ak'] ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
        </div><br>
        <label><input type="checkbox" id="toggle2" name="ubah_ak" value="true"> * Ceklis Jika Ingin Mengubah Berkas<br></label>
        <br><br>
        <script type="text/javascript">
        $('#toggle2').click(function (){
        if ($(this).is(':checked')){ $('#ak').removeAttr('disabled'); }else{ $('#ak').attr('disabled', true); }});
        </script>
            <input type="file" name="ak" id="ak" accept="image/*" disabled required><br>
    </div>
    </div>
    
    <div class="col-md-12" style="padding-top: 20px;">
    <div class="col-md-6">
        <label>Scan E-KTP Orang Tua</label>
        <p style="color: red">*) Preview Berkas Anda:</p>
    <div class="avatar">
        <img src="uploads/ektp/<?= $p['ektp'] ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
    </div><br>
        <label><input type="checkbox" id="toggle3" name="ubah_ektp" value="true"> * Ceklis Jika Ingin Mengubah Berkas<br></label>
        <br><br>
        <script type="text/javascript">
        $('#toggle3').click(function (){
        if ($(this).is(':checked')){ $('#ektp').removeAttr('disabled'); }else{ $('#ektp').attr('disabled', true); }});
        </script>
        <input type="file" name="ektp" id="ektp" accept="image/*" disabled required><br>
    </div>
    <div class="col-md-6">
        <label>Scan Surat Keterangan Asal Sekolah</label>
        <p style="color: red">*) Preview Berkas Anda:</p>
        <div class="avatar">
            <img src="uploads/skas/<?= $p['skas'] ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="45%">
        </div><br>
        <label><input type="checkbox" id="toggle4" name="ubah_skas" value="true"> * Ceklis Jika Ingin Mengubah Berkas<br></label>
        <br><br>
        <script type="text/javascript">
        $('#toggle4').click(function (){
        if ($(this).is(':checked')){ $('#skas').removeAttr('disabled'); }else{ $('#skas').attr('disabled', true); }});
        </script>
            <input type="file" name="skas" id="skas" accept="image/*" disabled required><br>
    </div>
    </div>
    </div><br>
    
    <div class="col-md-12">
        <label>Foto</label>
        <p style="color: red">*) Preview Berkas Anda </p>
        <div class="avatar">
            <img src="uploads/foto/<?= $p['foto'] ?>" alt="Thumbnail Image" class="img-thumbnail img-responsive" width="15%">
        </div><br>
        <label><input type="checkbox" id="toggle5" name="ubah_foto" value="true"> * Ceklis Jika Ingin Mengubah Berkas<br></label>
        <br><br>
        <script type="text/javascript">
        $('#toggle5').click(function (){
        if ($(this).is(':checked')){ $('#foto').removeAttr('disabled'); }else{ $('#foto').attr('disabled', true); }});
        </script>
            <input type="file" name="foto" id="foto" accept="image/*" disabled required><br>
    <div class="row">
    <div class="col-md-2">
        <label><input type="checkbox" required=""> &nbsp; Setuju</label>
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