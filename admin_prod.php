<?php
include "config.php";
$name=$_POST['name'];
$des=$_POST['des'];
$cat=$_POST['cat'];
$subcat=$_POST['sub'];
$gen=$_POST['gen'];
$brand=$_POST['brand'];
$color=$_POST['color'];
$price=$_POST['price'];
$dis=$_POST['dis'];
$qs=$_POST['qs'];
$qm=$_POST['qm'];
$ql=$_POST['ql'];
$qx=$_POST['qx'];
$filename1=$_FILES['image']['name'];
$tempname1=$_FILES['image']['tmp_name'];
$filename2=$_FILES['image2']['name'];
$tempname2=$_FILES['image2']['tmp_name'];
$fol="imgs/".$filename1;
move_uploaded_file($tempname1, $fol);
$fol2="imgs/".$filename2;
move_uploaded_file($tempname2, $fol2);
$result= mysqli_query($conn,"insert into product(name,des,color,brand,price,discount,stock_S,stock_M,stock_L,stock_XL,cat,subcat,img1,img2,gen) values('$name', '$des', '$color', '$brand', $price, $dis, $qs, $qm, $ql, $qx, '$cat', '$subcat', '$filename1', '$filename2', '$gen')");
if(!$result)
{printf("Error: %s\n", mysqli_error($conn));
    exit();
}
header("location:admin_products.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

