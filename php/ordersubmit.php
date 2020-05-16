<?php
if(isset($_POST['admit']))
{
try{
$admarray=explode("_",$_POST['admit']);
if(filter_var($admarray[0], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z\s]+/"))))
{
$name=$admarray[0];
}
else
{
throw new Exception("order submit error");
}
$coupon=$admarray[1];
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

$sqli ="INSERT INTO Admitted_Student(Uname,Name,Cust_Email,Phone,Order_Id) SELECT Uname,Name,Cust_Email,Phone,Order_Id FROM My_Client WHERE  Coupon='".$coupon."' AND Name ='".$name."'";
   if ($conn->query($sqli) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }

$sqls="SELECT Uname FROM My_Client WHERE  Coupon='".$coupon."' AND Name ='".$name."'";
$result = $conn->query($sqls);
$row = $result->fetch_assoc();
$Clname=$row['Uname'];

$curmonth=getdate(date("U"));
$sqls = "SELECT ".$curmonth[month]." from Admitted_Analysis WHERE Uname='".$Clname."'";
$result = $conn->query($sqls);
$row = $result->fetch_assoc();
$adm=intval($row[$curmonth[month]]);
$adm++;//increment admitted student by one

$sqlu ="UPDATE Admitted_Analysis SET ".$curmonth[month]."= ".$adm." WHERE Uname='".$Clname."'";
   if ($conn->query($sqlu) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }

$sqld ="DELETE FROM My_Client WHERE  Coupon='".$coupon."' AND Name ='".$name."'";

if ($conn->query($sqld) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
}//end try
catch(Exception $e)
{
echo "order submit error";
}//end catch
}//end isset if
else
{
echo "order submit error";
}
?>