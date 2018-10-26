<?php

   include '../koneksi.php';

   $id = $_GET['id'];
   $query = mysqli_query($conn, "SELECT data_guru.*, profil.nama_sekolah FROM data_guru JOIN profil ON data_guru.npsn = profil.npsn WHERE id = $id");
   $guru = mysqli_fetch_array($query, MYSQLI_BOTH);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sekolah
        <small>Madrasah Aliyah</small>
      </h1>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="box box-info">
            <div class="box-header" style="margin-bottom: 2em">
              <h3 style="margin: 1em 0 0 0;"><?php echo "$guru[nama_guru]"; ?></h3>
              <form method="post" action='pages/hapus-guru.php?id=<?php echo "$guru[id]"; ?>'>
                <button class="fa fa-trash btn btn-danger edit" onclick="checkDelete()" id='hapusprofil' style="font-size:16px; display: inline-block; float: right;"></button>
              </form>
              
            </div>
          </div>
        </section>

        <section class="col-lg-6 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Profil Guru</h3>
              <button class="fa fa-edit btn btn-info edit" id='editprofil' style="display: block;"></button>
              <button class="btn btn-info edit" id='canceleditprofil' style="display: none;" >Cancel</button>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <table style="display: table; min-width: 100%" id='profil'>
                <tbody>
                  <tr>
                    <td>Nama Guru</td>
                    <td><?php echo "$guru[nama_guru]"; ?></td>
                  </tr>
                  <tr>
                    <td>Tempat Lahir</td>
                    <td><?php echo "$guru[tempat_lahir]"; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td><?php echo "$guru[tgl_lahir]"; ?></td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td><?php echo "$guru[telepon]"; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo "$guru[email]"; ?></td>
                  </tr>
                  <tr>
                    <td>JK</td>
                    <td><?php echo "$guru[jk]"; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?php echo "$guru[alamat]"; ?></td>
                  </tr>
                  <tr>
                    <td>RT RW</td>
                    <td><?php echo "$guru[rt_rw]"; ?></td>
                  </tr>
                  <tr>
                    <td>Kelurahan</td>
                    <td><?php echo "$guru[kelurahan]"; ?></td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td><?php echo "$guru[kec]"; ?></td>
                  </tr>
                  <tr>
                    <td>Kabupaten</td>
                    <td><?php echo "$guru[kab]"; ?></td>
                  </tr>
                  <tr>
                    <td>Provinsi</td>
                    <td><?php echo "$guru[prov]"; ?></td>
                  </tr>
                </tbody>
              </table>

              <form id="edit-profil" style="display: none;" method="POST" action='pages/proses-profil-guru.php?item=profil&id=<?php echo "$guru[id]"; ?>'>
                <table>
                  <tr>
                    <td style="width: 25%"><b>Nama Guru</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='nama_guru' value = '$guru[nama_guru]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tempat Lahir</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='tempat_lahir' value = '$guru[tempat_lahir]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tanggal lahir</b></td>
                    <td><?php echo "<input class='form-control' type='date' name='tgl_lahir' value = '$guru[tgl_lahir]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Telepon</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='telepon' value = '$guru[telepon]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Email</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='email' value = '$guru[email]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Jenis Kelamin</b></td>
                    <?php $jenjang = $guru['jk'] ?>
                    <td><select class='form-control' type='text' name='jk'>
                          <option value='L'  <?php if($jenjang == 'L'){echo "selected";} ?> >Laki laki</option>
                          <option value='P' <?php if($jenjang == 'P'){echo "selected";} ?>>perempuan</option>
                        </select></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Alamat</b></td>
                    <td><?php echo "<textarea class='form-control' type='text' name='alamat'>$guru[alamat]</textarea>";?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>RT RW</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='rt_rw' value = '$guru[rt_rw]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kelurahan</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='kelurahan' value = '$guru[kelurahan]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kecamatan</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='kec' value = '$guru[kec]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kabupaten</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='kab' value = '$guru[kab]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Provinsi</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='prov' value = '$guru[prov]'>"; ?></td>
                  </tr>
                </table>
                <div class="form-group">
                    <div class="col-sm-12">
                      <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="submit" value="Simpan">
                    </div>
                 </div>
              </form>
            </div>
          </div>

        </section>

        <section class="col-lg-6 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Keterangan Lain-Lain</h3>
              <button class="fa fa-edit btn btn-info edit" id='editket' style="display: block;"></button>
              <button class="btn btn-info edit" id='canceleditket' style="display: none;" >Cancel</button>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <table id='ket' style="display: table;">
                <tbody>
                  <tr>
                    <td>Tahun Ajaran</td>
                    <td><?php echo "$guru[tahun_ajaran]"; ?></td>
                  </tr>
                  <tr>
                    <td>Nama Sekolah</td>
                    <td><?php echo "$guru[nama_sekolah]"; ?></td>
                  </tr>
                  <tr>
                    <td>NBM</td>
                    <td><?php echo "$guru[nbm]"; ?></td>
                  </tr>
                  <tr>
                    <td>Bidang</td>
                    <td><?php echo "$guru[bidang]"; ?></td>
                  </tr>
                  <tr>
                    <td>NUPTK</td>
                    <td><?php echo "$guru[nuptk]"; ?></td>
                  </tr>
                  <tr>
                    <td>NIP</td>
                    <td><?php echo "$guru[nip]"; ?></td>
                  </tr>
                  <tr>
                    <td>Pangkat Golongan Ruang</td>
                    <td><?php echo "$guru[pangkat_golruang]"; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Pengangkatan</td>
                    <td><?php echo "$guru[tgl_pengangkatan]"; ?></td>
                  </tr>
                  <tr>
                    <td>Sertifikasi Guru</td>
                    <td><?php echo "$guru[sertifikasi_guru]"; ?></td>
                  </tr>
                  <tr>
                    <td>TMT sertifikasi</td>
                    <td><?php echo "$guru[tmt_sertifikasi]"; ?></td>
                  </tr>
                  <tr>
                    <td>Status Pegawai</td>
                    <td><?php echo "$guru[sts_pegawai]"; ?></td>
                  </tr>
                  <tr>
                    <td>Organisasi</td>
                    <td><?php echo "$guru[organisasi]"; ?></td>
                  </tr>
                  <tr>
                    <td>Pendidikan</td>
                    <td><?php echo "$guru[pendidikan]"; ?></td>
                  </tr>
                  <tr>
                    <td>Jurusan</td>
                    <td><?php echo "$guru[jurusan]"; ?></td>
                  </tr>
                  <tr>
                    <td>Universitas</td>
                    <td><?php echo "$guru[univ]"; ?></td>
                  </tr>
                  <tr>
                    <td>Tahun Lulus</td>
                    <td><?php echo "$guru[thn_lulus]"; ?></td>
                  </tr>
                </tbody>
              </table>

              <form id="edit-ket" style="display: none;" method="POST" action='pages/proses-profil-guru.php?item=ket&id=<?php echo "$guru[id]"; ?>'>
                <table>
                  <tr>
                    <td style="width: 25%"><b>Tahun Ajaran</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='tahunajaran' value = '$guru[tahun_ajaran]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NPSN</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='npsn' value = '$guru[npsn]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NBM</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='nbm' value = '$guru[nbm]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Bidang</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='bidang' value = '$guru[bidang]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NUPTK</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='nuptk' value = '$guru[nuptk]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NIP</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='nip' value = '$guru[nip]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Pangkat Golongan Ruang</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='pangkat_golruang' value = '$guru[pangkat_golruang]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tanggal Pengangkatan</b></td>
                    <td><?php echo "<input class='form-control' type='date' name='tgl_pengangkatan' value = '$guru[tgl_pengangkatan]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Sertifikasi Guru</b></td>
                    <td><?php $sert = $guru['sertifikasi_guru'] ?>
                        <select name="sertifikasi_guru" id="sertifikasi_guru" class="form-control">
                            <option value='Sudah' <?php if($sert == 'Sudah'){echo 'selected';}?>>Sudah</option>
                            <option Value='Belum' <?php if($sert == 'Belum'){echo 'selected';}?>>Belum</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>TMT Sertifikasi</b></td>
                    <td><?php echo "<input class='form-control' type='date' name='tmt_sertifikasi' value = '$guru[tmt_sertifikasi]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Status Pegawai</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='sts_pegawai' value = '$guru[sts_pegawai]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Organisasi</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='organisasi' value = '$guru[organisasi]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Pendidikan</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='pendidikan' value = '$guru[pendidikan]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Jurusan</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='jurusan' value = '$guru[jurusan]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Universitas</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='univ' value = '$guru[univ]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tahun Lulus</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='thn_lulus' value = '$guru[thn_lulus]'>"; ?></td>
                  </tr>

                </table>

                 <div class="form-group">
                    <div class="col-sm-12">
                      <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="submit" value="Simpan">
                    </div>
                 </div>
              </form>
            </div>
          </div>

        </section>
      </div>
      <!-- ./ row -->
    </section>
    <!-- ./ content -->

  </div>
  <!-- /.content-wrapper -->
  <style type="text/css">
    .edit{
      float: right; 
      cursor: pointer; 
      margin: 0; 
      padding : 2px 10px; 
      border: none; 
      background-color: none
    }
  </style>

  <script type="text/javascript">
   function checkDelete(){
        var res = confirm('Hapus?');
        if(!res){
          event.preventDefault()
        }
    }
    $('#editprofil').click(function(){
        $('#profil').css('display', 'none');
        $('#edit-profil').css('display', 'block');
        $('#editprofil').css('display', 'none');
        $('#canceleditprofil').css('display', 'block');
    })
    $('#canceleditprofil').click(function(){
        $('#profil').css('display', 'table');
        $('#edit-profil').css('display', 'none');
        $('#editprofil').css('display', 'block');
        $('#canceleditprofil').css('display', 'none');
    })

    $('#editket').click(function(){
        $('#ket').css('display', 'none');
        $('#edit-ket').css('display', 'block');
        $('#editket').css('display', 'none');
        $('#canceleditket').css('display', 'block');
    })
    $('#canceleditket').click(function(){
        $('#ket').css('display', 'table');
        $('#edit-ket').css('display', 'none');
        $('#editket').css('display', 'block');
        $('#canceleditket').css('display', 'none');
    })

  </script>