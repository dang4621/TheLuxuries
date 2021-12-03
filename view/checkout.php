	<!-- breadcrumb-section -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showlert2(){
        Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
    }
</script>
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Tao nhã chính là sự tinh giản</p>
						<h1>Thông tin đặt hàng</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->


	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
							<div class="card single-accordion">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Địa chỉ thanh toán
										</button>
									</h5>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<div class="billing-address-form">

										
										<form method="post" action="index.php?act=confirm">
												<p><input type="text" placeholder="Tên" name="name"></p>
												<p><input type="email" placeholder="Email" name="email"></p>
												<p><input type="text" placeholder="Địa chỉ" name="address"></p>
												<p><input type="tel" placeholder="Số điện thoại" name="sdt"></p>
												<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Lời nhắn"></textarea></p>
													
										</div>
									</div>
								</div>
							</div>
							<div class="card single-accordion">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											Phương thức thanh toán
										</button>
									</h5>
								</div>
								<?php 
							
								if(isset($_GET['pay'])) {
									?>
									<input type="radio"  name="payment" value="1">
									<?php
								}else { ?>
								
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
									<div class="card-body">
											<input type="radio"  name="payment" value="0" checked>
									  	<label for="html">Thanh toán lúc nhận hàng</label><br>
									  		<input type="radio"  name="payment" value="1">
									  	<label for="css">Thanh toán qua Vnpay </label><br>
									</div>
									
								</div>
							<?php }?>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Chi tiết đơn hàng của bạn</th>
									<th>Số lượng</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<!-- <tr>
									<td>Sản phẩm</td>
									<td>Tất cả</td>
								</tr> -->
								<?php if (!empty($_SESSION['shopping_cart'])) {
									$total = 0;
									$a = 1;
									foreach ($_SESSION['shopping_cart'] as $value) {
										extract($value);
										$tt[$a] = $gia * $quantity;
								?>
										<tr>
											<td><?= $ten_san_pham ?></td>
											<td><?=  $quantity; ?></td>
										</tr>
								<?php $a++;
									}
								} ?>
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td><b>Tổng phụ</b> </td>
									<td>$190</td>
								</tr>
								<tr>
									<td><b>Vận chuyển</b></td>
									<td>$50</td>
								</tr>
								<tr>
									<td><b>Tất cả</b></td>
									<td><?php
										if (!empty($a)) {
											for ($j = 1; $j < $a; $j++) {
												$total += $tt[$j];
											}
											print_r($total);
										}
										?></td>
										<input type="hidden" name="total" value="<?= $total ?>">
								</tr>
							</tbody>
						</table>
						<br>
						<input class="boxed-btn" type="submit" value="đồng ý đặt hàng" name="sethang">
					</div>
				</div>
			</div>
		</div>
	</div>

		</form>
	<!-- end check out section -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="view/assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="view/assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="view/assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="view/assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="view/assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->