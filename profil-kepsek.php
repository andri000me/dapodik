<?php 
	include "koneksi.php";
	$npsn = $_GET['npsn'];
	$query = mysqli_query($conn, "SELECT * FROM profil where npsn = '$npsn'");
	$querykepsek = mysqli_query($conn, "SELECT * FROM kepsek where npsn = '$npsn'");
	$querywakasek = mysqli_query($conn, "SELECT * FROM wakasek where npsn = '$npsn'");
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$datakepsek = mysqli_fetch_array($querykepsek, MYSQLI_BOTH);
	

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
						<li><a href="data-kepsek.php">Data Kepala Sekolah</a></li>
						<?php echo "<li><a href='data-kepsek-kabupaten.php?id=$data[kab]'>" ?><?php echo "$ka[kabupaten]"; ?></a></li>
						<li class="active"><a href=""><?php echo "$data[nama_sekolah]"; ?></a></li>
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
				<div class="col-md-6">
					<div class="box box-info">
						<div class="box-header">
			              <h3 class="box-title">Kepala Sekolah</h3>
			            </div>
						<div class="box-body">
							<div class="kepsek-content">
				                <table>
				                	<tbody>
				                		<tr>
				                			<td>Nama</td>
				                			<td><?php echo "$datakepsek[kepala_sekolah]"; ?></td>
				                		</tr>
				                		<tr>
				                			<td>Tahun Ajaran</td>
				                			<td><?php echo "$datakepsek[tahun_ajaran]"; ?></td>
				                		</tr>
				                		<tr>
				                			<td>NBM</td>
				                			<td><?php echo "$datakepsek[nbm]"; ?></td>
				                		</tr>
				                		<tr>
				                			<td>tgl_lahir</td>
				                			<td><?php echo "$datakepsek[tgl_lahir]"; ?></td>
				                		</tr>
				                		<tr>
				                			<td>SK Pengangkatan</td>
				                			<td><?php echo "$datakepsek[sk_pengangkatan]"; ?></td>
				                		</tr>
				                		<tr>
				                			<td>Tanggal SK</td>
				                			<td><?php echo "$datakepsek[tgl_sk]"; ?></td>
				                		</tr>
				                		<tr>
				                			<td>Asal SK</td>
				                			<td><?php echo "$datakepsek[asal_sk]"; ?></td>
				                		</tr>
				                		<tr>
				                			<td>TMT Jabatan</td>
				                			<td><?php echo "$datakepsek[tmt_jabatan]"; ?></td>
				                		</tr>
				                		<tr>
				                			<td>Masa Tugas Ke-</td>
				                			<td><?php echo "$datakepsek[masa_tugaske]"; ?></td>
				                		</tr>
				                		<tr>
				                			<td>Tanggal Berakhir</td>
				                			<td><?php echo "$datakepsek[tgl_berahir]"; ?></td>
				                		</tr>
				                	</tbody>
				                </table>
				            </div>
				            <!-- End Of kepsek Content -->
						</div>
					</div>
				</div>

				<?php  
		        $y = 0;
		        while($datawakasek = mysqli_fetch_array($querywakasek, MYSQLI_BOTH)){
		        echo "
				<div class='col-md-6'>
					<div class='box box-info'>
						<div class='box-header'>
				            <h3 class='box-title'>Wakil Kepala Sekolah Bidang $datawakasek[waka_bidang]</h3>
				        </div>
						<div class='box-body'>
							<div class='wakasek-content'>
				                <table>
				                	<tbody>
				                		<tr>
				                			<td>Nama</td>
				                			<td>$datawakasek[wakil_kepala]</td>
				                		</tr>
				                		<tr>
				                			<td>Tahun Ajaran</td>
				                			<td>$datawakasek[tahun_ajaran]</td>
				                		</tr>
				                		<tr>
				                			<td>NBM</td>
				                			<td>$datawakasek[nbm]</td>
				                		</tr>
				                		<tr>
				                			<td>Bidang</td>
				                			<td>$datawakasek[waka_bidang]</td>
				                		</tr>
				                		<tr>
				                			<td>SK Pengangkatan</td>
				                			<td>$datawakasek[sk_pengangkatan]</td>
				                		</tr>
				                		<tr>
				                			<td>Tanggal SK</td>
				                			<td>$datawakasek[tgl_sk]</td>
				                		</tr>
				                		<tr>
				                			<td>Asal SK</td>
				                			<td>$datawakasek[asal_sk]</td>
				                		</tr>
				                		<tr>
				                			<td>TMT Jabatan</td>
				                			<td>$datawakasek[tmt_jabatan]</td>
				                		</tr>
				                		<tr>
				                			<td>Masa Tugas Ke-</td>
				                			<td>$datawakasek[masa_tugaske]</td>
				                		</tr>
				                		<tr>
				                			<td>Tanggal Berakhir</td>
				                			<td>$datawakasek[tgl_habis]</td>
				                		</tr>
				                	</tbody>
				                </table>
				                
				            </div>
				            <!-- End Of wakasek Content -->
						</div>
					</div>
				</div>
				";

                $y++;
				}?>
				
			</div>
		</section>

		<!-- Scripts -->
			<style type="text/css">
				.paginate_button{
			      padding: 0 !important;
			      margin-top: 20px;
			    }
			    .box-title{
			    	color: #fff;
			    }
			</style>


			<script src="assets/js/jquery.min.js"></script>
			<script src="admin/bootstrap/js/bootstrap.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script> <!-- THIS -->
			<script src="assets/js/jquery.scrollgress.min.js"></script> <!-- THIS -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script> <!-- THIS -->
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
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

	</body>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          