<?php  

	include '../../koneksi.php';

	$npsn		 = $_POST['npsn'];
	$tahunajaran = $_POST['tahunajaran'];
	$nbm		 = $_POST['nbm'];
	$nama		 = $_POST['nama_guru'];
	$bidang		 = $_POST['bidang'];
	$nuptk		 = $_POST['nuptk'];
	$nip		 = $_POST['nip'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tgl_lahir	 = $_POST['tgl_lahir'];
	$telepon	 = $_POST['telepon'];
	$email		 = $_POST['email'];
	$pangkat	 = $_POST['pangkat_golruang'];
	$tgl_pengangkatan = $_POST['tgl_pengangkatan'];
	$sertifikasi_guru = $_POST['sertifikasi_guru'];
	$tmt_sertifikasi  = $_POST['tmt_sertifikasi'];
	$jk 		 = $_POST['jk'];
	$sts_pegawai = $_POST['sts_pegawai'];
	$organisasi  = $_POST['organisasi'];
	$alamat		 = $_POST['alamat'];
	$rt_rw 		 = $_POST['rt_rw'];
	$kel		 = $_POST['kelurahan'];
	$kec		 = $_POST['kec'];
	$kab		 = $_POST['kab'];
	$prov		 = $_POST['prov'];
	$pendidikan	 = $_POST['pendidikan'];
	$jurusan	 = $_POST['jurusan'];
	$univ		 = $_POST['univ'];
	$thn_lulus	 = $_POST['thn_lulus'];


	$query = mysqli_query($conn, "INSERT INTO data_guru(npsn, tahun_ajaran, nbm, nama_guru, bidang, nuptk, nip, tempat_lahir, tgl_lahir, telepon, email, pangkat_golruang, tgl_pengangkatan, sertifikasi_guru, tmt_sertifikasi, jk, sts_pegawai, organisasi, alamat, rt_rw, kelurahan, kec, kab, prov,pendidikan, jurusan, univ, thn_lulus) VALUES ('$npsn','$tahunajaran', '$nbm', '$nama' , '$bidang', '$nuptk', '$nip', '$tempat_lahir', '$tgl_lahir', '$telepon', '$email', '$pangkat', '$tgl_pengangkatan', '$sertifikasi_guru', '$tmt_sertifikasi', '$jk', '$sts_pegawai', '$organisasi', '$alamat', '$rt_rw', '$kel', '$kec', '$kab', '$prov', '$pendidikan', '$jurusan', '$univ', '$thn_lulus')");

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