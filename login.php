<!DOCTYPE HTML>
<html>
	<head>
		<title>Login | Dapo Muhammadiyah</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="login.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
		<!-- Box -->
			<section id="footer">
				<div class="container">

					<header class="major">
						<h2>Sistem Informasi Database Sekolah</b></h2>
						
					</header>
					<h6>Login</h6>
					<form method="post" action="proses_login.php">
					<?php 
						$conn = mysqli_connect("localhost", "root", "", "dapodik");

						if (isset($_POST['submit'])){
							$username = $_POST['username'];
							$password = $_POST['password'];

							if (empty($username) or empty($password)){
								echo "<script>alert('Fields Empty!');
									location.href = 'login.php';
								</sript>";
							}
						}
					 ?>
						<div class="row uniform">
							<div class="12u$ 12u$(xsmall)"><input type="text" name="username" id="username" placeholder="username" /></div>
							<div class="12u$ 12u$(xsmall)"><input type="password" name="password" id="password" placeholder="password" /></div>
							
							<div class="12u$">
								<ul class="actions">
									<li><input type="submit" value="Login" class="special" /></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
				<footer>
					<ul class="copyright">
						<li>&copy; Muhammadiyah</li>
					</ul>
				</footer>
			</section>
	</body>
</html>