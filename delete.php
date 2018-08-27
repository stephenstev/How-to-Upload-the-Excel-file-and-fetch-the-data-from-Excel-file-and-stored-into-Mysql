<?php 
require_once 'dbconn.php';
$id=$_REQUEST['id'];
$query = "DELETE FROM emp_details WHERE emp_id=$id";
mysqli_query($conn, $query);
header("Location: dashboard.php"); 
?>