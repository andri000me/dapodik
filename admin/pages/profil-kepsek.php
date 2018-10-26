  <?php
  
    include '../koneksi.php';
    $npsn = $_GET['npsn'];
    $quers = mysqli_query($conn, "SELECT nama_sekolah, npsn FROM profil WHERE npsn = $npsn");
    $profil = mysqli_fetch_array($quers, MYSQLI_BOTH);
    $querykepsek = mysqli_query($conn, "SELECT * FROM kepsek where npsn = '$npsn' ORDER BY tahun_ajaran DESC");
    $querywakasek = mysqli_query($conn, "SELECT * FROM wakasek where npsn = '$npsn'");

    $datakepsek = mysqli_fetch_array($querykepsek, MYSQLI_BOTH);
    
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
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <div class="box box-info">
            <div class="box-header" style="margin-bottom: 2em">
              <h3 style="margin: 1em 0 1em 0;"><?php echo "$profil[nama_sekolah]"; ?></h3>
          </div>
        </section>

        <section class="col-md-12">
          <div class="menu row">
            <div class="col-md-4 list"><div><a href="?page=pages/list-kepsek.php&level=1&npsn=<?php echo "$npsn";?>">List Kepala dan Wakil</a></div></div>
          </div>
        </section>

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

                      <form id='edit-kepsek' style="display: none;" method="POST" action='pages/proses-kepsek.php?val=kepsek&npsn=<?php echo "$profil[npsn]"; ?>'>
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

                        <form id='edit-wakasek$y' style='display: none;' method='POST' action='pages/proses-kepsek.php?val=wakasek&npsn=$profil[npsn]'>
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
                                <h4 class="modal-title">Tambah Data Kepsek</h4>
                              </div>
                              <div class="modal-body">
                                 <form class="form-horizontal" action='pages/proses-prestasi.php?val=tambah&npsn=<?php echo "$npsn"; ?>' method="POST" id="tambahform">
                                          <div class="form-group">
                                            <label for="npsn" class="col-sm-4 control-label" style="text-align: left;">NPSN</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="npsn" class="form-control">
                                            </div>
                                          </div>
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


                      <div id="tambahdatawakaseks" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                                    
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss ="modal">&times;</button>
                                <h4 class="modal-title">Tambah Data Wakasek</h4>
                              </div>
                              <div class="modal-body">
                                 <form class="form-horizontal" action='pages/proses-prestasi.php?val=tambah&npsn=<?php echo "$npsn"; ?>' method="POST" id="tambahform">
                                          <div class="form-group">
                                            <label for="npsn" class="col-sm-4 control-label" style="text-align: left;">NPSN</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="npsn" class="form-control">
                                            </div>
                                          </div>
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
                                            <label for="kepala_sekolah" class="col-sm-4 control-label" style="text-align: left;">Nama Wakasek</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="kepala_sekolah" class="form-control" >
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
                                            <label for="tgl_habis" class="col-sm-4 control-label" style="text-align: left;">Tanggal Berakhir</label>
                                            <div class="col-sm-8">
                                              <input type="date" name="tgl_habis" class="form-control" >
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
    .edit{
      float: right; 
      cursor: pointer; 
      margin: 0; 
      padding : 2px 10px; 
      border: none; 
      background-color: none
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
    $('#editwakasek0').click(function(){
        $('#wakasek0').css('display', 'none');
        $('#edit-wakasek0').css('display', 'block');
        $('#editwakasek0').css('display', 'none');
        $('#canceleditwakasek0').css('display', 'block');
    })
    $('#canceleditwakasek0').click(function(){
        $('#wakasek0').css('display', 'table');
        $('#edit-wakasek0').css('display', 'none');
        $('#editwakasek0').css('display', 'block');
        $('#canceleditwakasek0').css('display', 'none');
    })
     $('#editwakasek1').click(function(){
        $('#wakasek1').css('display', 'none');
        $('#edit-wakasek1').css('display', 'block');
        $('#editwakasek1').css('display', 'none');
        $('#canceleditwakasek1').css('display', 'block');
    })
    $('#canceleditwakasek1').click(function(){
        $('#wakasek1').css('display', 'table');
        $('#edit-wakasek1').css('display', 'none');
        $('#editwakasek1').css('display', 'block');
        $('#canceleditwakasek1').css('display', 'none');
    })
    $('#editwakasek2').click(function(){
        $('#wakasek2').css('display', 'none');
        $('#edit-wakasek2').css('display', 'block');
        $('#editwakasek2').css('display', 'none');
        $('#canceleditwakasek2').css('display', 'block');
    })
    $('#canceleditwakasek2').click(function(){
        $('#wakasek2').css('display', 'table');
        $('#edit-wakasek2').css('display', 'none');
        $('#editwakasek2').css('display', 'block');
        $('#canceleditwakasek2').css('display', 'none');
    })
    $('#editwakasek3').click(function(){
        $('#wakasek3').css('display', 'none');
        $('#edit-wakasek3').css('display', 'block');
        $('#editwakasek3').css('display', 'none');
        $('#canceleditwakasek3').css('display', 'block');
    })
    $('#canceleditwakasek3').click(function(){
        $('#wakasek3').css('display', 'table');
        $('#edit-wakasek3').css('display', 'none');
        $('#editwakasek3').css('display', 'block');
        $('#canceleditwakasek3').css('display', 'none');
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