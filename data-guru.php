<?php 
	include "koneksi.php";
 	$query = mysqli_query($conn, "SELECT * FROM kabupaten");
 	$query2 = mysqli_query($conn, "SELECT * FROM kabupaten");
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
					</ol>
					<div class="box box-info">
						<div class="box-header">
							<h3 class="box-title"><b>Data Guru [Jenis Kelamin]</b></h3>
						</div>
						<div class="box-body" style="overflow-x: scroll;">
							<table id='data-guru' class="table-responsive" >
								<thead>
									<tr>
										<th rowspan="2" colspan="1" style="text-align: center; vertical-align: middle;">No</th>
										<th rowspan="2" colspan="1" style="text-align: center; vertical-align: middle;">Wilayah</th>
										<th colspan="3" style="text-align: center; vertical-align: middle;">SD</th>
										<th colspan="3" style="text-align: center; vertical-align: middle;">MI</th>
										<th colspan="3" style="text-align: center; vertical-align: middle;">SMP</th>
										<th colspan="3" style="text-align: center; vertical-align: middle;">MTS</th>
										<th colspan="3" style="text-align: center; vertical-align: middle;">SMA</th>
										<th colspan="3" style="text-align: center; vertical-align: middle;">MA</th>
										<th colspan="3" style="text-align: center; vertical-align: middle;">SMK</th>
										<th colspan="3" style="text-align: center; vertical-align: middle;">SLB</th>
										<th colspan="3" style="text-align: center; vertical-align: middle;">Total</th>
									</tr>
									<tr>
										<th>L</th>
										<th>P</th>
										<th>Jml</th>
										<th>L</th>
										<th>P</th>
										<th>Jml</th>
										<th>L</th>
										<th>P</th>
										<th>Jml</th>
										<th>L</th>
										<th>P</th>
										<th>Jml</th>
										<th>L</th>
										<th>P</th>
										<th>Jml</th>
										<th>L</th>
										<th>P</th>
										<th>Jml</th>
										<th>L</th>
										<th>P</th>
										<th>Jml</th>
										<th>L</th>
										<th>P</th>
										<th>Jml</th>
										<th>L</th>
										<th>P</th>
										<th>Jml</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										while($kab = mysqli_fetch_array($query, MYSQLI_BOTH)){
											echo "<tr>
											<td>$kab[id] </td>
											<td style='min-width : 200px !important; text-align: left'><a href='data-guru-kabupaten.php?id=$kab[id]'>$kab[kabupaten]</a></td>
											";

											//$q = mysqli_query($conn, "SELECT profil.kab, profil.jenjang, jenjang.id, SUM(if(data_guru.jk = 'L', 1, 0)) AS 'Laki', SUM(if(data_guru.jk = 'P' , 1, 0)) AS 'Perempuan' FROM jenjang JOIN (profil LEFT JOIN data_guru ON profil.npsn = data_guru.npsn) ON profil.jenjang = jenjang.jenjang WHERE profil.kab = $kab[id] GROUP BY id");

											$jenjang = array('SD', 'MI', 'SMP', 'MTS', 'SMA', 'MA', 'SMK', 'SLB');
											$totlk = 0;
											$totpr = 0;
											$total = 0;

											for($i = 0; $i < count($jenjang); $i++){
												$q = mysqli_query($conn, "SELECT profil.kab, profil.jenjang, SUM(if(data_guru.jk = 'L', 1, 0)) AS 'Laki', SUM(if(data_guru.jk = 'P' , 1, 0)) AS 'Perempuan' FROM profil JOIN data_guru ON profil.npsn = data_guru.npsn WHERE profil.kab = $kab[id] AND jenjang = '$jenjang[$i]'");

												$y = mysqli_fetch_array($q, MYSQLI_BOTH);

												if($y['jenjang'] == null){
													echo "<td>0</td><td>0</td><td>0</td>";
												}
												else{
													$tot = $y['Laki'] + $y['Perempuan'];
													echo "<td>$y[Laki]</td><td>$y[Perempuan]</td><td style = 'color : #3c8dbc'>$tot</td>";
												}

												$totlk = $totlk + $y['Laki'];
												$totpr = $totpr + $y['Perempuan'];
												$total = $totlk + $totpr;
											}
												
												echo "
													<td>$totlk</td>
													<td>$totpr</td>
													<td>$total</td>
												";
											}
											echo "</tr>";
										
									?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2">Jumlah</td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										
									</tr>
								</tfoot>
							</table>
						</div>
					</div>


					<div class="box box-info">
						<div class="box-header">
							<h3 class="box-title"><b>Data Guru [Golongan]</b></h3>
						</div>
						<div class="box-body" style="overflow-x: scroll;">
							<table id='data-guru-gol' class="table-responsive" >
								<thead>
									<tr>
										<th rowspan="2" colspan="1" style="text-align: center; vertical-align: middle;">No</th>
										<th rowspan="2" colspan="1" style="text-align: center; vertical-align: middle;">Wilayah</th>
										<th colspan="4" style="text-align: center; vertical-align: middle;">SD</th>
										<th colspan="4" style="text-align: center; vertical-align: middle;">MI</th>
										<th colspan="4" style="text-align: center; vertical-align: middle;">SMP</th>
										<th colspan="4" style="text-align: center; vertical-align: middle;">MTS</th>
										<th colspan="4" style="text-align: center; vertical-align: middle;">SMA</th>
										<th colspan="4" style="text-align: center; vertical-align: middle;">MA</th>
										<th colspan="4" style="text-align: center; vertical-align: middle;">SMK</th>
										<th colspan="4" style="text-align: center; vertical-align: middle;">SLB</th>
										<th colspan="4" style="text-align: center; vertical-align: middle;">Total</th>
									</tr>
									<tr>
										<th>PNS DPK</th>
										<th>GTT</th>
										<th>GTY</th>
										<th>Jml</th>
										<th>PNS DPK</th>
										<th>GTT</th>
										<th>GTY</th>
										<th>Jml</th>
										<th>PNS DPK</th>
										<th>GTT</th>
										<th>GTY</th>
										<th>Jml</th>
										<th>PNS DPK</th>
										<th>GTT</th>
										<th>GTY</th>
										<th>Jml</th>
										<th>PNS DPK</th>
										<th>GTT</th>
										<th>GTY</th>
										<th>Jml</th>
										<th>PNS DPK</th>
										<th>GTT</th>
										<th>GTY</th>
										<th>Jml</th>
										<th>PNS DPK</th>
										<th>GTT</th>
										<th>GTY</th>
										<th>Jml</th>
										<th>PNS DPK</th>
										<th>GTT</th>
										<th>GTY</th>
										<th>Jml</th>
										<th>PNS DPK</th>
										<th>GTT</th>
										<th>GTY</th>
										<th>Jml</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										while($kab2 = mysqli_fetch_array($query2, MYSQLI_BOTH)){
											echo "<tr>
											<td>$kab2[id] </td>
											<td style='min-width : 200px !important; text-align: left'><a href='data-guru-kabupaten.php?id=$kab2[id]'>$kab2[kabupaten]</a></td>
											";

											//$q = mysqli_query($conn, "SELECT profil.kab, profil.jenjang, jenjang.id, SUM(if(data_guru.jk = 'L', 1, 0)) AS 'Laki', SUM(if(data_guru.jk = 'P' , 1, 0)) AS 'Perempuan' FROM jenjang JOIN (profil LEFT JOIN data_guru ON profil.npsn = data_guru.npsn) ON profil.jenjang = jenjang.jenjang WHERE profil.kab = $kab[id] GROUP BY id");

											$jenjang = array('SD', 'MI', 'SMP', 'MTS', 'SMA', 'MA', 'SMK', 'SLB');
											$totpns = 0;
											$totgtt = 0;
											$totgty = 0;
											$total = 0;

											for($i = 0; $i < count($jenjang); $i++){
												$q = mysqli_query($conn, "SELECT profil.kab, profil.jenjang, SUM(if(data_guru.sts_pegawai = 'PNS DPK', 1, 0)) AS 'pns_dpk', SUM(if(data_guru.sts_pegawai = 'GTT' , 1, 0)) AS 'gtt', SUM(if(data_guru.sts_pegawai = 'GTY' , 1, 0)) AS 'gty' FROM profil JOIN data_guru ON profil.npsn = data_guru.npsn WHERE profil.kab = $kab2[id] AND jenjang = '$jenjang[$i]'");

												$y = mysqli_fetch_array($q, MYSQLI_BOTH);

												if($y['jenjang'] == null){
													echo "<td>0</td><td>0</td><td>0</td><td>0</td>";
												}
												else{
													$tot = $y['gtt'] + $y['gty'] + $y['pns_dpk'];
													echo "<td>$y[pns_dpk]</td><td>$y[gtt]</td><td>$y[gty]</td><td style='color : #3c8dbc'>$tot</td>";
												}

												$totpns = $totpns + $y['pns_dpk'];
												$totgtt = $totgtt + $y['gtt'];
												$totgty = $totgty + $y['gty'];
												$total = $totpns + $totgtt + $totgty;
											}
												
												echo "
													<td>$totpns</td>
													<td>$totgtt</td>
													<td>$totgty</td>
													<td>$total</td>
												";
											}
											echo "</tr>";
										
									?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2">Jumlah</td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										<td style="font-weight: 600"></td>
										
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
				table td{
					min-width: 70px !important;
					text-align: center;
				}
				table th{
					text-align: center;
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
			<script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
			<script src="admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
			<script src="assets/js/main.js"></script>
			<script type="text/javascript">
			  $(function(){
			    $('#data-guru').DataTable({
			      'paging' : true,
			      'searching' : true,
			      'info' : true
			    });
			    $('#data-guru-gol').DataTable({
			      'paging' : true,
			      'searching' : true,
			      'info' : true
			    });

			  });
			</script>
			<script type="text/javascript">
				var k = 1
				
					for (var j = 2; j < 29; j++) {
						var jsd = 0
						var id = document.getElementsByTagName('table')[0]
						for (var i = 2; i < 7; i++ ) {
							
							var d = id.getElementsByTagName('tr')[i];
							var a = d.getElementsByTagName('td')[j].innerHTML
							var sd = parseInt(a)
							var jsd = jsd + sd

						}
							
						
			
							var tr = id.getElementsByTagName('tr')[7]
							var doc = tr.getElementsByTagName('td')[k]
							doc.innerHTML = jsd;

							k++
						
					}

				var n = 1
					for (var j = 2; j < 38; j++) {
						var jsd = 0
						var id = document.getElementsByTagName('table')[1]
						for (var i = 2; i < 7; i++ ) {
							
							var d = id.getElementsByTagName('tr')[i];
							var a = d.getElementsByTagName('td')[j].innerHTML
							var sd = parseInt(a)
							var jsd = jsd + sd

						}
							
						
			
							var tr = id.getElementsByTagName('tr')[7]
							var doc = tr.getElementsByTagName('td')[n]
							doc.innerHTML = jsd;

							n++
						
					}
										
			</script>

	</body>
</html>