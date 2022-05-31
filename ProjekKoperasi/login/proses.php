<?php
session_start();

include "config/config.php";
// Dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$queryadmin=mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
	$queryuser=mysqli_query($conn,"SELECT * FROM user where username='$username'AND password='$password'");
	$jumlahadmin=mysqli_num_rows($queryadmin);
	$validateadmin=mysqli_fetch_array($queryadmin);
	$jumlahuser=mysqli_num_rows($queryuser);
	$validateuser=mysqli_fetch_array($queryuser);

	if($validateadmin > 0){
		$_SESSION["admin"] = $row['ID_ADMIN'];
		$idlog = $_SESSION["admin"];
		header("location:../admin/tampilan/index.php");
		
	}
	else if($validateuser > 0) {
		
		$_SESSION["user"] = $row['ID_USER'];
		$iduserlog = $_SESSION["user"];
		header("location:../user/tampilan/index.php");
		
	}else{
		$_SESSION["login_failed"] = "Username dan Password yang anda masukan salah";

		header("location:index.php");
	}
}
