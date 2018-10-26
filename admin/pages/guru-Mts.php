  <?php

    //$conn = mysqli_connect("localhost", "root", "", "dapodik");
    include '../koneksi.php';    

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Guru
        <small>Sekolah Menengah Pertama</small>
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
              <h3 class="box-title">Data Guru SMP dan MTS</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <table id='guru'>
                <thead>
                  <th>No</th>
                  <th>Nama Guru</th>
                  <th>Tahun Ajaran</th>
                  <th>Nama Sekolah</th>
                  <th>NPSN</th>
                  <th>Bidang</th>
                </thead>
                <tbody>
                  <?php  
                    $i = 1;
                    $query = mysqli_query($conn, "SELECT data_guru.* , profil.npsn, profil.nama_sekolah FROM data_guru JOIN profil ON data_guru.npsn = profil.npsn WHERE profil.jenjang = 'MTS' OR profil.jenjang = 'SMP' ");
                    while ( $guru = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                      echo "
                      <tr>
                        <td>$i</td>
                        <td>"?>
                        <small class='edit' id='editdata<?php echo$i;?>' style='margin : 0 1px; text-align: center;'><a href='?page=pages/profil-guru.php&level=1&id=<?php echo "$guru[id]";?>'><?php echo "$guru[nama_guru]"; ?></a></small>
                  <?php
                      echo"
                        </td>
                        <td>$guru[tahun_ajaran]</td>
                        <td>$guru[nama_sekolah]</td>
                        <td>$guru[npsn]</td>
                        <td>$guru[bidang]</td>
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
    $('#guru').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });

  });
</script>