<?php 

	session_start();
	include '../../koneksi.php';

	$npsn		 = $_SESSION['npsn'];
	$tahunajaran = $_POST['tahunajaran'];
	$nbm		 = $_POST['nbm'];
	$nama		 = $_POST['nama'];
	$jabatan	 = $_POST['jabatan'];
	$nip		 = $_POST['nip'];
	$tempat_lhr  = $_POST['tempat_lhr'];
	$tgl_lhr	 = $_POST['tgl_lhr'];
	$telepon	 = $_POST['telepon'];
	$email		 = $_POST['email'];
	$pangkat	 = $_POST['pangkat'];
	$tgl_pengangkatan = $_POST['tgl_pengangkatan'];
	$jk 		 = $_POST['jk'];
	$status_pegawai = $_POST['status_pegawai'];
	$organisasi  = $_POST['organisasi'];
	$alamat		 = $_POST['alamat'];
	$rt_rw 		 = $_POST['rt_rw'];
	$kel		 = $_POST['kel'];
	$kec		 = $_POST['kec'];
	$kab		 = $_POST['kab'];
	$prov		 = $_POST['prov'];
	$pnd_thr	 = $_POST['pnd_thr'];
	$val 		 = $_GET['val'];
	$id	 		 = $_GET['id'];
	$value		 = $_POST['submit'];

	if($val == 'tambah'){
		$query = mysqli_query($conn, "INSERT INTO tenkependik(npsn, tahun_ajaran, nbm, nama, jabatan,  nip, tempat_lhr, tgl_lhr, telepon, email, pangkat, tgl_pengangkatan, jk, status_pegawai, organisasi, alamat, rt_rw, kel, kec, kab, prov, pnd_thr) VALUES ('$npsn','$tahunajaran', '$nbm', '$nama' , '$jabatan', '$nip', '$tempat_lhr', '$tgl_lhr', '$telepon', '$email', '$pangkat', '$tgl_pengangkatan', '$jk', '$status_pegawai', '$organisasi', '$alamat', '$rt_rw', '$kel', '$kec', '$kab', '$prov', '$pnd_thr')");
	}
	elseif($val == 'edit'){
		$query = mysqli_query($conn, "UPDATE tenkependik SET npsn = '$npsn', tahun_ajaran = '$tahunajaran', nbm = '$nbm', nama = '$nama', jabatan = '$jabatan', nip = '$nip', tempat_lhr = '$tempat_lhr', tgl_lhr = '$tgl_lhr', telepon = '$telepon', email = '$email', pangkat = '$pangkat', tgl_pengangkatan = '$tgl_pengangkatan', jk = '$jk', status_pegawai = '$status_pegawai', organisasi = '$organisasi', alamat = '$alamat', rt_rw = '$rt_rw', kel = '$kel', kec = '$kec', kab = '$kab', prov = '$prov', pnd_thr = '$pnd_thr'  WHERE id = '$id'");
	}
	
	if($value == 'Hapus'){
		$query = mysqli_query($conn, "DELETE FROM tenkependik WHERE id = '$id'");
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

