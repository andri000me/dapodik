<?php

   include '../koneksi.php';

   $npsn = $_GET['npsn'];
   $qkepsek = mysqli_query($conn, "SELECT * FROM kepsek WHERE npsn = $npsn ORDER BY tahun_ajaran DESC");
   $qwakasek = mysqli_query($conn, "SELECT * FROM wakasek WHERE npsn = $npsn ORDER BY tahun_ajaran DESC");

   $qsekolah = mysqli_query($conn, "SELECT nama_sekolah, npsn FROM profil WHERE npsn = $npsn");
   $sekolah = mysqli_fetch_array($qsekolah, MYSQLI_BOTH);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kepala Sekolah
        <small>List Kepsek dan Wakasek</small>
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
              <h3 style="margin: 1em 0 1em 0;"><?php echo "$sekolah[nama_sekolah]"; ?></h3>
            </div>
          </div>
        </section>

        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Kepala Sekolah</h3>
              <button class="fa fa-plus btn btn-info tambah" data-toggle='modal' data-target='#tambahdatakepsek'></button>
            </div>
            <div class="box-body" style="min-height: 450px;">
              

              <div style="overflow-x: scroll; max-width: 10000px;">
                <table id="kepsek">
                  <thead>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Tahun Ajaran</th>
                    <th>Nama Kepala Sekolah</th>
                    <th>NBM</th>
                    <th>Tanggal Lahir</th>
                    <th>SK Pengangkatan</th>
                    <th>Tanggal SK</th>
                    <th>Asal SK</th>
                    <th>TMT Jabatan</th>
                    <th>Masa Tugas Ke</th>
                    <th>Tanggal Berakhir</th>
                  </thead>
                  <tbody>
                    <?php 
                    $x = 1; 
                    while ($kepsek = mysqli_fetch_array($qkepsek, MYSQLI_BOTH)) {
                      echo "
                      <tr>
                        <td>$x</td>
                        <td>"; ?>
                        <small class='fa fa-edit btn btn-info edit' id='editdata<?php echo$x;?>' data-toggle='modal' data-target='#editkepsekmodal<?php echo$x;?>' style='margin : 0 1px; text-align: center;'></small>

                          <div id="editkepsekmodal<?php echo$x;?>" class="modal fade" role="dialog">
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
                                  $queryedittanah = mysqli_query($conn, "SELECT * FROM kepsek WHERE kepala_sekolah = '$kepsek[kepala_sekolah]'");
                                  $rows   = mysqli_fetch_array($queryedittanah, MYSQLI_BOTH);
                                ?>

                                <form class="form-horizontal" action='pages/proses-kepsek.php?val=editkepsek&npsn=<?php echo "$kepsek[npsn]"?>&nama=<?php echo "$rows[kepala_sekolah]"; ?>' method="POST" id="editform">
                                        <div class="form-group">
                                          <label for="tahun_ajaran" class="col-sm-4 control-label" style="text-align: left;">Tahun Ajaran</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="tahunajaran"  class="form-control" value='<?php echo "$rows[tahun_ajaran]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kepala_sekolah" class="col-sm-4 control-label" style="text-align: left;">Nama Kepsek</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kepala_sekolah"  class="form-control" value='<?php echo "$rows[kepala_sekolah]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="nbm" class="col-sm-4 control-label" style="text-align: left;">NBM</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nbm"  class="form-control" value='<?php echo "$rows[nbm]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tgl_lahir" class="col-sm-4 control-label" style="text-align: left;">Tanggal Lahir</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="tgl_lahir"  class="form-control" value='<?php echo "$rows[tgl_lahir]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="sk_pengangkatan" class="col-sm-4 control-label" style="text-align: left;">SK Pengangkatan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="sk_pengangkatan"  class="form-control" value='<?php echo "$rows[sk_pengangkatan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tgl_sk" class="col-sm-4 control-label" style="text-align: left;">Tanggal SK</label>
                                          <div class="col-sm-8">
                                            <input type="data" name="tgl_sk"  class="form-control" value='<?php echo "$rows[tgl_sk]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="asal_sk" class="col-sm-4 control-label" style="text-align: left;">Asal SK</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="asal_sk"  class="form-control" value='<?php echo "$rows[asal_sk]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tmt_jabatan" class="col-sm-4 control-label" style="text-align: left;">TMT Jabatan</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="tmt_jabatan"  class="form-control" value='<?php echo "$rows[tmt_jabatan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="masa_tugaske" class="col-sm-4 control-label" style="text-align: left;">Masa Tugas Ke</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="masa_tugaske" class="form-control" value='<?php echo "$rows[masa_tugaske]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tgl_berahir" class="col-sm-4 control-label" style="text-align: left;">Tanggal Berakhir</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="tgl_berahir"  class="form-control" value='<?php echo "$rows[tgl_berahir]";?>'>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="col-sm-12">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="value" value="Simpan">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="value" value="Hapus">
                                          </div>
                                        </div>
                                </form>

                                </div>
                              </div>

                            </div>
                          </div>
                        
                      <?php  
                        echo "
                        </td>
                        <td>$kepsek[tahun_ajaran]</td>
                        <td>$kepsek[kepala_sekolah]</td>
                        <td>$kepsek[nbm]</td>
                        <td>$kepsek[tgl_lahir]</td>
                        <td>$kepsek[sk_pengangkatan]</td>
                        <td>$kepsek[tgl_sk]</td>
                        <td>$kepsek[asal_sk]</td>
                        <td>$kepsek[tmt_jabatan]</td>
                        <td>$kepsek[masa_tugaske]</td>
                        <td>$kepsek[tgl_berahir]</td>
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

        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Wakil Kepala</h3>
              <button class="fa fa-plus btn btn-info tambah" id='tambahdata' data-toggle='modal' data-target='#tambahdatawakasek'></button>
            </div>
            <div class="box-body" style="min-height: 450px;">
              
              <div style="overflow-x: scroll; max-width: 10000px;">
                <table id="wakasek">
                  <thead>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Tahun Ajaran</th>
                    <th>Nama Wakil Kepala</th>
                    <th>NBM</th>
                    <th>Waka Bidang</th>
                    <th>SK Pengangkatan</th>
                    <th>Tanggal SK</th>
                    <th>Asal SK</th>
                    <th>TMT Jabatan</th>
                    <th>Masa Tugas Ke</th>
                    <th>Tanggal Berakhir</th>
                  </thead>
                  <tbody>
                    <?php 
                    $x = 1; 
                    while ($wakasek = mysqli_fetch_array($qwakasek, MYSQLI_BOTH)) {
                      echo "
                      <tr>
                        <td>$x</td>
                        <td>"; ?>
                        <small class='fa fa-edit btn btn-info edit' id='editdata<?php echo$x;?>' data-toggle='modal' data-target='#editwakasekmodal<?php echo$x;?>' style='margin : 0 1px; text-align: center;'></small>

                          <div id="editwakasekmodal<?php echo$x;?>" class="modal fade" role="dialog">
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
                                  $queryedittanah = mysqli_query($conn, "SELECT * FROM wakasek WHERE wakil_kepala = '$wakasek[wakil_kepala]'");
                                  $wakasekin   = mysqli_fetch_array($queryedittanah, MYSQLI_BOTH);
                                ?>

                                <form class="form-horizontal" action='pages/proses-kepsek.php?val=editwakasek&npsn=<?php echo "$npsn"; ?>&nama=<?php echo "$wakasekin[wakil_kepala]"?>' method="POST" id="editform">
                                        <div class="form-group">
                                          <label for="tahun_ajaran" class="col-sm-4 control-label" style="text-align: left;">Tahun Ajaran</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="tahun_ajaran"  class="form-control" value='<?php echo "$wakasekin[tahun_ajaran]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="wakil_kepala" class="col-sm-4 control-label" style="text-align: left;">Nama Wakasek</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="wakil_kepala"  class="form-control" value='<?php echo "$wakasekin[wakil_kepala]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="nbm" class="col-sm-4 control-label" style="text-align: left;">NBM</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nbm"  class="form-control" value='<?php echo "$wakasekin[nbm]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="waka_bidang" class="col-sm-4 control-label" style="text-align: left;">Waka Bidang</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="waka_bidang"  class="form-control" value='<?php echo "$wakasekin[waka_bidang]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="sk_pengangkatan" class="col-sm-4 control-label" style="text-align: left;">SK Pengangkatan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="sk_pengangkatan"  class="form-control" value='<?php echo "$wakasekin[sk_pengangkatan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tgl_sk" class="col-sm-4 control-label" style="text-align: left;">Tanggal SK</label>
                                          <div class="col-sm-8">
                                            <input type="data" name="tgl_sk"  class="form-control" value='<?php echo "$wakasekin[tgl_sk]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="asal_sk" class="col-sm-4 control-label" style="text-align: left;">Asal SK</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="asal_sk"  class="form-control" value='<?php echo "$wakasekin[asal_sk]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tmt_jabatan" class="col-sm-4 control-label" style="text-align: left;">TMT Jabatan</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="tmt_jabatan"  class="form-control" value='<?php echo "$wakasekin[tmt_jabatan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="masa_tugaske" class="col-sm-4 control-label" style="text-align: left;">Masa Tugas Ke</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="masa_tugaske" class="form-control" value='<?php echo "$wakasekin[masa_tugaske]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tgl_berahir" class="col-sm-4 control-label" style="text-align: left;">Tanggal Berakhir</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="tgl_berahir"  class="form-control" value='<?php echo "$wakasekin[tgl_habis]";?>'>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="col-sm-12">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="values" value="Simpan">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="values" value="Hapus">
                                          </div>
                                        </div>
                                </form>

                                </div>
                              </div>

                            </div>
                          </div>
                        
                      <?php  
                        echo "
                        </td>
                        <td>$wakasek[tahun_ajaran]</td>
                        <td>$wakasek[wakil_kepala]</td>
                        <td>$wakasek[nbm]</td>
                        <td>$wakasek[waka_bidang]</td>
                        <td>$wakasek[sk_pengangkatan]</td>
                        <td>$wakasek[tgl_sk]</td>
                        <td>$wakasek[asal_sk]</td>
                        <td>$wakasek[tmt_jabatan]</td>
                        <td>$wakasek[masa_tugaske]</td>
                        <td>$wakasek[tgl_habis]</td>
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



                      <div id="tambahdatakepsek" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                                    
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss ="modal">&times;</button>
                                <h4 class="modal-title">Tambah Data Kepsek</h4>
                              </div>
                              <div class="modal-body">
                                 <form class="form-horizontal" action='pages/proses-kepsek.php?val=tambahkepsek&npsn=<?php echo "$npsn"; ?>' method="POST" id="tambahform">
                                          <div class="form-group">
                                            <label for="tahunajaran" class="col-sm-4 control-label" style="text-align: left;">Tahun Ajaran</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="tahunajaran" class="form-control">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="nbm" class="col-sm-4 control-label" style="text-align: left;">NBM</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="nbm" class="form-control">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="kepala_sekolah" class="col-sm-4 control-label" style="text-align: left;">Nama Kepsek</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="kepala_sekolah" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="tgl_lahir" class="col-sm-4 control-label" style="text-align: left;">Tanggal Lahir</label>
                                            <div class="col-sm-8">
                                              <input type="date" name="tgl_lahir" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="sk_pengangkatan" class="col-sm-4 control-label" style="text-align: left;">SK Pengangkatan</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="sk_pengangkatan" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="tgl_sk" class="col-sm-4 control-label" style="text-align: left;">Tanggal SK</label>
                                            <div class="col-sm-8">
                                              <input type="date" name="tgl_sk" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="asal_sk" class="col-sm-4 control-label" style="text-align: left;">Asal SK</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="asal_sk" class="form-control">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="tmt_jabatan" class="col-sm-4 control-label" style="text-align: left;">TMT Jabatan</label>
                                            <div class="col-sm-8">
                                              <input type="date" name="tmt_jabatan" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="masa_tugaske" class="col-sm-4 control-label" style="text-align: left;">Masa Tugas Ke</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="masa_tugaske" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="tgl_berahir" class="col-sm-4 control-label" style="text-align: left;">Tanggal Berakhir</label>
                                            <div class="col-sm-8">
                                              <input type="date" name="tgl_berahir" class="form-control" >
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="col-sm-12">
                                              <input type="submit" style="float: right; position: relative; margin-top: 20px;" class="btn btn-info" name="tambah" value="Tambah">
                                            </div>
                                          </div>
                                    </form>
                              </div>
                          </div>

                          </div>
                      </div>

                      <div id="tambahdatawakasek" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                                    
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss ="modal">&times;</button>
                                <h4 class="modal-title">Tambah Data Wakasek</h4>
                              </div>
                              <div class="modal-body">
                                 <form class="form-horizontal" action='pages/proses-kepsek.php?val=tambahwakasek&npsn=<?php echo "$npsn"; ?>' method="POST" id="tambahform">
                                          <div class="form-group">
                                            <label for="tahunajaran" class="col-sm-4 control-label" style="text-align: left;">Tahun Ajaran</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="tahunajaran" class="form-control">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="nbm" class="col-sm-4 control-label" style="text-align: left;">NBM</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="nbm" class="form-control">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="wakil_kepala" class="col-sm-4 control-label" style="text-align: left;">Nama Wakasek</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="wakil_kepala" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="waka_bidang" class="col-sm-4 control-label" style="text-align: left;">Waka Bidang</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="waka_bidang" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="sk_pengangkatan" class="col-sm-4 control-label" style="text-align: left;">SK Pengangkatan</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="sk_pengangkatan" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="tgl_sk" class="col-sm-4 control-label" style="text-align: left;">Tanggal SK</label>
                                            <div class="col-sm-8">
                                              <input type="date" name="tgl_sk" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="asal_sk" class="col-sm-4 control-label" style="text-align: left;">Asal SK</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="asal_sk" class="form-control">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="tmt_jabatan" class="col-sm-4 control-label" style="text-align: left;">TMT Jabatan</label>
                                            <div class="col-sm-8">
                                              <input type="date" name="tmt_jabatan" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="masa_tugaske" class="col-sm-4 control-label" style="text-align: left;">Masa Tugas Ke</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="masa_tugaske" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="tgl_berahir" class="col-sm-4 control-label" style="text-align: left;">Tanggal Berakhir</label>
                                            <div class="col-sm-8">
                                              <input type="date" name="tgl_berahir" class="form-control" >
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <div class="col-sm-12">
                                              <input type="submit" style="float: right; position: relative; margin-top: 20px;" class="btn btn-info" name="tambah" value="Tambah">
                                            </div>
                                          </div>
                                    </form>
                              </div>
                          </div>

                          </div>
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
    .tambah{
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
     #kepsek td{
      min-width: 100px !important;
    }
    #kepsek td:nth-child(1){
      min-width: 20px !important;
    }
    #kepsek td:nth-child(2){
      min-width: 70px !important;
    }
    #kepsek td:nth-child(4){
      min-width: 200px !important;
    }
    #kepsek td:nth-child(14){
      min-width: 200px !important;
    }
    #kepsek td:nth-child(13){
      min-width: 100px !important;
    }
    #wakasek td{
      min-width: 100px !important;
    }
    #wakasek td:nth-child(1){
      min-width: 20px !important;
    }
    #wakasek td:nth-child(2){
      min-width: 70px !important;
    }
    #wakasek td:nth-child(4){
      min-width: 200px !important;
    }
    #wakasek td:nth-child(14){
      min-width: 200px !important;
    }
    #wakasek td:nth-child(13){
      min-width: 100px !important;
    }
  </style>

<script type="text/javascript">
  $(function(){
    $('#kepsek').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });
    $('#wakasek').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });
  });
</script>


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