<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Analytics</title>

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
    
</head>

<body>

    <div id="wrapper">

<?php  require 'nav.php'; ?>

<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sqls = "SELECT * FROM Analytic_View WHERE Uname='".$decrypted."'";
$result = $conn->query($sqls); 
 while($row = mysqli_fetch_array($result))
          { $view_month=$row['January'].'_'.$row['February'].'_'.$row['March'].'_'.$row['April'].'_'.$row['May'].'_'.$row['June'].'_'.$row['July'].'_'.$row['August'].'_'.$row['September'].'_'.$row['October'].'_'.$row['November'].'_'.$row['December'];    
          }

date_default_timezone_set("Asia/Kolkata");
$curmonth=getdate(date("U"));
$sqls1 = "SELECT * FROM Analytic_View WHERE ".$curmonth[month]."=(SELECT MAX(".$curmonth[month].") FROM Analytic_View)";
$result = $conn->query($sqls1); 
 while($row = mysqli_fetch_array($result))
          { $view_month_top=$row['January'].'_'.$row['February'].'_'.$row['March'].'_'.$row['April'].'_'.$row['May'].'_'.$row['June'].'_'.$row['July'].'_'.$row['August'].'_'.$row['September'].'_'.$row['October'].'_'.$row['November'].'_'.$row['December'];    
          }

$sqls2 = "SELECT * FROM Admitted_Analysis WHERE Uname='".$decrypted."'";
$result = $conn->query($sqls2); 
 while($row = mysqli_fetch_array($result))
          { $adm_month=$row['January'].'_'.$row['February'].'_'.$row['March'].'_'.$row['April'].'_'.$row['May'].'_'.$row['June'].'_'.$row['July'].'_'.$row['August'].'_'.$row['September'].'_'.$row['October'].'_'.$row['November'].'_'.$row['December'];    
          }
 mysqli_close($conn);

 
?> 
<script>
var temp="<?php echo $view_month; ?>";
var temp1=temp.split("_");
var inc=0;
var ourview=[],topclassview=[],admittedstudent=[];
for(inc;inc<temp1.length;inc++)
{
ourview.push([inc,parseInt(temp1[inc])]);
}
 
var temp2="<?php echo $view_month_top; ?>";
var temp3=temp2.split("_");
inc=0;
for(inc;inc<temp3.length;inc++)
{
topclassview.push([inc,parseInt(temp3[inc])]);
} 
//var topclassview 

var temp4="<?php echo $adm_month; ?>";
var temp5=temp4.split("_");
inc=0;
for(inc;inc<temp5.length;inc++)
{
admittedstudent.push([inc,parseInt(temp5[inc])]);
} 
//var admittedstudent

</script>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Analytics</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-12" id="pgview">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Page Views
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-bar-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" id="pgvwcomp">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Page view comparison with leading class 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
               <div class="col-lg-12" id="conv">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Conversion factor 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart1"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-6" id="ofact">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Students Interest
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-pie-chart"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
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

    <!-- Flot Charts JavaScript -->
    <script src="../vendor/flot/excanvas.min.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot/jquery.flot.time.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../data/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>