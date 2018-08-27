<?php 
require_once 'dbconn.php';

$query = "DELETE FROM emp_details";
mysqli_query($conn, $query);
header("Location: dashboard.php"); 
?>