<?php 

$page = '';
$filen = '';
$files = '';
$level = '';


if(isset($_GET['page'])){
	$page = $_GET['page'];
	$level = $_GET['level'];
}

if($page == 'pages/logout.php'){
	$files = "$page";
	$filen = "$page";
}

if($_SESSION['level'] == 1 || $level == 1){
	$files = "$page";
}
else if($_SESSION['level'] == 0 || $level == 0){
	$filen = "$page";
}



if(!file_exists($filen) && !file_exists($files) || empty($page)){
	if($_SESSION['level'] == 1 || $level == 1){
		include "home.php";
	}
	else if($_SESSION['level'] == 0 || $level == 0){
		include "home-s.php";
}
}
else if ($_SESSION['level'] == 0) {
	include "$filen";
}
else if($_SESSION['level'] == 1){
	include "$files";
}

?>