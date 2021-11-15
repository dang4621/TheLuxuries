	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle"> Thời trang luôn thay đổi </p>
							<h1> Nhưng phong cách mãi mãi trường tồn</h1>
							<div class="hero-btns">
								<a href="shop.html" class="boxed-btn">Cửa hàng</a>
								<a href="contact.html" class="boxed-btn">Liên hệ</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Miễn phí vận chuyển</h3>
							<p>Khi mua hàng hoá đơn trên 500k</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>Luôn hỗ trợ 24/7</h3>
							<p>Nhận hỗ trợ cả ngày</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Hoàn trả</h3>
							<p>Được hoàn trả trong vòng 3 ngày !</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Sản Phẩm</span> Của Chúng Tôi</h3>
						<p>Luôn mang lại sự tự tin của chính bạn</p>
					</div>
				</div>
			</div>

			<div class="row">
				<?php 
                     foreach($ba_sp as $value){                         
                        extract($value);
                            $url_hinh="";                                
                            if(isset($image)&&!$image==""){
                                $hinh=$image;
                                $path_hinh="./content/uploads/$hinh";
                                $url_hinh=$path_hinh;
                            }else{
                                $url_hinh="không có hình";
                            }; 
                           $gia_goc = number_format($gia_goc, 0, ",", "."); ?>

					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
							</div>
							<h3><?= $ten_san_pham ?></h3>
							<p class="product-price"><span><?= $ma_thuong_hieu ?></span> <?= $gia_goc ?> </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ</a>
							</div>
					</div>	
				<?php }?>
				

			</div>
		</div>
	</div>
	<!-- end product section -->
	<!-- cart banner section -->
	<!-- end cart banner section -->
	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/dang.jpg" alt="">
							</div>
							<div class="client-meta">
								<h3>Hoàng Hải Đăng <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
									beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis
									iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/truyen.jpg" alt="">
							</div>
							<div class="client-meta">
								<h3>Phan Ngọc Truyền <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
									beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis
									iste natus error sit voluptatem accusantium "</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/dinh.jpg" alt="">
							</div>
							<div class="client-meta">
								<h3>Phan Công Đỉnh <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
									beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis
									iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/chuong.jpg" alt="">
							</div>
							<div class="client-meta">
								<h3>Huỳnh Quốc Chương <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
                                    beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis
                                    iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/anh.jpg" alt="">
							</div>
							<div class="client-meta">
								<h3>Chế Hoài Anh <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
                                    beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis
                                    iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->

	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="abt-bg">
						<a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i
								class="fas fa-play"></i></a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Từ năm 1999</p>
						<h2>Chúng tôi là <span class="orange-text">The Luxuries</span></h2>
						<p>The Luxuries là một thương hiệu của hy vọng và nguồn cảm hứng. Chúng tôi tin tưởng vào sức mạnh của 
						thời trang để mang lại những điều tốt nhất cho con người và tiềm năng của con người để mang lại 
						những điều tốt nhất trong thế giới của chúng ta.</p>
						<p>Cuối cùng, mọi thứ chúng tôi làm đều dựa trên một mục đích lớn hơn: xác định lại tiềm năng của con người - trong thời trang và trên toàn cầu.</p>
						<a href="about.html" class="boxed-btn mt-4">Biết thêm</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->

	<!-- shop banner -->
	<section class="shop-banner">
		<div class="container">
			<h3>Giảm giá tháng 11 đang diễn ra! <br> với chiết khấu <span class="orange-text">LỚN...</span></h3>
			<div class="sale-percent"><span>Doanh thu! <br> Lên đến</span>50%</div>
			<a href="shop.html" class="cart-btn btn-lg">Mua Ngay</a>
		</div>
	</section>
	<!-- end shop banner -->
	<!-- latest news -->
	<!-- end latest news -->
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