<?php  

	include '../../koneksi.php';

	$npsn		 = $_POST['npsn'];
	$tahunajaran = $_POST['tahunajaran'];
	$nbm		 = $_POST['nbm'];
	$nama		 = $_POST['nama'];
	$jabatan	 = $_POST['jabatan'];
	$nip		 = $_POST['nip'];
	$tempat_lhr = $_POST['tempat_lhr'];
	$tgl_lhr	 = $_POST['tgl_lhr'];
	$telepon	 = $_POST['telepon'];
	$email		 = $_POST['email'];
	$pangkat	 = $_POST['pangkat'];
	$tgl_pengangkatan = $_POST['tgl_pengangkatan'];
	$jk 		 	  = $_POST['jk'];
	$status_pegawai   = $_POST['status_pegawai'];
	$organisasi  = $_POST['organisasi'];
	$alamat		 = $_POST['alamat'];
	$rt_rw 		 = $_POST['rt_rw'];
	$kel		 = $_POST['kel'];
	$kec		 = $_POST['kec'];
	$kab		 = $_POST['kab'];
	$prov		 = $_POST['prov'];
	$pnd_thr	 = $_POST['pnd_thr'];
	

	$query = mysqli_query($conn, "INSERT INTO tenkependik(npsn, tahun_ajaran, nbm, nama, jabatan, nip, tempat_lhr, tgl_lhr, telepon, email, pangkat, tgl_pengangkatan, jk, status_pegawai, organisasi, alamat, rt_rw, kel, kec, kab, prov, pnd_thr) VALUES ('$npsn','$tahunajaran', '$nbm', '$nama' , '$jabatan', '$nip', '$tempat_lhr', '$tgl_lhr', '$telepon', '$email', '$pangkat', '$tgl_pengangkatan', '$jk', '$status_pegawai', '$organisasi', '$alamat', '$rt_rw', '$kel', '$kec', '$kab', '$prov', '$pnd_thr')");

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