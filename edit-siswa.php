<?php
	include "conf/koneksi.php";
function antiinjection($data){
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
    return $filter_sql;
}
    $no = antiinjection($_POST['no_daftar']);
    $nik = antiinjection($_POST['nik']);
    $nama = antiinjection($_POST['nama']);
    $nama2 = antiinjection($_POST['nama2']);
    $jk = antiinjection($_POST['jk']);
    $alamat = antiinjection($_POST['alamat']);
    $tmpt = antiinjection($_POST['tempat_lahir']);
    $tgl = antiinjection($_POST['tgl_lahir']);
    $akte = antiinjection($_POST['akte_lahir']);
    $tinggi = antiinjection($_POST['tinggi']);
    $berat = antiinjection($_POST['berat']);
    $anak_ke = antiinjection($_POST['anak_ke']);
    $jml_saudara = antiinjection($_POST['jml_saudara']);
    $penyakit = antiinjection($_POST['penyakit']);
    $status_sekolah = antiinjection($_POST['status_sekolah']);
    $nama_sekolah = antiinjection($_POST['nama_sekolah']);
    $nis_lama = antiinjection($_POST['nis_lama']);
    $alamat_sekolah = antiinjection($_POST['alamat_sekolah']);
    $tgl_pindah = antiinjection($_POST['tgl_pindah']);
    $tingkat_kelas = antiinjection($_POST['tingkat_kelas']);
    $alasan_pindah = antiinjection($_POST['alasan_pindah']);

    $nomor_kk = antiinjection($_POST['nomor_kk']);
    $nama_ayah = antiinjection($_POST['nama_ayah']);
    $nik_ayah = antiinjection($_POST['nik_ayah']);
    $pen_ayah = antiinjection($_POST['pen_ayah']);
    $pek_ayah = antiinjection($_POST['pek_ayah']);
    $jab_ayah = antiinjection($_POST['jab_ayah']);
    $alkan_ayah = antiinjection($_POST['alkan_ayah']);
    $telp_ayah = antiinjection($_POST['telp_ayah']);
    $gaji_ayah = antiinjection($_POST['gaji_ayah']);
    $nama_ibu = antiinjection($_POST['nama_ibu']);
    $nik_ibu = antiinjection($_POST['nik_ibu']);
    $pen_ibu = antiinjection($_POST['pen_ibu']);
    $pek_ibu = antiinjection($_POST['pek_ibu']);
    $jab_ibu = antiinjection($_POST['jab_ibu']);
    $alkan_ibu = antiinjection($_POST['alkan_ibu']);
    $telp_ibu = antiinjection($_POST['telp_ibu']);
    $gaji_ibu = antiinjection($_POST['gaji_ibu']);

    $jarak = antiinjection($_POST['jarak']);
    $status_rumah = antiinjection($_POST['status_rumah']);

    $ket = "Belum Terverifikasi";
    $tgldaftar = date('Ymd');

// UBAH BERKAS KK
if (isset($_POST['ubah_kk'])){
    if($_FILES['kk']['name']!=''){
    $target_dir = "uploads/kk/";
    $target_file = $target_dir . basename($_FILES["kk"]["name"]);
    $kkbaru = $_FILES["kk"]["name"];
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["kk"]["tmp_name"]);
        if($check !== false){
            $uploadOk = 1;
        }else{
            echo "<script>alert('File Bukan Gambar!');</script>";
            echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
            $uploadOk = 0;
        }
    if ($_FILES["kk"]["size"] > 2000000){
        echo "<script>alert('Gambar Tidak Boleh Lebih Dari 2MB');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "<script>alert('Gambar Hanya Boleh Berupa: JPG, PNG atau JPEG');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0){
        echo "<script>alert('Gambar Gagal Diupload!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
    }else{
    if (move_uploaded_file($_FILES["kk"]["tmp_name"], $target_file)){
    }else{
        echo "<script>alert('Gambar Gagal Diupload!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
    }}
        $query = "SELECT * FROM pendaftar_siswa WHERE nik='$nik'";
        $sql = mysqli_query($connect, $query);
	    $data = mysqli_fetch_array($sql);
    if(is_file("uploads/kk/".$data['kk']))
        unlink("uploads/kk/".$data['kk']);
    }
    $query = "UPDATE pendaftar_siswa SET
        `nik`='$nik',
        `nama`='$nama',
        `nama2`='$nama2',
        `jk`='$jk',
        `alamat`='$alamat',
        `tempat_lahir`='$tmpt',
        `tgl_lahir`='$tgl',
        `akte_lahir`='$akte',
        `tinggi`='$tinggi',
        `berat`='$berat',
        `anak_ke`='$anak_ke',
        `jml_saudara`='$jml_saudara',
        `penyakit`='$penyakit',
        `status_sekolah`='$status_sekolah',
        `nama_sekolah`='$nama_sekolah',
        `nis_lama`='$nis_lama',
        `alamat_sekolah`='$alamat_sekolah',
        `tgl_pindah`='$tgl_pindah',
        `tingkat_kelas`='$tingkat_kelas',
        `alasan_pindah`='$alasan_pindah',

        `nomor_kk`='$nomor_kk',
        `nama_ayah`='$nama_ayah',
        `nik_ayah`='$nik_ayah',
        `pen_ayah`='$pen_ayah',
        `pek_ayah`='$pek_ayah',
        `jab_ayah`='$jab_ayah',
        `alkan_ayah`='$alkan_ayah',
        `telp_ayah`='$telp_ayah',
        `gaji_ayah`='$gaji_ayah',
        `nama_ibu`='$nama_ibu',
        `nik_ibu`='$nik_ibu',
        `pen_ibu`='$pen_ibu',
        `pek_ibu`='$pek_ibu',
        `jab_ibu`='$jab_ibu',
        `alkan_ibu`='$alkan_ibu',
        `telp_ibu`='$telp_ibu',
        `gaji_ibu`='$gaji_ibu',

        `jarak`='$jarak',
        `status_rumah`='$status_rumah',

        `kk`='$kkbaru',
        `tgl_daftar`='$tgldaftar'
    WHERE no_daftar='$no'";
    $sql = mysqli_query($connect, $query);
    if($sql){
        echo "<script>alert('Data Pendaftaran Sudah Diperbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=dashboard-siswa'>"; // Redirect ke halaman index.php
    }else{
        echo "Maaf, Terjadi Kesalahan Saat Mencoba Untuk Menyimpan Data!";
        echo "<br><a href='edit_data.html'>Kembali Ke Formulir Edit</a>";
    }
}

// UBAH BERKAS AK
if (isset($_POST['ubah_ak'])){
    if($_FILES['ak']['name']!=''){
    $target_dir2 = "uploads/ak/";
    $target_file2 = $target_dir2 . basename($_FILES["ak"]["name"]);
    $akbaru = $_FILES["ak"]["name"];
    $uploadOk = 1;
    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
        $check2 = getimagesize($_FILES["ak"]["tmp_name"]);
        if($check2 !== false){
            $uploadOk = 1;
        }else{
            echo "<script>alert('File Bukan Gambar!');</script>";
            echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
            $uploadOk = 0;
        }
    if ($_FILES["ak"]["size"] > 2000000){
        echo "<script>alert('Gambar Tidak Boleh Lebih Dari 2MB');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
        $uploadOk = 0;
    }
    if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") {
        echo "<script>alert('Gambar Hanya Boleh Berupa: JPG, PNG atau JPEG');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0){
        echo "<script>alert('Gambar Gagal Diupload!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
    }else{
    if (move_uploaded_file($_FILES["ak"]["tmp_name"], $target_file2)){
    }else{
        echo "<script>alert('Gambar Gagal Diupload!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
    }}
        $query = "SELECT * FROM pendaftar_siswa WHERE nik='$nik'";
        $sql = mysqli_query($connect, $query);
	    $data = mysqli_fetch_array($sql);
    if(is_file("uploads/ak/".$data['ak']))
        unlink("uploads/ak/".$data['ak']);
    }
    $query = "UPDATE pendaftar_siswa SET
        `nik`='$nik',
        `nama`='$nama',
        `nama2`='$nama2',
        `jk`='$jk',
        `alamat`='$alamat',
        `tempat_lahir`='$tmpt',
        `tgl_lahir`='$tgl',
        `akte_lahir`='$akte',
        `tinggi`='$tinggi',
        `berat`='$berat',
        `anak_ke`='$anak_ke',
        `jml_saudara`='$jml_saudara',
        `penyakit`='$penyakit',
        `status_sekolah`='$status_sekolah',
        `nama_sekolah`='$nama_sekolah',
        `nis_lama`='$nis_lama',
        `alamat_sekolah`='$alamat_sekolah',
        `tgl_pindah`='$tgl_pindah',
        `tingkat_kelas`='$tingkat_kelas',
        `alasan_pindah`='$alasan_pindah',

        `nomor_kk`='$nomor_kk',
        `nama_ayah`='$nama_ayah',
        `nik_ayah`='$nik_ayah',
        `pen_ayah`='$pen_ayah',
        `pek_ayah`='$pek_ayah',
        `jab_ayah`='$jab_ayah',
        `alkan_ayah`='$alkan_ayah',
        `telp_ayah`='$telp_ayah',
        `gaji_ayah`='$gaji_ayah',
        `nama_ibu`='$nama_ibu',
        `nik_ibu`='$nik_ibu',
        `pen_ibu`='$pen_ibu',
        `pek_ibu`='$pek_ibu',
        `jab_ibu`='$jab_ibu',
        `alkan_ibu`='$alkan_ibu',
        `telp_ibu`='$telp_ibu',
        `gaji_ibu`='$gaji_ibu',

        `jarak`='$jarak',
        `status_rumah`='$status_rumah',

        `ak`='$akbaru',
        `tgl_daftar`='$tgldaftar'
    WHERE no_daftar='$no'";
    $sql = mysqli_query($connect, $query);
    if($sql){
        echo "<script>alert('Data Pendaftaran Sudah Diperbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=dashboard-siswa'>"; // Redirect ke halaman index.php
    }else{
        echo "Maaf, Terjadi Kesalahan Saat Mencoba Untuk Menyimpan Data!";
        echo "<br><a href='edit_data.html'>Kembali Ke Formulir Edit</a>";
    }
}

// UBAH BERKAS E-KTP
if (isset($_POST['ubah_ektp'])){
    if($_FILES['ektp']['name']!=''){
    $target_dir3 = "uploads/ektp/";
    $target_file3 = $target_dir3 . basename($_FILES["ektp"]["name"]);
    $ektpbaru = $_FILES["ektp"]["name"];
    $uploadOk = 1;
    $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
        $check3 = getimagesize($_FILES["ektp"]["tmp_name"]);
        if($check3 !== false){
            $uploadOk = 1;
        }else{
            echo "<script>alert('File Bukan Gambar!');</script>";
            echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
            $uploadOk = 0;
        }
    if ($_FILES["ektp"]["size"] > 2000000){
        echo "<script>alert('Gambar Tidak Boleh Lebih Dari 2MB');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
        $uploadOk = 0;
    }
    if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg") {
        echo "<script>alert('Gambar Hanya Boleh Berupa: JPG, PNG atau JPEG');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0){
        echo "<script>alert('Gambar Gagal Diupload!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
    }else{
    if (move_uploaded_file($_FILES["ektp"]["tmp_name"], $target_file3)){
    }else{
        echo "<script>alert('Gambar Gagal Diupload!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
    }}
        $query = "SELECT * FROM pendaftar_siswa WHERE nik='$nik'";
        $sql = mysqli_query($connect, $query);
	    $data = mysqli_fetch_array($sql);
    if(is_file("uploads/ektp/".$data['ektp']))
        unlink("uploads/ektp/".$data['ektp']);
    }
    $query = "UPDATE pendaftar_siswa SET
        `nik`='$nik',
        `nama`='$nama',
        `nama2`='$nama2',
        `jk`='$jk',
        `alamat`='$alamat',
        `tempat_lahir`='$tmpt',
        `tgl_lahir`='$tgl',
        `akte_lahir`='$akte',
        `tinggi`='$tinggi',
        `berat`='$berat',
        `anak_ke`='$anak_ke',
        `jml_saudara`='$jml_saudara',
        `penyakit`='$penyakit',
        `status_sekolah`='$status_sekolah',
        `nama_sekolah`='$nama_sekolah',
        `nis_lama`='$nis_lama',
        `alamat_sekolah`='$alamat_sekolah',
        `tgl_pindah`='$tgl_pindah',
        `tingkat_kelas`='$tingkat_kelas',
        `alasan_pindah`='$alasan_pindah',

        `nomor_kk`='$nomor_kk',
        `nama_ayah`='$nama_ayah',
        `nik_ayah`='$nik_ayah',
        `pen_ayah`='$pen_ayah',
        `pek_ayah`='$pek_ayah',
        `jab_ayah`='$jab_ayah',
        `alkan_ayah`='$alkan_ayah',
        `telp_ayah`='$telp_ayah',
        `gaji_ayah`='$gaji_ayah',
        `nama_ibu`='$nama_ibu',
        `nik_ibu`='$nik_ibu',
        `pen_ibu`='$pen_ibu',
        `pek_ibu`='$pek_ibu',
        `jab_ibu`='$jab_ibu',
        `alkan_ibu`='$alkan_ibu',
        `telp_ibu`='$telp_ibu',
        `gaji_ibu`='$gaji_ibu',

        `jarak`='$jarak',
        `status_rumah`='$status_rumah',

        `ektp`='$ektpbaru',
        `tgl_daftar`='$tgldaftar'
    WHERE no_daftar='$no'";
    $sql = mysqli_query($connect, $query);
    if($sql){
        echo "<script>alert('Data Pendaftaran Sudah Diperbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=dashboard-siswa'>"; // Redirect ke halaman index.php
    }else{
        echo "Maaf, Terjadi Kesalahan Saat Mencoba Untuk Menyimpan Data!";
        echo "<br><a href='edit_data.html'>Kembali Ke Formulir Edit</a>";
    }
}

// UBAH BERKAS SURAT KETERANGAN ASAL SEKOLAH
if (isset($_POST['ubah_skas'])){
    if($_FILES['skas']['name']!=''){
    $target_dir4 = "uploads/skas/";
    $target_file4 = $target_dir4 . basename($_FILES["skas"]["name"]);
    $skasbaru = $_FILES["skas"]["name"];
    $uploadOk = 1;
    $imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
        $check4 = getimagesize($_FILES["skas"]["tmp_name"]);
        if($check4 !== false){
            $uploadOk = 1;
        }else{
            echo "<script>alert('File Bukan Gambar!');</script>";
            echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
            $uploadOk = 0;
        }
    if ($_FILES["skas"]["size"] > 2000000){
        echo "<script>alert('Gambar Tidak Boleh Lebih Dari 2MB');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
        $uploadOk = 0;
    }
    if($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg") {
        echo "<script>alert('Gambar Hanya Boleh Berupa: JPG, PNG atau JPEG');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0){
        echo "<script>alert('Gambar Gagal Diupload!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
    }else{
    if (move_uploaded_file($_FILES["skas"]["tmp_name"], $target_file4)){
    }else{
        echo "<script>alert('Gambar Gagal Diupload!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
    }}
        $query = "SELECT * FROM pendaftar_siswa WHERE nik='$nik'";
        $sql = mysqli_query($connect, $query);
	    $data = mysqli_fetch_array($sql);
    if(is_file("uploads/skas/".$data['skas']))
        unlink("uploads/skas/".$data['skas']);
    }
    $query = "UPDATE pendaftar_siswa SET
        `nik`='$nik',
        `nama`='$nama',
        `nama2`='$nama2',
        `jk`='$jk',
        `alamat`='$alamat',
        `tempat_lahir`='$tmpt',
        `tgl_lahir`='$tgl',
        `akte_lahir`='$akte',
        `tinggi`='$tinggi',
        `berat`='$berat',
        `anak_ke`='$anak_ke',
        `jml_saudara`='$jml_saudara',
        `penyakit`='$penyakit',
        `status_sekolah`='$status_sekolah',
        `nama_sekolah`='$nama_sekolah',
        `nis_lama`='$nis_lama',
        `alamat_sekolah`='$alamat_sekolah',
        `tgl_pindah`='$tgl_pindah',
        `tingkat_kelas`='$tingkat_kelas',
        `alasan_pindah`='$alasan_pindah',

        `nomor_kk`='$nomor_kk',
        `nama_ayah`='$nama_ayah',
        `nik_ayah`='$nik_ayah',
        `pen_ayah`='$pen_ayah',
        `pek_ayah`='$pek_ayah',
        `jab_ayah`='$jab_ayah',
        `alkan_ayah`='$alkan_ayah',
        `telp_ayah`='$telp_ayah',
        `gaji_ayah`='$gaji_ayah',
        `nama_ibu`='$nama_ibu',
        `nik_ibu`='$nik_ibu',
        `pen_ibu`='$pen_ibu',
        `pek_ibu`='$pek_ibu',
        `jab_ibu`='$jab_ibu',
        `alkan_ibu`='$alkan_ibu',
        `telp_ibu`='$telp_ibu',
        `gaji_ibu`='$gaji_ibu',

        `jarak`='$jarak',
        `status_rumah`='$status_rumah',

        `skas`='$skasbaru',
        `tgl_daftar`='$tgldaftar'
    WHERE no_daftar='$no'";
    $sql = mysqli_query($connect, $query);
    if($sql){
        echo "<script>alert('Data Pendaftaran Sudah Diperbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=dashboard-siswa'>"; // Redirect ke halaman index.php
    }else{
        echo "Maaf, Terjadi Kesalahan Saat Mencoba Untuk Menyimpan Data!";
        echo "<br><a href='edit_data.html'>Kembali Ke Formulir Edit</a>";
    }
}

// UBAH BERKAS PAS FOTO 4x6
if (isset($_POST['ubah_foto'])){
    if($_FILES['foto']['name']!=''){
    $target_dir5 = "uploads/foto/";
    $target_file5 = $target_dir5 . basename($_FILES["foto"]["name"]);
    $fotobaru = $_FILES["foto"]["name"];
    $uploadOk = 1;
    $imageFileType5 = strtolower(pathinfo($target_file5,PATHINFO_EXTENSION));
        $check5 = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check5 !== false){
            $uploadOk = 1;
        }else{
            echo "<script>alert('File Bukan Gambar!');</script>";
            echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
            $uploadOk = 0;
        }
    if ($_FILES["foto"]["size"] > 2000000){
        echo "<script>alert('Gambar Tidak Boleh Lebih Dari 2MB');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
        $uploadOk = 0;
    }
    if($imageFileType5 != "jpg" && $imageFileType5 != "png" && $imageFileType5 != "jpeg") {
        echo "<script>alert('Gambar Hanya Boleh Berupa: JPG, PNG atau JPEG');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0){
        echo "<script>alert('Gambar Gagal Diupload!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
    }else{
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file5)){
    }else{
        echo "<script>alert('Gambar Gagal Diupload!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=edit-data.html'>";
    }}
        $query = "SELECT * FROM pendaftar_siswa WHERE nik='$nik'";
        $sql = mysqli_query($connect, $query);
	    $data = mysqli_fetch_array($sql);
    if(is_file("uploads/foto/".$data['foto']))
        unlink("uploads/foto/".$data['foto']);
    }
    $query = "UPDATE pendaftar_siswa SET
        `nik`='$nik',
        `nama`='$nama',
        `nama2`='$nama2',
        `jk`='$jk',
        `alamat`='$alamat',
        `tempat_lahir`='$tmpt',
        `tgl_lahir`='$tgl',
        `akte_lahir`='$akte',
        `tinggi`='$tinggi',
        `berat`='$berat',
        `anak_ke`='$anak_ke',
        `jml_saudara`='$jml_saudara',
        `penyakit`='$penyakit',
        `status_sekolah`='$status_sekolah',
        `nama_sekolah`='$nama_sekolah',
        `nis_lama`='$nis_lama',
        `alamat_sekolah`='$alamat_sekolah',
        `tgl_pindah`='$tgl_pindah',
        `tingkat_kelas`='$tingkat_kelas',
        `alasan_pindah`='$alasan_pindah',

        `nomor_kk`='$nomor_kk',
        `nama_ayah`='$nama_ayah',
        `nik_ayah`='$nik_ayah',
        `pen_ayah`='$pen_ayah',
        `pek_ayah`='$pek_ayah',
        `jab_ayah`='$jab_ayah',
        `alkan_ayah`='$alkan_ayah',
        `telp_ayah`='$telp_ayah',
        `gaji_ayah`='$gaji_ayah',
        `nama_ibu`='$nama_ibu',
        `nik_ibu`='$nik_ibu',
        `pen_ibu`='$pen_ibu',
        `pek_ibu`='$pek_ibu',
        `jab_ibu`='$jab_ibu',
        `alkan_ibu`='$alkan_ibu',
        `telp_ibu`='$telp_ibu',
        `gaji_ibu`='$gaji_ibu',

        `jarak`='$jarak',
        `status_rumah`='$status_rumah',

        `foto`='$fotobaru',
        `tgl_daftar`='$tgldaftar'
    WHERE no_daftar='$no'";
    $sql = mysqli_query($connect, $query);
    if($sql){
        echo "<script>alert('Data Pendaftaran Sudah Diperbaharui!');</script>";
        echo "<meta http-equiv='refresh' content='0; url=dashboard-siswa'>"; // Redirect ke halaman index.php
    }else{
        echo "Maaf, Terjadi Kesalahan Saat Mencoba Untuk Menyimpan Data!";
        echo "<br><a href='edit_data.html'>Kembali Ke Formulir Edit</a>";
    }
}
?>
