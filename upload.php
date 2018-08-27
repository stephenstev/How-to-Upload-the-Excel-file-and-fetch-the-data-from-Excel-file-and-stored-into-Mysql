<?php

require_once 'dbconn.php';

require_once('assets/lib/php-excel-reader/excel_reader2.php');
require_once('assets/lib/SpreadsheetReader.php');

if (isset($_POST["submit"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $username = "";
                if(isset($Row[0])) {
                    $username = mysqli_real_escape_string($conn,$Row[0]);
                }
                
                $email = "";
                if(isset($Row[1])) {
                    $email = mysqli_real_escape_string($conn,$Row[1]);
                }
                
                $articles = "";
                if(isset($Row[2])) {
                    $articles = mysqli_real_escape_string($conn,$Row[2]);
                }
                
                $amount = "";
                if(isset($Row[3])) {
                    $amount = mysqli_real_escape_string($conn,$Row[3]);
                }

                if (!empty($username) || !empty($email) || !empty($articles) || !empty($amount)) {
                    $query = "INSERT INTO emp_details (emp_name, emp_email, emp_title, emp_address)
VALUES ('$username','$email','$articles','$amount')";
                    $result = mysqli_query($conn, $query);
                
                    if (! empty($result)) {
                        $type = "success";
                        $message = "Excel Data Imported into the Database";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}

header("Location: dashboard.php"); 
?>