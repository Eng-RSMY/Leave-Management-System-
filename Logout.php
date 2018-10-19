<?php

session_start();
unset($_SESSION['e_id']);
session_destroy();
header("location:login_user.php");
?>