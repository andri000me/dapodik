  <?php
  
    include '../koneksi.php';
   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kepala Sekolah
      </h1>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">

        <form id='edit-kepsek' method="POST" action='pages/proses-tambah-kepsek.php?val=kepsek&npsn=<?php echo "$profil[npsn]"; ?>'>


        <section class="col-lg-6 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Kepala Sekolah</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">

                      
                          <!-- <div style="text-align: center;">
                            <button class="btn btn-info add" id='tambahkepsek'><span class="fa fa-plus" style="margin-right: 10px;"></span>Tambah Kepsek </button>
                          </div> -->
                          <table>
                            <tr>
                              <td style="width: 25%"><b>Nama</b></td>
                              <td><input class='form-control' type='text' name='kepala_sekolah' ></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Tahun Ajaran</b></td>
                              <td><input class='form-control' type='text' name='tahun_ajaran' ></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>NBM</b></td>
                              <td><input class='form-control' type='text' name='nbm' ></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Tanggal Lahir</b></td>
                              <td><input class='form-control' type='date' name='tgl_lahir' ></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>SK Pengangkatan</b></td>
                              <td><input class='form-control' type='text' name='sk_pengangkatan' ></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Tanggal SK</b></td>
                              <td><input class='form-control' type='date' name='tgl_sk' ></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Asal SK</b></td>
                              <td><input class='form-control' type='text' name='asal_sk' ></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>TMT Jabatan</b></td>
                              <td><input class='form-control' type='date' name='tmt_jabatan' ></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Masa Tugas Ke</b></td>
                              <td><input class='form-control' type='text' name='masa_tugaske' ></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Tanggal Berakhir</b></td>
                              <td><input class='form-control' type='date' name='tgl_berahir' ></td>
                            </tr>
                          </table>
                           
                        
            </div>
          </div>

        </section>
        <section class="col-lg-6 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Wakil Kepala Sekolah</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">

                        
                          <!-- <div style="text-align: center;">
                            <button class="btn btn-info add" id='tambahwakasek'><span class="fa fa-plus" style="margin-right: 10px;"></span>Tambah Wakasek </button>
                          </div>
                           -->
                          <table>
                            <tr>
                              <td style="width: 25%"><b>Nama</b></td>
                              <td><input class='form-control' type='text' name='wakil_kepala'></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Tahun Ajaran</b></td>
                              <td><input class='form-control' type='text' name='tahun_ajaranwk'></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>NBM</b></td>
                              <td><input class='form-control' type='text' name='nbmwk'></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Bidang</b></td>
                              <td><input class='form-control' type='text' name='waka_bidangwk'></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>SK Pengangkatan</b></td>
                              <td><input class='form-control' type='text' name='sk_pengangkatanwk'></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Tanggal SK</b></td>
                              <td><input class='form-control' type='date' name='tgl_skwk'></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Asal SK</b></td>
                              <td><input class='form-control' type='text' name='asal_skwk'></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>TMT Jabatan</b></td>
                              <td><input class='form-control' type='date' name='tmt_jabatanwk' ></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Masa Tugas Ke</b></td>
                              <td><input class='form-control' type='text' name='masa_tugaskewk'></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Tanggal Berakhir</b></td>
                              <td><input class='form-control' type='date' name='tgl_habiswk'></td>
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
    .form-group{
      display: block !important;
      margin-bottom: 15px !important;
    }
    .form-control{
      width: 100% !important;
    }
    .add{ 
      padding : 10px 10px; 
      text-align: center;
      margin: 0px auto;
      position: relative;
      margin-bottom: 10px;
    }
  </style>


  <script type="text/javascript">

  </script>