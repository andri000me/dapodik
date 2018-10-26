<?php  
	include '../../koneksi.php';

	$npsn		 		= $_POST['npsn'];
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



	$query = mysqli_query($conn, "INSERT INTO siswa(npsn, tahun_ajaran, kelas, jurusan, rombel, jumlah_putra, jumlah_putri, kms, non_kms, jumlah_siswa) VALUES  ('$npsn', '$tahun_ajaran', '$kelas', '$jurusan', '$rombel', '$jumlah_putra', '$jumlah_putri', '$kms', '$non_kms', '$jumlah_siswa')");


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