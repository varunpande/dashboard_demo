<?php
if(isset($_REQUEST['enable']) && isset($_REQUEST['msgid']))
{
try{
//checking inputs of request variables
if(filter_var($_REQUEST['enable'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/(false|true|delete)/"))))
{
$enable=$_REQUEST['enable'];
}
else
{
throw new Exception("Error in message enablement");
}
if(filter_var($_REQUEST['msgid'], FILTER_VALIDATE_INT))
{
$msgid=$_REQUEST['msgid'];
}
else
{
throw new Exception("Error in message enablement");
}

$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($enable!='delete')
{
   $sqlu ="UPDATE Class_Msg SET Enable='".$enable."' WHERE Msg_Id=".$msgid;
   if ($conn->query($sqlu) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }
}//end of update if
else if($enable==delete)
{
$sqld ="DELETE FROM Class_Msg WHERE Msg_Id=".$msgid;
if ($conn->query($sqld) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $conn->error;
    }
}//end of update else if
else
{
echo "error in operation";
}
}//end try
catch(Exception $e)
{
echo "Error in message enablement";
}//end catch
}//end isset if
else
{
echo "Error in message enablement";
}
?>