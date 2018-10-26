  <?php
  
    include '../koneksi.php';


    $query = mysqli_query($conn, "SELECT profil.nama_sekolah, profil.npsn, COUNT(aset_tanah.id) AS jumlah_tanah FROM aset_tanah JOIN profil ON profil.npsn = aset_tanah.npsn JOIN kabupaten ON kabupaten.id = profil.kab WHERE profil.jenjang = 'MA' OR profil.jenjang = 'SMA' GROUP BY profil.npsn ");
    


   ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Aset
        <small>Sekolah Menengah Atas</small>
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
              <h3 class="box-title">Aset Bangunan</h3>
              <button class="fa fa-plus btn btn-info tambah" id='tambahdata' data-toggle='modal' data-target='#tambahbangunanmodal'></button>
            </div>
            <div class="box-body" style="min-height: 450px; ">
              <div style="overflow-x: scroll; max-width: 10000px;">
                <table id='data-sekolah' class="table-responsive">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NPSN</th>
                    <th>Nama Sekolah</th>
                    <th>Jumlah Aset Tanah</th>
                    <th>Jumlah Aset Bangunan</th>
                    <th>Jumlah Sarpras</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    while($aset = mysqli_fetch_array($query, MYSQLI_BOTH)){
                      $qbangunan = mysqli_query($conn, "SELECT npsn, COUNT(id) AS jumlah_bangunan FROM aset_bangunan WHERE npsn = '$aset[npsn]'");
                      $bangunan = mysqli_fetch_array($qbangunan, MYSQLI_BOTH);
                      $qsarpras = mysqli_query($conn, "SELECT npsn, COUNT(id) AS jumlah_sarpras FROM sarpras WHERE npsn = '$aset[npsn]'");
                      $sarpras = mysqli_fetch_array($qsarpras, MYSQLI_BOTH);
                      echo "
                      <tr>
                        <td>$i</td>
                        <td>$aset[npsn]</td>
                        <td><a href='?page=pages/profil-aset.php&level=1&npsn=$aset[npsn]'>$aset[nama_sekolah]</a></td>
                        <td>$aset[jumlah_tanah]</td>
                        <td>$bangunan[jumlah_bangunan]</td>
                        <td>$sarpras[jumlah_sarpras]</td>
                      </tr>
                      ";
                      $i++;
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

                          <div id="tambahbangunanmodal" class="modal fade" role="dialog">
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

                                <form class="form-horizontal" action='pages/proses-aset.php?val=tambahbangunan' method="POST">
                                        <div class="form-group">
                                          <label for="nama_bangunan" class="col-sm-4 control-label" style="text-align: left;">Nama Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nama_bangunan" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kode_bangunan" class="col-sm-4 control-label" style="text-align: left;">Kode Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kode_bangunan" class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="register_bangunan" class="col-sm-4 control-label" style="text-align: left;">Register Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="register_bangunan"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_bangunan" class="col-sm-4 control-label" style="text-align: left;">Kondisi Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_bangunan"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kostruksi_bangunan" class="col-sm-4 control-label" style="text-align: left;">Konstruksi Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kostruksi_bangunan"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="luas_lantai" class="col-sm-4 control-label" style="text-align: left;">Luas Lantai</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="luas_lantai"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="lokasi" class="col-sm-4 control-label" style="text-align: left;">Lokasi Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="lokasi"  class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tahun_pembangunan" class="col-sm-4 control-label" style="text-align: left;">Tahun Pembangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="tahun_pembangunan" id="tahun_pembangunan" class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="luas_bangunan" class="col-sm-4 control-label" style="text-align: left;">Luas Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="biaya_pembangunan" class="col-sm-4 control-label" style="text-align: left;">Biaya Pemangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="biaya_pembangunan" id="biaya_pembangunan" class="form-control" >
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

                          <div id="tambahtanahmodal" class="modal fade" role="dialog">
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

                                <form class="form-horizontal" action='pages/proses-aset.php?val=tambahtanah' method="POST">
                                        <div class="form-group">
                                          <label for="no_persil" class="col-sm-4 control-label" style="text-align: left;">No Persil</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="no_persil"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kepemilikan" class="col-sm-4 control-label" style="text-align: left;">Kepemilikan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kepemilikan"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="atasnama_sertifikat" class="col-sm-4 control-label" style="text-align: left;">Atas Nama</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="atasnama_sertifikat"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="status_tanah" class="col-sm-4 control-label" style="text-align: left;">Status Tanah</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="status_tanah"  class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="luas_tanah" class="col-sm-4 control-label" style="text-align: left;">Luas Tanah</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="luas_tanah"  class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="no_sertifikat" class="col-sm-4 control-label" style="text-align: left;">No Sertifikat</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="no_sertifikat"  class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tgl_sertifikat" class="col-sm-4 control-label" style="text-align: left;">Tanggal Sertifikat</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="tgl_sertifikat"  class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="thn_perolehan" class="col-sm-4 control-label" style="text-align: left;">Tahun Perolehan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="thn_perolehan"  class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="harga_perolehan" class="col-sm-4 control-label" style="text-align: left;">Harga Perolehan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="harga_perolehan"  class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="asal_usul" class="col-sm-4 control-label" style="text-align: left;">Asal Usul</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="asal_usul"  class="form-control" >
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="letak" class="col-sm-4 control-label" style="text-align: left;">Letak</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="letak"  class="form-control">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="peruntukan" class="col-sm-4 control-label" style="text-align: left;">Peruntukan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="peruntukan"  class="form-control">
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
    #aset_bangunan td{
      min-width: 100px !important;
    }
    #aset_bangunan td:nth-child(1){
      min-width: 20px !important;
    }
    #aset_bangunan td:nth-child(2){
      min-width: 70px !important;
      text-align: center;
    }
    #aset_bangunan td:nth-child(4){
      min-width: 300px !important;
    }
    #aset_bangunan td:nth-child(10){
      min-width: 500px !important;
    }
    #aset_tanah td{
      min-width: 100px !important;
    }
    #aset_tanah td:nth-child(1){
      min-width: 20px !important;
    }
    #aset_tanah td:nth-child(2){
      min-width: 70px !important;
      text-align: center;
    }
    #aset_tanah td:nth-child(14){
      min-width: 200px !important;
    }
    #aset_tanah td:nth-child(13){
      min-width: 100px !important;
    }
  </style>

<script type="text/javascript">
  $(function(){
    $('#aset_bangunan').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });
    $('#aset_tanah').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });
    $('#data-sekolah').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });
  });
</script>
