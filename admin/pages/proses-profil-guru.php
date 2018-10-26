<?php 

	session_start();
	include '../../koneksi.php';

	
	$id			 = $_GET['id'];
	$val 		 = $_GET['item'];


	if($val == 'profil'){
		$nama		 = $_POST['nama_guru'];
		$tempat_lahir = $_POST['tempat_lahir'];
		$tgl_lahir	 = $_POST['tgl_lahir'];
		$telepon	 = $_POST['telepon'];
		$email		 = $_POST['email'];
		$jk 		 = $_POST['jk'];
		$alamat		 = $_POST['alamat'];
		$rt_rw 		 = $_POST['rt_rw'];
		$kel		 = $_POST['kelurahan'];
		$kec		 = $_POST['kec'];
		$kab		 = $_POST['kab'];
		$prov		 = $_POST['prov'];
		$query = mysqli_query($conn, "UPDATE data_guru SET nama_guru = '$nama' , tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', telepon = '$telepon', email = '$email', jk = '$jk',  alamat = '$alamat', rt_rw = '$rt_rw', kelurahan = '$kel', kec = '$kec', kab = '$kab', prov = '$prov' WHERE id = '$id'");
	}
	elseif($val == 'ket'){
		$tahunajaran = $_POST['tahunajaran'];
		$npsn		 = $_POST['npsn'];
		$nbm		 = $_POST['nbm'];
		$bidang		 = $_POST['bidang'];
		$nuptk		 = $_POST['nuptk'];
		$nip		 = $_POST['nip'];
		$pangkat	 = $_POST['pangkat_golruang'];
		$tgl_pengangkatan = $_POST['tgl_pengangkatan'];
		$sertifikasi_guru = $_POST['sertifikasi_guru'];
		$tmt_sertifikasi  = $_POST['tmt_sertifikasi'];
		$sts_pegawai = $_POST['sts_pegawai'];
		$organisasi  = $_POST['organisasi'];
		$pendidikan	 = $_POST['pendidikan'];
		$jurusan	 = $_POST['jurusan'];
		$univ		 = $_POST['univ'];
		$thn_lulus	 = $_POST['thn_lulus'];
		
		$query = mysqli_query($conn, "UPDATE data_guru SET npsn = '$npsn', tahun_ajaran = '$tahunajaran', nbm = '$nbm' , bidang = '$bidang', nuptk =  '$nuptk', nip = '$nip', pangkat_golruang = '$pangkat', tgl_pengangkatan = '$tgl_pengangkatan', sertifikasi_guru = '$sertifikasi_guru', tmt_sertifikasi = '$tmt_sertifikasi', sts_pegawai = '$sts_pegawai', organisasi = '$organisasi', pendidikan = '$pendidikan', jurusan = '$jurusan', univ = '$univ', thn_lulus = '$thn_lulus' WHERE id = '$id'");
		
	}
	elseif($val == 'hapus'){
		$query = mysqli_query($conn, "DELETE FROM data_guru WHERE id = '$id'");
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

