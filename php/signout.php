<?php 
try{
setcookie("user","",1, "/");
}
catch(Exception $e)
{
echo "sign out error";
}

header("Location: https://www.classesdunia.com/admin/index.html");
exit();
?>