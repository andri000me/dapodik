<?php 

	session_start();
	include '../../koneksi.php';

	$npsn		 = $_SESSION['npsn'];
	$tahunajaran = $_POST['tahunajaran'];
	$nbm		 = $_POST['nbm'];
	$nama		 = $_POST['nama'];
	$bidang		 = $_POST['bidang'];
	$nuptk		 = $_POST['nuptk'];
	$nip		 = $_POST['nip'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir	 = $_POST['tgl_lahir'];
	$telepon	 = $_POST['telepon'];
	$email		 = $_POST['email'];
	$pangkat	 = $_POST['pangkat'];
	$tgl_pengangkatan = $_POST['tgl_pengangkatan'];
	$sertifikasi_guru = $_POST['sertifikasi_guru'];
	$tmt_sertifikasi  = $_POST['tmt_sertifikasi'];
	$jk 		 = $_POST['jk'];
	$sts_pegawai = $_POST['sts_pegawai'];
	$organisasi  = $_POST['organisasi'];
	$alamat		 = $_POST['alamat'];
	$rt_rw 		 = $_POST['rt_rw'];
	$kel		 = $_POST['kel'];
	$kec		 = $_POST['kec'];
	$kab		 = $_POST['kab'];
	$prov		 = $_POST['prov'];
	$pendidikan	 = $_POST['pendidikan'];
	$jurusan	 = $_POST['jurusan'];
	$univ		 = $_POST['univ'];
	$thn_lulus	 = $_POST['thn_lulus'];
	$val 		 = $_GET['val'];
	$getnama	 = $_GET['nama'];
	$hapus		 = $_POST['hapus'];

	echo "$npsn";
	echo "$hapus";
	if($val == 'tambah'){
		$query = mysqli_query($conn, "INSERT INTO data_guru(npsn, tahun_ajaran, nbm, nama_guru, bidang, nuptk, nip, tempat_lahir, tgl_lahir, telepon, email, pangkat_golruang, tgl_pengangkatan, sertifikasi_guru, tmt_sertifikasi, jk, sts_pegawai, organisasi, alamat, rt_rw, kelurahan, kec, kab, prov,pendidikan, jurusan, univ, thn_lulus) VALUES ('$npsn','$tahunajaran', '$nbm', '$nama' , '$bidang', '$nuptk', '$nip', '$tempat_lahir', '$tgl_lahir', '$telepon', '$email', '$pangkat', '$tgl_pengangkatan', '$sertifikasi_guru', '$tmt_sertifikasi', '$jk', '$sts_pegawai', '$organisasi', '$alamat', '$rt_rw', '$kel', '$kec', '$kab', '$prov', '$pendidikan', '$jurusan', '$univ', '$thn_lulus')");
	}
	elseif($val == 'edit'){
		$query = mysqli_query($conn, "UPDATE data_guru SET npsn = '$npsn', tahun_ajaran = '$tahunajaran', nbm = '$nbm', nama_guru = '$nama' , bidang = '$bidang', nuptk =  '$nuptk', nip = '$nip', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', telepon = '$telepon', email = '$email', pangkat_golruang = '$pangkat', tgl_pengangkatan = '$tgl_pengangkatan', sertifikasi_guru = '$sertifikasi_guru', tmt_sertifikasi = '$tmt_sertifikasi', jk = '$jk', sts_pegawai = '$sts_pegawai', organisasi = '$organisasi', alamat = '$alamat', rt_rw = '$rt_rw', kelurahan = '$kel', kec = '$kec', kab = '$kab', prov = '$prov', pendidikan = '$pendidikan', jurusan = '$jurusan', univ = '$univ', thn_lulus = '$thn_lulus' WHERE nama_guru = '$getnama'");
	}
	
	if($hapus == 'Hapus'){
		$query = mysqli_query($conn, "DELETE FROM data_guru WHERE nama_guru = '$getnama'");
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

