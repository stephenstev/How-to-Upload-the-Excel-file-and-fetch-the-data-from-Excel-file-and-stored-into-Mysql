<?php
// Connecting to database as mysqli_connect("hostname", "username", "password", "database name");
$conn = mysqli_connect("localhost", "root", "", "employee");
// Create connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>