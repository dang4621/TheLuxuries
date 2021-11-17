<?php 
     ob_start();
     session_start();
     include './model/pdo.php';
     include './model/sanpham.php';   
     include './model/danhmuc.php';    
     include './model/thuonghieu.php';
	 include './model/giohang.php';


		include 'view/header.php';

		//load
		// $sanpham=load_all_sp($keyw,$id);
		$ba_sp=load3_sp();
	
		if( isset($_GET['act']) ){
			$act=$_GET['act'];        
			switch($act){            
				case 'trangchu':                
					include 'view/home.php';
					break;       
				case 'shop':
					include 'view/shop.php';
					break;
				case 'chitiet_sp':
					if(isset($_GET['id'])){
						$id=$_GET['id'];
					}
					$onesp=loadOne_sp($id);
					include 'view/product_details.php';
				case 'add':
                    if(isset($_SESSION["user"])){
                        if(isset($_POST['add'])){
                            $ma_san_pham=$_POST['id'];
                            $soluong=$_POST['quantity'];
							$gia = $_POST['gia'];
							$size=$_POST['size'];
							$color=$_POST['color'];

                            $alert=themGH($ma_san_pham,$soluong,$gia,$size,$color);   
                            header("Location: index.php?act=test"); 
                            }
                        }else{
                        	header("Location: login.php"); 
                       	 break; 
                    }
					break;
				case 'cart':
					include 'view/mycart.php';
					break;
				case 'test':                
					include 'view/test.php';
					break;
				//include các file trên header
				case 'about':                
					include 'view/about.php';
					break;
				case 'contact':                
					include 'view/contact.php';
					break;  

				//Chuyển hướng khi action sai
				default :  
					include 'view/home.php';         
						break;
				}
					
			}else{
				include 'view/home.php';
			}            
	
	
		include 'view/footer.php';
	 

 

?>




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

	<link rel="stylesheet" href="view/assets/css/css1.css">

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










