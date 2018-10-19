<?php
include 'connection.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $eid=$_POST['eid'];
	$sid=$_POST['sid'];
	//$usertype=$_POST['usertype'];
//echo $email;
//echo $password;
//echo $usertype;

$sql= "SELECT * FROM emp WHERE e_id='$eid' AND s_id='$sid'";
	//mysql_select_db('reg');
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	
	
     if($row['e_id']==$eid && $row['s_id']==$sid )
     {

     	        session_start();
		        $_SESSION['empid'] = $eid;
				$_SESSION['esid'] = $sid;
				
     	        header("location:employee_application_page.php");
     }
     else
     {
       echo "<script>alert('Wrong id ');</script>";
     }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>LOG IN - USer</title>
<link rel="stylesheet" type="text/css" href="css/s.css">
</head>
<body>
<div class="log">

	<fieldset style="width:25%">
	
 		<legend> <h3>LOG IN - Employee</h3> </legend>
		<hr>
		<form method="POST" action="">
		
			Employee Id <br>
			<input type="text" name="eid" required> 
			
            <br>
			Security Id <br>
			<input type="text" name="sid">
			<br>
			
			<input type="checkbox" required/>Remember me
			<hr>
			<input type="submit" name="Log in" value="ok"> 
			
		</form>
		
	</fieldset>
	
</div>
<div class="back">
		<a href="index.php" target="main">
			<input type="submit" name="back" value="Back" target="main"></a>
		</div>
<div class="add">
<a href="new_reg.php" target="win">

			<img src="image/01.png" alt="image not found" width="10%" height="10%"target="win">  <br>
			<input type="submit" name="reg" value="New Register" target="win"></a>
			</a>
</div>
</body>
</html>