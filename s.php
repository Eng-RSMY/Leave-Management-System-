 	
<?php session_start();
include 'connection.php';
echo "<script>alert('success!');</script>";		
				$eid=$_SESSION['empid'];
				$sid=$_SESSION['eseid'];
				$name=$_SESSION['name'];
				$ls=$_SESSION['ls'];
				$f_da=$_SESSION['fd'];
				$td=$_SESSION['td'];
				$c=$_SESSION['a'];
				$a=$_SESSION['reqday'];
				$b=$_SESSION['rem'];	
		
		
			$s1="INSERT INTO es(e_id,s_id,name,l_s,f_da,td,reqday,rem)
						VALUES('$eid','$sid','$name','$ls','$f_da','$td','$a','$b')";
						
						
						if(mysqli_query($conn,$s1)){
							$row = mysqli_fetch_array($result);
							
							$_SESSION['fa']=$f_da;
							$_SESSION['t']=$td;
							$_SESSION['req']=$a;
							$_SESSION['r']=$b;
							
	
							include 'Statu_check.php';
							header("location:employee_application_page.php");
							exit();
							
						}
						
			

?>


