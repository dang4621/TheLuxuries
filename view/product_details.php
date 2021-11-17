<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Xem thêm chi tiết</p>
					<h1>Single Product</h1>
					
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->
<?php 
						// $abc = test();
						// echo("<pre>");
						// print_r($abc);
					?>
<!-- single product -->
<div class="single-product mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="single-product-img">
					<!--<img src="assets/img/products/product-img-5.jpg"> -->
					<div class="slideshow-container">
						<?php
							if (is_array($onesp)) {
								extract($onesp);
								$file = explode(",", substr($image, 0));
							} 
							foreach($file as $id => $value){ 
								$hinh=$value;
								echo('
								<div class="mySlides1">
									<img src="upload/'.$value.'" style="width:100%">
								</div>
								');
						}?>					
						<a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
						<a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
					</div>
					<script>
						var slideIndex = [1, 1];
						var slideId = ["mySlides1", "mySlides2"]
						showSlides(1, 0);
						showSlides(1, 1);

						function plusSlides(n, no) {
							showSlides(slideIndex[no] += n, no);
						}

						function showSlides(n, no) {
							var i;
							var x = document.getElementsByClassName(slideId[no]);
							if (n > x.length) {
								slideIndex[no] = 1
							}
							if (n < 1) {
								slideIndex[no] = x.length
							}
							for (i = 0; i < x.length; i++) {
								x[i].style.display = "none";
							}
							x[slideIndex[no] - 1].style.display = "block";
						}
					</script>
				</div>
			</div>


			<?php
			if (is_array($onesp)) {
				extract($onesp);
				$ma_nh = $ma_nhom_hang;
				$ma_sp = $ma_san_pham;
				$ten_sp=$ten_san_pham;
				$gia_sp=$giam_gia;
			?>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?= $ten_san_pham ?></h3>
						<p class="single-product-pricing"><span>Per Products</span> <?= $giam_gia ?></p>
						<p><?= $mo_ta ?></p>
						<div class="them">
							<div class="size">
								<h2>Size:</h2>

					<form action="" method="POST" name="tt" id="select">
									<?php
									$sql = "SELECT*FROM thuoc_tinh WHERE ma_san_pham=$ma_sp";
									$cungloai = pdo_query($sql);
									foreach ($cungloai as $loai) {
										extract($loai);
										echo '	<input name="size" type="radio" id="html" value="' . $size . '">
					  							<label for="html">' . $size . '</label>';
									?>
									<?php } ?>
								
								
							</div>
							<div class="mau">
								<h2>Màu</h2>
								<?php
								$sql = "SELECT*FROM thuoc_tinh WHERE ma_san_pham=$ma_sp";
								$cungloai = pdo_query($sql);
								$i=0;
								foreach ($cungloai as $loai) {
									extract($loai);
									$i++;
								?>
									<input type="radio" class="radio" id="radio-<?= $i ?>" name="color" value="<?= $color ?>" />
									<label for="radio-<?= $i ?>" style="background: <?= $color ?>;"></label>
								<?php } ?>

							</div>
						</div>

<<<<<<< HEAD
						

						<div class="single-product-form">
							
								<input type="number" value="1" name="quan">
							
							<a href="" class="cart-btn"><i class="fas fa-shopping-cart"><input type="submit" name="addtocart" value="thêm  giỏ hàng"></i></a>
							<p><strong>Categories: </strong><?= $ma_nh ?></p>
							</form>
=======
						<div class="single-product-form">
							<form action="index.html">
								<input type="number" placeholder="0">
							</form>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ</a>
							<p><strong>Sản phẩm thuộc thương hiệu: </strong><?= $ten_thuong_hieu ?></p>
>>>>>>> 1ef2af470825f0f7de144a6a910f2d42829448a4
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				<?php } ?>
				</div>
		</div>
		<?php 
		if(isset($_POST['addtocart'])){
			$username= $_SESSION['user']['name'];
			$userid=$_SESSION['user']['name'];
			$quantity=$_POST['quan'];
			$color=$_POST['color'];
			$size=$_POST['size'];
			$hinhsp=$hinh;
			$tensp=$ten_sp;
			$giasp=$gia_sp;
            $ma_sp=$ma_sp;
			settype($giasp, "int");
			settype($quantity, "int");
			$total=$giasp*$quantity;

			$spadd=[$ma_sp,$tensp,$total,$hinhsp,$quantity,$color,$size];
            array_push($_SESSION['cart'],$spadd);
	        echo'thành công';
		}
		 ?>


	</div>
</div>
<!-- end single product -->

<!-- more products -->
<div class="more-products mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3>Những sản phẩm<span class="orange-text"> tương tự</span></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
				</div>
			</div>
		</div>
		<div class="row">

			<?php
			$sql = "SELECT*FROM san_pham WHERE ma_nhom_hang=$ma_nh LIMIT 3";
			$cungloai = pdo_query($sql);

			foreach ($cungloai as $loai) {
				extract($loai);
				$file = explode(",", substr($image, 0, -1));
				echo '<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="./upload/' . $file[0] . '" style="height:200px" ></a>
						</div>
						<h3>' . $ten_san_pham . '</h3>
<<<<<<< HEAD
						<p class="product-price"><span>Per Kg</span> ' . $giam_gia . '$ </p>
						<a href="index.php?act=detail&id=' . $ma_san_pham . '" class="cart-btn"><i class="fas fa-shopping-cart"></i> Chi tiết</a>
=======
						<p class="product-price"> ' . $gia_goc . ' VND </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ</a>
>>>>>>> 1ef2af470825f0f7de144a6a910f2d42829448a4
					</div>
				</div>';
			}
			?>



		</div>
	</div>
</div>
<!-- end more products -->

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