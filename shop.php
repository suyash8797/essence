<?php
session_start();
include "config.php";
$gen="";
$cat="";
$subcat="";
$dis="";
$key="";
$sort=1;
if(isset($_REQUEST['sort']))
{
    $sort=$_REQUEST['sort'];
}
if(isset($_REQUEST['gen']))
{
$gen=$_REQUEST['gen'];
}
if(isset($_REQUEST['cat']))
{
$cat=$_REQUEST['cat'];
}
if(isset($_REQUEST['subcat']))
{
$subcat=$_REQUEST['subcat'];
}
if(isset($_REQUEST['d']))
{$dis=$_REQUEST['d'];
}
if(isset($_REQUEST['k']))
{$key=$_REQUEST['k'];
}
$lmt=9;
if(!isset($_REQUEST['page']))
{$pg=1;
}
else
{$pg=$_REQUEST['page'];
}
$str=($pg-1)*$lmt;
$qry="select count(id) from product where id>0";
$query="select * from product where id>0";
if($gen!=NULL){
$query=$query." and gen='".$gen."'";
$qry=$qry." and gen='".$gen."'";
}
if($cat!=NULL){
$query=$query." and cat='".$cat."'";
$qry=$qry." and cat='".$cat."'";
}
if($subcat!=NULL){
$query=$query." and subcat='".$subcat."'";
$qry=$qry." and subcat='".$subcat."'";
}
if($dis!=NULL){
$query=$query." and discount>=".$dis."";
$qry=$qry." and discount>=".$dis."";
}
if($key!=NULL){
$query=$query." and (gen like '%".$key."%' or cat like '%".$key."%' or subcat like '%".$key."%' or color like '%".$key."%' or brand like '%".$key."%' or name like '%".$key."%' or des like '%".$key."%')";
$qry=$qry." and (gen like '%".$key."%' or cat like '%".$key."%' or subcat like '%".$key."%' or color like '%".$key."%' or brand like '%".$key."%' or name like '%".$key."%' or des like '%".$key."%')";
}
if($sort==1){
$query=$query." order by id desc limit $str, $lmt";
}
else if($sort==2){
$query=$query." order by price desc limit $str, $lmt";
}
if($sort==3){
$query=$query." order by price limit $str, $lmt";
}
$result= mysqli_query($conn,$query);
$rslt= mysqli_query($conn,$qry);
$arr= mysqli_fetch_array($rslt);
$st=$_SERVER['REQUEST_URI'];
$ste= explode("/", $st);
$_SESSION['page']=$ste[2];
if(isset($_SESSION['uid']))
{$uid=$_SESSION['uid'];
}
 else {
$uid=-1;    
}
$query2=mysqli_query($conn,"select count(id) from cart where user_id='$uid'");
$array2= mysqli_fetch_array($query2);
?><!DOCTYPE html>
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
                <div class="user-login-info">
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
  <a href="complete.php">Edit Profile</a>
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
    </div>    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catagories</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li>
                                       <p><b>clothing</b></p>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="shop.php?gen=&cat=&subcat=&k=">All</a></li>
                                            <li><a href="shop.php?gen=female&cat=topwear&subcat=bodysuit&k=">Bodysuits</a></li>
                                            <li><a href="shop.php?gen=female&cat=topwear&subcat=dress&k=">Dresses</a></li>
                                            <li><a href="shop.php?gen=&cat=topwear&subcat=sweat&k=">Hoodies &amp; Sweats</a></li>
                                            <li><a href="shop.php?gen=&cat=topwear&subcat=jacket&k=">Jackets &amp; Coats</a></li>
                                            <li><a href="shop.php?gen=female&cat=bottomwear&subcat=jeans&k=">Jeans</a></li>
                                            <li><a href="shop.php?gen=female&cat=bottomwear&subcat=pant&k=">Pants &amp; Leggings</a></li>
                                            <li><a href="shop.php?gen=female&cat=topwear&subcat=skirt&k=">Skirts</a></li>
                                            <li><a href="shop.php?gen=female&cat=topwear&subcat=shirt&k=">Shirts &amp; Blouses</a></li>
                                            <li><a href="shop.php?gen=male&cat=topwear&subcat=shirt&k=">Shirts</a></li>
                                            <li><a href="shop.php?gen=&cat=topwear&subcat=sweater&k=">Sweaters &amp; Knits</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li>
                                        <p><b>footwear</b></p>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="shop.php?gen=&cat=footwear&subcat=&k=">All</a></li>
                                            <li><a href="shop.php?gen=&cat=footwear&subcat=shoes&k=">Shoes</a></li>
                                            <li><a href="shop.php?gen=&cat=footwear&subcat=sandals&k=">Sandals</a></li>
                                            <li><a href="shop.php?gen=&cat=footwear&subcat=heels&k=">Heels</a></li>
                                            <li><a href="shop.php?gen=&cat=footwear&subcat=flotter&k=">Flotters</a></li>
                                            <li><a href="shop.php?gen=&cat=footwear&subcat=crocs&k=">Crocs</a></li>
                                            </ul>
                                    </li>
                                </ul>
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li>
                                        <p><b>accessories</b></p>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="shop.php?gen=&cat=accessories&subcat=&k=">All</a></li>
                                            <li><a href="shop.php?gen=&cat=accessories&subcat=belt&k=">Belts</a></li>
                                            <li><a href="shop.php?gen=&cat=accessories&subcat=watch&k=">Watches</a></li>
                                            <li><a href="shop.php?gen=female&cat=accessories&subcat=earring&k=">Earrings</a></li>
                                            <li><a href="shop.php?gen=female&cat=accessories&subcat=jewelery&k=">Jewelery</a></li>
                                            <li><a href="shop.php?gen=male&cat=accessories&subcat=tie&k=">Tie &amp; Bow</a></li>
                                            <li><a href="shop.php?gen=female&cat=accessories&subcat=handbag&k=">Handbag &amp; Clutches</a></li>
                                            <li><a href="shop.php?gen=male&cat=accessories&subcat=wallet&k=">Wallets</a></li>
                                            <li><a href="shop.php?gen=&cat=accessories&subcat=bag&k=">Bags</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget price mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Filter by</h6>
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Price</p>
                            <div class="product-sorting d-flex">
                                            <select name="filter" id="filter_id"> 
                                                <option value="0" >select</option>
                                                <option value="1" ><1000</option>
                                                <option value="2" >1000-2000</option>
                                                <option value="3" >>2000</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                    </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget color mb-50">
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Color</p>
                            <div class="widget-desc">
                                <ul class="d-flex">
                                    <li><a href="shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=white" class="color1"></a></li>
                                    <li><a href="shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=grey" class="color2"></a></li>
                                    <li><a href="shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=black" class="color3"></a></li>
                                    <li><a href="shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=blue" class="color4"></a></li>
                                    <li><a href="shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=red" class="color5"></a></li>
                                    <li><a href="shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=yellow" class="color6"></a></li>
                                    <li><a href="shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=orange" class="color7"></a></li>
                                    <li><a href="shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=brown" class="color8"></a></li>
                                    <li><a href="shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=green" class="color9"></a></li>
                                    <li><a href="shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=purple" class="color10"></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- ##### Single Widget ##### -->
                        <div class="widget brands mb-50">
                            <!-- Widget Title 2 -->
                            <p class="widget-title2 mb-30">Brands</p>
                            <div class="widget-desc">
                                <ul>
                                    <li><a href="shop.php?gen=&cat=&subcat=&k=Asos">Asos</a></li>
                                    <li><a href="shop.php?gen=&cat=&subcat=&k=mango">Mango</a></li>
                                    <li><a href="shop.php?gen=&cat=&subcat=&k=river island">River Island</a></li>
                                    <li><a href="shop.php?gen=&cat=&subcat=&k=topshop">Topshop</a></li>
                                    <li><a href="shop.php?gen=&cat=&subcat=&k=zara">Zara</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span><?php echo $arr[0]; ?></span> products found</p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                            <select name="sort" id="sort_id"> 
                                                <option value="0" >Select</option>
                                                <option value="1" >Newest</option>
                                                <option value="2" >Price: high -> low</option>
                                                <option value="3" >Price: low -> high</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                              <?php while($row= mysqli_fetch_array($result))
                              {$pr=(int)(($row['price'])-($row['price']*$row['discount']/100));
                              ?>
                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="<?php echo "imgs/".$row['img1']; ?>" alt="">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="<?php echo "imgs/".$row['img2']; ?>" alt="">
                                        <?php if($row['discount']>0)
                                {
                                    ?>
                                <div class="product-badge offer-badge">
                                    <span><?php echo $row['discount']."% off"; ?></span>
                                </div>
                                <?php }
                                ?>
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span><?php echo $row['brand']; ?></span>
                                        <a href="product-details.php?id=<?php echo $row['id']; ?>">
                                            <h6><?php echo $row['name']; ?></h6>
                                        </a>
                                        <p class="product-price"><span class="old-price"><?php if($row['discount']>0){ echo "&#8377;".$row['price']; }?></span><?php echo "&#8377;".$pr; ?></p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="product-detail.php?id=<?php echo $row['id']; ?>" class="btn essence-btn">View Product</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                              <?php } ?>
                        </div>
                        <div class="row">
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination mt-50 mb-70">
                            <?php $total_records=$arr[0];
                                                            $total_pages = ceil($total_records / $lmt);
                                                            for($i=1; $i<=$total_pages; $i++)
                                                            {
                                                            ?>
                            <li class="page-item"><a class="page-link" href="shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat ?>&subcat=<?php echo $subcat; ?>&k=<?php echo $key; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                                            <?php } ?>
                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-12 col-md-6">
                    <div class="single_widget_area d-flex mb-30">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="index.php"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <ul>
                                <li><a href="shop.php?gen=&cat=&subcat=&k=">Shop</a></li>
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
    <script>
        $(document).ready(function(){
            $("#sort_id").mouseup(function(){
              var optval =  $(this).children("option:selected").val();
              if(optval==2)
              {window.location.href=("shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=<?php echo $key; ?>&d=<?php echo $dis; ?>&sort=2"); 
              }
              else if(optval==3)
              {window.location.href=("shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=<?php echo $key; ?>&d=<?php echo $dis; ?>&sort=3"); 
              }
              else if(optval==1)
              {window.location.href=("shop.php?gen=<?php echo $gen; ?>&cat=<?php echo $cat; ?>&subcat=<?php echo $subcat; ?>&k=<?php echo $key; ?>&d=<?php echo $dis; ?>&sort=1"); 
              }
            });
        });
    </script>
<!-- Active js -->
    <script src="js/active.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Classy Nav js -->
    <script src="js/classy-nav.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script>
        function openNav() {
  document.getElementById("my_Side_nav").style.width = "250px";
}

function closeNav() {
  document.getElementById("my_Side_nav").style.width = "0";
}

        </script>
</body>
</html>