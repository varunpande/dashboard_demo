<?php
if(isset($_REQUEST["name"]) && isset($_REQUEST["email"]) && isset($_REQUEST["message"]))
{
try{
$name=filter_var($_REQUEST["name"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
if (filter_var($email, FILTER_VALIDATE_EMAIL))
{
$email=filter_var($_REQUEST["email"], FILTER_SANITIZE_EMAIL);
}
$message=filter_var($_REQUEST["message"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

$msg = "My issue is: ".$message;
    $to = "admin@classesdunia.com";
    $email_subject = "Issue of ".$name;
    $email_body = "Here are the details:\n\nName:".$name."\n\n".$msg;
    $headers = "From: ".$email;	
    mail($to,$email_subject,$email_body,$headers);
echo "done";
}//end try
catch(Exception $e)
{
echo 'Error in admin issue form';
}
}//end if
else
{
echo 'empty msg';
}//end else
?>