<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cập nhật thông tin</title>
	<!-- fonts -->

</head>
<?php session_start(); 

include '../model/pdo.php';
include '../model/taikhoan.php';
if(isset($_SESSION['user']['id_tai_khoan'])){
	$matk=$_SESSION['user']['id_tai_khoan'];

	$taikhoanget=get_tk_up($matk);

	if(is_array($taikhoanget)){
		extract($taikhoanget);
	}	
}


?>
<body>
	<div class="capnhatthongtin">
		<h1 class="w3ls">Cập nhật thông tin</h1>
		<div class="content-w3ls">
			<div class="content-agile1">
				<h2 class="agileits1">The Luxuries</h2>
				<p class="agileits2">THỜI TRANG LUÔN THAY ĐỔI</p>
			</div>
			<div class="content-agile2">
				<form action="#" method="post">
					<div class="form-control ">
						<input type="text" id="firstname" name="firstname" placeholder="Tên người dùng" required="" value="<?=$username?>">
					</div>

					<div class="form-control ">
						<input type="text" id="hoten" name="hoten" placeholder="Họ tên" required="" value="<?=$username?>">
					</div>

					<div class="form-control ">
						<input type="email" id="email" name="email" placeholder="Email" required="" value="<?=$email?>">
					</div>

					<div class="form-control ">
						<input type="number" id="number" name="number" placeholder="Số điện thoại" min="0" required="" value="<?=$sdt?>">
					</div>

					<div class="form-control agileinfo">
						<input type="password" class="lock" name="password" placeholder="Mật khẩu" id="password1" required="" value="<?=$password?>">
					</div>

					<div class="form-control agileinfo">
						<input type="password" class="lock" name="confirm-password" placeholder="Nhập lại mật khẩu" id="password2" required="" value="<?=$password?>">
					</div>

					<input type="submit" class="register" value="Cập nhật" name="update">
				</form>
            
				<?php 
				if(isset($_POST['update'])){
                  $username=$_POST['firstname'];
				  $email=$_POST['email'];
				  $phone=$_POST['number'];
				  $pass=$_POST['password'];
				  $repass=$_POST['confirm-password'];
				  $matk=$_SESSION['user']['id_tai_khoan'];

				  if($pass != $repass){
                       echo'<p style="color:red;"> mật khẩu phải giống nhau </p>';
				  }else{
					update_tk($username ,$email,$phone,$pass,$matk);
					header("Location: http://localhost/TheLuxuries/index.php"); 
				  }

				  
				}
				?>
				
			</div>
			<div class="clear"></div>
		</div>
	</div>
</body>

</html>
<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
	<!-- /fonts -->
	<!-- css -->
	<link href="../view/assets/css/capnhatthongtin.css" rel='stylesheet' type='text/css' media="all" />
	<!-- /css -->