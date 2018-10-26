<?php  
	session_start();
	include '../../koneksi.php';

	$val 				= $_GET['val'];
	
	
	if($val == 'edit'){
		$value = $_POST['value'];
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


		if($value == 'Hapus'){
			$query = mysqli_query($conn, "DELETE FROM sarpras WHERE id = '$id'");
		}
	}
	

	if($val == 'tambah'){
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