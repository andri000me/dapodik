  <?php
    include '../koneksi.php';
    $npsn = $_SESSION['npsn'];
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
        Tambah Data Sekolah
      </h1>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <form action="pages/proses-tambah-sekolah.php" method="POST">
        <section class="col-lg-5 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Profil Sekolah</h3>

            </div>
            <div class="box-body" style="min-height: 450px;">
                <table>
                  <tr>
                    <td style="width: 25%"><b>NPSN</b></td>
                    <td><input class='form-control' type='text' name='npsn'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Nama Sekolah</b></td>
                    <td><input class='form-control' type='text' name='nama_sekolah'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Jenjang</b></td>
                    <?php $jenjang = $profil['jenjang'] ?>
                    <td><select class='form-control' type='text' name='jenjang'>
                          <option value='SD'  >SD</option>
                          <option value='SMP' >SMP</option>
                          <option value='SMA' >SMA</option>
                        </select></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Alamat</b></td>
                    <td><textarea class='form-control' type='text' name='alamat'></textarea></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kelurahan</b></td>
                    <td><input class='form-control' type='text' name='kel'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kecamatan</b></td>
                    <td><input class='form-control' type='text' name='kec'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Kabupaten</b></td>
                    <td><select class='form-control' type='text' name='kabupaten'>
                            <option value='1'  >Bantul</option>
                            <option value='2'  >Gunung Kidul</option>
                            <option value='3'  >Kulon Progo</option>
                            <option value='4'  >Sleman</option>
                            <option value='5'  >Kota Yogyakarta</option>
                        </select></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Telp</b></td>
                    <td><input class='form-control' type='text' name='telepon'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Email</b></td>
                    <td><input class='form-control' type='text' name='email'></td>
                  </tr>
                  <tr>
                    <td style="width: 25%"><b>Website</b></td>
                    <td><input class='form-control' type='text' name='web' ></td>
                  </tr>
                </table>
                
            </div>
          </div>

        </section>
        <section class="col-lg-7 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Visi dan Misi Sekolah</h3>
            </div>
            <div class="box-body" style="min-height: 450px;">
                <table>
                  <tr>
                    <td style="width: 10%"><b>Motto</b></td>
                    <td><input class='form-control' type='text' name='motto'></td>
                  </tr>
                  <tr>
                    <td style="width: 10%"><b>Visi</b></td>
                    <td><input class='form-control' type='text' name='visi'></td>
                  </tr>
                  <tr>
                    <td style="width: 10%"><b>Tujuan</b></td>
                    <td><input class='form-control' type='text' name='tujuan'></td>
                  </tr>
                  <tr>
                    <td style="width: 10%"><b>Misi</b></td>
                    <td><textarea rows ='6' id='summernote' class='form-control' type='text' name='misi'></textarea></td>
                  </tr>
                </table>
            </div>
          </div>

        </section>
        <section class="col-lg-12 connectedSortable">

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Data Lain-Lain</h3>
            </div>
            <div class="box-body" style="min-height: 350px;">
                <div class="row">
                   <div class="col-md-4">
                      <h4 style="margin-bottom: 40px;">Pendirian</h4>
                      <table>
                        <tr>
                          <td><b>Tanggal Pendirian</b></td>
                          <td><input class='form-control' type='date' name='tgl_pendirian'></td>
                        </tr>
                        <tr>
                          <td><b>SK Pendirian</b></td>
                          <td><input class='form-control' type='text' name='sk_pendirian' ></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-4">
                      <h4 style="margin-bottom: 40px;">Akreditasi</h4>
                      <table>
                        <tr>
                          <td><b>Akreditasi</b></td>
                          <td><input class='form-control' type='text' name='akreditasi' ></td>
                        </tr>
                        <tr>
                          <td><b>SK Akreditasi</b></td>
                          <td><input class='form-control' type='text' name='sk_akreditasi'></td>
                        </tr>
                      </table>
                    </div>
                    <div class="col-md-4">
                      <h4 style="margin-bottom: 40px;">Lain-lain</h4>
                      <table>
                        <tr>
                          <td><b>Kurikulum</b></td>
                          <td><input class='form-control' type='text' name='kurikulum' ></td>
                        </tr>
                        <tr>
                          <td><b>Koordinat Longitude</b></td>
                          <td><input class='form-control' type='text' name='koordinat_long' ></td>
                        </tr>
                        <tr>
                          <td><b>Koordinat Latitude</b></td>
                          <td><input class='form-control' type='text' name='koordinat_lat' ></td>
                        </tr>
                        <tr>
                          <td><b>Listrik</b></td>
                          <td><input class='form-control' type='text' name='listrik' ></td>
                        </tr>
                        <tr>
                          <td><b>Akses Internet</b></td>
                          <td><input class='form-control' type='text' name='akses_internet'></td>
                        </tr>
                      </table>
                    </div>
                    </div>


            </div>
          </div>

        </section>

        <section class="col-lg-12 connectedSortable" style="text-align: center;">
          <input type="submit" name="submit" value='Tambah Sekolah' class="btn btn-info" style="float:right; position: relative; padding: 20px;">   
        </section>

        
        </form>
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
        $('#vm').css('display', 'block');
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