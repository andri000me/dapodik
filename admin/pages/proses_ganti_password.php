<?php 
	session_start();
	include '../../koneksi.php';

	$username 	  = $_POST['username'];
	$passwordlama = md5($_POST['passwordlama']);
	$passwordbaru = md5($_POST['passwordbaru']);
	$name	  	  = $_POST['nama'];

	$check  	  = mysqli_num_rows(mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'"));

	if ($passwordlama != $_SESSION['psswd']){
		echo
		"<script>alert('Maaf, password lama anda salah')
		location.href='../?page=pages/akun.php';
		</script>";
	}
	else if($passwordlama == $_SESSION['psswd']){

		if($check == 0){
			$inp = mysqli_query($conn, "UPDATE user SET username = '$username', password = '$passwordbaru', Nama = '$name' WHERE id = '$_SESSION[id]'");

			$admin = mysqli_query($conn, "SELECT * FROM user WHERE password = '$passwordbaru' AND username = '$username'");
			$tot = mysqli_num_rows($admin);

			$name = mysqli_fetch_array($admin);

			$_SESSION['username'] = $name['username'];
			$_SESSION['uname'] = $name['Nama'];
			$_SESSION['psswd'] = $name['password'];
		}
		else if($check >= 1){
			if($username == $_SESSION['username']){
				$inp = mysqli_query($conn, "UPDATE user SET username = '$username', password = '$passwordbaru', Nama = '$name' WHERE id = '$_SESSION[id]'");

				$admin = mysqli_query($conn, "SELECT * FROM user WHERE password = '$passwordbaru' AND username = '$username'");
				$tot = mysqli_num_rows($admin);

				$name = mysqli_fetch_array($admin);

				$_SESSION['username'] = $name['username'];
				$_SESSION['uname'] = $name['Nama'];
				$_SESSION['psswd'] = $name['password'];
			}
			else if($username != $_SESSION['username']){
				echo "
				<script>
					alert('Maaf, username yang anda masukkan sudah ada')
					window.history.back();
				</script>
				";
			}
		}
	}

?>
<script type="text/javascript">
	window.history.back();
</script>