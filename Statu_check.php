<?php
session_start();
include 'connection.php';
//echo "<script>alert('Success');</script>";
$flag=$_SESSION['flag'];

$eid=$_SESSION['empid'];
if($flag==0){
	$_SESSION['nf']=$flag;
	$f0='wait for admin approval';
	$s0="UPDATE eaf SET status='$f0' WHERE e_id='$eid'";
				if(mysqli_query($conn,$s0)){
					echo"wait for admin approval!";
				}
					
}
else if($flag==1){
	
	$f1='Admin rejected your application for leave';
	$s1="UPDATE eaf SET status='$f1' WHERE e_id='$eid'";
				if(mysqli_query($conn,$s1)){
					echo"Admin rejected your application for leave!";
				}
	
}
else if($flag==2){
	//$eid=$_SESSION['empid'];
	$f2='your previous application for leave is pending!';
	$s2="UPDATE eaf SET status='$f2' WHERE e_id='$eid'";
				if(mysqli_query($conn,$s2)){
					echo"your previous application for leave is pending!wait until it is accepted";
				}
}

else if($flag==3){
	echo "<script>alert('your application for leave is accepted!');</script>"; 	
	
	$f3='your application for leave is accepted!';
	$s3="UPDATE eaf SET status='$f3' WHERE e_id='$eid'";
				if(mysqli_query($conn,$s3)){
					echo "your application for leave is accepted!";
				}
}
?>
