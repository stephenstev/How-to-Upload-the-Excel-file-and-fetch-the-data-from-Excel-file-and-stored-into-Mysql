<?php
require_once 'dbconn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
$username = $_POST["emp_name"];
$email = $_POST["emp_email"];
$articles = $_POST["emp_title"];
$amount = $_POST["emp_address"];

 


		  if(isset($_POST['act']))
{
$sql = "INSERT INTO emp_details (emp_name, emp_email, emp_title, emp_address)
VALUES ('$username','$email','$articles','$amount')";
}


if ($conn->query($sql) === TRUE) {
   
   echo "";
		
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}
 header("Location:dashboard.php");
?>