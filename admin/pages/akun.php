  <?php

    //$conn = mysqli_connect("localhost", "root", "", "dapodik");
    $akunq = mysqli_query($conn, "SELECT * FROM user order by id");

    include '../koneksi.php';

   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
        <small>Akun</small>
      </h1>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-4 connectedSortable">

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

              <div class="body-2">
                <button class="btn btn-default" data-toggle='collapse' data-target='#tambahakun'>Tambah Akun</button> <!--Here is Accordion  -->
 
                <div id='tambahakun' class="collapse">
                <form method="POST" action="pages/proses_tambah_akun.php">
                  <div class="form-group">    
                      <input type="text" name="npsn" placeholder="NPSN" class="form-control" id="npsn">
                   </div>
                  <div class="form-group">    
                    <input type="text" name="nama" placeholder="Nama Sekolah" class="form-control" id='nama'>
                  </div>
                  <div class="form-group">
                    <input type="text" name="username" placeholder="Username" class="form-control" id="username">
                  </div>
                  <div class="form-group input-group">
                    <input type="password" name="password" placeholder="Password" class="form-control" id="password">
                    <span class="input-group-addon" ><i class="fa fa-eye" style="display: block;" id='show'></i><i class="fa fa-eye-slash" style="display: none;" id='hide'></i></span>
                  </div>
                  
                  <input type="submit" name="submit" class="btn btn-info" value="tambah"><br>
                </form>
                </div>
              </div>
              
            </div>
          </div>

        </section>
        <section class="col-lg-8">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">List Akun</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <table id='listakun' class="display">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NPSN</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Level</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  
                    $x = 1; 
                    while($akun = mysqli_fetch_array($akunq, MYSQLI_BOTH)){ ?>
                  <tr>
                    <?php  
                      if ($akun['username'] == $res['username']){
                        $aksi = "";
                      }
                      else if ($akun['username'] != $res['username']){
                        $id = $akun['id'];
                        $aksi = "<a href='pages/proses_hapus_akun.php?id=$id' onClick='checkDelete()' >Hapus</a>";
                      }
                      echo "
                      <td>$x</td>
                      <td>$akun[npsn]</td>
                      <td>$akun[username]</td>
                      <td class='sorting'>$akun[Nama]</td>
                      <td>$akun[level]</td>
                      <td>"; echo"$aksi" ; echo "</td>
                      ";
                      $x = $x+1;
                    ?>
                  </tr> 
                  <?php  
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

    $('#show').click(function(){
      $('#password').attr({type : 'text'});
      $('#show').css("display","none");
      $('#hide').css("display","block");
    });

    $('#hide').click(function(){
      $('#password').attr({type : 'password'});
      $('#show').css("display","block");
      $('#hide').css("display","none");
    })
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
          max-width: 100%;
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
          max-width: 100%;
          text-align: center;
          position: relative;
          padding: 20px;
          border : 1px solid #00c0ef;
        }
        #tambahakun label{
          text-align: left; 
        }
        #show, #hide{
          cursor: pointer;
        }
  </style>