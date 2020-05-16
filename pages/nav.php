<?php
if(isset($_COOKIE['user']))
{
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqls = sprintf("SELECT Tkn FROM Class_Index WHERE Uname LIKE '%s'",$_COOKIE['user']);
$result = $conn->query($sqls);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $secretKey=$row["Tkn"];
    }
}

$decrypted = openssl_decrypt($_COOKIE['user'],'AES-128-CBC', $secretKey,OPENSSL_RAW_DATA,$secretKey);

echo '<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> Class Data Manager v1.0</a>
            </div>
            <!-- /.navbar-header -->
 <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-message">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="https://www.classesdunia.com/admin/php/signout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-home"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="clorder.php"><i class="fa fa-credit-card"></i> Manage Orders</a>
                        </li>
                        <li>
                            <a href="msg.php"><i class="fa fa-comment"></i> Manage Reviews</a>
                        </li>                        
                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Web Page Analytics<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="analytics.php#pgview" > Page views graph</a>
                                </li>
                                <li>
                                    <a href="analytics.php#pgvwcomp" > Apex-O-Graph</a>
                                </li>
                                <li>
                                    <a href="analytics.php#conv" > Conversion graph</a>
                                </li>
                                <li>
                                    <a href="analytics.php#ofact" > Other factors</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>  Content change<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="report.php"><i class="fa fa-warning"></i> Report an issue</a>
                        </li>
                        <li>
                            <a href="aboutus.php"><i class="fa fa-files-o fa-fw"></i> About Us</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>';
}
else
{
echo'<script>window.location = "https://www.classesdunia.com/admin/index.html"</script>';
exit();
}
?>