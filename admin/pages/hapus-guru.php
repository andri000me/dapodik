<?php  

	include '../../koneksi.php';

	$id= $_GET['id'];
	$quer2 = mysqli_query($conn, "DELETE FROM data_guru WHERE id = $id");

	if($quer2){
		echo "<script>
		alert('Guru Berhasil Dihapus');
		window.history.back()</script>";
	}
	else{
		echo "<script>
		alert('Maaf, Ekseusi Gagal');
		window.history.back()</script>";
	}
?>