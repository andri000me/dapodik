  <?php
  
    include '../koneksi.php';
   
    //$query = mysqli_query($conn, "SELECT * FROM profil WHERE npsn = $npsn");
    //$profil = mysqli_fetch_array($query, MYSQLI_BOTH);

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pegawai
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
              <h3 class="box-title">Data Pegawai</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <div class='table_responsive'>
              <table id = 'data_guru'>
                <thead>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Tahun Ajaran</th>
                  <th>Nama Sekolah</th>
                  <th>NBM</th>
                  <th>Jabatan</th>
                </thead>
                <tbody>
                  <?php 
                  $npsn = $_SESSION['npsn'];
                  $query = mysqli_query($conn, "SELECT tenkependik.*, profil.npsn, profil.nama_sekolah FROM tenkependik JOIN profil on tenkependik.npsn = profil.npsn ");
                  $x = 1;
                  while ($tenkependik = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                    echo "<tr>
                          <td>$x</td> 
                          <td>"?>
                          <small style='margin : 0 1px;'><a href='?page=pages/profil-pegawai.php&level=1&id=<?php echo "$tenkependik[id]";?>' style=' font-size: 14px;'><?php echo "$tenkependik[nama]"; ?></a></small>
                  <?php
                    echo"
                          </td>
                          <td>$tenkependik[tahun_ajaran]</td>
                          <td>$tenkependik[nama_sekolah]</td>
                          <td>$tenkependik[nbm]</td>
                          <td>$tenkependik[jabatan]</td>

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
    .table-responsive{
      width: 100%;
      overflow : scroll;
    }
    #data_guru_wrapper .row:nth-child(2){
      padding: 15px;
    }
    #data_guru_wrapper .row .col-sm-12{
      width: 100%;
      overflow-x: auto;
      padding: 0;
    }
    #data_guru_wrapper .row .col-sm-12 table{
      max-width: 5000px;
    }
    #data_guru_wrapper .row .col-sm-12 td{
      min-width: 100px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(1){
      min-width: 10px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(2){
      min-width: 30px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(5){
      min-width: 200px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(3){
      min-width: 100px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(6){
      min-width: 150px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(20){
      min-width: 500px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(23){
      min-width: 200px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(27){
      min-width: 200px;
    }
    #data_guru_wrapper .row .col-sm-12 td:nth-child(28){
      min-width: 200px;
    }
  </style>

  <script type="text/javascript">
  $(function(){
    $('#data_guru').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });

  });
</script>