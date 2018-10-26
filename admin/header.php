<!-- this should be index2.php -->
<!DOCTYPE html>
<html>
<?php //$conn = mysqli_connect("localhost", "root", "", "sekolah")
      include "../koneksi.php"
 ?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Pokok Pendidikan Muhammadiyah | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.css">
  <link rel="stylesheet" href="plugins/summernote/dist/summernote.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">

  <!-- jQuery 2.2.3 -->
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="plugins/chartjs/Chart.min.js"></script>
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <style type="text/css">
    .box-header{
      background-color: #00c0ef;
      padding: 20px 10px;
      color: #fff;
    }
    .paginate_button{
      padding: 0 !important;
      margin-top: 20px;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" style="min-height: 100px; background-color: #00c0ef; padding: 20px;">
    <h1 style="margin-top: 0; font-size: 24px; text-align: center; font-weight: bold; color: #fff">Sistem Informasi Database Sekolah</h1>
    <p style="text-align: center; color : #fff">Pimpinan Wilayah Muhammadiyah Yogyakarta</p>
  </header>


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="margin-top: 50px;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left info">
          <p style="margin-top: 1em;"><?php echo "$_SESSION[uname]"; ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <li>
          <a href="index.php"> <!-- MASIH BELOM FIX -->
            <i class="fa fa-th"></i> <span>Beranda</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span>Sekolah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=pages/sekolah-MI.php&level=1"><i class="fa fa-circle-o"></i>SD</a></li>
            <li><a href="?page=pages/sekolah-Mts.php&level=1"><i class="fa fa-circle-o"></i>SMP</a></li>
            <li><a href="?page=pages/sekolah-MA.php&level=1"><i class="fa fa-circle-o"></i>SMA</a></li>
            <li><a href="?page=pages/sekolah-smk.php&level=1"><i class="fa fa-circle-o"></i>SMK dan SLB</a></li>
            <li><a href="?page=pages/sekolah-semua.php&level=1"><i class="fa fa-circle-o"></i>Semua</a></li>
            <li><a href="?page=pages/tambah-sekolah.php&level=1"><i class="fa fa-circle-o"></i>Tambah Sekolah</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Guru</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=pages/guru-MI.php&level=1"><i class="fa fa-circle-o"></i>SD</a></li>
            <li><a href="?page=pages/guru-Mts.php&level=1"><i class="fa fa-circle-o"></i>SMP</a></li>
            <li><a href="?page=pages/guru-Ma.php&level=1"><i class="fa fa-circle-o"></i>SMA</a></li>
            <li><a href="?page=pages/guru-smk.php&level=1"><i class="fa fa-circle-o"></i>SMK dan SLB</a></li>
            <li><a href="?page=pages/guru-semua.php&level=1"><i class="fa fa-circle-o"></i>Semua</a></li>
            <li><a href="?page=pages/tambah-guru.php&level=1"><i class="fa fa-circle-o"></i>Tambah Guru</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=pages/pegawai-mi.php&level=1"><i class="fa fa-circle-o"></i>SD</a></li>
            <li><a href="?page=pages/pegawai-mts.php&level=1"><i class="fa fa-circle-o"></i>SMP</a></li>
            <li><a href="?page=pages/pegawai-ma.php&level=1"><i class="fa fa-circle-o"></i>SMA</a></li>
            <li><a href="?page=pages/pegawai-smk.php&level=1"><i class="fa fa-circle-o"></i>SMK dan SLB</a></li>
            <li><a href="?page=pages/pegawai-semua.php&level=1"><i class="fa fa-circle-o"></i>Semua</a></li>
            <li><a href="?page=pages/tambah-pegawai.php&level=1"><i class="fa fa-circle-o"></i>Tambah Pegawai</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Kepala Sekolah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=pages/kepala-mi.php&level=1"><i class="fa fa-circle-o"></i>SD</a></li>
            <li><a href="?page=pages/kepala-mts.php&level=1"><i class="fa fa-circle-o"></i>SMP</a></li>
            <li><a href="?page=pages/kepala-ma.php&level=1"><i class="fa fa-circle-o"></i>SMA</a></li>
            <li><a href="?page=pages/kepala-smk.php&level=1"><i class="fa fa-circle-o"></i>SMK dan SLB</a></li>
            <li><a href="?page=pages/kepala-semua.php&level=1"><i class="fa fa-circle-o"></i>Semua</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>Peserta Didik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=pages/siswa-mi.php&level=1"><i class="fa fa-circle-o"></i>SD</a></li>
            <li><a href="?page=pages/siswa-mts.php&level=1"><i class="fa fa-circle-o"></i>SMP</a></li>
            <li><a href="?page=pages/siswa-ma.php&level=1"><i class="fa fa-circle-o"></i>SMA</a></li>
            <li><a href="?page=pages/siswa-smk.php&level=1"><i class="fa fa-circle-o"></i>SMK dan SLB</a></li>
            <li><a href="?page=pages/siswa-semua.php&level=1"><i class="fa fa-circle-o"></i>Semua</a></li>
            <li><a href="?page=pages/tambah-siswa.php&level=1"><i class="fa fa-circle-o"></i>Tambah Data Siswa</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span>Aset Sekolah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=pages/aset-mi.php&level=1"><i class="fa fa-circle-o"></i>SD</a></li>
            <li><a href="?page=pages/aset-mts.php&level=1"><i class="fa fa-circle-o"></i>SMP</a></li>
            <li><a href="?page=pages/aset-ma.php&level=1"><i class="fa fa-circle-o"></i>SMA</a></li>
            <li><a href="?page=pages/aset-smk.php&level=1"><i class="fa fa-circle-o"></i>SMK dan SLB</a></li>
            <li><a href="?page=pages/aset-semua.php&level=1"><i class="fa fa-circle-o"></i>Semua</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="?page=pages/prestasi.php&level=1">
            <i class="fa fa-trophy"></i>
            <span>Prestasi</span>
          </a>
        </li>
        <li class="treeview">
          <a href="?page=pages/akun.php&level=1">
            <i class="fa fa-pencil-square-o"></i>
            <span>Profile</span>
          </a>
        </li>
        <li>
          <a href="?page=pages/logout.php">
            <i class="fa fa-paper-plane"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  <?php include "content.php" ?>


  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2016 Muhammadiyah.</strong> All rights
    reserved.
  </footer>

</div>

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!--<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>-->

<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="plugins/summernote/dist/summernote.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/croppie/croppie.js"></script>
<script src="plugins/cropper/cropper.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
          height: 300,
          toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
          ]
        });
        $('#summernote2').summernote({
          height: 300,
          toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
          ]
        });
    });
</script>
<script type="text/javascript">
  $(function(){
    $('#listakun').DataTable({
      'paging' : true,
      'searching' : true,
      'info' : true
    });

  });
</script>
<!-- this should be end of index2.php -->
</body>
</html>
