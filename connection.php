<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '10309412xsl';
$dbname = 'lms';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

 
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>