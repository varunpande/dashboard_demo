<?php
if(isset($_REQUEST["uname"]) && isset($_REQUEST["password"]))
{
try{
if(filter_var($_REQUEST["uname"], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z\s]+/"))))
{
$uname=filter_var($_REQUEST["uname"], FILTER_SANITIZE_MAGIC_QUOTES);
}
else
{
throw new Exception("error in token");
}

if(filter_var($_REQUEST["password"], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z0-9\s]+/"))))
{
$pass=$_REQUEST["password"];
}
else
{
throw new Exception("error in token");
}

$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

for ($i = -1; $i <= 4; $i++) {
    $bytes = openssl_random_pseudo_bytes($i, $cstrong);
    $token   = bin2hex($bytes);
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sqls = sprintf("SELECT Email_Id FROM Class_Index WHERE Uname LIKE '%s' AND Ps_Wd LIKE '%s'",$uname,$pass);
$result = $conn->query($sqls);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $email=$row["Email_Id"];
        
    $sqlu = sprintf("UPDATE Class_Index SET Tkn='%s' WHERE Uname LIKE '%s'",$token,$uname);

    if ($conn->query($sqlu) === FALSE) {
    echo "Error: " . $sqlu . "<br>" . $conn->error;
    }

    $msg = "your login token is :".$token;
    $to = $email;
    $email_subject = "Your login token";
    $email_body = "You have received a new message from class admin panel .\n\n"."Here are the details:\n\nName:".$uname."\n\n".$msg;	
    mail($to,$email_subject,$email_body,"From: admin@classesdunia.com","-odb -f admin@classesdunia.com");
    header("Location: https://www.classesdunia.com/admin/pages/modal.html?uname=$uname");
  
    mysqli_close($conn);
} 
else {
   mysqli_close($conn);
   header("Location: https://www.classesdunia.com/admin/index.html");
}

}//end try
catch(Exception $e)
{
echo "error in token";
}
}//end if
else
{
echo "error in token";
}

?>
