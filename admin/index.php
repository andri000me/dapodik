<?php
//this will be index.php

if(!isset($_SESSION)){
	session_start();
}

if(isset($_SESSION['id'])){
	if($_SESSION['level'] == 1){
		include "header.php";
	}
	else if($_SESSION['level'] == 0){
		include "header-s.php";
	}
}
else{
?>

<script type="text/javascript">
	document.location.href = "../login.php"
</script>

<?php 
}
?>