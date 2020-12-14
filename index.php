<?php
	define('HOMEDIR',__DIR__);
	//include dirname(__file__,2)."./config/Conexion.php";
	//include "./config/Conexion.php";
	
	include 'views/header.php';
	$page   =isset($_GET['page'])?$_GET['page']:'login';
	$folder =isset($_GET['folder'])?$_GET['folder']:'login';;
	if(isset($_POST['btnSearch'])){
		$search     =true;
		$dataSearch =$_POST['dataSearch'];
	}
	include 'views/'.$folder.'/'.$page.'.php';
	include 'views/footer.php';
?>