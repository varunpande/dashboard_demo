<?php
if(isset($_POST['cid']))
{
try{
if(filter_var($_POST['cid'],FILTER_VALIDATE_INT))
{
$cid=$_POST['cid'];
}
else
{
throw new Exception("view analytics error");
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

$curmonth=getdate(date("U"));
$sqls = "SELECT ".$curmonth[month]." from Analytic_View WHERE CId ='".$cid."'";
$result = $conn->query($sqls);
$row = $result->fetch_assoc();
$view=intval($row[$curmonth[month]]);
$view++;//increment admitted student by one

$sqlu ="UPDATE Analytic_View SET ".$curmonth[month]."= ".$view." WHERE CId='".$cid."'";
   if ($conn->query($sqlu) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }

$conn->close();
}//end try
catch(Exception $e)
{
echo "view analytic error";
}//end catch
}//end isset if
else
{
echo "view analytic error";
}
?>