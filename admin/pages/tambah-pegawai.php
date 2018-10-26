<?php

   include '../koneksi.php';
  
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Pegawai
        <small>Tambah Pegawai</small>
      </h1>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <form id="edit-profil" method="POST" action='pages/proses-tambah-pegawai.php'>
        <section class="col-lg-6 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Tambah  Pegawai</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
              
                <table>
                  <tr>
                    <td style="width: 25%"><b>Nama Pegawai</b></td>
                    <td><input class='form-control' type='text' name='nama'> </td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tempat Lahir</b></td>
                    <td><input class='form-control' type='text' name='tempat_lhr'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tanggal lahir</b></td>
                    <td><input class='form-control' type='date' name='tgl_lhr'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Telepon</b></td>
                    <td><input class='form-control' type='text' name='telepon'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Email</b></td>
                    <td><input class='form-control' type='text' name='email'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Jenis Kelamin</b></td>
                    <td><select class='form-control' type='text' name='jk'>
                          <option value='L' >Laki laki</option>
                          <option value='P' >perempuan</option>
                        </select></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Alamat</b></td>
                    <td><textarea class='form-control' type='text' name='alamat'></textarea></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>RT RW</b></td>
                    <td><input class='form-control' type='text' name='rt_rw'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kelurahan</b></td>
                    <td><input class='form-control' type='text' name='kel' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kecamatan</b></td>
                    <td><input class='form-control' type='text' name='kec'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kabupaten</b></td>
                    <td><input class='form-control' type='text' name='kab' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Provinsi</b></td>
                    <td><input class='form-control' type='text' name='prov' ></td>
                  </tr>
                </table>

             
            </div>
          </div>

        </section>

        <section class="col-lg-6 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Keterangan Lain-Lain</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
            
                <table>
                  <tr>
                    <td style="width: 25%"><b>Tahun Ajaran</b></td>
                    <td><input class='form-control' type='text' name='tahunajaran' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NPSN</b></td>
                    <td><input class='form-control' type='text' name='npsn' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NBM</b></td>
                    <td><input class='form-control' type='text' name='nbm' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Jabatan</b></td>
                    <td><input class='form-control' type='text' name='jabatan' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NIP</b></td>
                    <td><input class='form-control' type='text' name='nip'  ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Pangkat</b></td>
                    <td><input class='form-control' type='text' name='pangkat'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tanggal Pengangkatan</b></td>
                    <td><input class='form-control' type='date' name='tgl_pengangkatan' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Status Pegawai</b></td>
                    <td><input class='form-control' type='text' name='status_pegawai' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Organisasi</b></td>
                    <td><input class='form-control' type='text' name='organisasi' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Pendidikan</b></td>
                    <td><input class='form-control' type='text' name='pnd_thr' ></td>
                  </tr>
                </table>

              
            </div>
          </div>

        </section>

        <section class="col-lg-12 connectedSortable" style="text-align: center;">
          <input type="submit" name="submit" value='Tambah Pegawai' class="btn btn-info" style="float:right; position: relative; padding: 20px;">   
        </section>


        </form>
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
    

  </script>