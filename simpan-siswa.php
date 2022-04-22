<?php
	include "conf/koneksi.php";
			/*---------------------------- ANTI XSS & SQL INJECTION ----------------------*/
			function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
			}
			/*-------------------------------------------------------------------*/
			// baca current date

			$id_daftar = antiinjection($_POST['id_daftar']);
			$no = antiinjection($_POST['nodaftar']);
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
			$arsip = "Tidak";

if(isset($_REQUEST['submit'])){
            $titik = ".";
				$target_dir = "uploads/kk/";
				$target_dir2 = "uploads/ak/";
				$target_dir3 = "uploads/ektp/";
				$target_dir4 = "uploads/skas/";
				$target_dir5 = "uploads/foto/";
		    $target_file = $target_dir . basename($_FILES["kk"]["name"]);
		    $target_file2 = $target_dir2 . basename($_FILES["ak"]["name"]);
		    $target_file3 = $target_dir3 . basename($_FILES["ektp"]["name"]);
		    $target_file4 = $target_dir4 . basename($_FILES["skas"]["name"]);
		    $target_file5 = $target_dir5 . basename($_FILES["foto"]["name"]);
				$kkbaru = $_FILES["kk"]["name"];
		        $akbaru = $_FILES["ak"]["name"];
		        $etkpbaru = $_FILES["ektp"]["name"];
		        $skasbaru = $_FILES["skas"]["name"];
		        $fotobaru = $_FILES["foto"]["name"];
		    $uploadOk = 1;
		    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
		    $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
		    $imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
		    $imageFileType5 = strtolower(pathinfo($target_file5,PATHINFO_EXTENSION));

// gambar yang ke 1
		    $check = getimagesize($_FILES["kk"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
					echo "<script>alert('File Bukan Gambar!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }

		    // Check file size
		    if ($_FILES["kk"]["size"] > 2000000) {
					echo "<script>alert('Gambar Tidak Boleh Lebih Dari 2MB');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Allow certain file formats
		    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
					echo "<script>alert('Gambar Hanya Boleh Berupa: JPG, PNG atau JPEG');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Check if $uploadOk is set to 0 by an error
		    if ($uploadOk == 0) {
					echo "<script>alert('Gambar Gagal Diupload!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		    // if everything is ok, try to upload file
		    } else {
		        if (move_uploaded_file($_FILES["kk"]["tmp_name"], $target_file)) {
		        } else {
							echo "<script>alert('Gambar Gagal Diupload!');</script>";
						 echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        }
		    }

// gambar yang ke 2
		    $check2 = getimagesize($_FILES["ak"]["tmp_name"]);
		    if($check2 !== false) {
		        $uploadOk = 1;
		    } else {
					echo "<script>alert('File Bukan Gambar!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }

		    // Check file size
		    if ($_FILES["ak"]["size"] > 2000000) {
					echo "<script>alert('Gambar Tidak Boleh Lebih Dari 2MB');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Allow certain file formats
		    if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") {
					echo "<script>alert('Gambar Hanya Boleh Berupa: JPG, PNG atau JPEG');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Check if $uploadOk is set to 0 by an error
		    if ($uploadOk == 0) {
					echo "<script>alert('Gambar Gagal Diupload!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		    // if everything is ok, try to upload file
		    } else {
		        if (move_uploaded_file($_FILES["ak"]["tmp_name"], $target_file2)) {
		        } else {
							echo "<script>alert('Gambar Gagal Diupload!');</script>";
						 echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        }
		    }          
          
// gambar yang ke 3
		    $check3 = getimagesize($_FILES["ektp"]["tmp_name"]);
		    if($check3 !== false) {
		        $uploadOk = 1;
		    } else {
					echo "<script>alert('File Bukan Gambar!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }

		    // Check file size
		    if ($_FILES["ektp"]["size"] > 2000000) {
					echo "<script>alert('Gambar Tidak Boleh Lebih Dari 2MB');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Allow certain file formats
		    if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg") {
					echo "<script>alert('Gambar Hanya Boleh Berupa: JPG, PNG atau JPEG');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Check if $uploadOk is set to 0 by an error
		    if ($uploadOk == 0) {
					echo "<script>alert('Gambar Gagal Diupload!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		    // if everything is ok, try to upload file
		    } else {
		        if (move_uploaded_file($_FILES["ektp"]["tmp_name"], $target_file3)) {
		        } else {
							echo "<script>alert('Gambar Gagal Diupload!');</script>";
						 echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        }
		    }

// gambar yang ke 4
		    $check4 = getimagesize($_FILES["skas"]["tmp_name"]);
		    if($check4 !== false) {
		        $uploadOk = 1;
		    } else {
					echo "<script>alert('File Bukan Gambar!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }

		    // Check file size
		    if ($_FILES["skas"]["size"] > 2000000) {
					echo "<script>alert('Gambar Tidak Boleh Lebih Dari 2MB');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Allow certain file formats
		    if($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg") {
					echo "<script>alert('Gambar Hanya Boleh Berupa: JPG, PNG atau JPEG');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Check if $uploadOk is set to 0 by an error
		    if ($uploadOk == 0) {
					echo "<script>alert('Gambar Gagal Diupload!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		    // if everything is ok, try to upload file
		    } else {
		        if (move_uploaded_file($_FILES["skas"]["tmp_name"], $target_file4)) {
		        } else {
							echo "<script>alert('Gambar Gagal Diupload!');</script>";
						 echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        }
		    }

// gambar yang ke 5
		    $check5 = getimagesize($_FILES["foto"]["tmp_name"]);
		    if($check5 !== false) {
		        $uploadOk = 1;
		    } else {
					echo "<script>alert('File Bukan Gambar!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }

		    // Check file size
		    if ($_FILES["foto"]["size"] > 2000000) {
					echo "<script>alert('Gambar Tidak Boleh Lebih Dari 2MB');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Allow certain file formats
		    if($imageFileType5 != "jpg" && $imageFileType5 != "png" && $imageFileType5 != "jpeg") {
					echo "<script>alert('Gambar Hanya Boleh Berupa: JPG, PNG atau JPEG');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        $uploadOk = 0;
		    }
		    // Check if $uploadOk is set to 0 by an error
		    if ($uploadOk == 0) {
					echo "<script>alert('Gambar Gagal Diupload!');</script>";
					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		    // if everything is ok, try to upload file
		    } else {
		        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file5)) {
		        } else {
							echo "<script>alert('Gambar Gagal Diupload!');</script>";
						 echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
		        }
		    }
			
	       $cek_user=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM pendaftar_siswa WHERE nik='$nik'"));
				if ($cek_user > 0) {
				        echo "<script>alert('NIK Sudah Terdaftar!');</script>";
      					echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
			} else {

            $result = mysqli_query($connect, "INSERT INTO pendaftar_siswa VALUES (
                    '$no',
					'$nik',
					'$nama',
					'$nama2',
					'$jk',
					'$alamat',
					'$tmpt',
					'$tgl',
					'$akte',
					'$tinggi',
					'$berat',
					'$anak_ke',
					'$jml_saudara',
					'$penyakit',
					'$status_sekolah',
					'$nama_sekolah',
					'$nis_lama',
					'$alamat_sekolah',
					'$tgl_pindah',
					'$tingkat_kelas',
					'$alasan_pindah',
                    
					'$nomor_kk',
					'$nama_ayah',
					'$nik_ayah',
					'$pen_ayah',
					'$pek_ayah',
					'$jab_ayah',
					'$alkan_ayah',
					'$telp_ayah',
					'$gaji_ayah',
					'$nama_ibu',
					'$nik_ibu',
					'$pen_ibu',
					'$pek_ibu',
					'$jab_ibu',
                    '$alkan_ibu',
                    '$telp_ibu',
                    '$gaji_ibu',
                    
                    '$jarak',
                    '$status_rumah',
                    
					'$kkbaru',
					'$akbaru',
					'$etkpbaru',
					'$skasbaru',
					'$fotobaru',
                    
					'$tgldaftar',
					'$ket',
					'$arsip',
					'$id_daftar')");
					if (!$result) {
							 die('Query Error : '.mysqli_errno($connect).
							 ' - '.mysqli_error($connect));
						}
								echo "<script>alert('Data Pendaftaran Sudah Tersimpan');</script>";
								echo "<meta http-equiv='refresh' content='0; url=dashboard-siswa'>";

			}
    }else{  // Jika gambar gagal diupload, Lakukan :
      echo "<script>alert('Data Pendaftaran Gagal Tersimpan!');</script>";
      echo "<meta http-equiv='refresh' content='0; url=formulir.html'>";
    }

?>
