<?php session_start();
include 'connection.php';

$flag=$_SESSION['flag'];

if($flag==0){
	echo "<script>alert('you have a notification');</script>"; 	
	header("location:check_application_page.php");
	exit();
}

?>