  <?php

    //$conn = mysqli_connect("localhost", "root", "", "dapodik");
    include '../koneksi.php';    

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sekolah
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
              <h3 class="box-title">Data Sekolah SMP dan MTS</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <table id='sekolah'>
                <thead>
                  <th>No</th>
                  <th>Nama Sekolah</th>
                  <th>NPSN</th>
                  <th>Jenjang</th>
                  <th>Kabupaten</th>
                </thead>
                <tbody>
                  <?php  
                    $i = 1;
                    $query = mysqli_query($conn, "SELECT profil.* , kabupaten.kabupaten FROM profil JOIN kabupaten ON profil.kab = kabupaten.id WHERE jenjang = 'SMP' OR jenjang = 'MTS' ");
                    while ($sekolah = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                      echo "
                      <tr>
                        <td>$i</td>
                        <td>"?>
                        <small class='edit' id='editdata<?php echo$i;?>' style='margin : 0 1px; text-align: center;'><a href='?page=pages/profil.php&level=1&npsn=<?php echo "$sekolah[npsn]";?>'><?php echo "$sekolah[nama_sekolah]"; ?></a></small>
                  <?php
                      echo"
                        </td>
                        <td>$sekolah[npsn]</td>
                        <td>$sekolah[jenjang]</td>
                        <td>$sekolah[kabupaten]</td>
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
    $('#sekolah').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });

  });
</script>