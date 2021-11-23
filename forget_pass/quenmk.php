	<?php   ob_start(); 
		session_start();
		include '../model/pdo.php';
 		include '../model/taikhoan.php';
		include '../mail/index.php';
		$mail = new Mailler();
		if(isset($_POST['submit'])){
			$error = array();
			$email = $_POST['email'];
			if($email == ""){
				$error['email']= 'Email không được để trống';
			}else{
				$result = get_email($email);
				if (is_array($result)) {
					$code = substr(rand(0,999999),0,6);
					$title = "Quên mật khẩu";
					$content = "Mã xác nhận của bạn là : <span style = 'color : green '>".$code."</span>";
					$mail->sendMail($title,$content,$email);

					$_SESSION['mail']= $email ;
					$_SESSION['codes'] = $code;
					header('location : xacnhan.php');
				} else {
					echo("<h3 style='color : red ;'>Email không tồn tại</h3><br>");
				}
			}
		}
	?>
		<link rel="stylesheet" href="../view/assets/css/quenmk.css">
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