  <?php
  
    include '../koneksi.php';
    $npsn = $_SESSION['npsn'];
    $query = mysqli_query($conn, "SELECT * FROM profil WHERE npsn = $npsn");
    $profil = mysqli_fetch_array($query, MYSQLI_BOTH);

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Guru
        <small><?php echo "$profil[nama_sekolah]"; ?></small>
      </h1>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Data Guru</h3>
              <button class="fa fa-plus btn btn-info edit" id='tambahdata' data-toggle='modal' data-target='#tambahmodal'></button>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <div class='table_responsive'>
              <table id = 'data_guru'>
                <thead>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Tahun Ajaran</th>
                  <th>NBM</th>
                  <th>Nama</th>
                  <th>Bidang</th>
                  <th>NUPTK</th>
                  <th>NIP</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Pangkat</th>
                  <th>Tanggal Pengangkatan</th>
                  <th>Sertifikasi Guru</th>
                  <th>TMT Sertifikasi</th>
                  <th>JK</th>
                  <th>Status Pegawai</th>
                  <th>Organisasi</th>
                  <th>Alamat</th>
                  <th>RT RW</th>
                  <th>Kelurahan</th>
                  <th>Kecamatan</th>
                  <th>Kabupaten</th>
                  <th>Provinsi</th>
                  <th>Pendidikan</th>
                  <th>Jurusan</th>
                  <th>Universitas</th>
                  <th>Tahun Lulus</th>
                </thead>
                <tbody>
                  <?php 
                  $npsn = $_SESSION['npsn'];
                  $query = mysqli_query($conn, "SELECT * FROM data_guru WHERE npsn = '$npsn'");
                  $x = 1;
                  while ($guru = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                    echo "<tr>
                          <td>$x</td> 
                          <td>"; ?>
                              <small class='fa fa-edit btn btn-info edit' id='editdata<?php echo$x;?>' data-toggle='modal' data-target='#editmodal<?php echo$x;?>' style='margin : 0 1px;'></small>

                              <div id="editmodal<?php echo$x;?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss ="modal">&times;</button>
                                        <h4 class="modal-title">Edit Data</h4>
                                      </div>
                                      <div class="modal-body">

                                        <style type="text/css">
                                          #editform .form-group{
                                            display: block;
                                            margin-bottom: 15px;

                                          }
                                          #editform .form-group .form-control{
                                            width: 100%;
                                            
                                          }
                                          #editform .form-group .col-sm-12{
                                            padding-right: 15px !important;
                                            padding-left: 15px !important;
                                          }
                                        </style>
                                      <?php  
                                        $queryedit = mysqli_query($conn, "SELECT * FROM data_guru WHERE nama_guru = '$guru[nama_guru]'");
                                        $row   = mysqli_fetch_array($queryedit, MYSQLI_BOTH);
                                      ?>
                                      <form class="form-horizontal" action='pages/proses-tambah-data-guru.php?val=edit&nama=<?php echo "$row[nama_guru]"?>' method="POST" id="editform">
                                        <div class="form-group">
                                          <label for="tahunajaran" class="col-sm-4 control-label" style="text-align: left;">Tahun Ajaran</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="tahunajaran" id="tahunajaran" class="form-control" value='<?php echo "$row[tahun_ajaran]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="nbm" class="col-sm-4 control-label" style="text-align: left;">NBM</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nbm" id="nbm" class="form-control" value='<?php echo "$row[nbm]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="nama" class="col-sm-4 control-label" style="text-align: left;">Nama</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nama" id="nama" class="form-control" value='<?php echo "$row[nama_guru]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="bidang" class="col-sm-4 control-label" style="text-align: left;">Bidang</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="bidang" id="bidang" class="form-control" value='<?php echo "$row[bidang]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="nuptk" class="col-sm-4 control-label" style="text-align: left;">NUPTK</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nuptk" id="nuptk" class="form-control" value='<?php echo "$row[nuptk]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="nip" class="col-sm-4 control-label" style="text-align: left;">NIP</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nip" id="nip" class="form-control" value='<?php echo "$row[nip]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tempat_lahir" class="col-sm-4 control-label" style="text-align: left;">Tempat Lahir</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value='<?php echo "$row[tempat_lahir]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tgl_lahir" class="col-sm-4 control-label" style="text-align: left;">Tanggal Lahir</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value='<?php echo "$row[tgl_lahir]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="telepon" class="col-sm-4 control-label" style="text-align: left;">Telepon</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="telepon" id="telepon" class="form-control" value='<?php echo "$row[telepon]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="email" class="col-sm-4 control-label" style="text-align: left;">Email</label>
                                          <div class="col-sm-8">
                                            <input type="email" name="email" id="email" class="form-control" value='<?php echo "$row[email]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="pangkat" class="col-sm-4 control-label" style="text-align: left;">Pangkat</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="pangkat" id="pangkat" class="form-control" value='<?php echo "$row[pangkat_golruang]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tgl_pengangkatan" class="col-sm-4 control-label" style="text-align: left;">Tanggal Pengangkatan</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="tgl_pengangkatan" id="tgl_pengangkatan" class="form-control" value='<?php echo "$row[tgl_pengangkatan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="sertifikasi_guru" class="col-sm-4 control-label" style="text-align: left;">Sertifikasi</label>
                                          <div class="col-sm-8">
                                            <?php $sert = $row['sertifikasi_guru'] ?>
                                            <select name="sertifikasi_guru" id="sertifikasi_guru" class="form-control">
                                              <option value='Sudah' <?php if($sert == 'Sudah'){echo 'selected';}?>>Sudah</option>
                                              <option Value='Belum' <?php if($sert == 'Belum'){echo 'selected';}?>>Belum</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tmt_sertifikasi" class="col-sm-4 control-label" style="text-align: left;">TMT Sertifikasi</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="tmt_sertifikasi" id="tmt_sertifikasi" class="form-control" value='<?php echo "$row[tmt_sertifikasi]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="jk" class="col-sm-4 control-label" style="text-align: left;">Jenis Kelamin</label>
                                          <div class="col-sm-8">
                                            <select name="jk" id="jk" class="form-control">
                                              <option value="L" <?php if($row['jk'] == 'L'){echo 'selected';}?>>Laki Laki</option>
                                              <option Value="P" <?php if($row['jk'] == 'P'){echo 'selected';}?>>Perempuan</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="sts_pegawai" class="col-sm-4 control-label" style="text-align: left;">Status Pegawai</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="sts_pegawai" id="sts_pegawai" class="form-control" value='<?php echo "$row[sts_pegawai]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="organisasi" class="col-sm-4 control-label" style="text-align: left;">Organisasi</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="organisasi" id="organisasi" class="form-control" value='<?php echo "$row[organisasi]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="alamat" class="col-sm-4 control-label" style="text-align: left;">Alamat</label>
                                          <div class="col-sm-8">
                                            <textarea type="text" name="alamat" id="alamat" class="form-control"><?php echo "$row[alamat]";?></textarea>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="rt_rw" class="col-sm-4 control-label" style="text-align: left;">RT/RW</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="rt_rw" id="rt_rw" class="form-control" value='<?php echo "$row[rt_rw]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kel" class="col-sm-4 control-label" style="text-align: left;">Kelurahan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kel" id="kel" class="form-control" value='<?php echo "$row[kelurahan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kec" class="col-sm-4 control-label" style="text-align: left;">Kecamatan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kec" id="kec" class="form-control" value='<?php echo "$row[kec]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kab" class="col-sm-4 control-label" style="text-align: left;">Kabupaten</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kab" id="kab" class="form-control" value='<?php echo "$row[kab]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="prov" class="col-sm-4 control-label" style="text-align: left;">Provinsi</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="prov" id="prov" class="form-control" value='<?php echo "$row[prov]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="pendidikan" class="col-sm-4 control-label" style="text-align: left;">Pendidikan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="pendidikan" id="pendidikan" class="form-control" value='<?php echo "$row[pendidikan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="jurusan" class="col-sm-4 control-label" style="text-align: left;">Jurusan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="jurusan" id="jurusan" class="form-control" value='<?php echo "$row[jurusan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="univ" class="col-sm-4 control-label" style="text-align: left;">Universitas</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="univ" id="univ" class="form-control" value='<?php echo "$row[univ]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="thn_lulus" class="col-sm-4 control-label" style="text-align: left;">Tahun Lulus</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="thn_lulus" id="thn_lulus" class="form-control" value='<?php echo "$row[thn_lulus]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="col-sm-12">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="submit" value="Simpan">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="hapus" value="Hapus">
                                          </div>
                                        </div>

                                        
                                      </form>                                        

                                      </div>

                                    </div>
                                  </div>
                                </div>


                              </td>
                    
                          <?php echo"
                          <td>$guru[tahun_ajaran]</td>
                          <td>$guru[nbm]</td>
                          <td>$guru[nama_guru]</td>
                          <td>$guru[bidang]</td>
                          <td>$guru[nuptk]</td>
                          <td>$guru[nip]</td>
                          <td>$guru[tempat_lahir]</td>
                          <td>$guru[tgl_lahir]</td>
                          <td>$guru[telepon]</td>
                          <td>$guru[email]</td>
                          <td>$guru[pangkat_golruang]</td>
                          <td>$guru[tgl_pengangkatan]</td>
                          <td>$guru[sertifikasi_guru]</td>
                          <td>$guru[tmt_sertifikasi]</td>
                          <td>$guru[jk]</td>
                          <td>$guru[sts_pegawai]</td>
                          <td>$guru[organisasi]</td> 
                          <td>$guru[alamat]</td> 
                          <td>$guru[rt_rw]</td>
                          <td>$guru[kelurahan]</td>   
                          <td>$guru[kec]</td> 
                          <td>$guru[kab]</td>
                          <td>$guru[prov]</td> 
                          <td>$guru[pendidikan]</td> 
                          <td>$guru[jurusan]</td> 
                          <td>$guru[univ]</td> 
                          <td>$guru[thn_lulus]</td>  
                          </tr>
                    ";
                  $x++;     
                  }
                   ?>
                </tbody>
              </table>
     
              </div>
            </div>
          </div>

        </section>
      </div>
      <!-- ./ row -->
    </section>
    <!-- ./ content -->

  </div>
  <!-- /.content-wrapper -->

  <div id="tambahmodal" class="modal fade" role='dialog'>
    <div class="modal-dialog">
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss ='modal'>&times;</button>
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">

          <form class="form-horizontal" action="pages/proses-tambah-data-guru.php?val=tambah" method="POST">
            <div class="form-group">
              <label for="tahunajaran" class="col-sm-4 control-label" style="text-align: left;">Tahun Ajaran</label>
              <div class="col-sm-8">
                <input type="text" name="tahunajaran" id="tahunajaran" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="nbm" class="col-sm-4 control-label" style="text-align: left;">NBM</label>
              <div class="col-sm-8">
                <input type="text" name="nbm" id="nbm" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="nama" class="col-sm-4 control-label" style="text-align: left;">Nama</label>
              <div class="col-sm-8">
                <input type="text" name="nama" id="nama" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="bidang" class="col-sm-4 control-label" style="text-align: left;">Bidang</label>
              <div class="col-sm-8">
                <input type="text" name="bidang" id="bidang" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="nuptk" class="col-sm-4 control-label" style="text-align: left;">NUPTK</label>
              <div class="col-sm-8">
                <input type="text" name="nuptk" id="nuptk" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="nip" class="col-sm-4 control-label" style="text-align: left;">NIP</label>
              <div class="col-sm-8">
                <input type="text" name="nip" id="nip" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="tempat_lahir" class="col-sm-4 control-label" style="text-align: left;">Tempat Lahir</label>
              <div class="col-sm-8">
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="tgl_lahir" class="col-sm-4 control-label" style="text-align: left;">Tanggal Lahir</label>
              <div class="col-sm-8">
                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="telepon" class="col-sm-4 control-label" style="text-align: left;">Telepon</label>
              <div class="col-sm-8">
                <input type="text" name="telepon" id="telepon" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-4 control-label" style="text-align: left;">Email</label>
              <div class="col-sm-8">
                <input type="email" name="email" id="email" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="pangkat" class="col-sm-4 control-label" style="text-align: left;">Pangkat</label>
              <div class="col-sm-8">
                <input type="text" name="pangkat" id="pangkat" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="tgl_pengangkatan" class="col-sm-4 control-label" style="text-align: left;">Tanggal Pengangkatan</label>
              <div class="col-sm-8">
                <input type="date" name="tgl_pengangkatan" id="tgl_pengangkatan" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="sertifikasi_guru" class="col-sm-4 control-label" style="text-align: left;">Sertifikasi</label>
              <div class="col-sm-8">
                <select name="sertifikasi_guru" id="sertifikasi_guru" class="form-control">
                  <option value="Sudah">Sudah</option>
                  <option Value="Belum">Belum</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="tmt_sertifikasi" class="col-sm-4 control-label" style="text-align: left;">TMT Sertifikasi</label>
              <div class="col-sm-8">
                <input type="date" name="tmt_sertifikasi" id="tmt_sertifikasi" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="jk" class="col-sm-4 control-label" style="text-align: left;">Jenis Kelamin</label>
              <div class="col-sm-8">
                <select name="jk" id="jk" class="form-control">
                  <option value="L">Laki Laki</option>
                  <option Value="P">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="sts_pegawai" class="col-sm-4 control-label" style="text-align: left;">Status Pegawai</label>
              <div class="col-sm-8">
                <input type="text" name="sts_pegawai" id="sts_pegawai" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="organisasi" class="col-sm-4 control-label" style="text-align: left;">Organisasi</label>
              <div class="col-sm-8">
                <input type="text" name="organisasi" id="organisasi" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="alamat" class="col-sm-4 control-label" style="text-align: left;">Alamat</label>
              <div class="col-sm-8">
                <textarea type="text" name="alamat" id="alamat" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="rt_rw" class="col-sm-4 control-label" style="text-align: left;">RT/RW</label>
              <div class="col-sm-8">
                <input type="text" name="rt_rw" id="rt_rw" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="kel" class="col-sm-4 control-label" style="text-align: left;">Kelurahan</label>
              <div class="col-sm-8">
                <input type="text" name="kel" id="kel" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="kec" class="col-sm-4 control-label" style="text-align: left;">Kecamatan</label>
              <div class="col-sm-8">
                <input type="text" name="kec" id="kec" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="kab" class="col-sm-4 control-label" style="text-align: left;">Kabupaten</label>
              <div class="col-sm-8">
                <input type="text" name="kab" id="kab" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="prov" class="col-sm-4 control-label" style="text-align: left;">Provinsi</label>
              <div class="col-sm-8">
                <input type="text" name="prov" id="prov" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="pendidikan" class="col-sm-4 control-label" style="text-align: left;">Pendidikan</label>
              <div class="col-sm-8">
                <input type="text" name="pendidikan" id="pendidikan" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="jurusan" class="col-sm-4 control-label" style="text-align: left;">Jurusan</label>
              <div class="col-sm-8">
                <input type="text" name="jurusan" id="jurusan" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="univ" class="col-sm-4 control-label" style="text-align: left;">Universitas</label>
              <div class="col-sm-8">
                <input type="text" name="univ" id="univ" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="thn_lulus" class="col-sm-4 control-label" style="text-align: left;">Tahun Lulus</label>
              <div class="col-sm-8">
                <input type="text" name="thn_lulus" id="thn_lulus" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <input type="submit" style="float: right; position: relative; margin-top: 20px;" class="btn btn-info" name="submit" value="Tambah">
              </div>
            </div>

            
          </form>

        </div>
      </div>

    </div>
  </div>





  <style type="text/css">
    .paginate_button{
      padding: 0 !important;
      margin-top: 20px;
    }
    .edit{
      float: right; 
      cursor: pointer; 
      margin: 0; 
      padding : 2px 10px; 
      border: none; 
      background-color: none
    }
    .table-responsive{
      width: 100%;
      overflow : scroll;
    }
    #data_guru_wrapper .row:nth-child(2){
      padding: 15px;
    }
    #data_guru_wrapper .row .col-sm-12{
      width: 100%;
      overflow-x: auto;
      padding: 0;
    }
    #data_guru_wrapper .row .col-sm-12 table{
      max-width: 5000px;
    }
    #data_guru_wrapper .row .col-sm-12 td{
      min-width: 100px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(1){
      min-width: 10px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(2){
      min-width: 30px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(5){
      min-width: 200px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(3){
      min-width: 100px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(6){
      min-width: 150px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(20){
      min-width: 500px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(23){
      min-width: 200px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(27){
      min-width: 200px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(28){
      min-width: 200px;
    }
  </style>

  <script type="text/javascript">
  $(function(){
    $('#data_guru').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });

  });
</script>