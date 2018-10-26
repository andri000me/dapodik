<?php 
	include "koneksi.php";
	
	$qta = mysqli_query($conn, "SELECT count(tahun_ajaran), tahun_ajaran, COUNT(nama_sekolah) from siswa join profil on profil.npsn = siswa.npsn GROUP BY tahun_ajaran ORDER by tahun_ajaran DESC");
	$qtaf = mysqli_query($conn, "SELECT count(tahun_ajaran), tahun_ajaran, COUNT(nama_sekolah) from siswa join profil on profil.npsn = siswa.npsn GROUP BY tahun_ajaran ORDER by tahun_ajaran DESC");
	$taf = mysqli_fetch_array($qtaf, MYSQLI_BOTH);
	if(isset($_GET['tahun_ajaran'])){
		$tahun_ajaran = $_GET['tahun_ajaran'];
	}
	else {
		$tahun_ajaran = $taf['tahun_ajaran'];
	}
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
		<link rel="stylesheet" href="assets/css/main.css"/>
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
	</head>
	<body class="landing">
		<!--<a href="admin">LOGIN</a>-->
		
		<section id="header">
			<?php include "navbar.php" ?>
			
		</section>
		<section id="content " class="container main">
			<div class="row ">
				<div class="col-md-12 ">
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="data-siswa.php">Data Peserta Didik</a></li>
					</ol>
					<div class="box box-info">
						<div class="box-header">
							<h3 class="box-title"><b>Data Peserta Didik <?php echo "$tahun_ajaran"; ?></b></h3>
						</div>
						<div class="box-body" style="overflow-x: scroll;">
							<form class="row" style="margin-bottom: 40px" action="data-siswa.php" method="get">
								<div class="col-md-2 col-md-offset-7" style="text-align: right;">
									<label >Tahun Ajaran</label>
								</div>
								<div class="form-group col-md-2 ">
									 <select class='col-md-4 form-control' name="tahun_ajaran">
										<?php while ($ta = mysqli_fetch_array($qta, MYSQLI_BOTH)) {
											echo "<option value='$ta[tahun_ajaran]' "; if($tahun_ajaran == $ta['tahun_ajaran']){echo "selected";}
											echo ">$ta[tahun_ajaran]</option>";
										} ?>
									</select>
								</div>
								
								<div class="form-group col-md-1">
								  <button class="btn btn-info" type="submit">Filter</button>
								</div>
							</form>
							<table id='data-guru' class="table-responsive" >
								<thead>
									<tr>
										<th rowspan="2" colspan="1" style="text-align: center; vertical-align: middle;">No</th>
										<th rowspan="2" colspan="1" style="text-align: center; vertical-align: middle;">Wilayah</th>
										<th colspan="5" style="text-align: center; vertical-align: middle;">SD</th>
										<th colspan="5" style="text-align: center; vertical-align: middle;">MI</th>
										<th colspan="5" style="text-align: center; vertical-align: middle;">SMP</th>
										<th colspan="5" style="text-align: center; vertical-align: middle;">MTS</th>
										<th colspan="5" style="text-align: center; vertical-align: middle;">SMA</th>
										<th colspan="5" style="text-align: center; vertical-align: middle;">MA</th>
										<th colspan="5" style="text-align: center; vertical-align: middle;">SMK</th>
										<th colspan="5" style="text-align: center; vertical-align: middle;">SLB</th>
										<th colspan="5" style="text-align: center; vertical-align: middle;">Total</th>
									</tr>
									<tr>
										<th>L</th>
										<th>P</th>
										<th>KMS</th>
										<th>Non-KMS</th>
										<th>Total</th>
										<th>L</th>
										<th>P</th>
										<th>KMS</th>
										<th>Non-KMS</th>
										<th>Total</th>
										<th>L</th>
										<th>P</th>
										<th>KMS</th>
										<th>Non-KMS</th>
										<th>Total</th>
										<th>L</th>
										<th>P</th>
										<th>KMS</th>
										<th>Non-KMS</th>
										<th>Total</th>
										<th>L</th>
										<th>P</th>
										<th>KMS</th>
										<th>Non-KMS</th>
										<th>Total</th>
										<th>L</th>
										<th>P</th>
										<th>KMS</th>
										<th>Non-KMS</th>
										<th>Total</th>
										<th>L</th>
										<th>P</th>
										<th>KMS</th>
										<th>Non-KMS</th>
										<th>Total</th>
										<th>L</th>
										<th>P</th>
										<th>KMS</th>
										<th>Non-KMS</th>
										<th>Total</th>
										<th>L</th>
										<th>P</th>
										<th>KMS</th>
										<th>Non-KMS</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										while($kab = mysqli_fetch_array($query, MYSQLI_BOTH)){
											echo "<tr>
											<td>$kab[id] </td>
											<td style='min-width : 200px !important; text-align: left'><a href='data-siswa-kabupaten.php?id=$kab[id]&tahun_ajaran=$tahun_ajaran'>$kab[kabupaten]</a></td>
											";

											//$q = mysqli_query($conn, "SELECT profil.kab, profil.jenjang, jenjang.id, SUM(if(data_guru.jk = 'L', 1, 0)) AS 'Laki', SUM(if(data_guru.jk = 'P' , 1, 0)) AS 'Perempuan' FROM jenjang JOIN (profil LEFT JOIN data_guru ON profil.npsn = data_guru.npsn) ON profil.jenjang = jenjang.jenjang WHERE profil.kab = $kab[id] GROUP BY id");

											$jenjang = array('SD', 'MI', 'SMP', 'MTS', 'SMA', 'MA', 'SMK', 'SLB');
											$totlk = 0;
											$totpr = 0;
											$totkms = 0;
											$totnon = 0;
											$total = 0;

											for($i = 0; $i < count($jenjang); $i++){
												$q = mysqli_query($conn, "SELECT profil.kab, SUM(jumlah_putra) AS total_putra, SUM(jumlah_putri) AS total_putri, SUM(kms) AS kms, SUM(non_kms) AS non_kms, SUM(jumlah_putra)+SUM(jumlah_putri) AS total FROM siswa JOIN profil ON siswa.npsn = profil.npsn WHERE profil.jenjang = '$jenjang[$i]' AND profil.kab = $kab[id] AND tahun_ajaran = '$tahun_ajaran'");
												

												$y = mysqli_fetch_array($q, MYSQLI_BOTH);

												if(is_null($y['total_putra'])){
													$y['total_putra'] = 0;
												}
												if(is_null($y['total_putri'])){
													$y['total_putri'] = 0;
												}
												if(is_null($y['kms'])){
													$y['kms'] = 0;
												}
												if(is_null($y['non_kms'])){
													$y['non_kms'] = 0;
												}

													$tot = $y['total_putra'] + $y['total_putri'];
													echo "<td>$y[total_putra]</td><td>$y[total_putri]</td><td>$y[kms]</td><td>$y[non_kms]</td><td style='font-weight : 600; color : #72afd2'>$tot</td>";
												

												$totlk = $totlk + $y['total_putra'];
												$totpr = $totpr + $y['total_putri'];
												$totkms = $totkms + $y['kms'];
												$totnon = $totnon + $y['non_kms'];
												$total = $totlk + $totpr;
											}
												
												echo "
													<td>$totlk</td>
													<td>$totpr</td>
													<td>$totkms</td>
													<td>$totnon</td>
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

			  });
			</script>

			<script type="text/javascript">
				var k = 1
				
					for (var j = 2; j < 47; j++) {
						var jsd = 0
						
						for (var i = 2; i < 7; i++ ) {
							var d = document.getElementsByTagName('tr')[i];
							var a = d.getElementsByTagName('td')[j].innerHTML
							var sd = parseInt(a)
							var jsd = jsd + sd

						}
							console.log(a)
							console.log(j)
			
							var tr = document.getElementsByTagName('tr')[7]
							var doc = tr.getElementsByTagName('td')[k]
							doc.innerHTML = jsd;

							k++
						
					}
										
			</script>

	</body>
</html>