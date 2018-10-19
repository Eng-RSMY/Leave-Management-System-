<?php
session_start();

include 'connection.php';
$eid=$_GET["e_id"];
$fd=$_SESSION['fd'];
$td=$_SESSION['td'];
$name=$_SESSION['name'];
$req=$_SESSION['reqday'];
$rem=$_SESSION['rem'];


$sql = "UPDATE eaf SET reqday='$req' WHERE e_id='$eid'";
if(mysqli_query($conn,$sql)){
	$s="UPDATE eaf SET rem='$rem' WHERE e_id='$eid'";
	if(mysqli_query($conn,$s)){
		$m="UPDATE eaf SET fdate='$fd' WHERE e_id='$eid'";
		if(mysqli_query($conn,$m)){
			$n="UPDATE eaf SET todate='$td' WHERE e_id='$eid'";
				if(mysqli_query($conn,$n)){
					$flag=3;
					$f=2;
					$_SESSION['flag']=$flag;
					$_SESSION['f']=$f;
					$x="UPDATE eaf SET flag='$f' WHERE e_id='$eid'";
					if(mysqli_query($conn,$x)){
						
						header("location:Statu_check.php");
					}
				}					
		}
	}
}
	
?>