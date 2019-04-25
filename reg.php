<?php
include "config.php";
session_start();
$name=$_POST['name'];
$uname=$_POST['un'];
$mob=$_POST['mob'];
$gen=$_POST['gen'];
$email=$_POST['em'];
$pass=$_POST['pw'];
$age=$_POST['age'];
$pw= md5($pass);
$pg=$_SESSION['page'];
$result= mysqli_query($conn,"insert into user(name,uname,email,pass,mob,gen,age) values('$name','$uname','$email','$pw','$mob','$gen',$age)");
if(!$result)
{    printf($conn);
    exit();
}
$result1=mysqli_query($conn,"select * from user where uname='$uname'");
$row= mysqli_fetch_array($result1);
$_SESSION['uid']=$row['id'];
header("location:complete.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

