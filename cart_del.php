<?php
$id=$_REQUEST['id'];
include "config.php";
$query="delete from cart where id=$id";
$result= mysqli_query($conn, $query);
header("location:checkout.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

