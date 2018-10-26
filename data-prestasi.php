<?php 
	include "koneksi.php";
	$query = mysqli_query($conn, "SELECT prestasi.*, profil.nama_sekolah FROM `prestasi` JOIN profil ON prestasi.npsn = profil.npsn ORDER BY id ASC");
	
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
						<li><a href="data-prestasi.php">Data Prestasi</a></li>
					</ol>
					<div class="box box-info">
						<div class="box-header">
							<h2 class="box-title"><b>Data Prestasi</b></h2>
						</div>
						<div class="box-body" style="overflow-x: scroll;">
							<table id='data-prestasi' class="table-responsive">
								<thead>
									<tr>
										<th>No</th>
										<th>NPSN</th>
										<th>Nama Sekolah</th>
										<th>Tahun Ajaran</th>
										<th>Jenis Prestasi</th>
										<th>Level</th>
										<th>Hasil</th>
										<th>Keterangan</th>
										<th>Pemegang</th>
										<th>Tanggal Pelaksanaan</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$i = 0;
										while($data = mysqli_fetch_array($query, MYSQLI_BOTH)){
											
											echo "
											<tr>
												<td>$i</td>
												<td>$data[npsn]</td>
												<td>$data[nama_sekolah]</td>
												<td>$data[thn_ajaran]</td>
												<td>$data[jns_prestasi]</td>
												<td>$data[level]</td>
												<td>$data[hasil]</td>
												<td>$data[ket]</td>
												<td>$data[pemegang]</td>
												<td>$data[tgl_plaksanaan]</td>
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
			    table td:nth-child(3){
			    	min-width: 400px;
			    }
			    table td:nth-child(5){
			    	min-width: 400px;
			    }
			    table td:nth-child(7){
			    	min-width: 100px;
			    }
			    table td:nth-child(8){
			    	min-width: 400px;
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
			    $('#data-prestasi').DataTable({
			      'paging' : true,
			      'searching' : true,
			      'info' : true
			    });

			  });
			</script>

	</body>
</html>