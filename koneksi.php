<?php 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbnm = "sekolah2";

	$conn = mysqli_connect ($host, $user, $pass, $dbnm);
	if($conn){
		$buka = mysqli_select_db($conn, $dbnm);
		if(!$buka){
			die("database tidak ditemukan");
		}
	}

	else{
		die("mysql tidak terhubung");
	}
?>