<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$errors = array();
	
		$eid=$_POST['eid'];
		$sid=$_POST['sid'];
		$name=$_POST['name'];
		$des=$_POST['add'];
				
        //start validation
		if(empty($_POST['eid']))
        {
            $errors['eid'] = "Employee Id field cannot be empty";
        } 
		
		if(empty($_POST['sid']))
        {
            $errors['sid'] = "Security Id field cannot be empty";
        } 
		
		
		if(empty($_POST['name']))
        {
            $errors['name'] = "name field cannot be empty";
        }   
        
		if(empty($_POST['add']))
        {
            $errors['add'] = "address field cannot be empty";
        }	
        //check errors
        if(count($errors) == 0)
        {	
			include 'connection.php';


			$sql = "SELECT * FROM emp where s_id='$sid'";


			if($result = mysqli_query($conn, $sql)){
				$row = mysqli_fetch_array($result);

				if($row['s_id']==$sid){

					 echo "<script>alert('user already exist');</script>"; 
					 //header("Location:login_user.php");
					 //exit();
				}
				 else{
					 session_start();
					$_SESSION['eid']=$eid;
					$_SESSION['sid']=$sid;
				//	$_SESSION['name']$name;
					$_SESSION['des']=$des;
		
				$sql="INSERT INTO emp(e_id,s_id,ename,designation)
				VALUES('$eid','$sid','$name','$des')";

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
			Employee Id<br>
			<input type="text" name="eid" value="<?php if(isset($_POST['eid'])) echo $_POST['eid']; ?>"required> 
			<p><?php if(isset($errors['eid'])) echo $errors['eid']; ?></p>   
            
			Security Id<br>
			<input type="text" name="sid" value="<?php if(isset($_POST['sid'])) echo $_POST['sid']; ?>"required> 
			<p><?php if(isset($errors['sid'])) echo $errors['sid']; ?></p>   
            
		
			Name <br>
            <input type="text" name="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" required>
			<p><?php if(isset($errors['name'])) echo $errors['name']; ?></p>
			            
			
			Designation <br>
			<input type="text" name="add" value="<?php if(isset($_POST['add'])) echo $_POST['add']; ?>" required >
			<p><?php if(isset($errors['add'])) echo $errors['add']; ?></p> 
			
			
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