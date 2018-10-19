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
				echo "<th>Security ID</th>";
				echo "<th>Employee name</th>";
                echo "<th>Designation</th>";
				echo "<th>From Date</th>";
                echo "<th>To Date</th>";
				echo "<th>leave Status</th>";
				echo "<th>Total days</th>";
				echo "<th>Requested day</th>";
				echo "<th>Remaining day</th>";
				echo "<th>Status</th>";
				
            echo "</tr>";
			
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['e_id'] . "</td>";
				echo "<td>" . $row['s_id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['des'] . "</td>";
				echo "<td>" . $row['fdate'] . "</td>";
				echo "<td>" . $row['todate'] . "</td>";
                echo "<td>" . $row['l_s'] . "</td>";
				echo "<td>" . $row['total'] . "</td>";
				echo "<td>" . $row['reqday'] . "</td>";
				echo "<td>" . $row['rem'] . "</td>";
				echo "<td>" . $row['Status'] . "</td>";
				//echo "<td>" . $row['status'] . "</td>";
	         echo "</tr>";
				
        }
		
		echo "</table>";
		
		
        // Free result set. mysqli_free_result() function frees the memory associated with the result.
        mysqli_free_result($result);
		
		
    } else{
        echo "No status.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

 ?>
</div>