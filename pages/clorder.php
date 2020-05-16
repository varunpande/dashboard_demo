<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Orders</title>

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

<noscript>
<meta http-equiv="refresh" content="0; url=https://www.classesdunia.com/admin/pages/nscript.html" />
</noscript>

<script>
function enable(obj)
{
var xmlhttp = new XMLHttpRequest();
var data="admit="+obj.getAttribute("name");        
xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
               window.location.reload(true);
            } 
        };
        xmlhttp.open("POST","../php/ordersubmit.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
}
</script>
</head>

<body>

    <div id="wrapper">

     <?php require 'nav.php'; ?> 

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                

<div class="row" style="margin-top:6px;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of students eligible for admission
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Admit</th>
                                            <th>Name</th>
                                            <th>Coupon code</th>
                                            <th>Phone No.</th>
                                        </tr>
                                    </thead>
                                    <tbody>

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

$sqls = "SELECT Name,Phone,Coupon FROM My_Client WHERE Uname='".$decrypted."'";
$result = $conn->query($sqls); 
 while($row = mysqli_fetch_array($result))
          {
          $inc++;     
          echo '<tr><td><input type="checkbox" id="chk'.$inc.'" name="'.$row['Name'].'_'.$row['Coupon'].'" onclick="enable(this)"/></td><td>'.$row['Name'].'</td><td>'.$row['Coupon'].'</td><td>'.$row['Phone'].'</td></tr>';    
          }
 mysqli_close($conn);
?>

                                    </tbody>
                                </table>
                           </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

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

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>
