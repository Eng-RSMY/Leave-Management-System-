
<?php
//echo "<script>alert('success!');</script>"; 
 session_start();
include 'connection.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
		$eid=$_POST['eid'];
		$sid=$_POST['sid'];
		$name=$_POST['name'];
		$edes=$_POST['add'];
		$ls=$_POST['ls'];
		$f_da=$_POST['fd'];
		$td=$_POST['td'];
		//$a=$_POST['a'];
		
		
		$empid=$_SESSION['empid'] ;
		$esid=$_SESSION['esid'];
		if($eid==$empid && $sid==$esid){
		$sql = "SELECT * FROM eaf ";
		if($result = mysqli_query($conn, $sql)){
			$row = mysqli_fetch_array($result);
			
					$_SESSION['empid']=$eid;
					$_SESSION['eseid']=$sid;
					$_SESSION['name']=$name;
					$_SESSION['edes']=$edes;
					$_SESSION['ls']=$ls;
					$_SESSION['fd']=$f_da;
					$_SESSION['td']=$td;
		//			$_SESSION['a']=$a;
		
			
			$q=$_POST['fd'];
			$p=$_POST['td'];
			$_SESSION['total']=$row['total'];
			$date1=date_create("$q");
			$date2=date_create("$p");
			$diff=date_diff($date1,$date2);
			$a=$diff->format("%a");
			
			if($row['e_id']==$eid){	
			
			
				if($a>$row['rem']){

					echo "<script>alert('canot apply for leave!');</script>"; 
					 
				}
				
				else if($a<=$row['rem']&&$row['flag']==2){
					$cd=$row['rem'];
					$b=$cd-$a;
					$sq="UPDATE eaf SET reqday='$a' WHERE e_id='$eid'";
					
					if(mysqli_query($conn,$sq)){
						$j="UPDATE eaf SET rem='$b' WHERE e_id='$eid'";
						if(mysqli_query($conn,$j)){
						
						$m="UPDATE eaf SET fdate='$f_da' WHERE e_id='$eid'";
							if(mysqli_query($conn,$m)){
								$n="UPDATE eaf SET todate='$td' WHERE e_id='$eid'";
								if(mysqli_query($conn,$n)){
									$f=1;
									$o="UPDATE eaf SET flag='$f' WHERE e_id='$eid'";
									if(mysqli_query($conn,$o)){
									$flag=0;
									$_SESSION['flag']=$flag;
									$_SESSION['reqday']=$a;
									$_SESSION['rem']=$b;
									//$_SESSION['fd']=$row['f_da'];
									//$_SESSION['td']=$row['td'];
									header("location:Statu_check.php");
									
									}
								}
								
							}	
						}
						
					}
				}
				
				else if($a<=$row['rem']&&$row['flag']==1){
					$flag=2;
					$_SESSION['flag']=$flag;
					header("location:Statu_check.php");
					
					}
					
					
			}
			
		
			else{
				$p=5;
				
				if($a<=$p ){
					
				$s="INSERT INTO eaf(e_id,s_id,name,des,l_s,fdate,todate)
				VALUES('$eid','$sid','$name','$edes','$ls','$f_da','$td')";

					if(mysqli_query($conn,$s)){
						$cd=$p;
						$b=$cd-$a;
						//echo $b;
						
						
					$sq="UPDATE eaf SET reqday='$a' WHERE e_id='$eid'";
					
						if(mysqli_query($conn,$sq)){
							$j="UPDATE eaf SET rem='$b' WHERE e_id='$eid'";
							if(mysqli_query($conn,$j)){
								$flag=0;
								$_SESSION['flag']=$flag;
								$_SESSION['reqday']=$a;
								$_SESSION['rem']=$b;	
								
					//echo "<script>alert('canot apply for leave!');</script>"; 
								header("location:s.php");
							//	header("location:Statu_check.php");
							}	
						}
					}
				}
				
				else{
					
					echo "<script>alert('canot apply for leave!');</script>"; 
					}
				}
			}
			}

else{
	echo "<script>alert('entered wrong employee or security ID!');</script>"; 
}		
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Lab task</title>
<link rel="stylesheet" type="text/css" href="css/reg.css">
</head>
<body>
<div class='reg'>

	<fieldset style="width:15%">
 		<legend> <h3>Application Form</h3> </legend>
		<form  method="POST" action="">
			Employee Id<br>
			<input type="text" name="eid" required> 
			
			Security Id<br>
			<input type="text" name="sid" required> 
			
			Name <br>
            <input type="text" name="name" required>           
			
			Designation <br>
			<input type="text" name="add" required >
						
			<br>
			Leave Status<br>
			<select for="text" name="ls" required>
				<option value="fullday">fullday</option>
				<option value="halfday">halfday</option>
			</select> 
			<br>
		
			From Date<br>
			<input type="date" name="fd" />
			
			<br>
			
			To Date<br>
			<input type="date" name="td"/>
			<br>
			
			<br>
			<hr>
			<input type="submit" name="Register" value="ok"> <br><hr>
			
		</form>
	</fieldset>
	<div class="status">
		<a href="check_emp_status.php" target="main">
		<img src="image/5.png" alt="image not found" width="25%" height="25%"target="main"> 
		<input type="button" name="Status Check" value="Status Check" target="main">
	</div>
	<div class="ok">
		<a href="Logout.php" target="ma">
		<input type="button" name="Log Out" value="Log Out" target="ma">
	</div>
</div>
</body>
</html>