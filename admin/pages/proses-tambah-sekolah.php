<?php  

include '../../koneksi.php';

$npsn 		  = $_POST['npsn'];
$nama_sekolah = $_POST['nama_sekolah'];
$jenjang	  = $_POST['jenjang'];
$alamat		  = $_POST['alamat'];
$kabupaten	  = $_POST['kabupaten'];
$kel	  	  = $_POST['kel'];
$kec		  = $_POST['kec'];
$telepon 	  = $_POST['telepon'];
$email		  = $_POST['email'];
$web		  = $_POST['web'];
$motto 		  = $_POST['motto'];
$visi		  = $_POST['visi'];
$misi		  = $_POST['misi'];
$tujuan		  = '';
$tgl_pendirian   = $_POST['tgl_pendirian'];
$sk_pendirian    = $_POST['sk_pendirian'];
$akreditasi      = $_POST['akreditasi'];
$sk_akreditasi   = $_POST['sk_akreditasi'];
$kurikulum     	 = $_POST['kurikulum'];
$koordinat_long  = $_POST['koordinat_long'];
$koordinat_lat   = $_POST['koordinat_lat'];
$listrik		 = $_POST['listrik'];
$akses_internet  = $_POST['akses_internet'];

$query = mysqli_query($conn, "INSERT INTO profil VALUES ('$jenjang', '$nama_sekolah', '$npsn', '$sk_pendirian', '$tgl_pendirian', '$alamat', '$kel', '$kec', '$kabupaten', '$telepon', '$email', '$web', '$akreditasi', '$sk_akreditasi', '$kurikulum', '$visi', '$misi', '$tujuan', '$motto', '$koordinat_long', '$koordinat_lat', '$listrik', '$akses_internet')");

$queryks = mysqli_query($conn, "INSERT INTO kepsek(npsn, kepala_sekolah) VALUES ('$npsn', 'UNDEFINED')");
$queryws = mysqli_query($conn, "INSERT INTO wakasek(npsn, wakil_kepala) VALUES ('$npsn', 'UNDEFINED')");
$querys = mysqli_query($conn, "INSERT INTO siswa(npsn) VALUES ('$npsn')");


	if ($query && $queryks && $queryws) {
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