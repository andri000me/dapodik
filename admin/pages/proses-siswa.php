<?php  
	session_start();
	include '../../koneksi.php';

	$val 				= $_GET['val'];
	$npsn		 		= $_SESSION['npsn'];

	$tahun_ajaran		= $_POST['tahunajaran'];
	$kelas				= $_POST['kelas'];
	$jurusan			= $_POST['jurusan'];
	$rombel				= $_POST['rombel'];
	$jumlah_putra		= $_POST['jumlah_putra'];
	$jumlah_putri		= $_POST['jumlah_putri'];
	$kms				= $_POST['kms'];
	$non_kms			= $_POST['non_kms'];
	$jumlah_siswa		= $jumlah_putri + $jumlah_putra;
	$submit				= $_POST['submit'];



	if($val == 'edit'){
		$id  = $_GET['id'];
		$query = mysqli_query($conn, "UPDATE siswa SET tahun_ajaran = '$tahun_ajaran', kelas = '$kelas', jurusan = '$jurusan', rombel = '$rombel', jumlah_putra = '$jumlah_putra', jumlah_putri = '$jumlah_putri', kms = '$kms', non_kms = '$non_kms', jumlah_siswa = '$jumlah_siswa' WHERE id = $id");
	}
	elseif($val == 'tambah'){
		$query = mysqli_query($conn, "INSERT INTO siswa(npsn, tahun_ajaran, kelas, jurusan, rombel, jumlah_putra, jumlah_putri, kms, non_kms, jumlah_siswa) VALUES  ('$npsn', '$tahun_ajaran', '$kelas', '$jurusan', '$rombel', '$jumlah_putra', '$jumlah_putri', '$kms', '$non_kms', '$jumlah_siswa')");
	}

	if($submit == 'Hapus'){
		$query = mysqli_query($conn, "DELETE FROM siswa WHERE id = '$id'");
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