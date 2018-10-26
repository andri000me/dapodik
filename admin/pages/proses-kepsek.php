<?php  
	session_start();
	include '../../koneksi.php';

	$val 				= $_GET['val'];
	$npsn		 		= $_GET['npsn'];


	if($val == 'editkepsek'){

		$gkepala_sekolah	= $_GET['nama'];
		$kepala_sekolah		= $_POST['kepala_sekolah'];
		$tahun_ajaran		= $_POST['tahunajaran'];
		$nbm				= $_POST['nbm'];
		$tgl_lahir			= $_POST['tgl_lahir'];
		$sk_pengangkatan	= $_POST['sk_pengangkatan'];
		$tgl_sk  			= $_POST['tgl_sk'];
		$asal_sk			= $_POST['asal_sk'];
		$tmt_jabatan		= $_POST['tmt_jabatan'];
		$masa_tugaske		= $_POST['masa_tugaske'];
		$tgl_berahir		= $_POST['tgl_berahir'];
		$value			    = $_POST['value'];

		
		$query = mysqli_query($conn, "UPDATE kepsek SET tahun_ajaran = '$tahun_ajaran', kepala_sekolah = '$kepala_sekolah', nbm = '$nbm', tgl_lahir = '$tgl_lahir', sk_pengangkatan = '$sk_pengangkatan', tgl_sk = '$tgl_sk', asal_sk = '$asal_sk', tmt_jabatan = '$tmt_jabatan', masa_tugaske = '$masa_tugaske', tgl_berahir = '$tgl_berahir' WHERE kepala_sekolah = '$gkepala_sekolah' AND npsn = '$npsn'");
		
		if($value == 'Hapus'){
			$query = mysqli_query($conn, "DELETE FROM kepsek WHERE kepala_sekolah = '$kepala_sekolah' AND npsn = '$npsn'");
		}
	}
	elseif($val == 'editwakasek'){

		$gwakil_kepala		= $_GET['nama'];
		$tahun_ajaran		= $_POST['tahun_ajaran'];
		$nbm				= $_POST['nbm'];
		$sk_pengangkatan	= $_POST['sk_pengangkatan'];
		$tgl_sk  			= $_POST['tgl_sk'];
		$asal_sk			= $_POST['asal_sk'];
		$tmt_jabatan		= $_POST['tmt_jabatan'];
		$masa_tugaske		= $_POST['masa_tugaske'];
		$wakil_kepala		= $_POST['wakil_kepala'];
		$waka_bidang		= $_POST['waka_bidang'];
		$tgl_habis			= $_POST['tgl_berahir'];
		$value			    = $_POST['values'];

		$query = mysqli_query($conn, "UPDATE wakasek SET tahun_ajaran = '$tahun_ajaran', wakil_kepala = '$wakil_kepala', nbm = '$nbm', waka_bidang = '$waka_bidang', sk_pengangkatan = '$sk_pengangkatan', tgl_sk = '$tgl_sk', asal_sk = '$asal_sk', tmt_jabatan = '$tmt_jabatan', masa_tugaske = '$masa_tugaske', tgl_habis = '$tgl_habis' WHERE wakil_kepala = '$gwakil_kepala' AND npsn = '$npsn'");
	
		if($value == 'Hapus'){
			$query = mysqli_query($conn, "DELETE FROM wakasek WHERE wakil_kepala = '$gwakil_kepala' AND npsn = '$npsn'");
		}

	}
	elseif($val == 'tambahkepsek'){

		$kepala_sekolah		= $_POST['kepala_sekolah'];
		$tahun_ajaran		= $_POST['tahunajaran'];
		$nbm				= $_POST['nbm'];
		$tgl_lahir			= $_POST['tgl_lahir'];
		$sk_pengangkatan	= $_POST['sk_pengangkatan'];
		$tgl_sk  			= $_POST['tgl_sk'];
		$asal_sk			= $_POST['asal_sk'];
		$tmt_jabatan		= $_POST['tmt_jabatan'];
		$masa_tugaske		= $_POST['masa_tugaske'];
		$tgl_berahir		= $_POST['tgl_berahir'];

		$query = mysqli_query($conn, "INSERT INTO kepsek VALUES('$npsn', '$tahun_ajaran', '$kepala_sekolah', '$nbm', '$tgl_lahir', '$sk_pengangkatan', '$tgl_sk', '$asal_sk', '$tmt_jabatan', '$masa_tugaske', '$tgl_berahir')");
	
	}
	elseif($val == 'tambahwakasek'){

		$tahun_ajaran		= $_POST['tahunajaran'];
		$nbm				= $_POST['nbm'];
		$sk_pengangkatan	= $_POST['sk_pengangkatan'];
		$tgl_sk  			= $_POST['tgl_sk'];
		$asal_sk			= $_POST['asal_sk'];
		$tmt_jabatan		= $_POST['tmt_jabatan'];
		$masa_tugaske		= $_POST['masa_tugaske'];
		$wakil_kepala		= $_POST['wakil_kepala'];
		$waka_bidang		= $_POST['waka_bidang'];
		$tgl_habis			= $_POST['tgl_berahir'];

		$query = mysqli_query($conn, "INSERT INTO wakasek VALUES('$npsn', '$tahun_ajaran', '$nbm', '$wakil_kepala',  '$waka_bidang', '$sk_pengangkatan', '$tgl_sk', '$asal_sk', '$tmt_jabatan', '$masa_tugaske', '$tgl_habis')");
		
	
	}


	if ($query) {
		echo "
		 <script type='text/javascript'>
		 	alert('Berhasil');
		 	window.history.back();
		 </script>
		";
	}
	else {
		echo "
		 <script type='text/javascript'>
		 	alert('Maaf, Gagal');
			window.history.back();
		 </script>
		";
	}
?>