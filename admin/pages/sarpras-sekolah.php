  <?php
  
    include '../koneksi.php';
    $npsn = $_SESSION['npsn'];

    $qsarpras = mysqli_query($conn, "SELECT * FROM sarpras WHERE npsn = $npsn");

    $qprofil = mysqli_query($conn, "SELECT nama_sekolah FROM profil WHERE npsn = $_SESSION[npsn]");
    $profil = mysqli_fetch_array($qprofil, MYSQLI_BOTH);
    

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sarpras
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
              <h3 class="box-title">Sarana Prasarana</h3>
              <button class="fa fa-plus btn btn-info tambah" data-toggle='modal' data-target='#tambahsarprasmodal'></button>
            </div>
            <div class="box-body" style="min-height: 450px;">

              <div style="overflow-x: scroll; max-width: 10000px;">
                <table id="sarpras">
                  <thead>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Nama Prasarana</th>
                    <th>Jumlah</th>
                    <th>Kondisi Baik</th>
                    <th>Kondisi Rusak Ringan</th>
                    <th>Kondisi Rusak Sedang</th>
                    <th>Kondisi Rusak Berat</th>
                    <th>Kondisi Sarpras</th>
                    <th>Status Kepemilikan</th>
                    <th>Tahun Pengadaan</th>

                  </thead>
                  <tbody>
                    <?php 
                    $x = 1; 
                    while ($sarpras = mysqli_fetch_array($qsarpras, MYSQLI_BOTH)) {
                      echo "
                      <tr>
                        <td>$x</td>
                        <td>"; ?>
                        <small class='fa fa-edit btn btn-info edit' id='editdata<?php echo$x;?>' data-toggle='modal' data-target='#edittanahmodal<?php echo$x;?>' style='margin : 0 1px; text-align: center;'></small>

                          <div id="edittanahmodal<?php echo$x;?>" class="modal fade" role="dialog">
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
                                  $qs = mysqli_query($conn, "SELECT * FROM sarpras WHERE id = '$sarpras[id]'");
                                  $rows   = mysqli_fetch_array($qs, MYSQLI_BOTH);
                                ?>

                                <form class="form-horizontal" action='pages/proses-sarpras.php?val=edit&id=<?php echo "$rows[id]"?>' method="POST" id="editform">
                                        <div class="form-group">
                                          <label for="nama_prasarana" class="col-sm-4 control-label" style="text-align: left;">Nama Prasarana</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nama_prasarana" class="form-control" value='<?php echo "$rows[nama_prasarana]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="jumlah" class="col-sm-4 control-label" style="text-align: left;">jumlah</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="jumlah"  class="form-control" value='<?php echo "$rows[jumlah]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_baik" class="col-sm-4 control-label" style="text-align: left;">Kondisi Baik</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_baik" class="form-control" value='<?php echo "$rows[kondisi_baik]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_rusakringan" class="col-sm-4 control-label" style="text-align: left;">Kondisi Rusak Ringan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_rusakringan" class="form-control" value='<?php echo "$rows[kondisi_rusakringan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_rusaksedang" class="col-sm-4 control-label" style="text-align: left;">Kondisi Rusak Sedang</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_rusaksedang" class="form-control" value='<?php echo "$rows[kondisi_rusaksedang]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_rusakberat" class="col-sm-4 control-label" style="text-align: left;">Kondisi Rusak Berat</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_rusakberat"  class="form-control" value='<?php echo "$rows[kondisi_rusakberat]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_sarpras" class="col-sm-4 control-label" style="text-align: left;">Kondisi Sarpras</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="kondisi_sarpras" class="form-control" value='<?php echo "$rows[kondisi_sarpras]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="status_kepemilikan" class="col-sm-4 control-label" style="text-align: left;">Status Kepemilikan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="status_kepemilikan" class="form-control" value='<?php echo "$rows[status_kepemilikan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tahun_pengadaan" class="col-sm-4 control-label" style="text-align: left;">Tahun Pengadaan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="tahun_pengadaan"  class="form-control" value='<?php echo "$rows[tahun_pengadaan]";?>'>
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
                        <td>$sarpras[nama_prasarana]</td>
                        <td>$sarpras[jumlah]</td>
                        <td>$sarpras[kondisi_baik]</td>
                        <td>$sarpras[kondisi_rusakringan]</td>
                        <td>$sarpras[kondisi_rusaksedang]</td>
                        <td>$sarpras[kondisi_rusakberat]</td>
                        <td>$sarpras[kondisi_sarpras]</td>
                        <td>$sarpras[status_kepemilikan]</td>
                        <td>$sarpras[tahun_pengadaan]</td>
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

                          <div id="tambahsarprasmodal" class="modal fade" role="dialog">
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

                                <form class="form-horizontal" action='pages/proses-sarpras.php?val=tambah&npsn=<?php echo "$npsn"; ?>' method="POST">
                                        <div class="form-group">
                                          <label for="nama_prasarana" class="col-sm-4 control-label" style="text-align: left;">Nama Prasarana</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nama_prasarana" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="jumlah" class="col-sm-4 control-label" style="text-align: left;">Jumlah</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="jumlah" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_baik" class="col-sm-4 control-label" style="text-align: left;">Kondisi Baik</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_baik"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_rusakringan" class="col-sm-4 control-label" style="text-align: left;">Kondisi Rusak Ringan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_rusakringan"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_rusaksedang" class="col-sm-4 control-label" style="text-align: left;">Kondisi Rusak Sedang</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_rusaksedang"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_rusakberat" class="col-sm-4 control-label" style="text-align: left;">Kondisi Rusak Berat</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_rusakberat"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_sarpras" class="col-sm-4 control-label" style="text-align: left;">Kondisi Sarpras</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_sarpras"  class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="status_kepemilikan" class="col-sm-4 control-label" style="text-align: left;">Status Kepemilikan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="status_kepemilikan" id="tahun_pembangunan" class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tahun_pengadaan" class="col-sm-4 control-label" style="text-align: left;">Tahun Pengadaan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="tahun_pengadaan" class="form-control" >
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="col-sm-12">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="submit" value="Tambah">
                                          </div>
                                        </div>
                                </form>

                                </div>
                              </div>

                            </div>
                          </div>

                          
  <style type="text/css">
    .edit{
      float: left; 
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
    #sarpras td{
      min-width: 100px !important;
    }
    #sarpras td:nth-child(1){
      min-width: 20px !important;
    }
    #sarpras td:nth-child(2){
      min-width: 70px !important;
      text-align: center;
    }
    #sarpras td:nth-child(3){
      min-width: 200px !important;
    }
    #sarpras td:nth-child(12){
      min-width: 100px !important;
    }
  </style>

<script type="text/javascript">
  $(function(){
    $('#sarpras').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });

  });
</script>