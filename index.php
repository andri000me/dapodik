<!DOCTYPE HTML>
<?php 
	include "koneksi.php";
?>
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

		<script src="assets/js/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#artikel" ).load( "fetch_pages.php"); //load initial records
				
				//executes code below when user click on pagination links
				$("#artikel").on( "click", ".paginations a", function (e){
					e.preventDefault();
					$(".loading-div").show(); //show loading element
					var page = $(this).attr("data-page"); //get page number from link
					$("#artikel").load("fetch_pages.php",{"page":page}, function(){ //get content from PHP page
						$(".loading-div").hide(); //once done, hide loading element
					});
					
				});
			});
		</script>	
		
	</head>
	<body class="landing">
		<!--<a href="admin">LOGIN</a>-->
		
		<section id="header">
			<?php include "navbar.php" ?>

		</section>

		
		<section id="content" class="container main">
			<div class="row content">

				<!-- <div class="col-md-12">
					<div class="box box-info" style="border : none; padding-top: 5px;">
						<marquee>
			            Dengan semangat baru dan kebersamaan yang
			                    melibatkan seluruh
			                    stakeholder pendataan, kita tuntaskan pencapaian target Dapodik Dasar dan Menengah tahun 2016
			                    mencapai 100%. Salam SATU DATA DAPODIK DASAR DAN MENENGAH!
			            </marquee>
			        </div>
				</div> -->

				<!-- <div class="col-md-12">
					<div class="menu row">
						<div class="col-md-2 list"><div><a href="data-sekolah.php">Sekolah</a></div></div>
						<div class="col-md-2 list"><div><a href="data-guru.php">Guru</a></div></div>
						<div class="col-md-2 list"><div><a href="data-kepsek.php">Kepala Sekolah</a></div></div>
						<div class="col-md-2 list"><div><a href="data-aset.php">Aset</a></div></div>
						<div class="col-md-2 list"><div><a href="data-siswa.php">Siswa</a></div></div>
						<div class="col-md-2 list"><div><a href="data-pegawai">Pegawai</a></div></div>
					</div>
				</div> -->

				<div class="col-md-8">
					<div class="box box-info">
						<div class="box-header">
							<h4 style="margin :5px; color: #fff">Prestasi</h4>
						</div>
						<div class="box-body">
							<div class="loading-div"><img src="ajax-loader.gif" ></div>
							<div class="artikel" id="artikel">
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box box-info">
						<div class="box-header">
							<h4 style="color: #fff; margin: 5px;">Siswa Terbanyak</h4>
						</div>
						<div class="box-body">
							<div id="Data2">

								<table class="table table-hover table-striped"> 
									<thead>
										<tr>
											<th class="text-center">Tahun Ajaran</th>
											<th>Nama Sekolah</th>
											<th class="text-center">Total Siswa</th>
										</tr>
									</thead>
									<tbody>
										<?php  
											$query = mysqli_query($conn, "SELECT siswa.tahun_ajaran, profil.nama_sekolah, SUM(jumlah_putra)+SUM(jumlah_putri) AS total_siswa FROM siswa JOIN profil ON siswa.npsn = profil.npsn GROUP BY profil.npsn ORDER BY total_siswa DESC LIMIT 10");
													
										while($data = mysqli_fetch_array($query, MYSQLI_BOTH)){
											echo "
											<tr style='font-size : 12px'>
												<td>$data[tahun_ajaran]</td>
												<td>$data[nama_sekolah]</td>
												<td>$data[total_siswa]</td>
											</tr>
											";
											} ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="box box-info">
						<div class="box-header">
							<h4 style="color: #fff; margin: 5px;">Guru Terbanyak</h4>
						</div>
						<div class="box-body">
							<div id="Data2">
								<table class="table table-hover table-striped"> 
									<thead>
										<tr>
											<th class="text-center">Tahun Ajaran</th>
											<th>Nama Sekolah</th>
											<th class="text-center">Total Guru</th>
										</tr>
									</thead>
									<tbody>
										<?php  
											$queries = mysqli_query($conn, "SELECT data_guru.tahun_ajaran, profil.nama_sekolah, COUNT(id) AS total_guru FROM data_guru JOIN profil ON data_guru.npsn = profil.npsn GROUP BY profil.npsn ORDER BY total_guru DESC LIMIT 10");
													
										while($dataguru = mysqli_fetch_array($queries, MYSQLI_BOTH)){
											echo "
											<tr style='font-size : 12px'>
												<td>$dataguru[tahun_ajaran]</td>
												<td>$dataguru[nama_sekolah]</td>
												<td>$dataguru[total_guru]</td>
											</tr>
											";
											} ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Scripts -->
			
			
			<script src="admin/bootstrap/js/bootstrap.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script> <!-- THIS -->
			<script src="assets/js/jquery.scrollgress.min.js"></script> <!-- THIS -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script> <!-- THIS -->
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			

			<style>
			.contents{
				margin: 20px;
				padding: 20px;
				list-style: none;
				background: #F9F9F9;
				border: 1px solid #ddd;
				border-radius: 5px;
			}
			.contents li{
			    margin-bottom: 10px;
			}
			.loading-div{
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: rgba(0, 0, 0, 0.56);
				z-index: 999;
				display:none;
			}
			.loading-div img {
				margin-top: 20%;
				margin-left: 50%;
			}
			.box-header .box-title{
				color: #fff;
			}

			/* Pagination style */
			.paginations{margin-top:30px;padding:0;}
			.paginations li{
				display: inline;
				padding: 6px 10px 6px 10px;
				border: 1px solid #ddd;
				margin-right: -1px;
				font: 15px/20px Arial, Helvetica, sans-serif;
				background: #FFFFFF;
				box-shadow: inset 1px 1px 5px #F4F4F4;
			}
			.paginations li a{
			    text-decoration:none;
			    color: rgb(89, 141, 235);
			}
			.paginations li.first {
			    border-radius: 5px 0px 0px 5px;
			}
			.paginations li.last {
			    border-radius: 0px 5px 5px 0px;
			}
			.paginations li:hover{
				background: #CFF;
			}
			.paginations li.active{
				background: #F0F0F0;
				color: #333;
			}
			.box.box-info {
			    /* border-top-color: #00c0ef; */
			    border: none !important;
			}
			</style>
	</body>
</html>