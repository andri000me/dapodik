  <?php
  
    include '../koneksi.php';

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Prestasi
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
              <h3 class="box-title">Prestasi Sekolah</h3>
              <button class="fa fa-plus btn btn-info edit" id='tambahdata' data-toggle='modal' data-target='#tambahprestasi'></button>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <table id="tabel-prestasi">
                <thead>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Tahun Ajaran</th>
                  <th>Sekolah</th>
                  <th>Prestasi</th>
                  <th>Hasil</th>
                  <th>Level</th>
                  <th>Pemegang</th>
                  <th>Tanggal Pelaksanaan</th>
                  <th>Keterangan</th>
                </thead>
                <tbody>
                  <?php  
                    $query = mysqli_query($conn, "SELECT prestasi.*, profil.npsn, profil.nama_sekolah FROM prestasi JOIN profil ON prestasi.npsn = profil.npsn");
                    $i = 1;
                    while ($prestasi = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                      echo "
                      <tr>
                      <td>$i</td>
                      <td>";?>
                        <small class='fa fa-edit btn btn-info edit' id='editdata<?php echo$x;?>' data-toggle='modal' data-target='#editprestasi<?php echo$i;?>' style='margin : 0 1px;'></small>
                        
                        <div id="editprestasi<?php echo$i;?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                                    
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss ="modal">&times;</button>
                                <h4 class="modal-title">Edit Prestasi</h4>
                              </div>
                              <div class="modal-body">
                                 <form class="form-horizontal" action='pages/proses-prestasi.php?val=edit&id=<?php echo "$prestasi[id]"?>' method="POST" id="editform">
                                          <div class="form-group">
                                            <label for="tahunajaran" class="col-sm-4 control-label" style="text-align: left;">Tahun Ajaran</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="tahunajaran" id="tahunajaran" class="form-control" value='<?php echo "$prestasi[thn_ajaran]";?>'>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="tahunajaran" class="col-sm-4 control-label" style="text-align: left;">NPSN</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="npsn" class="form-control" value='<?php echo "$prestasi[npsn]";?>'>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="prestasi" class="col-sm-4 control-label" style="text-align: left;">Prestasi</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="prestasi" id="prestasi" class="form-control" value='<?php echo "$prestasi[jns_prestasi]";?>'>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="prestasi" class="col-sm-4 control-label" style="text-align: left;">Hasil</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="hasil" id="hasil" class="form-control" value='<?php echo "$prestasi[hasil]";?>'>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="level" class="col-sm-4 control-label" style="text-align: left;">Level</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="level" id="level" class="form-control" value='<?php echo "$prestasi[level]";?>'>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="pemegang" class="col-sm-4 control-label" style="text-align: left;">Pemegang</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="pemegang" id="pemegang" class="form-control" value='<?php echo "$prestasi[pemegang]";?>'>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="tgl_plaksanaan" class="col-sm-4 control-label" style="text-align: left;">Tanggal Pelaksanaan</label>
                                            <div class="col-sm-8">
                                              <input type="date" name="tgl_plaksanaan" id="tgl_plaksanaan" class="form-control" value='<?php echo "$prestasi[tgl_plaksanaan]";?>'>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="keterangan" class="col-sm-4 control-label" style="text-align: left;">Keterangan</label>
                                            <div class="col-sm-8">
                                              <textarea type="text" name="keterangan" id="keterangan" class="form-control"><?php echo "$prestasi[ket]";?></textarea>
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
                     <?php 
                     echo" 
                      <td>$prestasi[thn_ajaran]</td>
                      <td>$prestasi[nama_sekolah]</td>
                      <td>$prestasi[jns_prestasi]</td>
                      <td>$prestasi[hasil]</td> 
                      <td>$prestasi[level]</td> 
                      <td>$prestasi[pemegang]</td>
                      <td>$prestasi[tgl_plaksanaan]</td>
                      <td>$prestasi[ket]</td>
                      </tr>
                      ";

                      $i++;
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </section>
      </div>
      <!-- ./ row -->
    </section>
    <!-- ./ content -->

  </div>
  <!-- /.content-wrapper -->


                      <div id="tambahprestasi" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                                    
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss ="modal">&times;</button>
                                <h4 class="modal-title">Edit Prestasi</h4>
                              </div>
                              <div class="modal-body">
                                 <form class="form-horizontal" action='pages/proses-prestasi.php?val=tambah' method="POST" id="tambahform">
                                          <div class="form-group">
                                            <label for="tahunajaran" class="col-sm-4 control-label" style="text-align: left;">NPSN</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="npsn" class="form-control">
                                            </div>
                                          </div>
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
  </style>

  <script type="text/javascript">
  $(function(){
    $('#tabel-prestasi').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });

  });
  </script>