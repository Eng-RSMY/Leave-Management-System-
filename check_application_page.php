<link rel="stylesheet" type="text/css" href="css/reg.css">
<div style="background-color:pink">
<?php

	session_start();
	//$b=$_SESSION['s'];
	
	include 'connection.php';
// Attempt select query execution
$sql = "SELECT * FROM eaf";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border='1'>";
            echo "<tr>";
                
                echo "<th>Employee ID</th>";
				echo "<th>Employee name</th>";
                echo "<th>Designation</th>";
				echo "<th>From Date</th>";
                echo "<th>To Date</th>";
				echo "<th>leave Status</th>";
				echo "<th>Total days</th>";
				echo "<th>Requested day</th>";
				echo "<th>Remaining day</th>";
				echo "<th>Request-Accept</th>";
				echo "<th>Request-Reject</th>";
				
            echo "</tr>";
			
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['e_id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['des'] . "</td>";
				echo "<td>" . $row['fdate'] . "</td>";
				echo "<td>" . $row['todate'] . "</td>";
                echo "<td>" . $row['l_s'] . "</td>";
				echo "<td>" . $row['total'] . "</td>";
				echo "<td>" . $row['reqday'] . "</td>";
				echo "<td>" . $row['rem'] . "</td>";
				echo "<td>"; ?> <a href="app_accept.php?e_id=<?php echo $row["e_id"]; ?>">Accept</a> <?php echo "</td>";
				echo "<td>"; ?> <a href="delete.php?e_id=<?php echo $row["e_id"]; ?>">Reject</a> <?php echo "</td>";
            echo "</tr>";
				echo "</tr>";
        }
		
		echo "</table>";
		
		
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
        mysqli_free_result($result);
		
		
    } else{
        echo "No Request.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

 ?>
 <div class="ok1">
		<a href="Logout.php" target="ma">
		<input type="button" name="Log Out" value="Log Out" target="ma">
	</div>
</div>