<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$errors = array();
	
		$email=$_POST['email'];
		$name=$_POST['name'];
		$pw=$_POST['password'];
				
        //start validation
		
		
		
			include 'connection.php';


			$sql = "SELECT * FROM admin where email='$email'";


			if($result = mysqli_query($conn, $sql)){
				$row = mysqli_fetch_array($result);

				if($row['email']==$email){

					 echo "<script>alert('user already exist');</script>"; 
					 //header("Location:login_user.php");
					 //exit();
				}
				 else{
					 session_start();
					
		
				$sql="INSERT INTO admin(name,password,email)
				VALUES('$name','$pw','$email')";

			if(mysqli_query($conn,$sql)){	

            echo "<script>alert('Success');</script>";
            
          }
		 
         else{
          	echo "Error" . mysqli_error($conn);
          }
          mysqli_close($conn);
				 }
			}
			
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
 		<legend> <h3>New Employee Register</h3> </legend>
		<form  method="POST" action="">

			Name <br>
            <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" required>
			<p><?php if(isset($errors['name'])) echo $errors['name']; ?></p>
			            
			Password <br>
			<input type="password" name="password"  required pattern=".{6,}">
			<p><?php if(isset($errors['password1'])) echo $errors['password1']; ?></p>
            <p><?php if(isset($errors['password2'])) echo $errors['password2']; ?></p>
			<p><?php if(isset($errors['password3'])) echo $errors['password3']; ?></p>
			
			
			Email <br>
			<input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
			<p><?php if(isset($errors['email'])) echo $errors['email']; ?></p> 
			
			
			<br>
			<hr>
			<input type="submit" name="Register" value="ok"> <br><hr>
			
		</form>
	</fieldset>
	
	</div>
	<div class="b">
		<a href="login_user.php" target="main">
			<input type="submit" name="back" value="Back" target="main"></a>
		</div>
</body>
</html>