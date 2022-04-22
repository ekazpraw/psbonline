<?php
	include "../conf/koneksi.php";
  include "../lib/inc.session.php";
	include "../format_tanggal.php";
  $query = mysqli_query($connect, "SELECT * FROM pendaftar_siswa WHERE pendaftar_siswa.no_daftar = '$_GET[tid]'");
  $p = mysqli_fetch_array($query);
?>
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Profile</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile Pengguna</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <a class="fancybox-effects-d" href="../uploads/foto/<?php echo $p['foto'];?>" title="Foto Siswa"><img class="img-responsive avatar-view" src="../uploads/foto/<?php echo $p['foto'];?>" width="200px" alt="Foto Profile" title="Change the avatar"></a>
                        </div>
                      </div>
                      <h3><?= $p['nama'] ?></h3>
                        <?php if ($p['keterangan'] == "Sudah Terverifikasi") { ?>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-check m-right-xs"></i> Data Telah Terverifikasi</button>
                        <?php }else{ ?>
                        <form enctype="multipart/form-data" action="?page=verifikasi" method="post">
                        <input type="hidden" name="no_daftar" value="<?php echo $p['no_daftar'];?>">
                        <button class="btn btn-warning" type="submit"><i class="fa fa-times m-right-xs"></i> Verifikasi Sekarang!</button>
                        </form>
                        <form enctype="multipart/form-data" action="?page=tolakverif" method="post">
                        <input type="hidden" name="no_daftar" value="<?php echo $p['no_daftar'];?>">
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash m-right-xs"></i> Tolak Verifikasi!</button>
                        </form>
                        <?php } ?>
                      <br />
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Biodata Diri:</h2>
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
                      <div class="col-md-12"><br>
                        <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <tr>
                            <td width="250">Nomor Pendaftaran</td>
                            <td><?php echo $p['no_daftar'];?></td>
                          </tr>
    											<tr>
    												<td width="150">NIK</td>
    												<td><?php echo $p['nik'];?></td>
    											</tr>
    											<tr>
                            <td width="250">Nama Lengkap Siswa</td>
                            <td><?php echo $p['nama'];?></td>
                          </tr>
                            <tr>
                            <td width="250">Nama Panggilan Siswa</td>
                            <td><?php echo $p['nama'];?></td>
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
    												<td width="150">Tempat, Tanggal Lahir</td>
    												<td><?php echo $p['tempat_lahir'];?>, <?php echo indonesian_date($p['tgl_lahir']);?></td>
    											</tr>
                          <tr>
                            <td width="150">Nomor Akte Lahir</td>
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
                            <td><?php echo $p['anak_ke'];?> Dari <?php echo $p['jml_saudara'];?> Bersaudara</td>
                          </tr>
    											<tr>
                            <td width="150">Riwayat Penyakit Bawaan</td>
                            <td><?php echo $p['penyakit'];?></td>
                          </tr>
    											<tr>
                            <td width="150">Status Sekolah </td>
                            <td><?php echo $p['status_sekolah'];?></td>
                          </tr>
    											<tr>
                            <td width="150">(Jika Pindahan:) Nama Sekolah Asal</td>
                            <td><?php echo $p['nama_sekolah'];?></td>
                          </tr>
    											<tr>
                            <td width="150">(Jika Pindahan:) NIS Sekolah Asal</td>
                            <td><?php echo $p['nis_lama'];?></td>
                          </tr>
                          <tr>
                            <td width="150">(Jika Pindahan:) Alamat Sekolah Asal</td>
                            <td><?php echo $p['alamat_sekolah'];?></td>
                          </tr>
                                                      <tr>
                            <td width="150">(Jika Pindahan:) Tanggal Pindah</td>
                            <td><?php echo $p['tgl_pindah'];?></td>
                          </tr>
                                                      <tr>
                            <td width="150">(Jika Pindahan:) Tingkatan Kelas Sekolah Asal</td>
                            <td><?php echo $p['tingkat_kelas'];?></td>
                          </tr>
                                                      <tr>
                            <td width="150">(Jika Pindahan:) Alasan Pindah dari Sekolah Asal</td>
                            <td><?php echo $p['alasan_pindah'];?></td>
                          </tr>
                            </table>
                          </div>
                          </div>
                          </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                        </div>
                      </div>
                      <br />
                    </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Biodata Orang Tua</h2>
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
                      <div class="col-md-12"><br>
                        <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <tr>
                            <td width="150">Nomor Kartu Keluarga</td>
                            <td><?php echo $p['nomor_kk'];?></td>
                          </tr>
                          <tr>
                            <td width="150">Nama Ayah Siswa/i</td>
                            <td><?php echo $p['nama_ayah'];?></td>
                          </tr>
                          <tr>
                            <td width="150">NIK Ayah Siswa/i</td>
                            <td><?php echo $p['nik_ayah'];?></td>
                          </tr>
                          <tr>
                            <td width="150">Pendidikan Ayah Siswa/i</td>
                            <td><?php echo $p['pen_ayah'];?></td>
                          </tr>
                          <tr>
                            <td width="150">Pekerjaan Ayah Siswa/i</td>
                            <td><?php echo $p['pek_ayah'];?></td>
                          </tr>
                          <tr>
                            <td width="150">Jabatan Pekerjaan Ayah Siswa/i</td>
                            <td><?php echo $p['jab_ayah'];?></td>
                          </tr>
    											<tr>
                            <td width="150">Alamat Kantor Ayah Siswa/i</td>
                            <td><?php echo $p['alkan_ayah'];?></td>
                          </tr>
    											<tr>
                            <td width="150">Gaji Bulanan Ayah Siswa/i</td>
                            <td><?php echo $p['gaji_ayah'];?></td>
                          </tr>
    											<tr>
                            <td width="150">Nomor HP Ayah Siswa/i</td>
                            <td><?php echo $p['telp_ayah'];?></td>
                          </tr>
                          <tr>
                            <td width="150">Nama Ibu Siswa/i</td>
                            <td><?php echo $p['nama_ibu'];?></td>
                          </tr>
                          <tr>
                            <td width="150">NIK Ibu Siswa/i</td>
                            <td><?php echo $p['nik_ibu'];?></td>
                          </tr>
                          <tr>
                            <td width="150">Pendidikan Ibu Siswa/i</td>
                            <td><?php echo $p['pen_ibu'];?></td>
                          </tr>
                          <tr>
                            <td width="150">Pekerjaan Ibu Siswa/i</td>
                            <td><?php echo $p['pek_ibu'];?></td>
                          </tr>
                          <tr>
                            <td width="150">Jabatan Pekerjaan Ibu Siswa/i</td>
                            <td><?php echo $p['jab_ibu'];?></td>
                          </tr>
    											<tr>
                            <td width="150">Alamat Kantor Ibu Siswa/i</td>
                            <td><?php echo $p['alkan_ibu'];?></td>
                          </tr>
    											<tr>
                            <td width="150">Gaji Bulanan Ibu Siswa/i</td>
                            <td><?php echo $p['gaji_ibu'];?></td>
                          </tr>
    											<tr>
                            <td width="150">Nomor HP Ibu Siswa/i</td>
                            <td><?php echo $p['telp_ibu'];?></td>
                          </tr>
    											<tr>
                            </table>
                          </div>
                          </div>
                          </div>
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                        </div>
                      </div>
                      <br />
                    </div>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Data Kelengkapan Berkas - Berkas</h2>
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
                      <div class="col-md-12"><br>
                        <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                                                  <tr>
                            <td width="150">Kartu Keluarga</td>
                            <td><a class="fancybox" href="../uploads/kk/<?php echo $p['kk'];?>" data-fancybox-group="gallery" title="Gambar Ijasah" width="100%"><img src="../uploads/kk/<?php echo $p['kk'];?>" width="100px" alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
                            </td>
                          </tr>
                                                    <tr>
                            <td width="150">Akte Lahir</td>
                            <td><a class="fancybox" href="../uploads/ak/<?php echo $p['ak'];?>" data-fancybox-group="gallery" title="Gambar Ijasah" width="100%"><img src="../uploads/ak/<?php echo $p['ak'];?>" width="100px"  alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
                            </td>
                          </tr>
                                                    <tr>
                            <td width="150">E-KTP Orang Tua</td>
                            <td><a class="fancybox" href="../uploads/ektp/<?php echo $p['ektp'];?>" data-fancybox-group="gallery" title="Gambar Ijasah" width="100%"><img src="../uploads/ektp/<?php echo $p['ektp'];?>" width="100px"  alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
                            </td>
                          </tr>
                                                    <tr>
                            <td width="150">Surat Keterangan Asal Sekolah</td>
                            <td><a class="fancybox" href="../uploads/skas/<?php echo $p['skas'];?>" data-fancybox-group="gallery" title="Gambar Ijasah" width="100%"><img src="../uploads/skas/<?php echo $p['skas'];?>" width="100px"  alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
                            </td>
                          </tr>
                                                    <tr>
                            <td width="150">Pas Foto 4x6</td>
                            <td><a class="fancybox" href="../uploads/foto/<?php echo $p['foto'];?>" data-fancybox-group="gallery" title="Gambar Ijasah" width="100%"><img src="../uploads/foto/<?php echo $p['foto'];?>" width="100px"  alt="Thumbnail Image" class="img-thumbnail img-responsive"></a>
                            </td>
                          </tr>
                            </table>
                        </div>
                      </div>
                      <!-- end of user-activity-graph -->
                    </div>
                  </div>
            </div>
          </div>
          </div>
          </div>
