	<?php  
		session_start();
		include '../model/pdo.php';
 		include '../model/taikhoan.php';		
		include '../mail/index.php';
		
		if(isset($_POST['submit'])){
			$error = array();
			$email = $_POST['email'];
			if($email == ''){
				$error['email']="không được để trống";
			}
			if(empty($error)){
				$result = get_email($email);
				$code = substr(rand(0,999999),0,6);
				$title = "The luxuries Forget Password";
				$content = "Mã xác nhận của bạn là : <span style = 'color : green '>".$code."</span>";
				$_SESSION['mail']=$email;
				$_SESSION['code']=$code;
					mail::sendMail($title,$content,$email);
					header('location: xacnhan.php');
					exit();
			}
		}
	
	?>
	<div class="full-height-section error-section">
	    <div class="full-height-tablecell20">
	        <div class="container">
	            <div class="row40">
	                <div class="img20">
	                    <div class="sign-up1">
	                        <form class="sign-up__form"  method="post">
	                            <div class="sign-up__content">
	                                <h2 class="sign-up__title">Quên Mật Khẩu</h2>
	                                <br>
	                                <br>
	                                <input class="sign-up__inp" name="email" type="email" placeholder="EMAIL" required="required" />
	                                <div class="test11">
	                                    <a class="forgot__password">Bạn chưa có tài khoản?</a>
	                                    <a href="#"> ĐĂNG KÍ</a>
	                                </div>
	                            </div>
	                            <div class="sign-up__buttons">
									<button class="btn btn--register" type="submit" name="submit">Gửi yêu cầu</button>
	                               
	                                <button class="btn btn--signin" type="reset">Nhập lại</button>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end error section -->
	<!-- logo carousel -->
	<div class="logo-carousel-section">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="logo-carousel-inner">
	                    <div class="single-logo-item">
	                        <img src="assets/img/company-logos/1.png" alt="">
	                    </div>
	                    <div class="single-logo-item">
	                        <img src="assets/img/company-logos/2.png" alt="">
	                    </div>
	                    <div class="single-logo-item">
	                        <img src="assets/img/company-logos/3.png" alt="">
	                    </div>
	                    <div class="single-logo-item">
	                        <img src="assets/img/company-logos/4.png" alt="">
	                    </div>
	                    <div class="single-logo-item">
	                        <img src="assets/img/company-logos/5.png" alt="">
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- end logo carousel -->
	
	<link rel="stylesheet" href="../view/assets/css/quenmk.css">