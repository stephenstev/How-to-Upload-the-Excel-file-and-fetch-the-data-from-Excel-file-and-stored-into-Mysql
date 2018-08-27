<?php
require_once 'dbconn.php';

$sql = "SELECT * from emp_details ORDER BY emp_id ASC";

		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>