<?php  
	session_start();
	include '../../koneksi.php';

	$val 				= $_GET['val'];
	$npsn		 		= $_SESSION['npsn'];
	$npsn		 		= $_GET['npsn'];
	

	if($val == 'editbangunan'){
		$nama_bangunan		= $_POST['nama_bangunan'];
		$kode_bangunan		= $_POST['kode_bangunan'];
		$register_bangunan	= $_POST['register_bangunan'];
		$kondisi_bangunan	= $_POST['kondisi_bangunan'];
		$kostruksi_bangunan = $_POST['kostruksi_bangunan'];
		$luas_lantai		= $_POST['luas_lantai'];
		$lokasi				= $_POST['lokasi'];
		$tahun_pembangunan	= $_POST['tahun_pembangunan'];
		$luas_bangunan 		= $_POST['luas_bangunan'];
		$biaya_pembangunan	= $_POST['biaya_pembangunan'];
		$valuebangunan		= $_POST['bangunan'];

		$id  = $_GET['id'];
		$query = mysqli_query($conn, "UPDATE aset_bangunan SET nama_bangunan = '$nama_bangunan', kode_bangunan = '$kode_bangunan', register_bangunan = '$register_bangunan', kondisi_bangunan = '$kondisi_bangunan', kostruksi_bangunan = '$kostruksi_bangunan', luas_lantai = '$luas_lantai', lokasi = '$lokasi', tahun_pembangunan = '$tahun_pembangunan', luas_bangunan = '$luas_bangunan', biaya_pembangunan = '$biaya_pembangunan' WHERE id = $id");

		if($valuebangunan == 'Hapus'){
			$query = mysqli_query($conn, "DELETE FROM aset_bangunan WHERE id = '$id'");
		}
	}
	elseif($val == 'edittanah'){
		$no_persil			= $_POST['no_persil'];
		$kepemilikan		= $_POST['kepemilikan'];
		$atasnama_sertifikat= $_POST['atasnama_sertifikat'];
		$status_tanah		= $_POST['status_tanah'];
		$luas_tanah			= $_POST['luas_tanah'];
		$no_sertifikat		= $_POST['no_sertifikat'];
		$tgl_sertifikat		= $_POST['tgl_sertifikat'];
		$thn_perolehan		= $_POST['thn_perolehan'];
		$harga_perolehan	= $_POST['harga_perolehan'];
		$asal_usul			= $_POST['asal_usul'];
		$letak				= $_POST['letak'];
		$peruntukan			= $_POST['peruntukan'];
		$valuetanah			= $_POST['tanah'];

		$id  = $_GET['id'];

		if($valuetanah == 'Simpan'){
		$query = mysqli_query($conn, "UPDATE aset_tanah SET no_persil = '$no_persil', kepemilikan = '$kepemilikan', atasnama_sertifikat = '$atasnama_sertifikat', status_tanah = '$status_tanah', luas_tanah = '$luas_tanah', no_sertifikat = '$no_sertifikat', tgl_sertifikat = '$tgl_sertifikat', thn_perolehan = '$thn_perolehan', harga_perolehan = '$harga_perolehan', asal_usul = '$asal_usul', letak = '$letak', peruntukan = '$peruntukan' WHERE id = $id");
		}

		elseif($valuetanah == 'Hapus'){
			$query = mysqli_query($conn, "DELETE FROM aset_tanah WHERE id = '$id'");
		}
	}
	elseif($val == 'editsarpras'){
		$sarpras 			= $_POST['sarpras'];
		$nama_prasarana		= $_POST['nama_prasarana'];
		$jumlah				= $_POST['jumlah'];
		$kondisi_baik		= $_POST['kondisi_baik'];
		$kondisi_rusakringan	= $_POST['kondisi_rusakringan'];
		$kondisi_rusaksedang    = $_POST['kondisi_rusaksedang'];
		$kondisi_rusakberat		= $_POST['kondisi_rusakberat'];
		$kondisi_sarpras		= $_POST['kondisi_sarpras'];
		$status_kepemilikan	 	= $_POST['status_kepemilikan'];
		$tahun_pengadaan 		= $_POST['tahun_pengadaan'];



		$id  = $_GET['id'];
		$query = mysqli_query($conn, "UPDATE sarpras SET nama_prasarana = '$nama_prasarana', jumlah = '$jumlah', kondisi_baik = '$kondisi_baik', kondisi_rusakringan = '$kondisi_rusakringan', kondisi_rusaksedang = '$kondisi_rusaksedang', kondisi_rusakberat = '$kondisi_rusakberat', kondisi_sarpras = '$kondisi_sarpras', status_kepemilikan = '$status_kepemilikan', tahun_pengadaan = '$tahun_pengadaan' WHERE id = $id");


		if($sarpras == 'Hapus'){
			$query = mysqli_query($conn, "DELETE FROM sarpras WHERE id = '$id'");
		}
	}

	if($val == 'tambahbangunan'){
		$nama_bangunan		= $_POST['nama_bangunan'];
		$kode_bangunan		= $_POST['kode_bangunan'];
		$register_bangunan	= $_POST['register_bangunan'];
		$kondisi_bangunan	= $_POST['kondisi_bangunan'];
		$kostruksi_bangunan = $_POST['kostruksi_bangunan'];
		$luas_lantai		= $_POST['luas_lantai'];
		$lokasi				= $_POST['lokasi'];
		$tahun_pembangunan	= $_POST['tahun_pembangunan'];
		$luas_bangunan 		= $_POST['luas_bangunan'];
		$biaya_pembangunan	= $_POST['biaya_pembangunan'];

		$query = mysqli_query($conn, "INSERT INTO aset_bangunan(npsn, nama_bangunan, kode_bangunan, register_bangunan, kondisi_bangunan, kostruksi_bangunan, luas_lantai, lokasi, tahun_pembangunan, luas_bangunan, biaya_pembangunan) VALUES  ('$npsn', '$nama_bangunan', '$kode_bangunan', '$register_bangunan', '$kondisi_bangunan', '$kostruksi_bangunan', '$luas_lantai', '$lokasi', '$tahun_pembangunan', '$luas_bangunan', '$biaya_pembangunan')");

	}
	elseif($val == 'tambahtanah'){
		$no_persil			= $_POST['no_persil'];
		$kepemilikan		= $_POST['kepemilikan'];
		$atasnama_sertifikat= $_POST['atasnama_sertifikat'];
		$status_tanah		= $_POST['status_tanah'];
		$luas_tanah			= $_POST['luas_tanah'];
		$no_sertifikat		= $_POST['no_sertifikat'];
		$tgl_sertifikat		= $_POST['tgl_sertifikat'];
		$thn_perolehan		= $_POST['thn_perolehan'];
		$harga_perolehan	= $_POST['harga_perolehan'];
		$asal_usul			= $_POST['asal_usul'];
		$letak				= $_POST['letak'];
		$peruntukan			= $_POST['peruntukan'];

		$query = mysqli_query($conn, "INSERT INTO aset_tanah(npsn, no_persil, kepemilikan, atasnama_sertifikat, status_tanah, luas_tanah, no_sertifikat, tgl_sertifikat, thn_perolehan, harga_perolehan, asal_usul, letak, peruntukan) VALUES  ('$npsn', '$no_persil', '$kepemilikan', '$atasnama_sertifikat', '$status_tanah', '$luas_tanah', '$no_sertifikat', '$tgl_sertifikat', '$thn_perolehan', '$harga_perolehan', '$asal_usul', '$letak', '$peruntukan')");
		
	}
	elseif($val == 'tambahsarpras'){
		$npsn		 		= $_GET['npsn'];
		$nama_prasarana		= $_POST['nama_prasarana'];
		$jumlah				= $_POST['jumlah'];
		$kondisi_baik		= $_POST['kondisi_baik'];
		$kondisi_rusakringan	= $_POST['kondisi_rusakringan'];
		$kondisi_rusaksedang    = $_POST['kondisi_rusaksedang'];
		$kondisi_rusakberat		= $_POST['kondisi_rusakberat'];
		$kondisi_sarpras		= $_POST['kondisi_sarpras'];
		$status_kepemilikan	 	= $_POST['status_kepemilikan'];
		$tahun_pengadaan 		= $_POST['tahun_pengadaan'];

		$query = mysqli_query($conn, "INSERT INTO sarpras(npsn, nama_prasarana, jumlah, kondisi_baik, kondisi_rusakringan, kondisi_rusaksedang, kondisi_rusakberat, kondisi_sarpras, status_kepemilikan, tahun_pengadaan) VALUES  ('$npsn', '$nama_prasarana', '$jumlah', '$kondisi_baik', '$kondisi_rusakringan', '$kondisi_rusaksedang', '$kondisi_rusakberat', '$kondisi_sarpras', '$status_kepemilikan', '$tahun_pengadaan')");

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
// ?>