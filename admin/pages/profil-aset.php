<?php

   include '../koneksi.php';

   $npsn = $_GET['npsn'];
   $qtanah = mysqli_query($conn, "SELECT aset_tanah.*, profil.npsn, profil.nama_sekolah FROM aset_tanah JOIN profil ON aset_tanah.npsn = profil.npsn WHERE profil.npsn = '$npsn' ");
   $qbangunan = mysqli_query($conn, "SELECT aset_bangunan.*, profil.npsn, profil.nama_sekolah FROM aset_bangunan JOIN profil ON aset_bangunan.npsn = profil.npsn WHERE profil.npsn = '$npsn' ");
   $qsarpras = mysqli_query($conn, "SELECT sarpras.*, profil.npsn, profil.nama_sekolah FROM sarpras JOIN profil ON sarpras.npsn = profil.npsn WHERE profil.npsn = '$npsn' ");
   $qsekolah = mysqli_query($conn, "SELECT nama_sekolah, npsn FROM profil WHERE npsn = $npsn");
   $sekolah = mysqli_fetch_array($qsekolah, MYSQLI_BOTH);
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
          <div class="box box-info">
            <div class="box-header" style="margin-bottom: 2em">
              <h3 style="margin: 1em 0 0 0;"><?php echo "$sekolah[nama_sekolah]"; ?></h3>
            </div>
          </div>
        </section>

        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Aset Tanah</h3>
              <button class="fa fa-plus btn btn-info tambah" data-toggle='modal' data-target='#tambahtanahmodal'></button>
            </div>
            <div class="box-body" style="min-height: 450px;">
              

              <div style="overflow-x: scroll; max-width: 10000px;">
                <table id="aset_tanah">
                  <thead>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>No Persil</th>
                    <th>Kepemilikan</th>
                    <th>Atas Nama Sertifikat</th>
                    <th>Status Tanah</th>
                    <th>Luas Tanah</th>
                    <th>No Sertifikat</th>
                    <th>Tanggal Sertifikat</th>
                    <th>Tahun Perolehan</th>
                    <th>Harga Perolehan</th>
                    <th>Asal Usul</th>
                    <th>Letak</th>
                    <th>Peruntukan</th>
                  </thead>
                  <tbody>
                    <?php 
                    $x = 1; 
                    while ($tanah = mysqli_fetch_array($qtanah, MYSQLI_BOTH)) {
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
                                  $queryedittanah = mysqli_query($conn, "SELECT * FROM aset_tanah WHERE id = '$tanah[id]'");
                                  $rows   = mysqli_fetch_array($queryedittanah, MYSQLI_BOTH);
                                ?>

                                <form class="form-horizontal" action='pages/proses-aset.php?val=edittanah&id=<?php echo "$rows[id]"?>' method="POST" id="editform">
                                        <div class="form-group">
                                          <label for="no_persil" class="col-sm-4 control-label" style="text-align: left;">No Persil</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="no_persil" id="no_persil" class="form-control" value='<?php echo "$rows[no_persil]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kepemilikan" class="col-sm-4 control-label" style="text-align: left;">Kepemilikan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kepemilikan" id="kepemilikan" class="form-control" value='<?php echo "$rows[kepemilikan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="atasnama_sertifikat" class="col-sm-4 control-label" style="text-align: left;">Atas Nama</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="atasnama_sertifikat" id="atasnama_sertifikat" class="form-control" value='<?php echo "$rows[atasnama_sertifikat]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="status_tanah" class="col-sm-4 control-label" style="text-align: left;">Status Tanah</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="status_tanah" id="status_tanah" class="form-control" value='<?php echo "$rows[status_tanah]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="luas_tanah" class="col-sm-4 control-label" style="text-align: left;">Luas Tanah</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="luas_tanah" id="luas_tanah" class="form-control" value='<?php echo "$rows[luas_tanah]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="no_sertifikat" class="col-sm-4 control-label" style="text-align: left;">No Sertifikat</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="no_sertifikat" id="no_sertifikat" class="form-control" value='<?php echo "$rows[no_sertifikat]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tgl_sertifikat" class="col-sm-4 control-label" style="text-align: left;">Tanggal Sertifikat</label>
                                          <div class="col-sm-8">
                                            <input type="date" name="tgl_sertifikat" id="tgl_sertifikat" class="form-control" value='<?php echo "$rows[tgl_sertifikat]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="thn_perolehan" class="col-sm-4 control-label" style="text-align: left;">Tahun Perolehan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="thn_perolehan" id="thn_perolehan" class="form-control" value='<?php echo "$rows[thn_perolehan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="harga_perolehan" class="col-sm-4 control-label" style="text-align: left;">Harga Perolehan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="harga_perolehan" id="harga_perolehan" class="form-control" value='<?php echo "$rows[harga_perolehan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="asal_usul" class="col-sm-4 control-label" style="text-align: left;">Asal Usul</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="asal_usul" id="asal_usul" class="form-control" value='<?php echo "$rows[asal_usul]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="letak" class="col-sm-4 control-label" style="text-align: left;">Letak</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="letak" id="letak" class="form-control" value='<?php echo "$rows[letak]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="peruntukan" class="col-sm-4 control-label" style="text-align: left;">Peruntukan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="peruntukan" id="peruntukan" class="form-control" value='<?php echo "$rows[peruntukan]";?>'>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="col-sm-12">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="tanah" value="Simpan">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="tanah" value="Hapus">
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
                        <td>$tanah[no_persil]</td>
                        <td>$tanah[kepemilikan]</td>
                        <td>$tanah[atasnama_sertifikat]</td>
                        <td>$tanah[status_tanah]</td>
                        <td>$tanah[luas_tanah]</td>
                        <td>$tanah[no_sertifikat]</td>
                        <td>$tanah[tgl_sertifikat]</td>
                        <td>$tanah[thn_perolehan]</td>
                        <td>$tanah[harga_perolehan]</td>
                        <td>$tanah[asal_usul]</td>
                        <td>$tanah[letak]</td>
                        <td>$tanah[peruntukan]</td>
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
              <h3 class="box-title">Aset Bangunan</h3>
              <button class="fa fa-plus btn btn-info tambah" id='tambahdata' data-toggle='modal' data-target='#tambahbangunanmodal'></button>
            </div>
            <div class="box-body" style="min-height: 450px;">
              
              <div style="overflow-x: scroll; max-width: 10000px;">
                <table id="aset_bangunan">
                  <thead>
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Nama Bangunan</th>
                    <th>Kode Bangunan</th>
                    <th>Register Bangunan</th>
                    <th>Kondisi Bangunan</th>
                    <th>Kontruksi Bangunan</th>
                    <th>Luas Lantai</th>
                    <th>Lokasi</th>
                    <th>Tahun Pembangunan</th>
                    <th>Luas Bangunan</th>
                    <th>Biaya Pembangunan</th>
                  </thead>
                  <tbody>
                    <?php 
                    $i = 1; 
                    while ($bangunan = mysqli_fetch_array($qbangunan, MYSQLI_BOTH)) {
                      echo "
                      <tr>
                        <td>$i</td>
                        <td>"; ?>
                        <small class='fa fa-edit btn btn-info edit' id='editdata<?php echo$i;?>' data-toggle='modal' data-target='#editsmodal<?php echo$i;?>' style='margin : 0 1px; text-align: center;'></small>

                          <div id="editsmodal<?php echo$i;?>" class="modal fade" role="dialog">
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
                                  $queryedit = mysqli_query($conn, "SELECT * FROM aset_bangunan WHERE id = '$bangunan[id]'");
                                  $row   = mysqli_fetch_array($queryedit, MYSQLI_BOTH);
                                ?>

                                <form class="form-horizontal" action='pages/proses-aset.php?val=editbangunan&id=<?php echo "$row[id]"?>' method="POST" id="editform">
                                        <div class="form-group">
                                          <label for="nama_bangunan" class="col-sm-4 control-label" style="text-align: left;">Nama Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nama_bangunan" id="nama_bangunan" class="form-control" value='<?php echo "$row[nama_bangunan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kode_bangunan" class="col-sm-4 control-label" style="text-align: left;">Kode Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kode_bangunan" id="kode_bangunan" class="form-control" value='<?php echo "$row[kode_bangunan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="register_bangunan" class="col-sm-4 control-label" style="text-align: left;">Register Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="register_bangunan" id="register_bangunan" class="form-control" value='<?php echo "$row[register_bangunan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_bangunan" class="col-sm-4 control-label" style="text-align: left;">Kondisi Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_bangunan" id="kondisi_bangunan" class="form-control" value='<?php echo "$row[kondisi_bangunan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kostruksi_bangunan" class="col-sm-4 control-label" style="text-align: left;">Konstruksi Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kostruksi_bangunan" id="kostruksi_bangunan" class="form-control" value='<?php echo "$row[kostruksi_bangunan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="luas_lantai" class="col-sm-4 control-label" style="text-align: left;">Luas Lantai</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="luas_lantai" id="luas_lantai" class="form-control" value='<?php echo "$row[luas_lantai]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="lokasi" class="col-sm-4 control-label" style="text-align: left;">Lokasi Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="lokasi" id="lokasi" class="form-control" value='<?php echo "$row[lokasi]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tahun_pembangunan" class="col-sm-4 control-label" style="text-align: left;">Tahun Pembangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="tahun_pembangunan" id="tahun_pembangunan" class="form-control" value='<?php echo "$row[tahun_pembangunan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="luas_bangunan" class="col-sm-4 control-label" style="text-align: left;">Luas Bangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control" value='<?php echo "$row[luas_bangunan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="biaya_pembangunan" class="col-sm-4 control-label" style="text-align: left;">Biaya Pemangunan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="biaya_pembangunan" id="biaya_pembangunan" class="form-control" value='<?php echo "$row[biaya_pembangunan]";?>'>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="col-sm-12">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="bangunan" value="Simpan">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="bangunan" value="Hapus">
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
                        <td>$bangunan[nama_bangunan]</td>
                        <td>$bangunan[kode_bangunan]</td>
                        <td>$bangunan[register_bangunan]</td>
                        <td>$bangunan[kondisi_bangunan]</td>
                        <td>$bangunan[kostruksi_bangunan]</td>
                        <td>$bangunan[luas_lantai]</td>
                        <td>$bangunan[lokasi]</td>
                        <td>$bangunan[tahun_pembangunan]</td>
                        <td>$bangunan[luas_bangunan]</td>
                        <td>$bangunan[biaya_pembangunan]</td>
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

         <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Sarpras</h3>
              <button class="fa fa-plus btn btn-info tambah" id='tambahdata' data-toggle='modal' data-target='#tambahsarprasmodal'></button>
            </div>
            <div class="box-body" style="min-height: 450px;">
              
              <div style="overflow-x: scroll; max-width: 10000px;">
                <table id="aset_sarpras">
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
                    $i = 1; 
                    while ($sarpras = mysqli_fetch_array($qsarpras, MYSQLI_BOTH)) {
                      echo "
                      <tr>
                        <td>$i</td>
                        <td>"; ?>
                        <small class='fa fa-edit btn btn-info edit' id='editdata<?php echo$i;?>' data-toggle='modal' data-target='#editmodal<?php echo$i;?>' style='margin : 0 1px; text-align: center;'></small>

                          <div id="editmodal<?php echo$i;?>" class="modal fade" role="dialog">
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
                                  $queryedit = mysqli_query($conn, "SELECT * FROM sarpras WHERE id = '$sarpras[id]'");
                                  $row   = mysqli_fetch_array($queryedit, MYSQLI_BOTH);
                                ?>

                                <form class="form-horizontal" action='pages/proses-aset.php?val=editsarpras&id=<?php echo "$row[id]"?>' method="POST" id="editform">
                                        <div class="form-group">
                                          <label for="nama_prasarana" class="col-sm-4 control-label" style="text-align: left;">Nama sarpras</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nama_prasarana"  class="form-control" value='<?php echo "$row[nama_prasarana]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="jumlah" class="col-sm-4 control-label" style="text-align: left;">Jumlah</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="jumlah"  class="form-control" value='<?php echo "$row[jumlah]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_baik" class="col-sm-4 control-label" style="text-align: left;">Kondisi Baik</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_baik" class="form-control" value='<?php echo "$row[kondisi_baik]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_rusakringan" class="col-sm-4 control-label" style="text-align: left;">Kondisi Rusak Ringan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_rusakringan" class="form-control" value='<?php echo "$row[kondisi_rusakringan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_rusaksedang" class="col-sm-4 control-label" style="text-align: left;">Kondisi Rusak Sedang</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_rusaksedang" class="form-control" value='<?php echo "$row[kondisi_rusaksedang]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_rusakberat" class="col-sm-4 control-label" style="text-align: left;">Kondisi Rusak Berat</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_rusakberat"  class="form-control" value='<?php echo "$row[kondisi_rusakberat]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kondisi_sarpras" class="col-sm-4 control-label" style="text-align: left;">Kondisi Sarpras</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kondisi_sarpras" class="form-control" value='<?php echo "$row[kondisi_sarpras]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="status_kepemilikan" class="col-sm-4 control-label" style="text-align: left;">Status Kepemilikan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="status_kepemilikan" class="form-control" value='<?php echo "$row[status_kepemilikan]";?>'>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tahun_pengadaan" class="col-sm-4 control-label" style="text-align: left;">Tahun Pengadaan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="tahun_pengadaan"  class="form-control" value='<?php echo "$row[tahun_pengadaan]";?>'>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <div class="col-sm-12">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="sarpras" value="Simpan">
                                            <input type="submit" style="float: right; position: relative; margin: 20px 5px;" class="btn btn-info" name="sarpras" value="Hapus">
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

                                <form class="form-horizontal" action='pages/proses-aset.php?val=tambahbangunan&npsn=<?php echo "$npsn"; ?>' method="POST">
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

                                <form class="form-horizontal" action='pages/proses-aset.php?val=tambahtanah&npsn=<?php echo "$npsn"; ?>' method="POST">
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

                                <form class="form-horizontal" action='pages/proses-aset.php?val=tambahsarpras&npsn=<?php echo "$npsn"; ?>' method="POST">
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
    $('#aset_sarpras').DataTable({
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