  <?php

    //$conn = mysqli_connect("localhost", "root", "", "dapodik");
    $akunq = mysqli_query($conn, "SELECT * FROM user order by id");

    include '../koneksi.php';

    $qprofil = mysqli_query($conn, "SELECT nama_sekolah FROM profil WHERE npsn = $_SESSION[npsn]");
    $profil = mysqli_fetch_array($qprofil, MYSQLI_BOTH);

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Akun
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
              <h3 class="box-title">Akun Info</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <div class="body-1">
                <div class="akun-info">
                  <h3>[ ADMIN ]</h3>
                  <p>Nama : <?php echo "$_SESSION[uname]"; ?></p>
                  <p>Username: <?php 
                      $dir = mysqli_query($conn, "SELECT * FROM user WHERE id = '$_SESSION[id]'"); 
                      $tot = mysqli_num_rows($dir);
                      $res = mysqli_fetch_array($dir, MYSQLI_BOTH);
                      echo "$res[username]" ?>      
                  </p>
                </div>
                <div class="akun-ubah collapse" id="ganti-akun">
                  <form method="POST" action="pages/proses_ganti_password.php">
                    <div class="form-group">
                      <input type="text" name="username" value="<?php echo "$res[username]" ?>" class="form-control"> 
                    </div>
                    <div class="form-group">    
                      <input type="text" name="nama" value="<?php echo "$_SESSION[uname]" ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="password" name="passwordlama" placeholder="Password Lama" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="password" name="passwordbaru" placeholder="Password Baru" class="form-control">
                    </div>
                    <input type="submit" name="submit" class="btn btn-info" value="ubah"><br>
                  </form>
                </div>
                <a href="#" id='btn-ganti' data-toggle='collapse' data-target='#ganti-akun' onclick='trigger()'>Ganti Password</a>
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

  <script type="text/javascript">
    function trigger(){
      if ($('#btn-ganti').text() == "Batal"){
        $('#btn-ganti').text("Ganti Password");
      }
      else if ($('#btn-ganti').text() == "Ganti Password"){
        $('#btn-ganti').text("Batal");
      }
    }
    function checkDelete(){
        var res = confirm('Hapus?');
        if(!res){
          event.preventDefault()
        }
    }
  </script>

  <style type="text/css">
    .box-body{
      padding: 2em;
    }
    .box-body .body-1{
      text-align: center;
      margin-bottom: 50px;
    }
        .body-1 .akun-ubah{
          margin:auto;
          margin-top: 2em;
          margin-bottom: 2em;
          max-width: 60%;
          text-align: center;
          position: relative;
          padding: 20px;
          border : 1px solid #00c0ef;
        }
    .box-body .body-2{
      text-align: center;
    }
        #tambahakun{
          margin:auto;
          margin-top: 2em;
          margin-bottom: 2em;
          max-width: 60%;
          text-align: center;
          position: relative;
          padding: 20px;
          border : 1px solid #00c0ef;
        }
        #tambahakun label{
          text-align: left; 
        }
  </style>