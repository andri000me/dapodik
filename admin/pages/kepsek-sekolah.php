  <?php
  
    include '../koneksi.php';
    $npsn = $_SESSION['npsn'];
    $querykepsek = mysqli_query($conn, "SELECT * FROM kepsek where npsn = '$npsn'");
    $querywakasek = mysqli_query($conn, "SELECT * FROM wakasek where npsn = '$npsn'");

    $datakepsek = mysqli_fetch_array($querykepsek, MYSQLI_BOTH);

    $qprofil = mysqli_query($conn, "SELECT nama_sekolah FROM profil WHERE npsn = $_SESSION[npsn]");
    $profil = mysqli_fetch_array($qprofil, MYSQLI_BOTH);
   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kepala dan Wakil Kepala Sekolah
        <small><?php echo "$profil[nama_sekolah]"; ?></small>
      </h1>

    </section>

    

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        

        <section class="col-lg-6 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Kepala Sekolah</h3>
              <button class="fa fa-edit btn btn-info edit" id='editkepsek'></button>
              <button class="btn btn-info edit" id='canceleditkepsek' style="display: none;" >Cancel</button>
            </div>
            <div class="box-body" style="min-height: 450px;">
                      <table id="kepsek">
                          <tbody>
                            <tr>
                              <td>Nama</td>
                              <td><?php echo "$datakepsek[kepala_sekolah]"; ?></td>
                            </tr>
                            <tr>
                              <td>Tahun Ajaran</td>
                              <td><?php echo "$datakepsek[tahun_ajaran]"; ?></td>
                            </tr>
                            <tr>
                              <td>NBM</td>
                              <td><?php echo "$datakepsek[nbm]"; ?></td>
                            </tr>
                            <tr>
                              <td>tgl_lahir</td>
                              <td><?php echo "$datakepsek[tgl_lahir]"; ?></td>
                            </tr>
                            <tr>
                              <td>SK Pengangkatan</td>
                              <td><?php echo "$datakepsek[sk_pengangkatan]"; ?></td>
                            </tr>
                            <tr>
                              <td>Tanggal SK</td>
                              <td><?php echo "$datakepsek[tgl_sk]"; ?></td>
                            </tr>
                            <tr>
                              <td>Asal SK</td>
                              <td><?php echo "$datakepsek[asal_sk]"; ?></td>
                            </tr>
                            <tr>
                              <td>TMT Jabatan</td>
                              <td><?php echo "$datakepsek[tmt_jabatan]"; ?></td>
                            </tr>
                            <tr>
                              <td>Masa Tugas Ke-</td>
                              <td><?php echo "$datakepsek[masa_tugaske]"; ?></td>
                            </tr>
                            <tr>
                              <td>Tanggal Berakhir</td>
                              <td><?php echo "$datakepsek[tgl_berahir]"; ?></td>
                            </tr>
                          </tbody>
                      </table>

                      <form id='edit-kepsek' style="display: none;" method="POST" action="pages/proses-kepsek.php?val=kepsek">
                          <!-- <div style="text-align: center;">
                            <button class="btn btn-info add" id='tambahkepsek'><span class="fa fa-plus" style="margin-right: 10px;"></span>Tambah Kepsek </button>
                          </div> -->
                          <table>
                            <tr>
                              <td style="width: 25%"><b>Nama</b></td>
                              <td><?php echo "<input class='form-control' type='text' name='kepala_sekolah' value = '$datakepsek[kepala_sekolah]'>"; ?></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Tahun Ajaran</b></td>
                              <td><?php echo "<input class='form-control' type='text' name='tahun_ajaran' value = '$datakepsek[tahun_ajaran]'>"; ?></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>NBM</b></td>
                              <td><?php echo "<input class='form-control' type='text' name='nbm' value = '$datakepsek[nbm]'>"; ?></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Tanggal Lahir</b></td>
                              <td><?php echo "<input class='form-control' type='date' name='tgl_lahir' value = '$datakepsek[tgl_lahir]'>"; ?></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>SK Pengangkatan</b></td>
                              <td><?php echo "<input class='form-control' type='text' name='sk_pengangkatan' value = '$datakepsek[sk_pengangkatan]'>"; ?></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Tanggal SK</b></td>
                              <td><?php echo "<input class='form-control' type='date' name='tgl_sk' value = '$datakepsek[tgl_sk]'>"; ?></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Asal SK</b></td>
                              <td><?php echo "<input class='form-control' type='text' name='asal_sk' value = '$datakepsek[asal_sk]'>"; ?></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>TMT Jabatan</b></td>
                              <td><?php echo "<input class='form-control' type='date' name='tmt_jabatan' value = '$datakepsek[tmt_jabatan]'>"; ?></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Masa Tugas Ke</b></td>
                              <td><?php echo "<input class='form-control' type='text' name='masa_tugaske' value = '$datakepsek[masa_tugaske]'>"; ?></td>
                            </tr>
                            <tr>
                              <td style="width: 25%"><b>Tanggal Berakhir</b></td>
                              <td><?php echo "<input class='form-control' type='date' name='tgl_berahir' value = '$datakepsek[tgl_berahir]'>"; ?></td>
                            </tr>
                          </table>
                           <input type="submit" name="submit" value='Save' class="btn btn-info" style="float: right; position: relative;">
                        </form>
            </div>
          </div>

        </section>
        <?php  
        $y = 0;
        while($datawakasek = mysqli_fetch_array($querywakasek, MYSQLI_BOTH)){
        echo "
        <section class='col-lg-6 connectedSortable'>

          <!-- quick email widget -->
          <div class='box box-info'>
            <div class='box-header'>
              <h3 class='box-title'>Wakil Kepala Sekolah Bidang $datawakasek[waka_bidang]</h3>
              <button class='fa fa-edit btn btn-info edit' id='editwakasek$y'></button>
              <button class='btn btn-info edit' id='canceleditwakasek$y' style='display: none;' >Cancel</button>
            </div>
            <div class='box-body' style='min-height: 450px;'>
           
                <table id='wakasek$y'>
                          <tbody>
                            <tr>
                              <td>Nama</td>
                              <td>$datawakasek[wakil_kepala]</td>
                            </tr>
                            <tr>
                              <td>Tahun Ajaran</td>
                              <td>$datawakasek[tahun_ajaran]</td>
                            </tr>
                            <tr>
                              <td>NBM</td>
                              <td>$datawakasek[nbm]</td>
                            </tr>
                            <tr>
                              <td>Bidang</td>
                              <td>$datawakasek[waka_bidang]</td>
                            </tr>
                            <tr>
                              <td>SK Pengangkatan</td>
                              <td>$datawakasek[sk_pengangkatan]</td>
                            </tr>
                            <tr>
                              <td>Tanggal SK</td>
                              <td>$datawakasek[tgl_sk]</td>
                            </tr>
                            <tr>
                              <td>Asal SK</td>
                              <td>$datawakasek[asal_sk]</td>
                            </tr>
                            <tr>
                              <td>TMT Jabatan</td>
                              <td>$datawakasek[tmt_jabatan]</td>
                            </tr>
                            <tr>
                              <td>Masa Tugas Ke-</td>
                              <td>$datawakasek[masa_tugaske]</td>
                            </tr>
                            <tr>
                              <td>Tanggal Berakhir</td>
                              <td>$datawakasek[tgl_habis]</td>
                            </tr>
                          </tbody>
                        </table>

                        <form id='edit-wakasek$y' style='display: none;' method='POST' action='pages/proses-kepsek.php?val=wakasek&npsn=$npsn'>
                          <!-- <div style='text-align: center;'>
                            <button class='btn btn-info add' id='tambahwakasek'><span class='fa fa-plus' style='margin-right: 10px;'></span>Tambah Wakasek </button>
                          </div>
                           -->
                          <table>
                            <tr>
                              <td style='width: 25%'><b>Nama</b></td>
                              <td><input class='form-control' type='text' name='wakil_kepala' value = '$datawakasek[wakil_kepala]'></td>
                            </tr>
                            <tr>
                              <td style='width: 25%'><b>Tahun Ajaran</b></td>
                              <td><input class='form-control' type='text' name='tahun_ajaran' value = '$datawakasek[tahun_ajaran]'></td>
                            </tr>
                            <tr>
                              <td style='width: 25%'><b>NBM</b></td>
                              <td><input class='form-control' type='text' name='nbm' value = '$datawakasek[nbm]'></td>
                            </tr>
                            <tr>
                              <td style='width: 25%'><b>Bidang</b></td>
                              <td><input class='form-control' type='text' name='waka_bidang' value = '$datawakasek[waka_bidang]'></td>
                            </tr>
                            <tr>
                              <td style='width: 25%'><b>SK Pengangkatan</b></td>
                              <td><input class='form-control' type='text' name='sk_pengangkatan' value = '$datawakasek[sk_pengangkatan]'></td>
                            </tr>
                            <tr>
                              <td style='width: 25%'><b>Tanggal SK</b></td>
                              <td><input class='form-control' type='date' name='tgl_sk' value = '$datawakasek[tgl_sk]'></td>
                            </tr>
                            <tr>
                              <td style='width: 25%'><b>Asal SK</b></td>
                              <td><input class='form-control' type='text' name='asal_sk' value = '$datawakasek[asal_sk]'></td>
                            </tr>
                            <tr>
                              <td style='width: 25%'><b>TMT Jabatan</b></td>
                              <td><input class='form-control' type='date' name='tmt_jabatan' value = '$datawakasek[tmt_jabatan]'></td>
                            </tr>
                            <tr>
                              <td style='width: 25%'><b>Masa Tugas Ke</b></td>
                              <td><input class='form-control' type='text' name='masa_tugaske' value = '$datawakasek[masa_tugaske]'></td>
                            </tr>
                            <tr>
                              <td style='width: 25%'><b>Tanggal Berakhir</b></td>
                              <td><input class='form-control' type='date' name='tgl_habis' value = '$datawakasek[tgl_habis]'></td>
                            </tr>
                          </table>
                          <input type='submit' name='submit' value='Save' class='btn btn-info' style='float: right; position: relative;'>  
                        </form>

                        </div>
                  </div>

                </section>
                ";

                $y++;

              }
            ?>
      


        <section class="col-md-12">
          <div class="menu row">
            <div class="col-md-4 list edit"><div><a href="?page=pages/list-kepsek-sekolah.php&level=0&npsn=<?php echo "$npsn";?>">List Kepala dan Wakil</a></div></div>
          </div>
        </section>
      </div>
      <!-- ./ row -->
    </section>
    <!-- ./ content -->

  </div>
  <!-- /.content-wrapper -->

                      <div id="tambahdatakepsek" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                                    
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss ="modal">&times;</button>
                                <h4 class="modal-title">Tambah Kepala Sekolah</h4>
                              </div>
                              <div class="modal-body">

                                <form style="display: none;" method="POST" action="pages/proses-kepsek.php?item=addkepsek">
                                  <div style="text-align: center;">
                                    <button class="btn btn-info add" id='tambahwakasek'><span class="fa fa-plus" style="margin-right: 10px;"></span>Tambah Wakasek </button>
                                  </div>
                                  
                                  <table>
                                    <tr>
                                      <td style="width: 25%"><b>Nama</b></td>
                                      <td><?php echo "<input class='form-control' type='text' name='wakil_kepala' value = '$datawakasek[wakil_kepala]'>"; ?></td>
                                    </tr>
                                    <tr>
                                      <td style="width: 25%"><b>Tahun Ajaran</b></td>
                                      <td><?php echo "<input class='form-control' type='text' name='tahun_ajaran' value = '$datawakasek[tahun_ajaran]'>"; ?></td>
                                    </tr>
                                    <tr>
                                      <td style="width: 25%"><b>NBM</b></td>
                                      <td><?php echo "<input class='form-control' type='text' name='nbm' value = '$datawakasek[nbm]'>"; ?></td>
                                    </tr>
                                    <tr>
                                      <td style="width: 25%"><b>Bidang</b></td>
                                      <td><?php echo "<input class='form-control' type='text' name='waka_bidang' value = '$datawakasek[waka_bidang]'>"; ?></td>
                                    </tr>
                                    <tr>
                                      <td style="width: 25%"><b>SK Pengangkatan</b></td>
                                      <td><?php echo "<input class='form-control' type='text' name='sk_pengangkatan' value = '$datawakasek[sk_pengangkatan]'>"; ?></td>
                                    </tr>
                                    <tr>
                                      <td style="width: 25%"><b>Tanggal SK</b></td>
                                      <td><?php echo "<input class='form-control' type='date' name='tgl_sk' value = '$datawakasek[tgl_sk]'>"; ?></td>
                                    </tr>
                                    <tr>
                                      <td style="width: 25%"><b>Asal SK</b></td>
                                      <td><?php echo "<input class='form-control' type='text' name='asal_sk' value = '$datawakasek[asal_sk]'>"; ?></td>
                                    </tr>
                                    <tr>
                                      <td style="width: 25%"><b>TMT Jabatan</b></td>
                                      <td><?php echo "<input class='form-control' type='date' name='tmt_jabatan' value = '$datawakasek[tmt_jabatan]'>"; ?></td>
                                    </tr>
                                    <tr>
                                      <td style="width: 25%"><b>Masa Tugas Ke</b></td>
                                      <td><?php echo "<input class='form-control' type='text' name='masa_tugaske' value = '$datawakasek[masa_tugaske]'>"; ?></td>
                                    </tr>
                                    <tr>
                                      <td style="width: 25%"><b>Tanggal Berakhir</b></td>
                                      <td><?php echo "<input class='form-control' type='date' name='tgl_habis' value = '$datawakasek[tgl_habis]'>"; ?></td>
                                    </tr>
                                  </table>
                                  <input type="submit" name="submit" value='Save' class="btn btn-info" style="float: right; position: relative;">  
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
                                <h4 class="modal-title">Edit Prestasi</h4>
                              </div>
                              <div class="modal-body">
                                 <form class="form-horizontal" action='pages/proses-prestasi.php?val=tambah' method="POST" id="tambahform">
                                          <div class="form-group">
                                            <label for="tahunajaran" class="col-sm-4 control-label" style="text-align: left;">Tahun Ajaran</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="tahunajaran" id="tahunajaran" class="form-control">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="prestasi" class="col-sm-4 control-label" style="text-align: left;">Prestasi</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="prestasi" id="prestasi" class="form-control">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="prestasi" class="col-sm-4 control-label" style="text-align: left;">Hasil</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="hasil" id="hasil" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="level" class="col-sm-4 control-label" style="text-align: left;">Level</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="level" id="level" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="pemegang" class="col-sm-4 control-label" style="text-align: left;">Pemegang</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="pemegang" id="pemegang" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="tgl_plaksanaan" class="col-sm-4 control-label" style="text-align: left;">Tanggal Pelaksanaan</label>
                                            <div class="col-sm-8">
                                              <input type="date" name="tgl_plaksanaan" id="tgl_plaksanaan" class="form-control" >
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="keterangan" class="col-sm-4 control-label" style="text-align: left;">Keterangan</label>
                                            <div class="col-sm-8">
                                              <textarea type="text" name="keterangan" id="keterangan" class="form-control"></textarea>
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
    .menu {
        margin: 0 auto;
        margin-bottom: 2em;
    }
    .menu .list {
        display: inline-block;
        position: relative;
        text-align: center;
        vertical-align: middle;
        padding: 0 1em;
    }
    .menu .list div {
        height: 40px;
        background-color: #ffc607;
        padding-top: 8px;
        transition: background 0.5s;
    }
    .menu .list div a {
        color: white;
        text-decoration: none;
        position: relative;
        vertical-align: text-bottom;
        border: none;
    }
    .menu .list div:hover {
        background-color: #02baff;
        transition: background-color 0.5s;
    }
  </style>


  <script type="text/javascript">
    $('#editwakasek').click(function(){
        $('#wakasek').css('display', 'none');
        $('#edit-wakasek').css('display', 'block');
        $('#editwakasek').css('display', 'none');
        $('#canceleditwakasek').css('display', 'block');
    })
    $('#canceleditwakasek').click(function(){
        $('#wakasek').css('display', 'table');
        $('#edit-wakasek').css('display', 'none');
        $('#editwakasek').css('display', 'block');
        $('#canceleditwakasek').css('display', 'none');
    })

    $('#editkepsek').click(function(){
        $('#kepsek').css('display', 'none');
        $('#edit-kepsek').css('display', 'block');
        $('#editkepsek').css('display', 'none');
        $('#canceleditkepsek').css('display', 'block');
    })
    $('#canceleditkepsek').click(function(){
        $('#kepsek').css('display', 'table');
        $('#edit-kepsek').css('display', 'none');
        $('#editkepsek').css('display', 'block');
        $('#canceleditkepsek').css('display', 'none');
    })

   
  </script>