<?php

   include '../koneksi.php';
  
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

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Tambah Siswa</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <div>
                                  <div class="modal-dialog">
                                    
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Tambah Data</h4>
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
                                      
                                      <form class="form-horizontal" action='pages/proses-tambah-siswa.php?val=tambah' method="POST" id="editform">
                                        <div class="form-group">
                                          <label for="tahunajaran" class="col-sm-4 control-label" style="text-align: left;">NPSN</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="npsn" id="npsn" class="form-control" >
                                          </div>
                                        </div>
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
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="submit" value="Simpan">
                                          </div>
                                        </div>

                                      </form>
                                      </div>
                                    </div>
                                  </div>
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