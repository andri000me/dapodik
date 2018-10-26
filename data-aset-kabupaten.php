<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query = mysqli_query($conn, "SELECT profil.nama_sekolah, profil.npsn, COUNT(aset_tanah.id) AS jumlah_tanah FROM aset_tanah JOIN profil ON profil.npsn = aset_tanah.npsn JOIN kabupaten ON kabupaten.id = profil.kab WHERE profil.kab = $id GROUP BY profil.npsn");

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
		
		<script type="text/javascript">
			var url = document.location.toString();
				if (url.match('#')) {
				    $('.nav-tabs a[href="#' + url.split('#')[1] + '-tab"]').tab('show');
				} //add a suffix

				// Change hash for page-reload
				$('.nav-tabs a').on('shown.bs.tab', function (e) {
				    window.location.hash = e.target.hash;
				})
		</script>
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
						<li><a href="data-aset.php">Data Aset Sekolah</a></li>
						<?php echo "<li>"; echo "$ka[kabupaten]";; ?></li>
					</ol>
					<div class="box box-info">
						<div class="box-header">
							<h2 class="box-title"><b>Data Aset Sekolah</b></h2>
						</div>
						<div class="box-body">
							<table id='data-sekolah' class="table-responsive">
								<thead>
									<tr>
										<th>No</th>
										<th>NPSN</th>
										<th>Nama Sekolah</th>
										<th>Jumlah Aset Tanah</th>
										<th>Jumlah Aset Bangunan</th>
										<th>Jumlah Sarpras</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$i = 1;
										while($aset = mysqli_fetch_array($query, MYSQLI_BOTH)){
											$qbangunan = mysqli_query($conn, "SELECT npsn, COUNT(id) AS jumlah_bangunan FROM aset_bangunan WHERE npsn = '$aset[npsn]'");
											$qsarpras = mysqli_query($conn, "SELECT npsn, COUNT(npsn) AS jumlah_sarpras FROM sarpras WHERE npsn = '$aset[npsn]'");
											$bangunan = mysqli_fetch_array($qbangunan, MYSQLI_BOTH);
											$sarpras = mysqli_fetch_array($qsarpras, MYSQLI_BOTH);
											echo "
											<tr>
												<td>$i</td>
												<td>$aset[npsn]</td>
												<td><a href='profil-sekolah.php?npsn=$aset[npsn]#rekapitulasi'>$aset[nama_sekolah]</a></td>
												<td>$aset[jumlah_tanah]</td>
												<td>$bangunan[jumlah_bangunan]</td>
												<td>$sarpras[jumlah_sarpras]</td>
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