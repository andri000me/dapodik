<?php 

	session_start();
	include '../../koneksi.php';

	
	$id			 = $_GET['id'];
	$val 		 = $_GET['item'];


	if($val == 'profil'){
		$nama		 = $_POST['nama'];
		$tempat_lhr  = $_POST['tempat_lhr'];
		$tgl_lhr	 = $_POST['tgl_lhr'];
		$telepon	 = $_POST['telepon'];
		$email		 = $_POST['email'];
		$jk 		 = $_POST['jk'];
		$alamat		 = $_POST['alamat'];
		$rt_rw 		 = $_POST['rt_rw'];
		$kel		 = $_POST['kel'];
		$kec		 = $_POST['kec'];
		$kab		 = $_POST['kab'];
		$prov		 = $_POST['prov'];
		$query = mysqli_query($conn, "UPDATE tenkependik SET nama = '$nama' , tempat_lhr = '$tempat_lhr', tgl_lhr = '$tgl_lhr', telepon = '$telepon', email = '$email', jk = '$jk',  alamat = '$alamat', rt_rw = '$rt_rw', kel = '$kel', kec = '$kec', kab = '$kab', prov = '$prov' WHERE id = '$id'");
	}
	elseif($val == 'ket'){
		$tahunajaran = $_POST['tahunajaran'];
		$npsn		 = $_POST['npsn'];
		$nbm		 = $_POST['nbm'];
		$jabatan     = $_POST['jabatan'];
		$nip		 = $_POST['nip'];
		$pangkat	 = $_POST['pangkat'];
		$tgl_pengangkatan = $_POST['tgl_pengangkatan'];
		$status_pegawai = $_POST['status_pegawai'];
		$organisasi  	= $_POST['organisasi'];
		$pnd_thr	 	= $_POST['pnd_thr'];

		
		$query = mysqli_query($conn, "UPDATE tenkependik SET npsn = '$npsn', tahun_ajaran = '$tahunajaran', nbm = '$nbm' , jabatan = '$jabatan', nip = '$nip', pangkat = '$pangkat', tgl_pengangkatan = '$tgl_pengangkatan', status_pegawai = '$status_pegawai', organisasi = '$organisasi', pnd_thr = '$pnd_thr' WHERE id = '$id'");
		
	}
	elseif($val == 'hapus'){
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

                                                                                                                                                                                                                                                                                                                                                                                                                         