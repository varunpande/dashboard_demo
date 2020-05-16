<?php
if(isset($_REQUEST["uname"]) && isset($_REQUEST["token"]))
{
try{
if(filter_var($_REQUEST["uname"], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z\s]+/"))))
{
$uname=$_REQUEST["uname"];
}
else
{
throw new Exception("error in verify");
}

if(filter_var($_REQUEST["token"], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z0-9\s]+/"))))
{
$tokenrec=$_REQUEST["token"];
}
else
{
throw new Exception("error in verify");
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
$sqls = sprintf("SELECT Tkn FROM Class_Index WHERE Uname LIKE '%s'",$uname);
$result = $conn->query($sqls);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $token=$row["Tkn"];
    }
}
if($tokenrec==null && $token==null)
{
$resp=null;
echo $resp;
}
else if($tokenrec==$token)
{
$resp="https://www.classesdunia.com/admin/pages/cookie.php?uname=".$uname;
echo $resp;
}
else
{
$conn->close();
$resp=null;
echo $resp;
}
}//end try
catch(Exception $e)
{
echo "error in verify";
}
}//end if
else
{
echo "error in verify";
}
?>