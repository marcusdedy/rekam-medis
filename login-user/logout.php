<?php
	session_start();
		unset($_SESSION['mu_username']);
		unset($_SESSION['mu_name']);
	session_destroy();
	header("Location:../index.php");
?>