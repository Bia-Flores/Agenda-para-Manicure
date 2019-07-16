<?php
	include_once '../class/ClassConexaoAdmin.php';
	
	//if (!isset($_SESSION['loginADM'])){
	if (!isset($_SESSION['loginADM'])){
		header("location:login.php");
	}

?>
