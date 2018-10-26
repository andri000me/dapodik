<?php 
	//$conn = mysqli_connect("localhost", "root", "", "dapodik");
	include '../../koneksi.php';

	$npsn 	  = $_POST['npsn'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$name	  = $_POST['nama'];
	$level	  = 0;

	$check 	  = mysqli_num_rows(mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' "));
	$checkn   = mysqli_num_rows(mysqli_query($conn, "SELECT npsn FROM profil WHERE npsn = $npsn"));

	if ($check == 0){ 
		if($checkn == 0){
			$inp = mysqli_query($conn, "INSERT into user(npsn,username, password, Nama, level) VALUES ('$npsn' ,'$username', '$password', '$name', '$level')");
			$skl = mysqli_query($conn, "INSERT into profil(npsn, nama_sekolah) VALUES ('$npsn' ,'$name')");
		}
		elseif($checkn > 0){
			$inp = mysqli_query($conn, "INSERT into user(npsn,username, password, Nama, level) VALUES ('$npsn' ,'$username', '$password', '$name', '$level')");
		}
		
	}
	else if($check > 0){
		echo "
		<script>
			alert('Maaf, username yang anda masukkan sudah ada')
			window.history.back();
		</script>
		";
	}

?>
<script type="text/javascript">
	window.history.back();
</script>