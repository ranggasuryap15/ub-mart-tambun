<?php
if(!isset($_SESSION)){
 	session_start();
}

if(!isset($_SESSION["kasir"])){
	echo "<script> alert('Silakan hubungi admin untuk mengakses halaman ini'); </script>";
	echo '<script> window.location="index.php"; </script>';
} else {
	if($_SESSION["role"]!='kasir') {
		echo "<script> alert('Hanya Kasir yang dapat mengakses halaman ini'); </script>";
		echo '<script> window.location="index.php"; </script>';
	}
}
