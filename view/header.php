<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>The Luxuries</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="view/assets/img/favicon.png">
<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
<!-- fontawesome -->
<link rel="stylesheet" href="view/assets/css/all.min.css">
<!-- bootstrap -->
<link rel="stylesheet" href="view/assets/bootstrap/css/bootstrap.min.css">
<!-- owl carousel -->
<link rel="stylesheet" href="view/assets/css/owl.carousel.css">
<!-- magnific popup -->
<link rel="stylesheet" href="view/assets/css/magnific-popup.css">
<!-- animate css -->
<link rel="stylesheet" href="view/assets/css/animate.css">
<!-- mean menu css -->
<link rel="stylesheet" href="view/assets/css/meanmenu.min.css">
<!-- main style -->
<link rel="stylesheet" href="view/assets/css/main.css">
<!-- responsive -->
<link rel="stylesheet" href="view/assets/css/responsive.css">
<link rel="stylesheet" href="view/assets/css/css3.css">
<link rel="stylesheet" href="view/assets/css/css2.css">
<link rel="stylesheet" href="view/assets/css/quenmk.css">
<link rel="stylesheet" href="view/assets/css/trangthaidh.css">
<link rel="stylesheet" href="view/assets/css/chitietdh.css">

<script src="view/assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="view/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="view/assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="view/assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="view/assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="view/assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="view/assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="view/assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="view/assets/js/sticker.js"></script>
<!-- main js -->
<script src="view/assets/js/main.js"></script>
<!-- sweetalert -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

    <!-- PreLoader
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	PreLoader Ends -->

    <!-- header -->
    <div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.php?">
                                <img src="view/assets/img/logo3.png" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="index.php">Trang Chủ</a></li>
                                <li><a href="index.php?act=about">Giới Thiệu</a></li>
                                <li><a href="index.php?act=contact">Liên Hệ</a></li>
                                <li>
                                    <a href="index.php?act=shop">Shop</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.php?act=shop">Sản phẩm</a></li>
                                        <li><a href="index.php?act=cartdetails">Đơn hàng của tôi</a></li>
                                        <li><a href="index.php?act=about">Single Product</a></li>
                                        <li><a href="index.php?act=cart">Giỏ Hàng</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="header-icons">
                                        <li>
                                        <a class="dangnhap" href="login.php" id="btn-dangnhap">
                                        <i class="fa fa-user"></i></a>
                                        <ul class="sub-dangnhap2">
                                            <?php 
												if(isset($_SESSION['user'])){
													echo("<li>&nbsp;&nbsp;&nbsp;Hi !".$_SESSION['user']['username']." </li>");
												}
											?>
                                            <li>
                                                <a href="index.php?act=cartdetails">Đơn hàng của tôi</a>
                                            </li>

                                            <li>
                                                <a href="index.php?act=prolike">SẢN PHẨM ĐÃ YÊU THÍCH</a>
                                            </li>

                                            <li>
                                                <a href="update_information/capnhatthongtin.php">Cập nhật thông tin</a>
                                            </li>
                                            <li>
                                                <a href="forget_pass/quenmk.php">Quên mật khẩu</a>
                                            </li>
                                            <?php 
											    if(isset($_SESSION['user'])){
												    echo('<li><a href="index.php?act=logout">Đăng xuất</a></li>');
											    }else{
												    echo('<li><a href="login.php">Đăng nhập</a></li>');
											    }
										    ?>
                                        </ul>
                                           <li> 
                                        <li><a class="shopping-cart" href="index.php?act=cart">
                                            <i class="fas fa-shopping-cart"></i>
                                        </a></li>
                                        <a class="mobile-hide search-bar-icon" href="#">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>    
                </div>
                <a class="mobile-show search-bar-icon" href="#">
                    <i class="fas fa-search"></i>
                </a>
                <div class="mobile-menu"></div>
                <!-- menu end -->
            </div>
        </div>
    </div>
    </div>
    <!-- end header -->
    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn">
                        <i class="fas fa-window-close"></i>
                    </span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <form action="index.php?act=shop" method="post">
                                <h3>Tìm kiếm</h3>
                                <input type="text" name="keyw">
                                <button type="submit" name="timkiem">Tìm kiếm <i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->