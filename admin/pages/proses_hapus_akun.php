<?php 
	include '../../koneksi.php';

	$id = $_GET['id'];

	$inp = mysqli_query($conn, "DELETE FROM user WHERE id = '$id'");

?>
<script type="text/javascript">
	window.history.back();
</script>