<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query = mysqli_query($conn, "SELECT * FROM profil WHERE kab = $id");
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
						<li><a href="data-guru.php">Data Guru</a></li>
						<?php echo "<li>"; echo "$ka[kabupaten]";; ?></li>
					</ol>
					<div class="box box-info">
						<div class="box-header">
							<h2 class="box-title"><b>Data Guru</b></h2>
						</div>
						<div class="box-body" style="overflow-x: scroll;">
							<table id='data-guru-kabupaten' class="table-responsive" >
								<thead>
									<tr>
										<th style=" vertical-align: middle;">No</th>
										<th style="vertical-align: middle;">Sekolah</th>
										<th>Jenjang</th>
										<th>L</th>
										<th>P</th>
										<th>GTT</th>
										<th>GTY</th>
										<th>PNS DPK</th>
										<th>Jml</th>
									</tr>
								<tbody>
									<?php 
										$x = 1;
										while($kab = mysqli_fetch_array($query, MYSQLI_BOTH)){
											echo "<tr>
											<td>$x</td>
											<td style='min-width : 200px !important; text-align: left'><a href='profil-guru.php?npsn=$kab[npsn]'>$kab[nama_sekolah]</a></td>
											<td>$kab[jenjang]</td>
											";
											
											$totlk = 0;
											$totpr = 0;
											$total = 0;


												$q = mysqli_query($conn, "SELECT profil.kab, profil.jenjang, SUM(if(data_guru.jk = 'L', 1, 0)) AS 'Laki', SUM(if(data_guru.jk = 'P' , 1, 0)) AS 'Perempuan', SUM(if(data_guru.sts_pegawai = 'GTT' , 1, 0)) AS 'gtt', SUM(if(data_guru.sts_pegawai = 'GTY' , 1, 0)) AS 'gty', SUM(if(data_guru.sts_pegawai = 'PNS DPK', 1, 0)) AS 'pns_dpk' FROM profil JOIN data_guru ON profil.npsn = data_guru.npsn WHERE profil.npsn = $kab[npsn]");

												$y = mysqli_fetch_array($q, MYSQLI_BOTH);

													$tot = $y['Laki'] + $y['Perempuan'];
													echo "<td>$y[Laki]</td><td>$y[Perempuan]</td><td>$y[gtt]</td><td>$y[gty]</td><td>$y[pns_dpk]</td><td><b>$tot</b></td>";
												
												
												$x++;
											}
											echo "</tr>";
										
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
			    $('#data-guru-kabupaten').DataTable({
			      'paging' : true,
			      'searching' : true,
			      'info' : true
			    });

			  });
			</script>

	</body>
</html>