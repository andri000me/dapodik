<?php

   include '../koneksi.php';
  
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Guru
        <small>Tambah Guru</small>
      </h1>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <form id="edit-profil" method="POST" action='pages/proses-tambah-guru.php'>
        <section class="col-lg-6 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Tambah Guru</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
              
                <table>
                  <tr>
                    <td style="width: 25%"><b>Nama Guru</b></td>
                    <td><input class='form-control' type='text' name='nama_guru'> </td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tempat Lahir</b></td>
                    <td><input class='form-control' type='text' name='tempat_lahir'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tanggal lahir</b></td>
                    <td><input class='form-control' type='date' name='tgl_lahir'></td>
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
                    <td><input class='form-control' type='text' name='kelurahan' ></td>
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
                    <td style="width: 25%"><b>Bidang</b></td>
                    <td><input class='form-control' type='text' name='bidang' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NUPTK</b></td>
                    <td><input class='form-control' type='text' name='nuptk'  ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>NIP</b></td>
                    <td><input class='form-control' type='text' name='nip'  ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Pangkat Golongan Ruang</b></td>
                    <td><input class='form-control' type='text' name='pangkat_golruang'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tanggal Pengangkatan</b></td>
                    <td><input class='form-control' type='date' name='tgl_pengangkatan' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Sertifikasi Guru</b></td>
                    <td>
                        <select name="sertifikasi_guru" id="sertifikasi_guru" class="form-control">
                            <option value='Sudah' >Sudah</option>
                            <option Value='Belum' >Belum</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>TMT Sertifikasi</b></td>
                    <td><input class='form-control' type='date' name='tmt_sertifikasi' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Status Pegawai</b></td>
                    <td><input class='form-control' type='text' name='sts_pegawai' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Organisasi</b></td>
                    <td><input class='form-control' type='text' name='organisasi' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Pendidikan</b></td>
                    <td><input class='form-control' type='text' name='pendidikan' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Jurusan</b></td>
                    <td><input class='form-control' type='text' name='jurusan' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Universitas</b></td>
                    <td><input class='form-control' type='text' name='univ' ></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Tahun Lulus</b></td>
                    <td><input class='form-control' type='text' name='thn_lulus' ></td>
                  </tr>

                </table>

              
            </div>
          </div>

        </section>

        <section class="col-lg-12 connectedSortable" style="text-align: center;">
          <input type="submit" name="submit" value='Tambah Guru' class="btn btn-info" style="float:right; position: relative; padding: 20px;">   
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