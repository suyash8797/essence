<?php
session_start();
include "config.php";
$pg=$_SESSION['page'];
if(isset($_SESSION['uid']))
{$uid=$_SESSION["uid"];
}
 else {
$uid=-1;    
}
$size=$_POST['select'];
$pid=$_POST["addtocart"];
$_SESSION['page']="cart.php?uid=".$uid."&pid=".$pid;
if($uid<0)
{header("location:register.php");
}
 else {
$query="insert into cart(user_id,prod_id,size) values($uid,$pid,'$size')";
$result= mysqli_query($conn, $query);
header("location:".$pg);
 }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

