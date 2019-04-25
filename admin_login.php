<?php
$uname=$_POST["un"];
$upass=$_POST["pw"];
$pw= md5($upass);
include 'config.php';
$myquery=mysqli_query($conn,"select * from admin where uname='$uname' or mob='$uname' or email='$uname'");
if (!$myquery) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
$array = mysqli_fetch_array($myquery);
        if(($array['uname']==$uname || $array['mob']==$uname || $array['email']==$uname) && $array['pass']==$pw )
 {session_start();
 $_SESSION['un']=$uname;
    header('location:home1.php');
}
else {
    echo 'Login fail';    
}       
        

?>