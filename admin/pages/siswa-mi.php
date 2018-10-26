  <?php
  
    include '../koneksi.php';

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Siswa
        <small>Sekolah Dasar</small>
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
              <h3 class="box-title">Data Siswa</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <table id='siswa'>
                <thead>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Tahun Ajaran</th>
                  <th>Kelas</th>
                  <th>Jurusan</th>
                  <th>Rombel</th>
                  <th>Putra</th>
                  <th>Putri</th>
                  <th>KMS</th>
                  <th>Non-KMS</th>
                  <th>Total</th>
                </thead>
                <tbody>
                  <?php 
                  $npsn = $_SESSION['npsn'];
                  $query = mysqli_query($conn, "SELECT siswa.*, profil.npsn, profil.nama_sekolah FROM siswa JOIN profil ON profil.npsn = siswa.npsn WHERE profil.jenjang  = 'SD' OR profil.jenjang = 'MI' ");
                  $x = 1;
                  while ($siswa = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                    echo "<tr>
                          <td>$x</td> 
                          <td>"; ?>
                          <small class='fa fa-edit btn btn-info edit' id='editdata<?php echo$x;?>' data-toggle='modal' data-target='#editmodal<?php echo$x;?>' style='margin : 0 1px;'></small>

                              <div id="editmodal<?php echo$x;?>" class="modal fade" role="dialog">
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
                                        $queryedit = mysqli_query($conn, "SELECT * FROM siswa WHERE id = '$siswa[id]'");
                                        $row   = mysqli_fetch_array($queryedit, MYSQLI_BOTH);
                                      ?>
                                      <form class="form-horizontal" action='pages/proses-siswa.php?val=edit&id=<?php echo "$row[id]"?>' method="POST" id="editform">
                                        <div class="form-group">
                                          <label for="tahunajaran" class="col-sm-4 control-label" style="text-align: left;">Tahun Ajaran</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="tahunajaran" id="tahunajaran" class="form-control" value='<?php echo "$row[tahun_ajaran]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kelas" class="col-sm-4 control-label" style="text-align: left;">Kelas</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kelas" id="kelas" class="form-control" value='<?php echo "$row[kelas]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="jurusan" class="col-sm-4 control-label" style="text-align: left;">Jurusan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="jurusan" id="jurusan" class="form-control" value='<?php echo "$row[jurusan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="rombel" class="col-sm-4 control-label" style="text-align: left;">Rombel</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="rombel" id="rombel" class="form-control" value='<?php echo "$row[rombel]";?>'>
                                          </div>
                                        </div> 
                                        <div class="form-group">
                                          <label for="jumlah_putra" class="col-sm-4 control-label" style="text-align: left;">Jumlah Putra</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="jumlah_putra" class="form-control" value='<?php echo "$row[jumlah_putra]";?>'>
                                          </div>
                                        </div> 
                                        <div class="form-group">
                                          <label for="jumlah_putri" class="col-sm-4 control-label" style="text-align: left;">Jumlah Putri</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="jumlah_putri"  class="form-control" value='<?php echo "$row[jumlah_putri]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kms" class="col-sm-4 control-label" style="text-align: left;">KMS</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kms" class="form-control" value='<?php echo "$row[kms]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="Non-kms" class="col-sm-4 control-label" style="text-align: left;">Non KMS</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="non_kms"  class="form-control" value='<?php echo "$row[non_kms]";?>'>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="col-sm-12">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="submit" value="Simpan">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="submit" value="Hapus">
                                          </div>
                                        </div>

                                      </form>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                  <?php echo"
                          <td>$siswa[tahun_ajaran]</td>
                          <td>$siswa[kelas]</td>
                          <td>$siswa[jurusan]</td>
                          <td>$siswa[rombel]</td>
                          <td>$siswa[jumlah_putra]</td>
                          <td>$siswa[jumlah_putri]</td>
                          <td>$siswa[kms]</td>
                          <td>$siswa[non_kms]</td>
                          <td>$siswa[jumlah_siswa]</td>
                    ";
                  $x++;     
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



                                <div id="tambahmodal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                    
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss ="modal">&times;</button>
                                        <h4 class="modal-title">Tambah Data [BELUM]</h4>
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
                                      
                                      <form class="form-horizontal" action='pages/proses-siswa.php?val=tambah' method="POST" id="editform">
                                        <div class="form-group">
                                          <label for="tahunajaran" class="col-sm-4 control-label" style="text-align: left;">Tahun Ajaran</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="tahunajaran" id="tahunajaran" class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kelas" class="col-sm-4 control-label" style="text-align: left;">Kelas</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kelas" id="kelas" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="jurusan" class="col-sm-4 control-label" style="text-align: left;">Jurusan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="jurusan" id="jurusan" class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="rombel" class="col-sm-4 control-label" style="text-align: left;">Rombel</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="rombel" id="rombel" class="form-control" >
                                          </div>
                                        </div> 
                                        <div class="form-group">
                                          <label for="jumlah_putra" class="col-sm-4 control-label" style="text-align: left;">Jumlah Putra</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="jumlah_putra" class="form-control">
                                          </div>
                                        </div> 
                                        <div class="form-group">
                                          <label for="jumlah_putri" class="col-sm-4 control-label" style="text-align: left;">Jumlah Putri</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="jumlah_putri"  class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kms" class="col-sm-4 control-label" style="text-align: left;">KMS</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kms" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="Non-kms" class="col-sm-4 control-label" style="text-align: left;">Non KMS</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="non_kms"  class="form-control">
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="col-sm-12">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="submit" value="Hapus">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="submit" value="Simpan">
                                          </div>
                                        </div>

                                      </form>
                                      </div>
                                    </div>
                                  </div>
                              </div>



  <style type="text/css">
    .paginate_button{
      padding: 0 !important;
      margin-top: 20px;
    }
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
  $(function(){
    $('#siswa').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });

  });
</script>