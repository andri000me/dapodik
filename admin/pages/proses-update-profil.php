<?php 
	session_start();
	include '../../koneksi.php';
	$item = $_GET['item'];
	$npsn = $_GET['npsn'];

	if($item == 'profil'){
		$npsn 		  = $_POST['npsn'];
		$nama_sekolah = $_POST['nama_sekolah'];
		$jenjang	  = $_POST['jenjang'];
		$alamat		  = $_POST['alamat'];
		$kabupaten	  = $_POST['kabupaten'];
		$telepon 	  = $_POST['telepon'];
		$email		  = $_POST['email'];
		$web		  = $_POST['web'];


		$query = mysqli_query($conn, "UPDATE profil SET  npsn = '$npsn', kab = '$kabupaten', nama_sekolah = '$nama_sekolah', jenjang = '$jenjang', alamat = '$alamat', telepon = '$telepon', email = '$email', web = '$web' WHERE npsn = $_SESSION[npsn]");
		$queryuser = mysqli_query($conn, "UPDATE user SET npsn = $npsn WHERE npsn = '$npsn'");
		$_SESSION['npsn'] = $npsn;

	if($query){
		echo "<script>
		alert('Data Berhasil Diubah');
		window.history.back()</script>";
	}
	else{
		echo "<script>
		alert('Maaf, Ekseusi Gagal');
		window.history.back()</script>";
	}

	}
	elseif($item == 'vm') {
		$motto 		  = $_POST['motto'];
		$visi		  = $_POST['visi'];
		$misi		  = $_POST['misi'];
		$tujuan		  = $_POST['tujuan'];

		$query = mysqli_query($conn, "UPDATE profil SET moto = '$motto', visi = '$visi', misi = '$misi', tujuan = '$tujuan' WHERE npsn = '$npsn'");

		if($query){
			echo "<script>
			alert('Data Berhasil Diubah');
			window.history.back()</script>";
		}
		else{
			echo "<script>
			alert('Maaf, Data Gagal Diubah');
			window.history.back()</script>";
		}
		
	}
	elseif($item == 'aset'){
		$tgl_pendirian   = $_POST['tgl_pendirian'];
		$sk_pendirian    = $_POST['sk_pendirian'];
		$akreditasi      = $_POST['akreditasi'];
		$sk_akreditasi   = $_POST['sk_akreditasi'];
		$kurikulum     	 = $_POST['kurikulum'];
		$koordinat_long  = $_POST['koordinat_long'];
		$koordinat_lat   = $_POST['koordinat_lat'];
		$listrik		 = $_POST['listrik'];
		$akses_internet  = $_POST['akses_internet'];

		$query = mysqli_query($conn, "UPDATE profil SET tgl_pendirian = '$tgl_pendirian', sk_pendirian = '$sk_pendirian', akreditasi = '$akreditasi', sk_akreditasi = '$sk_akreditasi', kurikulum = '$kurikulum', koordinat_long = '$koordinat_long', koordinat_lat = '$koordinat_lat', listrik = '$listrik', akses_internet = '$akses_internet' WHERE npsn = '$npsn'");

		echo "<script>
		alert('Data Berhasil Diubah');
		window.history.back()</script>";
	}

 ?>