<?php
session_start();
if(isset($_SESSION['uid']))
{$uid=$_SESSION['uid'];
}
include "config.php";
$query=mysqli_query($conn,"select * from cart where user_id='$uid'");
$query2=mysqli_query($conn,"select count(id) from cart where user_id='$uid'");
$array2= mysqli_fetch_array($query2);
?>
<!DOCTYPE html>
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
                                        <li><a href="shop.php?gen=female&cat=topwear&subcat=dress&k=">Dresses</a></li>
                                        <li><a href="shop.php?gen=female&cat=topwear&subcat=shirt&k=">Blouses &amp; Shirts</a></li>
                                        <li><a href="shop.php?gen=female&cat=topwear&subcat=t-shirt&k=">T-shirts</a></li>
                                        <li><a href="shop.php?gen=female&cat=bottomwear&subcat=jeans&k=">Jeans</a></li>
                                        <li><a href="shop.php?gen=female&cat=bottomwear&subcat=skirt&k=">Skirt</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Men's Collection</li>
                                        <li><a href="shop.php?gen=male&cat=topwear&subcat=t-shirt&k=">T-Shirts</a></li>
                                        <li><a href="shop.php?gen=male&cat=bottomwear&subcat=jeans&k=">Jeans</a></li>
                                        <li><a href="shop.php?gen=male&cat=topwear&subcat=shirt&k=">Shirts</a></li>
                                        <li><a href="shop.php?gen=male&cat=topwear&subcat=jacket&k=">Jackets</a></li>
                                        <li><a href="shop.php?gen=male&cat=bottomwear&subcat=trousers&k=">Trousers</a></li>
                                    </ul> 
                                        <ul class="single-mega cn-col-4">
                                        <li class="title">Footwear Men</li>
                                        <li><a href="shop.php?gen=male&cat=footwear&subcat=shoes&k=">Shoes</a></li>
                                        <li><a href="shop.php?gen=male&cat=footwear&subcat=flotter&k=">Flotter</a></li>
                                        <li><a href="shop.php?gen=male&cat=footwear&subcat=sandals&k=">Sandals</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                        <li class="title">Footwear Women</li>
                                        <li><a href="shop.php?gen=female&cat=footwear&subcat=shoes&k=">Shoes</a></li>
                                        <li><a href="shop.php?gen=female&cat=footwear&subcat=flotter&k=">Flotter</a></li>
                                        <li><a href="shop.php?gen=female&cat=footwear&subcat=sandals&k=">Sandals</a></li>
                                        <li><a href="shop.php?gen=female&cat=footwear&subcat=heels&k=">Heels</a></li>
                                        </ul>
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
                    <form action="shop.php?gen=cat=subcat=" method="get">
                        <input type="search" name="k" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info"><div class="user-login-info">
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
                    <a href="checkout.php" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">
        <form action="upload.php" method="post" enctype="multipart/form-data">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-page-heading mb-30">
                            <h5>Upload Image:-</h5>
                        </div>
                        <label for="image"><span>*</span></label>
                        <input type="file" name="image"><br>
                        <h5><br></h5>
                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">Name <span>*</span></label>
                                    <input type="text" name="name" class="form-control" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="comp">Company Name</label>
                                    <input type="text" name="comp" class="form-control" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label name="country" for="country">Country <span>*</span></label>
                                    <select class="w-100" name="country" id="country" required>
                                        <option value="India">India</option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Germany">Germany</option>
                                        <option value="France">France</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Canada">Canada</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="add">Address <span>*</span></label>
                                    <input type="text" name="add" class="form-control mb-3" required value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="pincode">Pincode <span>*</span></label>
                                    <input type="text" name="pincode" class="form-control" required value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Town/City <span>*</span></label>
                                    <input type="text" name="city" class="form-control" required id="city" value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="state">State <span>*</span></label>
                                    <input type="text" name="state" class="form-control" id="state" required value="">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="contact">Phone No <span>*</span></label>
                                    <input type="text" name="contact" class="form-control" value="" required>
                                </div>
                                <div class="col-12 mb-3">
                                <button class="btn essence-btn">Submit</button>
                            </div>
                                </div>
                    </div>
                </div>
        </form>
    </section>
    <!-- ##### Single Product Details Area End ##### -->

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
                                <li><a href="shop.php">Shop</a></li>
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