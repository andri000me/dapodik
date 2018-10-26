<?php 
	include "koneksi.php";
	session_start();

	$username = $_POST['username'];
	$password = md5($_POST['password']);


	$admin = mysqli_query($conn, "SELECT * FROM user WHERE password = '$password' AND username = '$username'");
	$tot = mysqli_num_rows($admin);

	$name = mysqli_fetch_array($admin);

	if($tot>0){
		
		$_SESSION['id']	   = $name['id'];
		$_SESSION['username'] = $name['username'];
		$_SESSION['npsn'] = $name['npsn'];
		$_SESSION['uname'] = $name['Nama'];
		$_SESSION['psswd'] = $password;
		$_SESSION['level'] = $name['level'];


		echo "<script>
		location.href='admin/index.php'</script>";
	}
	else{
		echo
		"<script>alert('Maaf, username atau Password yang anda masukkan salah')
		location.href='login.php';
		</script>";
	}
?>