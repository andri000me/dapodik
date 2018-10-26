<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$tahun_ajaran = $_GET['tahun_ajaran'];
	$query = mysqli_query($conn, "SELECT profil.nama_sekolah, kepsek.* FROM profil JOIN kepsek ON profil.npsn = kepsek.npsn WHERE kab = $id AND kepsek.tahun_ajaran = '$tahun_ajaran'");
	$qd = mysqli_query($conn, "SELECT kab FROM profil WHERE kab = $id");
	$qf = mysqli_fetch_array($qd, MYSQLI_BOTH);

	$kq = mysqli_query($conn, "SELECT profil.kab, kabupaten.id, kabupaten.kabupaten FROM profil JOIN kabupaten WHERE kabupaten.id= $qf[kab]");
	$ka = mysqli_fetch_array($kq, MYSQLI_BOTH);
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
				<div class="col-md-12 ">
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="data-kepsek.php">Data Kepala Sekolah</a></li>
						<?php echo "<li>"; echo "$ka[kabupaten]";; ?></li>
					</ol>
					<div class="box box-info">
						<div class="box-header">
							<h2 class="box-title"><b>Data Kepala Sekolah</b></h2>
						</div>
						<div class="box-body">
							<table id='data-sekolah' class="table-responsive">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Sekolah</th>
										<th>Nama Kepala</th>
										<th>Tanggal SK</th>
										<th>Asal SK</th>
										<th>TMT Jabatan</th>
										<th>Masa Tugas Ke</th>
										<th>Tanggal Berakhir</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$i = 1;
										while($sekolah = mysqli_fetch_array($query, MYSQLI_BOTH)){
											echo "
											<tr>
												<td>$i</td>
												<td><a href='profil-kepsek.php?npsn=$sekolah[npsn]'>$sekolah[nama_sekolah]</a></td>
												<td>$sekolah[kepala_sekolah]</td>
												<td>$sekolah[tgl_sk]</td>
												<td>$sekolah[asal_sk]</td>
												<td>$sekolah[tmt_jabatan]</td>
												<td>$sekolah[masa_tugaske]</td>
												<td>$sekolah[tgl_berahir]</td>
											</tr>
											";
											$i++;
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Scripts -->
			<style type="text/css">
				.paginate_button{
			      padding: 0 !important;
			      margin-top: 20px;
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

			  });
			</script>

	</body>
</html>