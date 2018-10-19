<?php
include 'connection.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $email=$_POST['email'];
	$pw=$_POST['password'];
	$name=$_POST['name'];
	//$usertype=$_POST['usertype'];
//echo $email;
//echo $password;
//echo $usertype;

$sql= "SELECT * FROM admin WHERE email='$email'";
	//mysql_select_db('reg');
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	
	
     if($row['email']==$email && $row['password']==$pw )
     {
     	        header("location:admin_notification.php");
     }
     else
     {
       echo "<script>alert('Wrong email or password ');</script>";
     }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>LOG IN - Admin</title>
<link rel="stylesheet" type="text/css" href="css/s.css">
</head>
<body>

<div class="log">
	<fieldset style="width:8%">
 		<legend> <h3>LOG IN - Admin</h3> </legend>
		<hr>
		<form method="POST" action="">
		
			Email <br>
			<input type="text" name="email" required> 
			
            <br>
			Password <br>
			<input type="password" name="password">
			<br>
			<input type="checkbox" required/>Remember me
			<hr>
			<input type="submit" name="Log in" value="Log in"> 
			
		</form>
		
	</fieldset>
	<div class="ba">
		<a href="index.php" target="main">
			<input type="submit" name="back" value="Back" target="main"></a>
		</div>
</div>
</body>
</html>