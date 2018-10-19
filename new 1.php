echo "<script>alert('success!');</script>"; 	
<?php session_start();
include 'connection.php';
		
				$eid=$_SESSION['empid'];
				$sid=$_SESSION['eseid'];
				$name=$_SESSION['name'];
				$ls=$_SESSION['ls'];
				$f_da=$_SESSION['fd'];
				$td=$_SESSION['td'];
				$c=$_SESSION['a'];
				$a=$_SESSION['reqday'];
				$b=$_SESSION['rem'];	
		
		
			$s1="INSERT INTO es(e_id,s_id,name,l_s,f_da,td,reqday,rem,app_no)
						VALUES('$eid','$sid','$name','$ls','$f_da','$td','$a','$b', '$c')";
						
						if(mysqli_query($conn,$s1)){
							$row = mysqli_fetch_array($result);
							$s="select * from es order by id asc"; 
							if(mysqli_query($conn,$s)){
								$id=$row['id']-1;
								$sp="select * from es"; 
								if(mysqli_query($conn,$sp)){
							$_SESSION['fa']=$f_da;
							$_SESSION['t']=$td;
							$_SESSION['req']=$a;
							$_SESSION['r']=$b;
	echo
							/*include 'Statu_check.php';
							header("location:employee_application_page.php");
							exit();*/
							
						}
						}}
						
			

?>


