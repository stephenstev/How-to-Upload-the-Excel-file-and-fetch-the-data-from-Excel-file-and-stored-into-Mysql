<?php
require_once ('assets/lib/mail/class.phpmailer.php');
require_once ('assets/lib/mail/class.smtp.php');
require_once ('assets/lib/mail/PHPMailerAutoload.php');

require_once 'dbconn.php';

$message="";
$sql = "SELECT * from emp_details ORDER BY emp_id ASC";
$query = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($query))
		{
						
					$username = $row['emp_name'];
					$email = $row['emp_email'];
                    $articles = $row['emp_title'];
					$amount = $row['emp_address'];
				
		  if(isset($_POST['send']))



{

	$mail = new PHPMailer();        // create a new object
	$mail->IsSMTP();                // enable SMTP
	$mail->SMTPDebug = 0;           // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;       // authentication enabled
	$mail->SMTPSecure = 'ssl';   // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;  
	$mail->Username = "example@gmail.com";  
	$mail->Password = "password";           
	$mail->SetFrom($email, $username);
	$mail->AddAddress($email);
        $mail->IsHTML(true);
 	$mail->Subject = 'Mail subject'; 

	$body = '<table> Hi '.$username.', <br><br><br>Thanks for writing to us! <br><br><br> We have paid for '.$articles.' articles in '.date('M Y').' and the rest of the articles will be carried forward for next month.<br><br><br>Please raise an invoice for it.<br><br><br>Regards,<br><br><br>hi</table>';


        $mail->MsgHtml($body);
        $mail->Send();

        }
 		
 if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

	 }	
    
	
    $message="true";
     header("Location:dashboard.php"); 

    
	$conn->close();

?>
