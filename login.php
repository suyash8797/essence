<?php
session_start();
$uname=$_POST["un"];
$upass=$_POST["pw"];
if(isset($_SESSION['page']))
{$pg=$_SESSION['page'];
}
else
{$pg="index.php";
}
$pw= md5($upass);
include 'config.php';
$myquery=mysqli_query($conn,"select * from user where uname='$uname' or mob='$uname' or email='$uname'");
if (!$myquery) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
$array = mysqli_fetch_array($myquery);
        if(($array['uname']==$uname || $array['mob']==$uname || $array['email']==$uname) && $array['pass']==$pw )
 {
 $_SESSION['uid']=$array['id'];
    header('location:'.$pg);
}
else {
    echo 'Login fail';    
}       
        

?>