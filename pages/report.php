<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Report issue</title>

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
function sendmsg()
{
var xmlhttp = new XMLHttpRequest();

var name = document.getElementById("contact-form").elements[0].value;
var email = document.getElementById("contact-form").elements[1].value;
var message = document.getElementById("contact-form").elements[2].value;
var data = "name="+name+"&email="+email+"&message="+message;
xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
               window.location.reload(true);
            } 
        };
        xmlhttp.open("POST","../php/issue.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(data);
}
</script>
<style>
 #formcontainer{
  height:600px;
  font-family: 'Lato', georgia;
  font-size: 25px;
  color: rgba(0,0,0, 1);
  background-image: url('https://www.classesdunia.com/admin/classesdunia.png');
  background-repeat: no-repeat;
  background-position: center;
  text-align: center;
  font-weight: 300;
  -webkit-font-smoothing: antialiased;
}
#contact-form {
  max-width: 90%;
  margin: 0 auto;
}

label {
  font-weight: 400;
  cursor: pointer;
}

textarea,
input {
  border: none;
  outline: none;
  border-radius: 0;
  text-align: center;
  background: none;
  font-weight: 700;
  font-family: 'Lato', georgia;
  font-size: 25px;
  color: rgba(0, 0, 0, 1);
  max-width: 70%;
  padding: 1rem;
  border: 2px dashed rgba(255, 255, 255, 0);
  box-sizing: border-box;
  cursor: text;
}

textarea {
  text-align: left;
  /* overflow:hidden; */
  
  resize: none;
  width: 90%;
  border-color: rgba(255, 255, 255, 0)
}

textarea:focus {
  background-color: rgba(0, 0, 0, 0.2);
  border: 2px dashed rgba(0, 0, 0, 1);
}

textarea:focus:required:valid {
  border: 2px solid rgba(0, 0, 0, 0);
  border-bottom: 2px solid rgba(0, 0, 0, 0.2);
}

textarea:required:valid {
  border-bottom: 2px solid rgba(0, 0, 0, 0.2);
}

input {
  border-bottom: 2px dashed rgba(0, 0, 0, 0.5);
}

input:required,
textarea:required {
  border-bottom: 2px dashed rgba(0, 0, 0, 0.5);
}

input:focus {
  border-bottom: 2px dashed rgba(0, 0, 0, 1);
  background-color: rgba(0, 0, 0, 0.2);
}

input:required:valid {
  border-bottom: 2px solid rgba(0, 0, 0, 0.2);
}

input:required:invalid {
  color: rgba(0, 0, 0, 0.5);
}

::-webkit-input-placeholder {
  text-align: center;
  color: rgba(0, 0, 0, 0.4);
  font-style: italic;
  font-weight: 400;
}

:-moz-placeholder {
  /* Firefox 18- */
  
  text-align: center;
  color: rgba(0, 0, 0, 0.4);
  font-style: italic;
  font-weight: 400;
}

::-moz-placeholder {
  /* Firefox 19+ */
  
  text-align: center;
  color: rgba(0, 0, 0, 0.4);
  font-style: italic;
  font-weight: 400;
}

:-ms-input-placeholder {
  text-align: center;
  color: rgba(0, 0, 0, 0.4);
  font-style: italic;
  font-weight: 400;
}

.expanding {
  vertical-align: top;
}

.send-icn {
  fill: rgba(0,0, 0, 1)
}

.send-icn:hover {
  fill: rgba(0, 0, 0, 1);
  cursor: pointer;
}

button {
  background: none;
  border: none;
  outline: none;
  margin: 2vmax;
}

button:hover small {
  opacity: 1;
}

small {
  display: block;
  opacity: 0;
}

.website {
  opacity: 1;
  font-size: 16px;
  color: black;
  position: relative;
  text-align: center;
  display: block;
  margin-top: 7%;
  
}

.website a {
  color: black;
}
</style>
</head>

<body>

    <div id="wrapper">

     <?php require 'nav.php'; ?> 

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Report an issue</h1>
<div id="formcontainer">
<form id="contact-form">
<br>
  <p>Dear Admin,</p>
  <p>My
    <label for="your-name">name</label> is
    <input type="text" name="name" id="your-name" minlength="3" placeholder="(name)" required> and</p>

  <p>my
    <label for="email">email address</label> is
    <input type="email" name="email" id="email" placeholder="(email)" required>
  </p>

  <p> I have an
    <label for="message">issue</label> in my account </p>

  <p>
    <textarea name="message" id="your-issue" placeholder="(your msg here)" class="expanding" required></textarea>
  </p>
  <p>
    <button type="submit" onclick="sendmsg()">
      <svg version="1.1" class="send-icn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="36px" viewBox="0 0 100 36" enable-background="new 0 0 100 36" xml:space="preserve">
        <path d="M100,0L100,0 M23.8,7.1L100,0L40.9,36l-4.7-7.5L22,34.8l-4-11L0,30.5L16.4,8.7l5.4,15L23,7L23.8,7.1z M16.8,20.4l-1.5-4.3
	l-5.1,6.7L16.8,20.4z M34.4,25.4l-8.1-13.1L25,29.6L34.4,25.4z M35.2,13.2l8.1,13.1L70,9.9L35.2,13.2z" />
      </svg>
      <small>send</small>
    </button>
  </p>
</form>
</div>
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

</body>

</html>
