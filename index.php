<?php

session_start();

$message="";

if(count($_POST)>0) {

require_once 'dbconn.php';

$sql = "SELECT * FROM login WHERE username='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

if(is_array($row)) {

$_SESSION["id"] = $row[user_id];

$_SESSION["name"] = $row[username];

} else {

$message = "Invalid Username or Password!";

}

}

if(isset($_SESSION["id"])) {

header("Location:dashboard.php");

}

?>
<html>
<head>
<title>INFOROADS LOGIN</title>
<style>
#frmLogin { 
	padding: 100px 100px;
	background: #B6E0FF;
	color: #555;
	display: inline-block;
	border-radius: 4px; 
}
.field-group { 
	margin:15px 0px; 
}
.input-field {
	padding: 15px;width: 300px;
	border: #A3C3E7 1px solid;
	border-radius: 4px; 
}
.form-submit-button {
	background: #65C370;
	border: 0;
	padding: 10px 30px;
	border-radius: 4px;
	color: #FFF;
	text-transform: uppercase;
	cursor: pointer; 
}
.member-dashboard {
	padding: 40px;
	background: #D2EDD5;
	color: #555;
	border-radius: 4px;
	display: inline-block;
	text-align:center; 
}
.logout-button {
	color: #09F;
	text-decoration: none;
	background: none;
	border: none;
	padding: 0px;
	cursor: pointer;
}
.error-message {
	text-align:center;
	color:#FF0000;
}
.demo-content label{
	width:auto;
}
.banner{
	text-align: center;

	padding: 120px 50px 50px 50px;
}
.header{
	text-align: center;
    width: 100%;
}



.lab{
font-size: 24px;
font-weight: 500;
}
</style>
</head>
<body>

<div class="col-md-6 header">
	
</div>

<div class="col-md-6 col-md-offset-3 banner">

<form action="" method="post" id="frmLogin">
	<div class="message"><?php if($message!="") { echo $message; } ?></div>
	<h1>LOGIN</h1>
	<div class="field-group">
		
		<div><input name="user_name" type="text" class="input-field" required placeholder="Username"></div>
	</div>
	<div class="field-group">
		
		<div><input name="password" type="password" class="input-field" required placeholder="Password"> </div>
	</div>


	<div class="field-group">
		<div><input type="submit" name="login" value="Login" class="form-submit-button"></div>
	</div>

</form>


</div>


</body>
    </html>