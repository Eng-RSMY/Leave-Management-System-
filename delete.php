<?php
session_start();

include 'connection.php';
$eid=$_GET["e_id"];
$fd=$_SESSION['fd'];
$td=$_SESSION['td'];
$name=$_SESSION['name'];
$req=$_SESSION['reqday'];
$rem=$_SESSION['rem'];

$sql= "SELECT * FROM eaf WHERE e_id='$eid'";
	//mysql_select_db('reg');
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	if($row['flag']==2){

		$sql = "delete FROM eaf where e_id=$eid";
		if($r=mysqli_query($conn, $sql)){
			$flag=1;
			$f=2;
			$_SESSION['flag']=$flag;
			$_SESSION['f']=$f;
			$x="UPDATE eaf SET flag='$f' WHERE e_id='$eid'";
			if(mysqli_query($conn,$x)){
				
				header("location:Statu_check.php");
			}
		}
	}
	
	else{
			$fda=$_SESSION['fa'];
			$t_d=$_SESSION['t'];	
			$a=$_SESSION['req'];
			$b=$_SESSION['r'];
			
	
		$sql = "UPDATE eaf SET reqday='$a' WHERE e_id='$eid'";
		if(mysqli_query($conn,$sql)){
			$s="UPDATE eaf SET rem='$b' WHERE e_id='$eid'";
			if(mysqli_query($conn,$s)){
				$m="UPDATE eaf SET fdate='$fda' WHERE e_id='$eid'";
				if(mysqli_query($conn,$m)){
					$n="UPDATE eaf SET todate='$t_d' WHERE e_id='$eid'";
					if(mysqli_query($conn,$n)){
						$flag=1;
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
	}
	
	
?>