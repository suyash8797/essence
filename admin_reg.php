<?php
include "config.php";
session_start();
$name=$_POST['name'];
$uname=$_POST['un'];
$mob=$_POST['mob'];
$em=$_POST['em'];
$pass=$_POST['pw'];
$pw= md5($pass);
$query="insert into admin(name,uname,pass,email,mob) values('$name','$uname','$pw','$em','$mob')";
$result= mysqli_query($conn, $query);
$_SESSION['un']=$uname;
header("location:home1.php");

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

