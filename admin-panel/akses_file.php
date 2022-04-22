<?php
	$pg = isset($_GET['page']) ? $_GET['page'] : '' ; /*-- PHP 5 --*/
	switch ($pg) {

    //-- sign out --//
		case 'sign-out' :
			if(!file_exists ("../admin-panel/sign_out.php"))die("File sign out tidak tersedia.");
			include ("../admin-panel/sign_out.php");
			break;

		//--------------------------------------------------------------------------------------------------------------------//

		//-- dashboard --//
		case 'dashboard' :
			if(!file_exists ("../admin-panel/dashboard_admin.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/dashboard_admin.php");
			break;

		// =====================================Pendaftar=================================================
		//-- dashboard --//
	  case 'view-pendaftar' :
	  	if(!file_exists ("../admin-panel/pages/pendaftar/view_pendaftar.php"))die("File dashboard tidak tersedia.");
	  	include ("../admin-panel/pages/pendaftar/view_pendaftar.php");
	  	break;

			//-- dashboard --//
		case 'del-pendaftar' :
			if(!file_exists ("../admin-panel/pages/pendaftar/del_pendaftar.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/pendaftar/del_pendaftar.php");
			break;

			// =================================Admin dan Super Admin==========================================
			//-- dashboard --//
		case 'view-admin' :
		 	if(!file_exists ("../admin-panel/pages/admin/view_admin.php"))die("file dashboard tidak tersedia.");
		 	include ("../admin-panel/pages/admin/view_admin.php");
		 	break;
			//-- dashboard --//
		case 'profile-admin' :
		 	if(!file_exists ("../admin-panel/pages/admin/profile_admin.php"))die("file dashboard tidak tersedia.");
		 	include ("../admin-panel/pages/admin/profile_admin.php");
		 	break;

			//-- dashboard --//
		case 'ubah-password' :
		 	if(!file_exists ("../admin-panel/pages/admin/ubah_pass.php"))die("file dashboard tidak tersedia.");
		 	include ("../admin-panel/pages/admin/ubah_pass.php");
		 	break;
			//-- dashboard --//
		case 'update-pass' :
		 	if(!file_exists ("../admin-panel/pages/admin/update_pass.php"))die("file dashboard tidak tersedia.");
		 	include ("../admin-panel/pages/admin/update_pass.php");
		 	break;

			//-- dashboard --//
		case 'edit-profile' :
		 	if(!file_exists ("../admin-panel/pages/admin/profile_edit.php"))die("File dashboard tidak tersedia.");
		 	include ("../admin-panel/pages/admin/profile_edit.php");
		 	break;
			//-- dashboard --//
		case 'update-profile' :
		 	if(!file_exists ("../admin-panel/pages/admin/profile_update.php"))die("File dashboard tidak tersedia.");
		 	include ("../admin-panel/pages/admin/profile_update.php");
		 	break;
			//-- dashboard --//
		case 'new-admin' :
		 	if(!file_exists ("../admin-panel/pages/admin/new_admin.php"))die("File dashboard tidak tersedia.");
		 	include ("../admin-panel/pages/admin/new_admin.php");
		 	break;

			//-- dashboard --//
		case 'edit-admin' :
		 	if(!file_exists ("../admin-panel/pages/admin/edit_admin.php"))die("File dashboard tidak tersedia.");
		 	include ("../admin-panel/pages/admin/edit_admin.php");
		 	break;

			//-- dashboard --//
		case 'update-admin' :
		 	if(!file_exists ("../admin-panel/pages/admin/update_admin.php"))die("File dashboard tidak tersedia.");
		 	include ("../admin-panel/pages/admin/update_admin.php");
		 	break;

			//-- dashboard --//
		case 'save-admin' :
		 	if(!file_exists ("../admin-panel/pages/admin/save_admin.php"))die("File dashboard tidak tersedia.");
		 	include ("../admin-panel/pages/admin/save_admin.php");
		 	break;

			//-- dashboard --//
		case 'del-admin' :
			if(!file_exists ("../admin-panel/pages/admin/del_admin.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/admin/del_admin.php");
			break;

		// =====================================Waktu Pendaftaran================================================
		//-- dashboard --//
		case 'aktifasi' :
			if(!file_exists ("../admin-panel/pages/pendaftaran/aktifasi.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/pendaftaran/aktifasi.php");
			break;

			//-- dashboard --//
		case 'view-pendaftaran' :
			if(!file_exists ("../admin-panel/pages/pendaftaran/view_pendaftaran.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/pendaftaran/view_pendaftaran.php");
			break;

			//-- dashboard --//
		case 'save-pendaftaran' :
			if(!file_exists ("../admin-panel/pages/pendaftaran/save_pendaftaran.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/pendaftaran/save_pendaftaran.php");
			break;

			//-- dashboard --//
		case 'del-pendaftaran' :
			if(!file_exists ("../admin-panel/pages/pendaftaran/del_pendaftaran.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/pendaftaran/del_pendaftaran.php");
			break;

			//-- dashboard --//
		case 'edit-pendaftaran' :
			if(!file_exists ("../admin-panel/pages/pendaftaran/edit_pendaftaran.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/pendaftaran/edit_pendaftaran.php");
			break;

			//-- dashboard --//
		case 'update-pendaftaran' :
			if(!file_exists ("../admin-panel/pages/pendaftaran/update_pendaftaran.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/pendaftaran/update_pendaftaran.php");
			break;

			//-- dashboard --//
		case 'total-siswa' :
			if(!file_exists ("../admin-panel/pages/siswa/view_siswa.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/view_siswa.php");
			break;
			//-- dashboard --//
		case 'total-bayar' :
			if(!file_exists ("../admin-panel/pages/siswa/view_pembayaran.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/view_pembayaran.php");
			break;
			//-- dashboard --//
		case 'detail-siswa' :
			if(!file_exists ("../admin-panel/pages/siswa/detail_siswa.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/detail_siswa.php");
			break;
		case 'detail-bayar' :
			if(!file_exists ("../admin-panel/pages/siswa/detail_bayar.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/detail_bayar.php");
			break;
			//-- dashboard --//
		case 'verifikasi' :
			if(!file_exists ("../admin-panel/pages/siswa/verifikasi.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/verifikasi.php");
			break;
			//-- dashboard --//
		case 'tolakverif' :
			if(!file_exists ("../admin-panel/pages/siswa/tolak-verifikasi.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/tolak-verifikasi.php");
			break;
			//-- dashboard --//
		case 'terimapembayaran' :
			if(!file_exists ("../admin-panel/pages/siswa/terima.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/terima.php");
			break;
			//-- dashboard --//
		case 'tolakpembayaran' :
			if(!file_exists ("../admin-panel/pages/siswa/tolak.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/tolak.php");
			break;
			//-- dashboard --//
		case 'arsipkan' :
			if(!file_exists ("../admin-panel/pages/siswa/arsipkan.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/arsipkan.php");
			break;

			//-- dashboard --//
		case 'arsip-siswa' :
			if(!file_exists ("../admin-panel/pages/siswa/arsip.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/arsip.php");
			break;

			//-- dashboard --//
		case 'siswa-terverifikasi' :
			if(!file_exists ("../admin-panel/pages/siswa/terverifikasi.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/terverifikasi.php");
			break;

			//-- dashboard --//
		case 'siswa-belum_terverifikasi' :
			if(!file_exists ("../admin-panel/pages/siswa/belum_terverifikasi.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/siswa/belum_terverifikasi.php");
			break;

			//-- dashboard --//
		case 'view-laporan' :
			if(!file_exists ("../admin-panel/pages/laporan/view_laporan.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/laporan/view_laporan.php");
			break;

			//-- dashboard --//
		case 'detail-laporan' :
			if(!file_exists ("../admin-panel/pages/laporan/detail_laporan.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/laporan/detail_laporan.php");
			break;

			//-- dashboard --//
		case 'cetak-laporan' :
			if(!file_exists ("../admin-panel/pages/laporan/cetak_laporan.php"))die("File dashboard tidak tersedia.");
			include ("../admin-panel/pages/laporan/cetak_laporan.php");
			break;
		/*------------------------------------------------------------------------------------------------*/

	}
?>
