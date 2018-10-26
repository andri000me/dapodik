  <?php

    //$conn = mysqli_connect("localhost", "root", "", "dapodik");
    include '../koneksi.php';    

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kepala Sekolah
        <small>Semua Sekolah</small>
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
              <h3 class="box-title">Data Kepala Sekolah</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <table id='kepsek'>
                <thead>
                  <th>No</th>
                  <th>Nama Sekolah</th>
                  <th>Kepala Sekolah</th>
                  <th>Tanggal SK</th>
                  <th>Asal SK</th>
                  <th>TMT Jabatan</th>
                  <th>Masa Tugas Ke-</th> 
                  <th>Tanggal Berakhir</th>
                </thead>
                <tbody>
                  <?php  
                    $i = 1;
                    $query = mysqli_query($conn, "SELECT profil.*, kepsek.* FROM profil JOIN kepsek ON profil.npsn = kepsek.npsn ");
                    while ( $kepsek = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                      echo "
                      <tr>
                        <td>$i</td>
                        <td>"?>
                        <small class='edit' id='editdata<?php echo$i;?>' style='margin : 0 1px; text-align: center;'><a href='?page=pages/profil-kepsek.php&level=1&npsn=<?php echo "$kepsek[npsn]";?>'><?php echo "$kepsek[nama_sekolah]"; ?></a></small>
                  <?php
                      echo"
                        </td>
                        <td>$kepsek[kepala_sekolah]</td>
                        <td>$kepsek[tgl_sk]</td>
                        <td>$kepsek[asal_sk]</td>
                        <td>$kepsek[tmt_jabatan]</td>
                        <td>$kepsek[masa_tugaske]</td>
                        <td>$kepsek[tgl_berahir]</td>
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

<script type="text/javascript">
  $(function(){
    $('#kepsek').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });

  });
</script>