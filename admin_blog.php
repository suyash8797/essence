<?php
session_start();
include 'config.php';
$un=$_SESSION['un'];
$query= mysqli_query($conn, "select * from admin where uname='$un'");
$array= mysqli_fetch_array($query);
$result= mysqli_query($conn,"select * from blog");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Home</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
    border-spacing: 5px;
    text-align: center;
}
</style>

<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="home1.php" class="simple-text">
                    <?php echo $array['uname']; ?>
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="home1.php">
                        <i class="ti-panel"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="active">
                    <a href="admin_blog.php">
                        <i class="ti-user"></i>
                        <p>Blog</p>
                    </a>
                </li>
                <li>
                    <a href="admin_products.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li>
                    <a href="admin_users.php">
                        <i class="ti-text"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li>
                    <a href="admin_brand.php">
                        <i class="ti-pencil-alt2"></i>
                        <p>Brands</p>
                    </a>
                </li>
                <li>
                    <a href="admin_orders.php">
                        <i class="ti-text"></i>
                        <p>Orders</p>
                    </a>
                </li>
                <li>
                    <a href="admin_contact.php">
                        <i class="ti-text"></i>
                        <p>Contact</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="home1.php">Home</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
						<li>
                            <a href="#">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <table>
                            <form action="admin_blog2.php" method="post" enctype="multipart/form-data" id="usrform">
                                <tr><td><b>Image:-</b></td><td><input type="file" name="image" required></td></tr>
                                <tr><td><b>Heading:-</b></td><td><input type="text" name="head" required></td></tr>
                                <tr><td><b>Content:-</b></td><td><textarea rows="10" cols="50" name="cont" form="usrform" placeholder="enter content here...."></textarea></td></tr>
                            <tr><td><input type="submit" value="submit"></td></tr>
                            </form>
                                </table>
                        </div>
                    </div>
                </div>
            <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <h3>Blogs:-</h3>
                            <table>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Head</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            <?php while($row= mysqli_fetch_array($result))
                            { $fol="imgs/".$row['img'];
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><img src="<?php echo $fol; ?>" width="250px"></td>
                                    <td><?php echo $row['head']; ?></td>
                                    <td><a href="admin_blog_edit?id=<?php echo $row['id'];?>"><img src="img.jpg" width="50px"></a></td>
                                    <td><a href="admin_blog_del?id=<?php echo $row['id'];?>"><img src="del.jpg" width="50px"></a></td>
                                </tr>
                            <?php }
                                ?>
                                </table>
                        </div>
                    </div>
                </div>
                            </div>
                        </div>
                    </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                <?php echo $array['uname']; ?>
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: "Welcome."

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>

</html>
