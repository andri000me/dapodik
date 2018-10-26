<?php 
	include "koneksi.php";
	$npsn = $_GET['npsn'];
	//GET Tahun Ajaran
	$qta = mysqli_query($conn, "SELECT count(tahun_ajaran), tahun_ajaran from siswa join profil on profil.npsn = siswa.npsn WHERE profil.npsn = '$npsn' GROUP BY tahun_ajaran ORDER by tahun_ajaran DESC");
	$qtaf = mysqli_query($conn, "SELECT count(tahun_ajaran), tahun_ajaran from siswa join profil on profil.npsn = siswa.npsn WHERE profil.npsn = '$npsn'  GROUP BY tahun_ajaran ORDER by tahun_ajaran DESC");
	$taf = mysqli_fetch_array($qtaf, MYSQLI_BOTH);
	if(isset($_GET['tahun_ajaran'])){
		$tahun_ajaran = $_GET['tahun_ajaran'];
	}
	else {
		$tahun_ajaran = $taf['tahun_ajaran'];
	}

	$query = mysqli_query($conn, "SELECT * FROM profil where npsn = '$npsn'");
	$querykepsek = mysqli_query($conn, "SELECT * FROM kepsek where npsn = '$npsn' AND tahun_ajaran = '$tahun_ajaran'");
	$querywakasek = mysqli_query($conn, "SELECT * FROM wakasek where npsn = '$npsn' AND tahun_ajaran = '$tahun_ajaran'");
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$datakepsek = mysqli_fetch_array($querykepsek, MYSQLI_BOTH);
	$datawakasek = mysqli_fetch_array($querywakasek, MYSQLI_BOTH);

	

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
						<li><a href="data-sekolah.php">Data Sekolah</a></li>
						<?php echo "<li><a href='data-sekolah-kabupaten.php?id=$data[kab]'>" ?><?php echo "$ka[kabupaten]"; ?></a></li>
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
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-body">
							<div class="profile-content">
				                <div class="tabbable-panel">
				                    <div class="tabbable-line">
				                        <ul class="nav nav-tabs ui-sortable-handle">
				                            <li class="active"><a href="#profil" data-toggle="tab" aria-expanded="true"><i class="glyphicon glyphicon-home"></i>&nbsp; Profil<div class="ripple-container"></div></a></li>
				                            <li class=""><a href="#rekapitulasi" data-toggle="tab" aria-expanded="false"><i class="glyphicon glyphicon-tasks"></i>&nbsp; Rekapitulasi<div class="ripple-container"></div></a></li>
				                            <li class=""><a href="#kontak" data-toggle="tab" aria-expanded="false"><i class="glyphicon glyphicon-envelope"></i>&nbsp; Kontak<div class="ripple-container"></div></a></li>
				                        </ul>
				                        <div id="myTabContent" class="tab-content no-padding" style="margin-top : 1em;">
				                            <div class="tab-pane fade active in" id="profil">
				                                <div class="row">
				                                    <div class="col-md-6">
				                                        <div class="panel panel-info">
				                                            <div class="panel-heading">Identitas Sekolah</div>
				                                            <div class="panel-body">
				                                            <table style="display: table; min-width: 100%; border:none" class='profil'>
		                										<tr>
		                  											<td><b>NPSN</b></td>
		                  											<td><?php echo "$data[npsn]"; ?></td>
		                										</tr>
		                										<tr>
		                  											<td><b>Nama Sekolah</b></td>
		                  											<td><?php echo "$data[nama_sekolah]"; ?></td>
		                										</tr>
		                										<tr>
		                  											<td><b>Kepala Sekolah</b></td>
		                  											<td><?php echo "$datakepsek[kepala_sekolah]"; ?></td>
		                										</tr>
		                										<tr>
		                  											<td><b>Wakil Kepala Sekolah</b></td>
		                  											<td><?php echo "$datawakasek[wakil_kepala]"; ?></td>
		                										</tr>
		                										<tr>
		                  											<td><b>Jenjang</b></td>
		                  											<td><?php echo "$data[jenjang]"; ?></td>
		                										</tr>
		                										<tr>
		                  											<td><b>Alamat</b></td>
		                  											<td><?php echo "$data[alamat]"; ?></td>
			                									</tr>
			                									<tr>
			                  										<td><b>Kab</b></td>
			                  										<td><?php echo "$ka[kabupaten]"; ?></td>
			                									</tr>
			                									<tr>
			                  										<td><b>Telp</b></td>
			                  										<td><?php echo "$data[telepon]"; ?></td>
			                									</tr>
			                									<tr>
			                  										<td><b>Email</b></td>
			                  										<td><?php echo "$data[email]"; ?></td>
			                									</tr>
			                									<tr>
			                  										<td><b>Website</b></td>
									 			                  	<td><?php echo "<a href='http://$data[web]'>$data[web]"; ?></a></td>
			                									</tr>
			              									</table>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="col-md-6">
				                                        <div class="panel panel-info">
				                                            <div class="panel-heading">Lain-Lain</div>
				                                            <div class="panel-body">

				                                                <div class="col-md-12">
												                  <h4 style="margin-bottom: 40px;"><b>Pendirian</b></h4>
												                  <table class="profil">
												                    <tr>
												                      <td><b>Tanggal Pendirian</b></td>
												                      <td><?php echo "$data[tgl_pendirian]"; ?></td>
												                    </tr>
												                    <tr>
												                      <td><b>SK Pendirian</b></td>
												                      <td><?php echo "$data[sk_pendirian]"; ?></td>
												                    </tr>
												                  </table>
												                </div>
												                <div class="col-md-12">
												                  <h4 style="margin-bottom: 40px;"><b>Akreditasi</b></h4>
												                  <table class="profil">
												                    <tr>
												                      <td><b>Akreditasi</b></td>
												                      <td><?php echo "$data[akreditasi]"; ?></td>
												                    </tr>
												                    <tr>
												                      <td><b>SK Akreditasi</b></td>
												                      <td><?php echo "$data[sk_akreditasi]"; ?></td>
												                    </tr>
												                  </table>
												                </div>
												                <div class="col-md-12">
												                  <h4 style="margin-bottom: 40px;"><b>Lain-lain</b></h4>
												                  <table class="profil">
												                    <tr>
												                      <td><b>Kurikulum</b></td>
												                      <td><?php echo "$data[kurikulum]"; ?></td>
												                    </tr>
												                    <tr>
												                      <td><b>Koordinat Longitude</b></td>
												                      <td><?php echo "$data[koordinat_long]"; ?></td>
												                    </tr>
												                    <tr>
												                      <td><b>Koordinat Latitude</b></td>
												                      <td><?php echo "$data[koordinat_lat]"; ?></td>
												                    </tr>
												                    <tr>
												                      <td><b>Listrik</b></td>
												                      <td><?php echo "$data[listrik]"; ?></td>
												                    </tr>
												                    <tr>
												                      <td><b>Akses Internet</b></td>
												                      <td><?php echo "$data[akses_internet]"; ?></td>
												                    </tr>
												                  </table>
												                </div>

				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="col-md-12">
				                                        <div class="panel panel-info">
				                                            <div class="panel-heading">Visi Misi Sekolah</div>
				                                            <div class="panel-body">
				                                            	<table class="profil"  style="display: table;">
													                <tr>
													                  <td><b>Motto</b></td>
													                  <td><?php echo "$data[moto]"; ?></td>
													                </tr>
													                <tr>
													                  <td><b>Visi</b></td>
													                  <td><?php echo "$data[visi]"; ?></td>
													                </tr>
													                <tr>
													                  <td><b>Misi</b></td>
													                  <td><?php echo "$data[misi]"; ?></td>
													                </tr>
													                <tr>
													                  <td><b>Tujuan</b></td>
													                  <td><?php echo "$data[tujuan]"; ?></td>
													                </tr>
													             </table>
				                                            	<?php 

				                                            	// while($aset = mysqli_fetch_array($qaset, MYSQLI_BOTH)){
				                                            	// 	echo "

				                                            	// 	<p><strong>No Persil : </strong>$aset[no_persil]</p>
					                                            //     <p><strong>Kepemilikan : </strong>$aset[kepemilikan]</p>
					                                            //     <p><strong>Status Tanah : </strong>$aset[status_tanah]</p>
					                                            //     <p><strong>Luas : </strong>$aset[luas_tanah]</p>
					                                            //     <p><strong>Tanggal Sertifikat : </strong>$aset[tgl_sertifikat]</p>
					                                            //     <br>
				                                            	// 	";

				                                            	//	} ?>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    
				                                </div>

				                            </div>
				                            <div class="tab-pane fade" id="rekapitulasi">
				                                <div class="row">
				                                	<div class ='col-md-4'>
				                                		<h4>Tahun Ajaran <?php echo "$tahun_ajaran"; ?></h4>
				                                	</div>
				                                    <div class="col-md-8" style="padding-right: 2em">
				                                        <form class="form-group" action='profil-sekolah.php' method="GET">
				                                        <input type="hidden" name="npsn" value='<?php echo "$npsn"; ?>'>
														<div class="form-group col-md-3 col-md-offset-8 ">
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
				                                    </div>
				                                </div>
				                                <div class="panel panel-info">
				                                    <div class="panel-heading">Data Guru</div>
				                                    <div class="panel-body table-responsive">
				                                        <table class="table table-hover table-striped" id='guru' style="display: table;">
				                                            <thead>
				                                            <tr>
				                                                <th class="text-left col-md-8">Uraian</th>
				                                                <th class="text-right col-md-1">Jumlah Guru</th>
				                                                <th class="text-right col-md-1">GTY</th>
				                                                <th class="text-right col-md-1">GTT</th>
				                                                <th class="text-right col-md-1">PNS DPK</th>
				                                            </tr>
				                                            </thead>
				                                            <tbody>
				                                            <?php 
				                                            	$queryguru = mysqli_query($conn, "SELECT jk, COUNT(npsn) AS 'Jumlah', SUM(if(sts_pegawai = 'GTY', 1, 0)) AS 'GTY', SUM(if(sts_pegawai = 'GTT', 1, 0)) AS 'GTT', SUM(if(sts_pegawai = 'PNS DPK', 1, 0)) AS 'PNS_DPK' FROM `data_guru` WHERE npsn = '$npsn' AND tahun_ajaran = '$tahun_ajaran' GROUP BY jk");
				                                             
				                                             	$jk = array('Laki-Laki', 'Perempuan');
				                                             	$i = 0;
				                                             	$tg = 0;
				                                             	$tgty = 0;
				                                             	$tgtt = 0;
				                                             	$tpns = 0;
				                                            	while ($guru = mysqli_fetch_array($queryguru, MYSQLI_BOTH)) {
				                                            		echo "
				                                            		<tr>
				                                            			<td>$jk[$i]</td>
				                                            			<td class='text-right'>$guru[Jumlah]</td>
				                                            			<td class='text-right'>$guru[GTY]</td>
				                                            			<td class='text-right'>$guru[GTT]</td>
				                                            			<td class='text-right'>$guru[PNS_DPK]</td>
				                                            		</tr>
				                                            		";

				                                            		$i++;
				                                            		$tg = $tg + $guru['Jumlah'];
				                                            		$tgty = $tgty + $guru['GTY'];
				                                            		$tgtt = $tgtt + $guru['GTT'];
				                                            		$tpns = $tpns + $guru['PNS_DPK'];

				                                            		if($i == 2){
				                                            			break;
				                                            		}
				                                            	}
				                                            	echo "
				                                        				<tr>
				                                        					<td style='font-weight : 700'>Total</td>
				                                        					<td class='text-right'>$tg</td>
				                                        					<td class='text-right'>$tgty</td>
				                                        					<td class='text-right'>$tgtt</td>
				                                        					<td class='text-right'>$tpns</td>
				                                        				<tr>";
				                                             ?>       	
				                                        </table>
				                                        <table class="table table-hover table-striped" id='gurusemua' style="display: none;">
				                                            <thead>
				                                            <tr>
				                                                <th class="text-left col-md-8">Uraian</th>
				                                                <th class="text-right col-md-1">Jumlah Guru</th>
				                                                <th class="text-right col-md-1">GTY</th>
				                                                <th class="text-right col-md-1">GTT</th>
				                                                <th class="text-right col-md-1">PNS DPK</th>
				                                            </tr>
				                                            </thead>
				                                            <tbody>
				                                            <?php 
				                                            	$queryguru = mysqli_query($conn, "SELECT jk, COUNT(npsn) AS 'Jumlah', SUM(if(sts_pegawai = 'GTY', 1, 0)) AS 'GTY', SUM(if(sts_pegawai = 'GTT', 1, 0)) AS 'GTT', SUM(if(sts_pegawai = 'PNS DPK', 1, 0)) AS 'PNS_DPK' FROM `data_guru` WHERE npsn = '$npsn' GROUP BY jk");
				                                             
				                                             	$jk = array('Laki-Laki', 'Perempuan');
				                                             	$i = 0;
				                                             	$tg = 0;
				                                             	$tgty = 0;
				                                             	$tgtt = 0;
				                                             	$tpns = 0;
				                                            	while ($guru = mysqli_fetch_array($queryguru, MYSQLI_BOTH)) {
				                                            		echo "
				                                            		<tr>
				                                            			<td>$jk[$i]</td>
				                                            			<td class='text-right'>$guru[Jumlah]</td>
				                                            			<td class='text-right'>$guru[GTY]</td>
				                                            			<td class='text-right'>$guru[GTT]</td>
				                                            			<td class='text-right'>$guru[PNS_DPK]</td>
				                                            		</tr>
				                                            		";

				                                            		$i++;
				                                            		$tg = $tg + $guru['Jumlah'];
				                                            		$tgty = $tgty + $guru['GTY'];
				                                            		$tgtt = $tgtt + $guru['GTT'];
				                                            		$tpns = $tpns + $guru['PNS_DPK'];

				                                            		if($i == 2){
				                                            			break;
				                                            		}
				                                            	}
				                                            	echo "
				                                        				<tr>
				                                        					<td style='font-weight : 700'>Total</td>
				                                        					<td class='text-right'>$tg</td>
				                                        					<td class='text-right'>$tgty</td>
				                                        					<td class='text-right'>$tgtt</td>
				                                        					<td class='text-right'>$tpns</td>
				                                        				<tr>";
				                                             ?>       	
				                                        </table>

				                                        <br><button class="btn btn-info pull-right" data-toggle='collapse' data-target='#datagurusemua'>Lihat Semua</button>
				                                        <button class="btn btn-info pull-right" style='margin-right: 10px;' id="tampilguru">Tampilkan Semua Tahun Ajaran</button>

				                                        <div id="datagurusemua" class='collapse' style="margin-top: 70px">
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
				                                        						<td>$vg[nama_guru]</td>
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

				                                    </div>
				                                </div>
				                                <div class="panel panel-info">
				                                    <div class="panel-heading">Data Kependidikan (Staff)</div>
				                                    <div class="panel-body table-responsive">
				                                        <table class="table table-hover table-striped" id="staff">
				                                            <thead>
				                                            <tr>
				                                                <th class="text-left col-md-8">Uraian</th>
				                                                <th class="text-right col-md-1">Jumlah Staff</th>
				                                                <th class="text-right col-md-1">PTY</th>
				                                                <th class="text-right col-md-1">PTT</th>
				                                            </tr>
				                                            </thead>
				                                            <tbody>
				                                            <?php 
				                                            	$querypegawai = mysqli_query($conn, "SELECT jk, COUNT(npsn) AS 'Jumlah', SUM(if(status_pegawai = 'PTY', 1, 0)) AS 'PTY', SUM(if(status_pegawai = 'PTT', 1, 0)) AS 'PTT' FROM `tenkependik` WHERE npsn = '$npsn' AND tahun_ajaran = '$tahun_ajaran' GROUP BY jk");
				                                             

				                                             	$i = 0;
				                                             	$tp = 0;
				                                             	$tpty = 0;
				                                             	$tptt = 0;
				                                            	while ($pegawai = mysqli_fetch_array($querypegawai, MYSQLI_BOTH)) {
				                                            		echo "
				                                            		<tr>
				                                            			<td>$jk[$i]</td>
				                                            			<td class='text-right'>$pegawai[Jumlah]</td>
				                                            			<td class='text-right'>$pegawai[PTY]</td>
				                                            			<td class='text-right'>$pegawai[PTT]</td>
				                                            		</tr>
				                                            		";

				                                            		$tp = $tp + $pegawai['Jumlah'];
				                                            		$tpty = $tpty + $pegawai['PTY'];
				                                            		$tptt = $tptt + $pegawai['PTT'];
				                                            		$i++;

				                                            		if($i == 2){
				                                            			break;
				                                            		}
				                                            	}
				                                            	echo "
				                                        				<tr>
				                                        					<td style='font-weight : 700'>Total</td>
				                                        					<td class='text-right'>$tp</td>
				                                        					<td class='text-right'>$tpty</td>
				                                        					<td class='text-right'>$tptt</td>
				                                        				<tr>";
				                                             ?>   	
				                                        </table>
				                                        <table class="table table-hover table-striped" id="staffsemua">
				                                            <thead>
				                                            <tr>
				                                                <th class="text-left col-md-8">Uraian</th>
				                                                <th class="text-right col-md-1">Jumlah Staff</th>
				                                                <th class="text-right col-md-1">PTY</th>
				                                                <th class="text-right col-md-1">PTT</th>
				                                            </tr>
				                                            </thead>
				                                            <tbody>
				                                            <?php 
				                                            	$querypegawai = mysqli_query($conn, "SELECT jk, COUNT(npsn) AS 'Jumlah', SUM(if(status_pegawai = 'PTY', 1, 0)) AS 'PTY', SUM(if(status_pegawai = 'PTT', 1, 0)) AS 'PTT' FROM `tenkependik` WHERE npsn = '$npsn' GROUP BY jk");
				                                             

				                                             	$i = 0;
				                                             	$tp = 0;
				                                             	$tpty = 0;
				                                             	$tptt = 0;
				                                            	while ($pegawai = mysqli_fetch_array($querypegawai, MYSQLI_BOTH)) {
				                                            		echo "
				                                            		<tr>
				                                            			<td>$jk[$i]</td>
				                                            			<td class='text-right'>$pegawai[Jumlah]</td>
				                                            			<td class='text-right'>$pegawai[PTY]</td>
				                                            			<td class='text-right'>$pegawai[PTT]</td>
				                                            		</tr>
				                                            		";

				                                            		$tp = $tp + $pegawai['Jumlah'];
				                                            		$tpty = $tpty + $pegawai['PTY'];
				                                            		$tptt = $tptt + $pegawai['PTT'];
				                                            		$i++;

				                                            		if($i == 2){
				                                            			break;
				                                            		}
				                                            	}
				                                            	echo "
				                                        				<tr>
				                                        					<td style='font-weight : 700'>Total</td>
				                                        					<td class='text-right'>$tp</td>
				                                        					<td class='text-right'>$tpty</td>
				                                        					<td class='text-right'>$tptt</td>
				                                        				<tr>";
				                                             ?>   	
				                                        </table>

				                                        <br><button class="btn btn-info pull-right" data-toggle='collapse' data-target='#datapegawaisemua'>Lihat Semua</button>
				                                        <button class="btn btn-info pull-right" style='margin-right: 10px;' id="tampilstaff">Tampilkan Semua Tahun Ajaran</button>

				                                        <div id="datapegawaisemua" class='collapse' style="margin-top: 70px">
				                                        	<table id="viewdatapegawai">
				                                        		<thead>
				                                        			<th>No</th>
				                                        			<th>Nama</th>
				                                        			<th>Jabatan</th>
				                                        			<th>Jenis Kelamin</th>
				                                        			<th>Pangkat</th>
				                                        			<th>Pendidikan</th>
				                                        		</thead>
				                                        		<tbody>
				                                        			<?php 
				                                        				$qp =  mysqli_query($conn, "SELECT * FROM tenkependik WHERE npsn = '$npsn'");
				                                        				$x = 1;
				                                        				while ($vp = mysqli_fetch_array($qp, MYSQLI_BOTH)) {
				                                        					echo "
				                                        					<tr>
				                                        						<td>$x</td>
				                                        						<td>$vp[nama]</td>
				                                        						<td>$vp[jabatan]</td>
				                                        						<td>$vp[jk]</td>
				                                        						<td>$vp[status_pegawai]</td>
				                                        						<td>$vp[pnd_thr]</td>
				                                        					</tr>
				                                        					";

				                                        					$x++;
				                                        				}


				                                        			?>
				                                        		</tbody>
				                                        	</table>
				                                        </div>

				                                    </div>
				                                </div>
				                                <div class="panel panel-info">
				                                    <div class="panel-heading">Data Siswa</div>
				                                    <div class="panel-body">
				                                    	<button class="btn btn-info" id = 'tampilsiswa' style="margin-bottom: 20px; float: right;">Tampilkan Semua</button>
				                                        <table id='siswa' style="display: table;">
											                <thead>
											                  <th>No</th>
											                  <th>Tahun Ajaran</th>
											                  <th>Kelas</th>
											                  <th>Jurusan</th>
											                  <th>Rombel</th>
											                  <th>Putra</th>
											                  <th>Putri</th>
											                  <th>KMS</th>
											                  <th>Non-KMS</th>
											                  <th>Total</th>
											                </thead>
											                <tbody>
											                  <?php 
											                  $queri = mysqli_query($conn, "SELECT * FROM siswa WHERE npsn = '$npsn' AND tahun_ajaran = '$tahun_ajaran'");
											                  $x = 1;
											                  while ($siswa = mysqli_fetch_array($queri, MYSQLI_BOTH)) {
											                    echo "<tr>
											                          <td>$x</td> 
											                          <td>$siswa[tahun_ajaran]</td>
											                          <td>$siswa[kelas]</td>
											                          <td>$siswa[jurusan]</td>
											                          <td>$siswa[rombel]</td>
											                          <td>$siswa[jumlah_putra]</td>
											                          <td>$siswa[jumlah_putri]</td>
											                          <td>$siswa[kms]</td>
											                          <td>$siswa[non_kms]</td>
											                          <td>$siswa[jumlah_siswa]</td>
											                    ";
											                  $x++;     
											                  }
											                   ?>
											                </tbody>
											            </table>

											            <table id='siswasemua' style="display: none;">
											                <thead>
											                  <th>No</th>
											                  <th>Tahun Ajaran</th>
											                  <th>Kelas</th>
											                  <th>Jurusan</th>
											                  <th>Rombel</th>
											                  <th>Putra</th>
											                  <th>Putri</th>
											                  <th>KMS</th>
											                  <th>Non-KMS</th>
											                  <th>Total</th>
											                </thead>
											                <tbody>
											                  <?php 
											                  $querisiswa = mysqli_query($conn, "SELECT * FROM siswa WHERE npsn = '$npsn'");
											                  $x = 1;
											                  while ($siswasemua = mysqli_fetch_array($querisiswa, MYSQLI_BOTH)) {
											                    echo "<tr>
											                          <td>$x</td> 
											                          <td>$siswasemua[tahun_ajaran]</td>
											                          <td>$siswasemua[kelas]</td>
											                          <td>$siswasemua[jurusan]</td>
											                          <td>$siswasemua[rombel]</td>
											                          <td>$siswasemua[jumlah_putra]</td>
											                          <td>$siswasemua[jumlah_putri]</td>
											                          <td>$siswasemua[kms]</td>
											                          <td>$siswasemua[non_kms]</td>
											                          <td>$siswasemua[jumlah_siswa]</td>
											                    ";
											                  $x++;     
											                  }
											                   ?>
											                </tbody>
											            </table>
				                                    </div>
				                                </div>
				                                <div class="panel panel-info">
				                                    <div class="panel-heading">Aset Tanah</div>
				                                    <div class="panel-body">
				                                        <div style="overflow-x: scroll;overflow-y: hidden; max-width: 10000px;">
				                                                <table id="aset_tanah">
				                                                	<thead>
				                                                		<th>No</th>
				                                                		<th>No Persil</th>
				                                                		<th>Kepemilikan</th>
				                                                		<th>Atas Nama</th>
				                                                		<th>Status Tanah</th>
				                                                		<th>Luas Tanah</th>
				                                                		<th>No Sertifikat</th>
				                                                		<th>Tanggal Sertifikat</th>
				                                                		<th>Tahun Perolehan</th>
				                                                		<th>Harga Perolehan</th>
				                                                		<th>Asal Usul</th>
				                                                		<th>Letak</th>
				                                                		<th>Peruntukan</th>
				                                                	</thead>
				                                                	<tbody>
				                                                		<?php 
				                                                		$qtanah = mysqli_query($conn, "SELECT * FROM aset_tanah WHERE npsn = $npsn");
													                    $x = 1; 
													                    while ($tanah = mysqli_fetch_array($qtanah, MYSQLI_BOTH)) {
													                      echo "
													                      <tr>
													                        <td>$x</td>
													                        <td>$tanah[no_persil]</td>
													                        <td>$tanah[kepemilikan]</td>
													                        <td>$tanah[atasnama_sertifikat]</td>
													                        <td>$tanah[status_tanah]</td>
													                        <td>$tanah[luas_tanah]</td>
													                        <td>$tanah[no_sertifikat]</td>
													                        <td>$tanah[tgl_sertifikat]</td>
													                        <td>$tanah[thn_perolehan]</td>
													                        <td>$tanah[harga_perolehan]</td>
													                        <td>$tanah[asal_usul]</td>
													                        <td>$tanah[letak]</td>
													                        <td>$tanah[peruntukan]</td>
													                      </tr>
													                      ";

													                      $x++;
													                    }
													                    ?>
				                                                	</tbody>
				                                                </table>
				                                                </div>
				                                    </div>
				                                </div>
				                                <div class="panel panel-info">
				                                    <div class="panel-heading">Aset Bangunan</div>
				                                    <div class="panel-body">
				                                        <div style="overflow-x: scroll; overflow-y: hidden;  max-width: 10000px;">
													                <table id="aset_bangunan">
													                  <thead>
													                    <th>No</th>
													                    <th>Nama Bangunan</th>
													                    <th>Kode Bangunan</th>
													                    <th>Register Bangunan</th>
													                    <th>Kondisi Bangunan</th>
													                    <th>Kontruksi Bangunan</th>
													                    <th>Luas Lantai</th>
													                    <th>Lokasi</th>
													                    <th>Tahun Pembangunan</th>
													                    <th>Luas Bangunan</th>
													                    <th>Biaya Pembangunan</th>
													                  </thead>
													                  <tbody>
													                  	<?php 
													                  	$qbangunan = mysqli_query($conn, "SELECT * FROM aset_bangunan WHERE npsn = $npsn");
													                    $i = 1; 
													                    while ($bangunan = mysqli_fetch_array($qbangunan, MYSQLI_BOTH)) {
													                      echo "
													                      <tr>
													                        <td>$i</td>           
													                        <td>$bangunan[nama_bangunan]</td>
													                        <td>$bangunan[kode_bangunan]</td>
													                        <td>$bangunan[register_bangunan]</td>
													                        <td>$bangunan[kondisi_bangunan]</td>
													                        <td>$bangunan[kostruksi_bangunan]</td>
													                        <td>$bangunan[luas_lantai]</td>
													                        <td>$bangunan[lokasi]</td>
													                        <td>$bangunan[tahun_pembangunan]</td>
													                        <td>$bangunan[luas_bangunan]</td>
													                        <td>$bangunan[biaya_pembangunan]</td>
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
				                                <div class="panel panel-info">
				                                    <div class="panel-heading">Aset Sarpras</div>
				                                    <div class="panel-body">
				                                        <div style="overflow-x: scroll; overflow-y: hidden;  max-width: 10000px;">
													                <table id="aset_sarpras">
													                  <thead>
													                    <th>No</th>
													                    <th>Nama Prasarana</th>
													                    <th>Jumlah</th>
													                    <th>Kondisi Baik</th>
													                    <th>Kondisi Rusak Ringan</th>
													                    <th>Kondisi Rusak Sedang</th>
													                    <th>Kondisi Rusak Berat</th>
													                    <th>Kondisi Sarpras</th>
													                    <th>Status Kepemilikan</th>
													                    <th>Tahun Pengadaan</th>
													                  </thead>
													                  <tbody>
													                  	<?php 
													                  	$qsarpras = mysqli_query($conn, "SELECT * FROM sarpras WHERE npsn = $npsn");
													                    $i = 1; 
													                    while ($sarpras = mysqli_fetch_array($qsarpras, MYSQLI_BOTH)) {
													                      echo "
													                      <tr>
													                        <td>$i</td>           
													                        <td>$sarpras[nama_prasarana]</td>
													                        <td>$sarpras[jumlah]</td>
													                        <td>$sarpras[kondisi_baik]</td>
													                        <td>$sarpras[kondisi_rusakringan]</td>
													                        <td>$sarpras[kondisi_rusaksedang]</td>
													                        <td>$sarpras[kondisi_rusakberat]</td>
													                        <td>$sarpras[kondisi_sarpras]</td>
													                        <td>$sarpras[status_kepemilikan]</td>
													                        <td>$sarpras[tahun_pengadaan]</td>
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
				                            <div class="tab-pane fade" id="kontak">
				                                <div class="row">
				                                    <div class="col-md-6">
				                                        <div class="panel panel-info">
				                                            <div class="panel-heading">
				                                                Kontak Utama
				                                            </div>
				                                            <div class="panel-body">
				                                                <p><strong>Alamat : </strong><?php echo "$data[alamat]"; ?></p>
				                                                <p><strong>Desa / Kelurahan : </strong><?php echo "$data[kel]"; ?></p>
				                                                <p><strong>Kecamatan : </strong><?php echo "$data[kec]"; ?></p>
				                                                <p><strong>Kabupaten : </strong><?php echo "$ka[kabupaten]"; ?></p>
				                                                <p><strong>Lintang : </strong><?php echo "$data[koordinat_long]"; ?></p>
				                                                <p><strong>Bujur : </strong><?php echo "$data[koordinat_lat]"; ?></p>
				                                            </div>
				                                        </div>
				                                    </div>
				                                    <div class="col-md-6">
				                                        <div class="panel panel-info">
				                                            <div class="panel-heading">
				                                                Kontak yang Bisa Dihubungi
				                                            </div>
				                                            <div class="panel-body">
				                                                <p><strong>Telepon : </strong><?php echo "$data[telepon]"; ?></p>
				                                                <p><strong>Fax : </strong><?php echo "$data[telepon]"; ?></p>
				                                                <p><strong>Email : </strong><?php echo "$data[email]"; ?></p>
				                                                <p><strong>Website : </strong><?php echo "$data[web]"; ?></p>

				                                            </div>
				                                        </div>
				                                    </div>
				                                </div>
				                            </div>
				                            
				                        </div>
				                    </div>
				                </div>
				            </div>
				            <!-- End Of Profile Content -->
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
			    #aset_tanah td{
			      min-width: 150px !important;
			    }
			    #aset_tanah td:nth-child(1){
			      min-width: 20px !important;
			    }
			    #aset_tanah td:nth-child(12){
			      min-width: 400px !important;
			    }
			    #aset_tanah td:nth-child(11){
			      min-width: 100px !important;
			    }
			    #aset_bangunan td{
			      min-width: 100px !important;
			    }
			    #aset_bangunan td:nth-child(1){
			      min-width: 20px !important;
			    }
			    #aset_bangunan td:nth-child(2){
			      min-width: 300px !important;
			    }
			    #aset_bangunan td:nth-child(8){
			      min-width: 500px !important;
			    }
			    .profil td{
			    	border: none;
			    	background: none;
			    }
			    .profil tr{
			    	border: none;
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
			    $('#aset_bangunan').DataTable({
			      'paging' : true,
			      'searching' : true,
			      'info' : true
			    });
			    $('#aset_tanah').DataTable({
			      'paging' : true,
			      'searching' : true,
			      'info' : true
			    });
			    $('#aset_sarpras').DataTable({
			      'paging' : true,
			      'searching' : true,
			      'info' : true
			    });
			    
			  });
			</script>
			<script type="text/javascript">
				$('#tampilsiswa').click(function(){
					$('#siswasemua').css('display', 'table');
        			$('#siswa').css('display', 'none');
        			$('#siswasemua').DataTable({
				      'paging' : true,
				      'searching' : true,
				      'info' : true
				    });
				})
				$('#tampilguru').click(function(){
					$('#gurusemua').css('display', 'table');
        			$('#guru').css('display', 'none');
				})
				$('#tampilstaff').click(function(){
					$('#staffsemua').css('display', 'table');
        			$('#staff').css('display', 'none');
				})
			</script>

	</body>
</html>