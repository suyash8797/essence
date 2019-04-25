<?php
include "config.php";
$head=$_POST['head'];
$cont=$_POST['cont'];
$filename= $_FILES["image"]["name"];
$tempname= $_FILES["image"]["tmp_name"];
$fol="imgs/".$filename;
move_uploaded_file($tempname, $fol);
$query= mysqli_query($conn,"insert into blog(img,head,cont) values('$filename','$head','$cont')");
header("location:admin_blog.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

