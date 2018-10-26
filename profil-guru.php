<?php 
	include "koneksi.php";
	$npsn = $_GET['npsn'];
	$query = mysqli_query($conn, "SELECT * FROM profil where npsn = '$npsn'");
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);

	$kq = mysqli_query($conn, "SELECT profil.kab, kabupaten.id, kabupaten.kabupaten FROM profil JOIN kabupaten WHERE kabupaten.id= $data[kab]");
	$ka = mysqli_fetch_array($kq, MYSQLI_BOTH);

	$qaset = mysqli_query($conn, "SELECT * FROM aset_tanah WHERE npsn = $data[npsn]");
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Data Pokok Pendidikan Muhammadiyah</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" type="text/css" href="admin/bootstrap/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="admin/dist/css/AdminLTE.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="assets/css/main.css"/>
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
	</head>
	<body class="landing">
		<!--<a href="admin">LOGIN</a>-->
		
		<section id="header">
			<?php include "navbar.php" ?>
			
		</section>
		<section id="content " class="container main">	
			<div class="row content">
				<div class="col-md-12">
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="data-guru.php">Data Guru</a></li>
						<?php echo "<li><a href='data-guru-kabupaten.php?id=$data[kab]'>" ?><?php echo "$ka[kabupaten]"; ?></a></li>
						<li class="active"><?php echo "$data[nama_sekolah]"; ?></li>
					</ol>
					<div class="box box-info">
						<div class="box-header">
							<h2 class="box-title" style="font-size: 2em; margin: 2em 0; "><b style="color : #fff"><?php echo "$data[nama_sekolah]"; ?></b></h2>
						</div>
						<!-- <div class="box-body">
							<p><b>Kepala Sekolah  :</b> Sigit Purnomo</p>
							<p><b>Operator	:</b>Hari Mulyadi</p>
							<p><b>Akreditasi	:</b>A</p>
							<p><b>Kurikulum	:</b>Kurikulum 2013</p>
						</div> -->
					</div>
				</div>
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-body">
							<div class="profile-content">
				                <table id="viewdataguru">
				                    <thead>
				                     	<th>No</th>
				                        <th>Nama</th>
				                        <th>Bidang</th>
				                        <th>Jenis Kelamin</th>
				                        <th>Pangkat</th>
				                        <th>Pendidikan</th>
				                    </thead>
				                    <tbody>
				                    <?php 
				                        $qg =  mysqli_query($conn, "SELECT * FROM data_guru WHERE npsn = '$npsn'");
				                        $x = 1;
				                        while ($vg = mysqli_fetch_array($qg, MYSQLI_BOTH)) {
				                            echo "
				                            <tr>
					                            <td>$x</td>
					                            <td>"
					                ?>
					                            <?php echo "<a href='#' data-toggle='modal' data-target='#profil$x'>$vg[nama_guru]</a>"; ?>

					                            <div id="profil<?php echo$x;?>" class="modal fade" role="dialog">
				                                  <div class="modal-dialog">
				                                    
				                                    <div class="modal-content">
				                                      <div class="modal-header">
				                                        <button type="button" class="close" data-dismiss ="modal">&times;</button>
				                                        <h4 class="modal-title">Profil Guru</h4>
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
				                                        $queryedit = mysqli_query($conn, "SELECT * FROM data_guru WHERE nama_guru = '$vg[nama_guru]'");
				                                        $row   = mysqli_fetch_array($queryedit, MYSQLI_BOTH);
				                                      ?>
				                                      
				                                      <table>
				                                      	<tbody>
				                                      		<tr>
				                                      			<td><b>Tahun Ajaran</b></td>
				                                      			<td><?php echo "$row[tahun_ajaran]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>NBM</b></td>
				                                      			<td><?php echo "$row[nbm]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Nama</b></td>
				                                      			<td><?php echo "$row[nama_guru]"; ?></td>
				                                      		</tr>	
				                                      		<tr>
				                                      			<td><b>Bidang</b></td>
				                                      			<td><?php echo "$row[bidang]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>NUPTK</b></td>
				                                      			<td><?php echo "$row[nuptk]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>NIP</b></td>
				                                      			<td><?php echo "$row[nip]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Tempat Lahir</b></td>
				                                      			<td><?php echo "$row[tempat_lahir]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Tanggal Lahir</b></td>
				                                      			<td><?php echo "$row[tgl_lahir]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Telepon</b></td>
				                                      			<td><?php echo "$row[telepon]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Email</b></td>
				                                      			<td><?php echo "$row[email]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Pangkat</b></td>
				                                      			<td><?php echo "$row[pangkat_golruang]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Tanggal Pengangkatan</b></td>
				                                      			<td><?php echo "$row[tgl_pengangkatan]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Sertifikasi</b></td>
				                                      			<td><?php echo "$row[sertifikasi_guru]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>TMT Sertifikasi</b></td>
				                                      			<td><?php echo "$row[tmt_sertifikasi]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Jenis Kelamin</b></td>
				                                      			<td><?php echo "$row[jk]"; ?></td>
				                                      		</tr>	
				                                      		<tr>
				                                      			<td><b>Status Pegawai</b></td>
				                                      			<td><?php echo "$row[sts_pegawai]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Organisasi</b></td>
				                                      			<td><?php echo "$row[organisasi]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Alamat</b></td>
				                                      			<td><?php echo "$row[alamat]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>RT RW</b></td>
				                                      			<td><?php echo "$row[rt_rw]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Kelurahan</b></td>
				                                      			<td><?php echo "$row[kelurahan]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Kecamatan</b></td>
				                                      			<td><?php echo "$row[kec]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Kabupaten</b></td>
				                                      			<td><?php echo "$row[kab]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Provinsi</b></td>
				                                      			<td><?php echo "$row[prov]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Pendidikan</b></td>
				                                      			<td><?php echo "$row[pendidikan]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Jurusan</b></td>
				                                      			<td><?php echo "$row[jurusan]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Universitas</b></td>
				                                      			<td><?php echo "$row[univ]"; ?></td>
				                                      		</tr>
				                                      		<tr>
				                                      			<td><b>Tahun Lulus</b></td>
				                                      			<td><?php echo "$row[thn_lulus]"; ?></td>
				                                      		</tr>
				                                      	</tbody>
				                                      </table>                      

				                                      </div>

				                                    </div>
				                                  </div>
				                                </div>

					                            </td>
					                            
					                <?php            
					                        echo "
					                        	<td>$vg[bidang]</td>
					                            <td>$vg[jk]</td>
					                            <td>$vg[sts_pegawai]</td>
					                            <td>$vg[pendidikan]</td>
				                            </tr>
				                            ";

				                            $x++;
				                        }

				                    ?>
				                    </tbody>
				                </table>
				            </div>
				            <!-- End Of Profile Content -->
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Scripts -->



			<script src="assets/js/jquery.min.js"></script>
			<script src="admin/bootstrap/js/bootstrap.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script> <!-- THIS -->
			<script src="assets/js/jquery.scrollgress.min.js"></script> <!-- THIS -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script> <!-- THIS -->
			<script src="assets/js/main.js"></script>
			<script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
			<script src="admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
			<script type="text/javascript">
			  $(function(){
			    $('#data-sekolah').DataTable({
			      'paging' : true,
			      'searching' : true,
			      'info' : true
			    });
			    $('#viewdataguru').DataTable({
			      'paging' : true,
			      'searching' : true,
			      'info' : true
			    });
			  });
			</script>

			<style type="text/css">
				.paginate_button{
			      padding: 0 !important;
			      margin-top: 20px;
			    }

			</style>

	</body>
</html>