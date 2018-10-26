  <?php
    include '../koneksi.php';
    $npsn = $_GET['npsn'];
    $query = mysqli_query($conn, "SELECT * FROM profil WHERE npsn = $npsn");
    $profil = mysqli_fetch_array($query, MYSQLI_BOTH);
    $kab = mysqli_query($conn, "SELECT kabupaten.id, kabupaten.kabupaten, profil.kab FROM profil JOIN kabupaten ON kabupaten.id = profil.kab WHERE profil.npsn = $npsn");
    $k = mysqli_fetch_array($kab, MYSQLI_BOTH);
   ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sekolah
        <small><?php echo "$profil[nama_sekolah]"; ?></small>

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
              <h3 style="margin: 1em 0 1em 0;"><?php echo "$profil[nama_sekolah]"; ?></h3>
              <!-- <form method="post" action='pages/hapus-sekolah.php?npsn=<?php echo "$profil[npsn]" ?>'>
                <button class="fa fa-trash btn btn-danger edit" id='hapusprofil' onclick = "checkDelete()" style="font-size:16px; display: inline-block; float: right;"></button>
              </form> -->
              
            </div>
          </div>
        </section>

        <section class="col-md-12">
          <div class="menu row">
            <div class="col-md-2 list"><div><a href="?page=pages/list-guru.php&level=1&npsn=<?php echo "$npsn";?>">Guru</a></div></div>
            <div class="col-md-2 list"><div><a href="?page=pages/profil-kepsek.php&level=1&npsn=<?php echo "$npsn";?>">Kepala Sekolah</a></div></div>
            <div class="col-md-2 list"><div><a href="?page=pages/profil-aset.php&level=1&npsn=<?php echo "$npsn";?>">Aset</a></div></div>
            <div class="col-md-2 list"><div><a href="?page=pages/list-siswa.php&level=1&npsn=<?php echo "$npsn";?>">Siswa</a></div></div>
            <div class="col-md-2 list"><div><a href="?page=pages/list-pegawai.php&level=1&npsn=<?php echo "$npsn";?>">Pegawai</a></div></div>
          </div>
        </section>

        <section class="col-lg-5 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Profil Sekolah</h3>
              <button class="fa fa-edit btn btn-info edit" id='editprofil' style="display: block;"></button>
              <button class="btn btn-info edit" id='canceleditprofil' style="display: none;" >Cancel</button>

            </div>
            <div class="box-body" style="min-height: 450px;">
              <table style="display: table; min-width: 100%" id='profil'>
                <tr>
                  <td><b>NPSN</b></td>
                  <td><?php echo "$profil[npsn]"; ?></td>
                </tr>
                <tr>
                  <td><b>Nama Sekolah</b></td>
                  <td><?php echo "$profil[nama_sekolah]"; ?></td>
                </tr>
                <tr>
                  <td><b>Jenjang</b></td>
                  <td><?php echo "$profil[jenjang]"; ?></td>
                </tr>
                <tr>
                  <td><b>Alamat</b></td>
                  <td><?php echo "$profil[alamat]"; ?></td>
                </tr>
                <tr>
                  <td><b>Kab</b></td>
                  <td><?php echo "$k[kabupaten]"; ?></td>
                </tr>
                <tr>
                  <td><b>Telp</b></td>
                  <td><?php echo "$profil[telepon]"; ?></td>
                </tr>
                <tr>
                  <td><b>Email</b></td>
                  <td><?php echo "$profil[email]"; ?></td>
                </tr>
                <tr>
                  <td><b>Website</b></td>
                  <td><?php echo "<a href='$profil[web]'>$profil[web]"; ?></a></td>
                </tr>
              </table>
              <form id='edit-profil' style="display: none;" method="POST" action='pages/proses-update-profil.php?item=profil&npsn=<?php echo "$npsn"; ?>'>
                <table>
                  <tr>
                    <td style="width: 25%"><b>NPSN</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='npsn' value = '$profil[npsn]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Nama Sekolah</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='nama_sekolah' value = '$profil[nama_sekolah]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Jenjang</b></td>
                    <?php $jenjang = $profil['jenjang'] ?>
                    <td><select class='form-control' type='text' name='jenjang'>
                          <option value='SD'  <?php if($jenjang == 'SD'){echo "selected";} ?> >SD</option>
                          <option value='SMP' <?php if($jenjang == 'SMP'){echo "selected";} ?>>SMP</option>
                          <option value='SMA' <?php if($jenjang == 'SMA'){echo "selected";} ?> >SMA</option>
                        </select></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Alamat</b></td>
                    <td><?php echo "<textarea class='form-control' type='text' name='alamat'>$profil[alamat]</textarea>";?></td>
                  </tr>
                  
                  <tr>
                    <td style="width: 25%"><b>Kabupaten</b></td>
                    <td><select class='form-control' type='text' name='kabupaten'>
                            <option value='1' <?php if($profil['kab'] == '1'){echo "selected";} ?> >Bantul</option>
                            <option value='2' <?php if($profil['kab'] == '2'){echo "selected";} ?> >Gunung Kidul</option>
                            <option value='3' <?php if($profil['kab'] == '3'){echo "selected";} ?> >Kulon Progo</option>
                            <option value='4' <?php if($profil['kab'] == '4'){echo "selected";} ?> >Sleman</option>
                            <option value='5' <?php if($profil['kab'] == '5'){echo "selected";} ?> >Kota Yogyakarta</option>
                        </select></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Telp</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='telepon' value = '$profil[telepon]'>";?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Email</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='email' value = '$profil[email]'>";?></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Website</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='web' value = '$profil[web]'>";?></a></td>
                  </tr>
                </table>
                <input type="submit" name="submit" value='Save' class="btn btn-info" style="float: right; position: relative;">  
              </form>
            </div>
          </div>

        </section>
        <section class="col-lg-7 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Aset Sekolah</h3>
              <button class="fa fa-edit btn btn-info edit" id='editaset' style="display: block;"></button>
              <button class="btn btn-info edit" id='canceleditaset' style="display: none;" >Cancel</button>
            </div>
            <div class="box-body" style="min-height: 350px;">
              <div class="row" id="aset" style="display: block;">
                <div class="col-md-12">
                  <h4 style="margin-bottom: 40px;">Pendirian</h4>
                  <table>
                    <tr>
                      <td><b>Tanggal Pendirian</b></td>
                      <td><?php echo "$profil[tgl_pendirian]"; ?></td>
                    </tr>
                    <tr>
                      <td><b>SK Pendirian</b></td>
                      <td><?php echo "$profil[sk_pendirian]"; ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-12">
                  <h4 style="margin-bottom: 40px;">Akreditasi</h4>
                  <table>
                    <tr>
                      <td><b>Akreditasi</b></td>
                      <td><?php echo "$profil[akreditasi]"; ?></td>
                    </tr>
                    <tr>
                      <td><b>SK Akreditasi</b></td>
                      <td><?php echo "$profil[sk_akreditasi]"; ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-12">
                  <h4 style="margin-bottom: 40px;">Lain-lain</h4>
                  <table>
                    <tr>
                      <td><b>Kurikulum</b></td>
                      <td><?php echo "$profil[kurikulum]"; ?></td>
                    </tr>
                    <tr>
                      <td><b>Koordinat Longitude</b></td>
                      <td><?php echo "$profil[koordinat_long]"; ?></td>
                    </tr>
                    <tr>
                      <td><b>Koordinat Latitude</b></td>
                      <td><?php echo "$profil[koordinat_lat]"; ?></td>
                    </tr>
                    <tr>
                      <td><b>Listrik</b></td>
                      <td><?php echo "$profil[listrik]"; ?></td>
                    </tr>
                    <tr>
                      <td><b>Akses Internet</b></td>
                      <td><?php echo "$profil[akses_internet]"; ?></td>
                    </tr>
                  </table>
                </div>
              </div>

              <form id='edit-aset' style="display: none;" method="POST" action='pages/proses-update-profil.php?item=aset&npsn=<?php echo "$npsn"; ?>''>
                <div class="row">
                   <div class="col-md-12">
                      <h4 style="margin-bottom: 40px;">Pendirian</h4>
                      <table>
                        <tr>
                          <td><b>Tanggal Pendirian</b></td>
                          <td><?php echo "<input class='form-control' type='date' name='tgl_pendirian' value = '$profil[tgl_pendirian]'>"; ?></td>
                        </tr>
                        <tr>
                          <td><b>SK Pendirian</b></td>
                          <td><?php echo "<input class='form-control' type='text' name='sk_pendirian' value = '$profil[sk_pendirian]'>"; ?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-12">
                      <h4 style="margin-bottom: 40px;">Akreditasi</h4>
                      <table>
                        <tr>
                          <td><b>Akreditasi</b></td>
                          <td><?php echo "<input class='form-control' type='text' name='akreditasi' value = '$profil[akreditasi]'>"; ?></td>
                        </tr>
                        <tr>
                          <td><b>SK Akreditasi</b></td>
                          <td><?php echo "<input class='form-control' type='text' name='sk_akreditasi' value = '$profil[sk_akreditasi]'>"; ?></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-12">
                      <h4 style="margin-bottom: 40px;">Lain-lain</h4>
                      <table>
                        <tr>
                          <td><b>Kurikulum</b></td>
                          <td><?php echo "<input class='form-control' type='text' name='kurikulum' value = '$profil[kurikulum]'>"; ?></td>
                        </tr>
                        <tr>
                          <td><b>Koordinat Longitude</b></td>
                          <td><?php echo "<input class='form-control' type='text' name='koordinat_long' value = '$profil[koordinat_long]'>"; ?></td>
                        </tr>
                        <tr>
                          <td><b>Koordinat Latitude</b></td>
                          <td><?php echo "<input class='form-control' type='text' name='koordinat_lat' value = '$profil[koordinat_lat]'>"; ?></td>
                        </tr>
                        <tr>
                          <td><b>Listrik</b></td>
                          <td><?php echo "<input class='form-control' type='text' name='listrik' value = '$profil[listrik]'>"; ?></td>
                        </tr>
                        <tr>
                          <td><b>Akses Internet</b></td>
                          <td><?php echo "<input class='form-control' type='text' name='akses_internet' value = '$profil[akses_internet]'>"; ?></td>
                        </tr>
                      </table>
                    </div>
                    </div>
                  <input type="submit" name="submit" value='Save' class="btn btn-info" style="float: right; position: relative;">  
              </form>


            </div>
          </div>

        </section>
        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Visi dan Misi Sekolah</h3>
              <button class="fa fa-edit btn btn-info edit" id='editvm' style="display: block;"></button>
              <button class="btn btn-info edit" id='canceleditvm' style="display: none;" >Cancel</button>
            </div>
            <div class="box-body" style="min-height: 450px;">
              <table id="vm" style="display: table;">
                <tr>
                  <td><b>Motto</b></td>
                  <td><?php echo "$profil[moto]"; ?></td>
                </tr>
                <tr>
                  <td><b>Visi</b></td>
                  <td><?php echo "$profil[visi]"; ?></td>
                </tr>
                <tr>
                  <td><b>Misi</b></td>
                  <td><?php echo "$profil[misi]"; ?></td>
                </tr>
                <tr>
                  <td><b>Tujuan</b></td>
                  <td><?php echo "$profil[tujuan]"; ?></td>
                </tr>
              </table>
              <form id='edit-vm' style="display: none;"  method="POST" action='pages/proses-update-profil.php?item=vm&npsn=<?php echo "$npsn"; ?>'>
                <table>
                  <tr>
                    <td style="width: 10%"><b>Motto</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='motto' value = '$profil[moto]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 10%"><b>Visi</b></td>
                    <td><?php echo "<input class='form-control' type='text' name='visi' value = '$profil[visi]'>"; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 10%"><b>Misi</b></td>
                    <td><?php echo "<textarea rows ='6' id='summernote' class='form-control' type='text' name='misi'>$profil[misi]</textarea>";?></td>
                  </tr>
                  <tr>
                    <td style="width: 10%"><b>Tujuan</b></td>
                    <td><?php echo "<textarea rows ='6' id='summernote2' class='form-control' type='text' name='tujuan'>$profil[tujuan]</textarea>";?></td>
                  </tr>
                </table>
                <input type="submit" name="submit" value='Save' class="btn btn-info" style="float: right; position: relative;">  
              </form>
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
    .menu {
        margin: 0 auto;
        margin-bottom: 2em;
    }
    .menu .list {
        display: inline-block;
        position: relative;
        text-align: center;
        vertical-align: middle;
        padding: 0 1em;
    }
    .menu .list div {
        height: 40px;
        background-color: #ffc607;
        padding-top: 8px;
        transition: background 0.5s;
    }
    .menu .list div a {
        color: white;
        text-decoration: none;
        position: relative;
        vertical-align: text-bottom;
        border: none;
    }
    .menu .list div:hover {
        background-color: #02baff;
        transition: background-color 0.5s;
    }
    #aset table tr td:nth-child(1){
      width: 50%;
    }
    #edit-aset table tr td:nth-child(1){
      width: 50%;
    }
  </style>

  <script type="text/javascript">
    function checkDelete(){
        var res = confirm('Hapus? SEMUA DATA mengenai sekolah juga akan terhapus');
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
        $('#profil').css('display', 'block');
        $('#edit-profil').css('display', 'none');
        $('#editprofil').css('display', 'block');
        $('#canceleditprofil').css('display', 'none');
    })

    $('#editvm').click(function(){
        $('#vm').css('display', 'none');
        $('#edit-vm').css('display', 'block');
        $('#editvm').css('display', 'none');
        $('#canceleditvm').css('display', 'block');
    })
    $('#canceleditvm').click(function(){
        $('#vm').css('display', 'table');
        $('#edit-vm').css('display', 'none');
        $('#editvm').css('display', 'block');
        $('#canceleditvm').css('display', 'none');
    })

    $('#editaset').click(function(){
        $('#aset').css('display', 'none');
        $('#edit-aset').css('display', 'block');
        $('#editaset').css('display', 'none');
        $('#canceleditaset').css('display', 'block');
    })
    $('#canceleditaset').click(function(){
        $('#aset').css('display', 'block');
        $('#edit-aset').css('display', 'none');
        $('#editaset').css('display', 'block');
        $('#canceleditaset').css('display', 'none');
    })
  </script>