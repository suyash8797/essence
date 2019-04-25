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
$qry= mysqli_query($conn,"select * from cart where user_id=$uid");
while($arr= mysqli_fetch_array($qry))
{$size=$arr['size'];
    $pid=$arr['prod_id'];
$qrry= mysqli_query($conn,"select * from product where id=$pid");
$array= mysqli_fetch_array($qrry);
$pr=(int)(($array['price'])-($array['price']*$array['discount']/100));
$query="insert into orders(user_id,prod_id,size,country,pincode,address,city,state,company,contact,amount,rcvr_name) values($uid,$pid,'$size','$country','$pincode','$add','$city','$state','$comp','$contact',$pr,'$rcvr')";
$result= mysqli_query($conn, $query);
if($size=='S')
{$qty=(int)$array['stock_S'];
$qty=$qty-1;
    $qqry= mysqli_query($conn,"update product set stock_S=$qty where id=$pid");
}
else if($size=='M')
{$qty=(int)$array['stock_M'];
$qty=$qty-1;
    $qqry= mysqli_query($conn,"update product set stock_M=$qty where id=$pid");
}
else if($size=='L')
{$qty=(int)$array['stock_L'];
$qty=$qty-1;
    $qqry= mysqli_query($conn,"update product set stock_L=$qty where id=$pid");
}
else if($size=='XL')
{$qty=(int)$array['stock_XL'];
$qty=$qty-1;
    $qqry= mysqli_query($conn,"update product set stock_XL=$qty where id=$pid");
}
}
$row= mysqli_query($conn,"delete from cart where user_id=$uid");
header("location:myorders.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

