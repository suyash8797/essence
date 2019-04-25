<?php
session_start();
include "config.php";
$uid=$_SESSION['uid'];
$rcvr=$_POST['name'];
$comp=$_POST['comp'];
$add=$_POST['add'];
$country=$_POST['country'];
$pincode=$_POST['pincode'];
$city=$_POST['city'];
$state=$_POST['state'];
$contact=$_POST['contact'];
$pg=$_SESSION['page'];
$filename=$_FILES['image']['name'];
$tempname=$_FILES['image']['tmp_name'];
$fol="imgs/".$filename;
move_uploaded_file($tempname, $fol);
$query= mysqli_query($conn,"update user set img='$filename' where id=$uid");
$query= mysqli_query($conn,"update user set state='$state' where id=$uid");
$query= mysqli_query($conn,"update user set country='$country' where id=$uid");
$query= mysqli_query($conn,"update user set pincode='$pincode' where id=$uid");
$query= mysqli_query($conn,"update user set rcvr_name='$rcvr' where id=$uid");
$query= mysqli_query($conn,"update user set contact='$contact' where id=$uid");
$query= mysqli_query($conn,"update user set company='$comp' where id=$uid");
$query= mysqli_query($conn,"update user set address='$add' where id=$uid");
$query= mysqli_query($conn,"update user set city='$city' where id=$uid");
if(!$query)
{
    printf($conn);
    exit();
}
header("location:".$pg);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

