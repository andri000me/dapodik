<?php  

	include '../../koneksi.php';

	$npsn = $_GET['npsn'];
	$query = mysqli_query($conn, "DELETE FROM profil WHERE npsn = $npsn");
	$quer2 = mysqli_query($conn, "DELETE FROM data_guru WHERE npsn = $npsn");
	$quer3 = mysqli_query($conn, "DELETE FROM kepsek WHERE npsn = $npsn");
	$quer4 = mysqli_query($conn, "DELETE FROM wakasek WHERE npsn = $npsn");
	$quer5 = mysqli_query($conn, "DELETE FROM aset_bangunan WHERE npsn = $npsn");
	$quer6 = mysqli_query($conn, "DELETE FROM aset_tanah WHERE npsn = $npsn");
	$quer7 = mysqli_query($conn, "DELETE FROM prestasi WHERE npsn = $npsn");

	if($query && $quer2 && $quer3 && $quer4 && $quer5 && $quer6 && $quer7){
		echo "<script>
		alert('Sekolah Berhasil Dihapus');
		window.history.back()</script>";
	}
	else{
		echo "<script>
		alert('Maaf, Ekseusi Gagal');
		window.history.back()</script>";
	}
?>