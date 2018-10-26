<?php  
	session_start();
	include '../../koneksi.php';

	$val 				= $_GET['val'];
	$npsn		 		= $_GET['npsn'];

	$thn_ajaran			= $_POST['tahunajaran'];
	$jns_prestasi		= $_POST['prestasi'];
	$hasil				= $_POST['hasil'];
	$level				= $_POST['level'];
	$pemegang			= $_POST['pemegang'];
	$tgl_pelaksanaan	= $_POST['tgl_plaksanaan'];
	$ket				= $_POST['keterangan'];

	$hapus				= $_POST['hapus'];

	if($val == 'edit'){
		$id  = $_GET['id'];
		$query = mysqli_query($conn, "UPDATE prestasi SET thn_ajaran = '$thn_ajaran', jns_prestasi = '$jns_prestasi', hasil = '$hasil', level = '$level', pemegang = '$pemegang', tgl_plaksanaan = '$tgl_pelaksanaan', ket = '$ket' WHERE id = $id");
	}
	elseif($val == 'tambah'){
		$query = mysqli_query($conn, "INSERT INTO prestasi(npsn, thn_ajaran, jns_prestasi, hasil, level, pemegang, tgl_plaksanaan, ket) VALUES  ('$npsn', '$thn_ajaran', '$jns_prestasi', '$hasil', '$level', '$pemegang', '$tgl_pelaksanaan', '$ket')");
		
	}

	if($hapus == 'Hapus'){
		$query = mysqli_query($conn, "DELETE FROM prestasi WHERE id = '$id'");
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