<?php
include "config.php";
session_start();
$id=$_REQUEST['id'];
$query="select * from blog";
$query1="select * from blog where id=$id";
$result= mysqli_query($conn, $query);
$result1= mysqli_query($conn, $query1);
$row1= mysqli_fetch_array($result1);
$fol="imgs/".$row1['img'];
if(isset($_SESSION['uid']))
{$uid=$_SESSION['uid'];
}
 else {
$uid=-1;    
}
$query3=mysqli_query($conn,"select * from cart where user_id='$uid'");
$query2=mysqli_query($conn,"select count(id) from cart where user_id='$uid'");
$array2= mysqli_fetch_array($query2);
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Essence</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>
<style>
    .abc{
        max-height: 150px !important
            position: relative;
    }
    .bg{
        position:relative;
        width: 100%;
    }
    
</style>
<style>
                    .product_img{
                        max-height: 350px !important;
                    }
                    .side_nav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.side_nav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: black;
  display: block;
  transition: 0.3s;
}

.side_nav a:hover {
  color: blue;
}

.side_nav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .side_nav {padding-top: 15px;}
  .side_nav a {font-size: 18px;}
}
                </style>
<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img src="img/core-img/logo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Shop</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Women's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Blouses &amp; Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Rompers</a></li>
                                        <li><a href="shop.html">Bras &amp; Panties</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Men's Collection</li>
                                        <li><a href="shop.html">T-Shirts</a></li>
                                        <li><a href="shop.html">Polo</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Kid's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img src="img/bg-img/bg-6.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div>
                <!-- User Login Info --><div class="user-login-info">
                    <!--<?php $qqry= mysqli_query($conn,"select * from user where id=$uid");
                    $rrow= mysqli_fetch_array($qqry);
                    ?>-->
  <span style="cursor:pointer;" onclick="openNav()"><?php if($uid<0){ ?>
                    <a href="#"><img src="img/core-img/user.svg" alt=""></a>
                    <?php } 
                    else {?>
                    <a href="#"><img src="<?php echo "imgs/".$rrow['img']; ?>" alt=""></a>
                    <?php } ?></span>
                </div>
                <div id="my_Side_nav" class="side_nav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="myorders.php">My Orders</a>
  <?php if($uid>0){?>
  <a href="logout.php">Logout</a>
  <?php } else { ?>
      <a href="register.php">Login</a>
  <?php }
  ?>
</div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span><?php echo $array2[0]; ?></span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="img/core-img/bag.svg" alt=""> <span><?php echo $array2[0]; ?></span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <?php $result1= mysqli_query($conn,"select * from cart where user_id=$uid");
                $tp=0;
                $td=0;
                while($array= mysqli_fetch_array($result1))
                {$pid=$array['prod_id'];
                    $query3=mysqli_query($conn,"select * from product where id=$pid");
                $array3=mysqli_fetch_array($query3);
                $tp=$tp+$array3['price'];
                $dis=(int)(($array3['price'])-($array3['price']*$array3['discount']/100));
                $td=$td+$dis;
                    ?>
                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="product-detail.php?id=<?php echo $array3['id']; ?>" class="product-image">
                        <img src="<?php echo "imgs/".$array3['img1']; ?>" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                            <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge"><?php echo $array3['brand']; ?></span>
                            <h6><?php echo $array3['name']; ?></h6>
                            <p class="size">Size: <?php echo $array['size']; ?></p>
                            <p class="color">Color: <?php echo $array3['color']; ?></p>
                            <p class="price">&#8377;<?php echo $dis; ?></p>
                        </div>
                    </a>
                </div>
<?php } ?>
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">
                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span>&#8377;<?php echo $tp; ?></span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>discount:</span> <span>&#8377;<?php echo $tp-$td; ?></span></li>
                    <li><span>total:</span> <span>&#8377;<?php echo $td; ?></span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="checkout.html" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="single-blog-wrapper">
        <!-- Single Blog Content Wrap -->
        <div class="single-blog-content-wrapper d-flex">

            <!-- Blog Content -->
            <div class="single-blog--text">
                <h2><?php echo $row1['head']; ?></h2>
                <div class="abc">
            <img src="<?php echo $fol; ?>" alt="">
                </div><br><br><br><br>  
                <div class="bg">
                <p><?php echo $row1['cont']; ?></p>
                </div>
                </div>

            <!-- Related Blog Post -->
            <div class="related-blog-post">
                <?php while($row= mysqli_fetch_array($result))
                {$fol2="imgs/".$row['img'];
                ?>
                <!-- Single Related Blog Post -->
                <div class="single-related-blog-post">
                    <img src="<?php echo $fol2; ?>" alt="">
                    <a href="single-blog.php?id=<?php echo $row['id']; ?>">
                        <h5><?php echo $row['head']; ?></h5>
                    </a>
                </div>
                <?php } ?>
            </div>
</div>
        </div>
    <!-- ##### Blog Wrapper Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="shop.html">Shop</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Payment Options</a></li>
                            <li><a href="#">Shipping and Delivery</a></li>
                            <li><a href="#">Guides</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row align-items-end">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_heading mb-30">
                            <h6>Subscribe</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your email here">
                                <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>

<div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>
<script>
        function openNav() {
  document.getElementById("my_Side_nav").style.width = "250px";
}

function closeNav() {
  document.getElementById("my_Side_nav").style.width = "0";
}

        </script>
</html>