<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Comments</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 <style>
div[class^=slide]{
  width: 80px;
  height: 30px;
  background: #333;
  position: relative;
  float:right;
  margin-top:-5px;
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.2);
  &:after {
    content: '';
    position: absolute;
    top: 14px;
    left: 14px;
    height: 2px;
    width: 52px;
    background: #111;
    border-radius: 50px;
  }
}
label {
    width: 22px;
    height: 22px;
    cursor: pointer;
    position: absolute;
    top: 4px;
    z-index: 1;
    left: 4px;
    background: #ff0936;
    border-radius: 50px;
    transition: all 0.4s ease;
  }
  input[type=checkbox]:checked + label {
      left: 54px;
      background:#2ce40b;
      }
  </style>
<script>
function enable(obj)
{
var xmlhttp = new XMLHttpRequest();
var data="enable=true&msgid="+obj.getAttribute("name");        
xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
               window.location.reload(true);
            } 
        };
        xmlhttp.open("POST","../php/enablemsg.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
}
function disable(obj)
{
var xmlhttp = new XMLHttpRequest();
var data="enable=false&msgid="+obj.getAttribute("name");        
xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
               window.location.reload(true);
            } 
        };
        xmlhttp.open("POST","../php/enablemsg.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);

}
function deleted(mid)
{
var xmlhttp = new XMLHttpRequest();
var data="enable=delete&msgid="+mid;        
xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
               window.location.reload(true);
            } 
        };
        xmlhttp.open("POST","../php/enablemsg.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
}
</script>
<noscript>
    <style type="text/css">
        body{background-color: lightblue;}
        .container {display:none;}
       .noscriptmsg {color: white;text-align: center;font-family: verdana;font-size: 20px;}
    </style>
    <div class="noscriptmsg">
    You don't have javascript enabled.  Please enable it!.
    </div>
</noscript>
</head>

<body>

    <div id="wrapper">

     <?php require 'nav.php'; ?> 

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Comments</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
<div class="row">
<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";
$inc=0;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sqls = "SELECT Msg,Enable,Msg_Id FROM Class_Msg WHERE Uname='".$decrypted."'";
$result = $conn->query($sqls); 
 while($row = mysqli_fetch_array($result))
          {
          $inc++;  
          $status=($row['Enable'] == "true") ? "checked" : "";       
          echo '<div class = "col-lg-4" ><div class="panel panel-primary"><div class="panel-heading">enable/disable comment<div class="slide'.$inc.'"><input type="checkbox" value="None" id="slide'.$inc.'" name="'.$row['Msg_Id'].'" hidden '.$status.' onclick="if(this.checked){enable(this)}else{disable(this)}"/><label for="slide'.$inc.'"></label></div></div><div class="panel-body"><p>'.$row['Msg'].'</p></div><div class="panel-footer" onclick="deleted('.$row['Msg_Id'].')">Delete<span class="glyphicon glyphicon-trash" style="float:right;"></span></div></div></div>';    
          }
 mysqli_close($conn);
?> 
</div><!-- /row-->                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
