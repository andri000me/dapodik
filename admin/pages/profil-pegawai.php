<?php

   include '../koneksi.php';

   $id = $_GET['id'];
   $query = mysqli_query($conn, "SELECT tenkependik.*, profil.nama_sekolah FROM tenkependik JOIN profil ON tenkependik.npsn = profil.npsn WHERE id = $id");
   $tenkependik = mysqli_fetch_array($query, MYSQLI_BOTH);
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
              <h3 style="margin: 1em 0 0 0;"><?php echo "$tenkependik[nama]"; ?></h3>
              <form method="post" action='pages/proses-profil-pegawai.php?item=hapus&id=<?php echo "$tenkependik[id]"; ?>'>
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
                    <td><?php echo "$tenkependik[nama]"; ?></td>
                  </tr>
                  <tr>
                    <td>Tempat Lahir</td>
                    <td><?php echo "$tenkependik[tempat_lhr]"; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Lahir</td>
                    <td><?php echo "$tenkependik[tgl_lhr]"; ?></td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td><?php echo "$tenkependik[telepon]"; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo "$tenkependik[email]"; ?></td>
                  </tr>
                  <tr>
                    <td>JK</td>
                    <td><?php echo "$tenkependik[jk]"; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?php echo "$tenkependik[alamat]"; ?></td>
                  </tr>
                  <tr>
                    <td>RT RW</td>
                    <td><?php echo "$tenkependik[rt_rw]"; ?></td>
                  </tr>
                  <tr>
                    <td>Kelurahan</td>
                    <td><?php echo "$tenkependik[kel]"; ?></td>
                  </tr>
                  <tr>
                    <td>Kecamatan</td>
                    <td><?php echo "$tenkependik[kec]"; ?></td>
                  </tr>
                  <tr>
                    <td>Kabupaten</td>
                    <td><?php echo "$tenkependik[kab]"; ?></td>
                  </tr>
                  <tr>
                    <td>Provinsi</td>
                    <td><?php echo "$tenkependik[prov]"; ?></td>
                  </tr>
                </tbody>
              </table>

              <form id="edit-profil" style="display: none;" method="POST" action='pages/proses-profil-pegawai.php?item=profil&id=<?php echo "$tenkependik[id]"; ?>'>
                <table>
                  <tr>
                    <td style="width: 25%"><b>Nama Guru</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='nama' value = '$tenkependik[nama]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tempat Lahir</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='tempat_lhr' value = '$tenkependik[tempat_lhr]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tanggal lahir</b></td>
                    <td><?php echo "<input class='form-control' type='date' name='tgl_lhr' value = '$tenkependik[tgl_lhr]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Telepon</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='telepon' value = '$tenkependik[telepon]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Email</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='email' value = '$tenkependik[email]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Jenis Kelamin</b></td>
                    <?php $jenjang = $tenkependik['jk'] ?>
                    <td><select class='form-control' type='text' name='jk'>
                          <option value='L'  <?php if($jenjang == 'L'){echo "selected";} ?> >Laki laki</option>
                          <option value='P' <?php if($jenjang == 'P'){echo "selected";} ?>>Perempuan</option>
                        </select></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Alamat</b></td>
                    <td><?php echo "<textarea class='form-control' type='text' name='alamat'>$tenkependik[alamat]</textarea>";?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>RT RW</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='rt_rw' value = '$tenkependik[rt_rw]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kelurahan</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='kel' value = '$tenkependik[kel]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kecamatan</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='kec' value = '$tenkependik[kec]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kabupaten</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='kab' value = '$tenkependik[kab]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Provinsi</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='prov' value = '$tenkependik[prov]'>"; ?></td>
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
                    <td><?php echo "$tenkependik[tahun_ajaran]"; ?></td>
                  </tr>
                  <tr>
                    <td>Nama Sekolah</td>
                    <td><?php echo "$tenkependik[nama_sekolah]"; ?></td>
                  </tr>
                  <tr>
                    <td>NBM</td>
                    <td><?php echo "$tenkependik[nbm]"; ?></td>
                  </tr>
                  <tr>
                    <td>Jabatan</td>
                    <td><?php echo "$tenkependik[jabatan]"; ?></td>
                  </tr>
                  <tr>
                    <td>NIP</td>
                    <td><?php echo "$tenkependik[nip]"; ?></td>
                  </tr>
                  <tr>
                    <td>Pangkat Golongan Ruang</td>
                    <td><?php echo "$tenkependik[pangkat]"; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Pengangkatan</td>
                    <td><?php echo "$tenkependik[tgl_pengangkatan]"; ?></td>
                  </tr>
                  <tr>
                    <td>Status Pegawai</td>
                    <td><?php echo "$tenkependik[status_pegawai]"; ?></td>
                  </tr>
                  <tr>
                    <td>Organisasi</td>
                    <td><?php echo "$tenkependik[organisasi]"; ?></td>
                  </tr>
                  <tr>
                    <td>Pendidikan</td>
                    <td><?php echo "$tenkependik[pnd_thr]"; ?></td>
                  </tr>
                  
                  
                </tbody>
              </table>

              <form id="edit-ket" style="display: none;" method="POST" action='pages/proses-profil-pegawai.php?item=ket&id=<?php echo "$tenkependik[id]"; ?>'>
                <table>
                  <tr>
                    <td style="width: 25%"><b>Tahun Ajaran</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='tahunajaran' value = '$tenkependik[tahun_ajaran]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NPSN</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='npsn' value = '$tenkependik[npsn]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NBM</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='nbm' value = '$tenkependik[nbm]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Jabatan</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='jabatan' value = '$tenkependik[jabatan]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NIP</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='nip' value = '$tenkependik[nip]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Pangkat</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='pangkat' value = '$tenkependik[pangkat]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tanggal Pengangkatan</b></td>
                    <td><?php echo "<input class='form-control' type='date' name='tgl_pengangkatan' value = '$tenkependik[tgl_pengangkatan]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Status Pegawai</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='status_pegawai' value = '$tenkependik[status_pegawai]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Organisasi</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='organisasi' value = '$tenkependik[organisasi]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Pendidikan</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='pnd_thr' value = '$tenkependik[pnd_thr]'>"; ?></td>
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