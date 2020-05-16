<?php
error_reporting(E_ERROR);
if(isset($_REQUEST["uname"]))
{
$cookie_name = "user";
$Encrypt = $_REQUEST["uname"];

$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqls = "SELECT Tkn FROM Class_Index WHERE Uname=".$Encrypt;

$result = $conn->query($sqls);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $secretKey=$row["Tkn"];
    }
}


$encrypted = openssl_encrypt($Encrypt,'AES-128-CBC',$secretKey,OPENSSL_RAW_DATA,$secretKey);
    

setcookie($cookie_name,$encrypted,time() + 3600, "/");

header('Location: https://www.classesdunia.com/admin/pages/index.php');
exit();
}
?>