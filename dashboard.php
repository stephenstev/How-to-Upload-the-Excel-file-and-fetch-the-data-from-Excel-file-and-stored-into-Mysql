<?php

session_start();

?>
<html >
<head>
<title>Inforoads Article Writers Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<?php

if(isset($_SESSION["name"])) {

?>

    <div class="col-md-12 menu">
<span>InfoRoads</span>
    <p>Welcome <?php echo $_SESSION["name"]; ?>  <a href="logout.php" tite="Logout">Logout</a></p>
</div>
<div class="col-md-8 col-md-offset-2">
<!-- Form used to add new entries of employee in database -->
<form class="form-horizontal alert alert-warning" name="" id="" method="post" action="upload.php" enctype="multipart/form-data">

	<h3 class="text-center">Insert Inforoads Writers Details </h3>
	<div class="form-group">
		<label for="Name">Insert File:</label>
		<input type="file" name="file" id="file" class="form-control" placeholder="Upload File like csv,xslx,xsl"  autofocus required />
	</div>
	
	
	
	<div class="form-group">
		<button class="btn btn-warning" name="submit">Add Employee</button>
	</div>
</form>
</div>

<div class="col-md-8 col-md-offset-2">
<!-- Form used to add new entries of employee in database -->
<form class="form-horizontal alert alert-warning" name="empList" id="empForm" method="post" action="insert.php">
	<div class="form-group">
		<label for="Name">Employee Name:</label>
		<input type="text" name="emp_name" class="form-control" placeholder="Enter Employee Name"  autofocus required />
	</div>
	
	<div class="form-group">
		<label for="Email">Email Address:</label>
		<input type="email" name="emp_email" class="form-control" placeholder="Enter Employee Email Address" " autofocus required />
	</div>
		
    
    <div class="form-group">
        <label for="Address">Article Title:</label>
		<input type="text" name="emp_title" class="form-control" placeholder="Enter Artilce Titles"  autofocus required />
    </div>
	
	<div class="form-group">
		<label for="Address">Amount:</label>
		<input type="text" name="emp_address" class="form-control" placeholder="Enter Employee Amount"  autofocus required />		
	</div>
	
	<div class="form-group">
		<button class="btn btn-warning" name="act">Add Employee</button>
	</div>
</form>
</div>
<div class="col-md-8 col-md-offset-2">
	
<table class="data-table">
		<caption class="title">Employee Details</caption>
		<thead>
			<tr>
				
				<th>Emp Name</th>
				<th>Email</th>
				<th>Article Title</th>
				<th>Amount</th>
				
				<th>Delete user</th>
			</tr>
		</thead>
		<tbody>
<?php

require_once 'select.php';
	
		while ($row = mysqli_fetch_array($query))
		{
			
			echo '<tr>
					
					<td>'.$row['emp_name'].'</td>
					<td>'.$row['emp_email'].'</td>
					<td style="word-break: break-all;">'.$row['emp_title']. '</td>
					<td>'.$row['emp_address'].'</td>
					
					<td><a href="delete.php?id='.$row['emp_id'].'">Delete</a></td>


				</tr>';
			
		}
		?>

		
		
</tbody>
		<tfoot>
			<tr>
				<td>
					<form class="" name="" id="" method="post" action="mail.php">
					<div class="form-group">
		             <button class="btn btn-warning" name="send">Send Mail</button>
	               </div>
	           </form>
				</td>
				<td>
					<form class="" name="" id="" method="post" action="deleteall.php">
					<div class="form-group">
		             <button class="btn btn-warning" name="del">Delete All</button>
	               </div>
	           </form>
				</td>
				<td>
					<?php if($message="true"){ ?>
					<div class="form-group">
		             <span>
		             	<?php echo "EMAIL SEND SUCCESSFLLY!";
		             } 
		             else 
		             { 
		             	echo "PROCESS";
		             } 
		             ?>
		             	
		             </span>
	               </div>
	           
				</td>
				
			</tr>
		</tfoot>
	</table>

</div>
<?php

}else 

{

    header("Location:index.php");

}

?>
</body>
</html>