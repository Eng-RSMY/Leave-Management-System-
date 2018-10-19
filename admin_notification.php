<?php
session_start();
include 'connection.php';
$flag=$_SESSION['nf'];
 if ($flag==0){
	 header("location:check_application_page.php");
	 
 }
 else{
	 echo "<script>alert('No Notification');</script>"; 
 }
?>