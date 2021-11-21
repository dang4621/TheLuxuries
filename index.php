<?php 
     ob_start();
     session_start();
     include './model/pdo.php';
     include './model/sanpham.php';   
     include './model/danhmuc.php';    
     include './model/thuonghieu.php';
	 include './model/giohang.php';


		include 'view/header.php';
		$danhmuc=loadAll_dm(); 
		$ba_sp=load3_sp();
	
		if( isset($_GET['act']) ){
			$act=$_GET['act'];        
			switch($act){            
				case 'trangchu':                
					include 'view/home.php';
					break;       
				case 'shop':					
					if(isset($_POST['select'])){      
						$id=$_POST['select'];      
						settype($id,"int");      
					}else{  
						$id=0;   
						}
		
					if(isset($_POST['timkiem'])){        
						$keyw=$_POST['keyw'];         
					}else{           
						$keyw="";
					}				
					$sanpham=load_all_sp($keyw,$id);
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
                            header("Location: index.php?act=cart"); 
                            }
                        }else{
                        	header("Location: login.php"); 
                       	 break; 
                    }
					break;
				case 'del-sp':    
                    if(isset($_SESSION["user"])){
                        if(isset($_GET['id'])){
                            $ma_san_pham=$_GET['id'];
                            xoaSP($ma_san_pham);  
                    }
                }
				case 'cart':
					include 'view/mycart.php';
					break;
				case 'checkout':
					include 'view/checkout.php';
					break;		
				case 'test':                
					include 'view/test.php';
					break;
				case 'confirm':
						if (isset($_POST['sethang'])) {						 					
							$so_hoa_don =  rand(10000, 99999999);	
							$idtk = $_SESSION['user']['id_tai_khoan'];
							$ngaydathang = date('h:i:sa d/m/y');
							$pt_thanhtoan = $_POST['payment'];
							$thanhtien = $_POST['total'];
							$_SESSION['total_money']= $thanhtien ;
							$phiship = 5000;
							$trang_thai = 0 ;
							$hoten = $_POST['name'];
							$sdt = $_POST['sdt'];
							$email = $_POST['email'];
							$address = $_POST['address'];
							$loi_nhan = $_POST['bill'];
							
							$sql = "INSERT INTO hoa_don(so_hoa_don,id_tai_khoan, ngay_hoa_don,  pt_thanhtoan,   thanh_tien, phi_ship, trang_thai, ho_ten,	sdt,	dia_chi, loi_nhan ) value(?,?,?,?,?,?,?,?,?,?,?)";
							pdo_execute($sql, 			$so_hoa_don, $idtk, 	$ngaydathang,   $pt_thanhtoan , $thanhtien, $phiship, $trang_thai , $hoten, $sdt, $address, $loi_nhan);
							foreach ($_SESSION['shopping_cart'] as $value){
								extract($value);
								$idchitiet =rand(10000,999999) ;
								$matt=getid($ma_san_pham,$size,$color);	
								$soluong=$quantity;
								$price=$gia;												
								$sql="insert into chi_tiet_hoa_don(id_cthd,so_hoa_don,id_tt,gia,so_luong) value(?,?,?,?,?)";
								pdo_execute($sql,$idchitiet,$so_hoa_don,$matt,$price,$soluong);
								unset($_SESSION["shopping_cart"]);
							}
							if($_POST['payment'] == '0'){
								header("Location:index.php");
							}else{
								header('Location : ');
							}
						}                
						
					 break;	
				//include các file trên header
				case 'about':                
					include 'view/about.php';
					break;
				case 'contact':                
					include 'view/contact.php';
					break;  
					break;	
				case 'noti' :
					include 'view/404.php';  
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










