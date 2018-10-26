<?php 
	include "koneksi.php";
	$query = mysqli_query($conn, "SELECT * FROM kabupaten");
	

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
						<li><a href="data-kepsek.php">Data Aset Sekolah</a></li>
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
										<th>Wilayah</th>
										<th>Total Aset Tanah</th>
										<th>Total Aset Bangunan</th>
										<th>Total Sarpras</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$k = 1;
										while($kab = mysqli_fetch_array($query, MYSQLI_BOTH)){

											echo "
											<tr>
												<td>$kab[id]</td>
												<td><a href='data-aset-kabupaten.php?id=$kab[id]'>$kab[kabupaten]</a></td>
											";

											 
												$b = mysqli_query($conn, "SELECT kabupaten.id, COUNT(aset_bangunan.id) AS jumlah_bangunan FROM aset_bangunan JOIN profil ON profil.npsn = aset_bangunan.npsn JOIN kabupaten ON kabupaten.id = profil.kab WHERE kabupaten.id = $k") ;
												$t = mysqli_query($conn, "SELECT kabupaten.id, COUNT(aset_tanah.id) AS jumlah_tanah FROM aset_tanah JOIN profil ON profil.npsn = aset_tanah.npsn JOIN kabupaten ON kabupaten.id = profil.kab WHERE kabupaten.id = $k");
												$s = mysqli_query($conn, "SELECT kabupaten.id, COUNT(sarpras.npsn) AS jumlah_sarpras FROM sarpras JOIN profil ON profil.npsn = sarpras.npsn JOIN kabupaten ON kabupaten.id = profil.kab WHERE kabupaten.id = $k");

												$bf = mysqli_fetch_array($b, MYSQLI_BOTH);
												$tf = mysqli_fetch_array($t, MYSQLI_BOTH);
												$sf = mysqli_fetch_array($s, MYSQLI_BOTH);

												echo "<td>$tf[jumlah_tanah]</td>";
												echo "<td>$bf[jumlah_bangunan]</td>";
												echo "<td>$sf[jumlah_sarpras]</td>";
												
											

											echo "
												
											</tr>
											";

											$k++;

										}
									?>
								</tbody>
								<tfoot style="text-align: center;">
									<tr>
										<td colspan="2"><b>Jumlah</b></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tfoot>
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
			    .pagination{
			    	display: none !important;
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
			<script type="text/javascript">
				var k = 1
				
					for (var j = 2; j < 6; j++) {
						var jsd = 0
						
						for (var i = 1; i < 6; i++) {
							var d = document.getElementsByTagName('tr')[i];

							var a = d.getElementsByTagName('td')[j]
							var s = a.textContent
							var sd = parseInt(s)
							var jsd = jsd + sd

						}

						console.log(jsd)

						
							var tr = document.getElementsByTagName('tr')[6]
							var doc = tr.getElementsByTagName('td')[k]
							doc.innerHTML = jsd;

							k++
						
					}
										
				
			</script>

	</body>
</html>