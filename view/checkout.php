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
												<p><input type="text" placeholder="Tên" name="name" required></p>
												<p><input type="email" placeholder="Email" name="email" required></p>
												<p><input type="text" placeholder="Địa chỉ" name="address" required ></p>
												<p><input type="tel" placeholder="Số điện thoại" name="sdt" required></p>
												<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Lời nhắn"></textarea></p>
													
										</div>
									</div>
								</div>
							</div>
							<div class="card single-accordion">
								<?php 							
								if(isset($_GET['pay'])) { ?>
									<input type="hidden"  name="payment" value="1">
								
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											Đã thanh toán qua Paypal
										</button>
									</h5>
								</div>
								<?php
								}else { ?>	
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
										<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											Phương thức thanh toán
										</button>
									</h5>
								</div>							
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
									<div class="card-body">
											<input type="radio"  name="payment" value="0" checked>
									  		<label for="html">Thanh toán lúc nhận hàng</label><br>
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
									<th>Chi tiết đơn hàng</th>
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
								<!-- <tr>
									<td><b>Tổng phụ</b> </td>
									<td>$190</td>
								</tr> -->
								<!-- <tr>
									<td><b>Vận chuyển</b></td>
									<td>$50</td>
								</tr> -->
								<tr>
									<td><b>Tất cả</b></td>
									<td id="tong">
										<?php
										if (!empty($_SESSION['shopping_cart'])) {
											$total = 0;
											foreach ($_SESSION['shopping_cart'] as $value) {
												extract($value);
												$total += $gia * $quantity;												
											}
											$_SESSION['total'] = $total;
										}
										print_r($_SESSION['total']);
										?></td>
										<input type="hidden" name="total" value="">
										<input type="hidden" name="magiamgia" value="">
								</tr>
								<tr>								
									<td id="thongbao" colspan="2">Áp dụng mã giảm giá để được nhận ưu đãi</td>
								</tr>
							</tbody>
						</table>
						<input style="margin-top :10px" class="boxed-btn" type="submit" value="đồng ý đặt hàng" name="sethang">
						<?php
							if (isset($thongbao)) {
								echo '<p>' . $thongbao . '</p>';
							}
						?>	</form>
							<!-- <a href="index.php?act=delcode">Loại bỏ</a>									 -->
							<br>
							<div style="padding: 10px;">
								Mã giảm giá
								<input type="text" id="mgg" name="mgg">								
								<input class="boxed-btn32" type="button" id="check_mgg" name="check_mgg" value="Áp dụng">	
									
							</div>
							
														
						<br>
						
						
					</div>
					<br>
					<?php require 'view/paybutton.php'; ?>
				</div>
			</div>
		</div>
	</div>
	

	
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

	<script  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>  
    <script type="text/javascript">
        $('#check_mgg').on('click',function(e){
			e.preventDefault();
            var mgg = $('#mgg').val();
            if(mgg == ''){
                alert("Bạn chưa nhập mã giảm giá");
            }else{
                $.ajax({
                    url : 'http://localhost/theluxuries/view/total.php',
                    method : 'POST',
					dataType : 'json', 
                    data : {
                        mgg:mgg,
                    },success:function(data){
						console.log(data);
                        if(data[1] == false){
							$('#thongbao').html(data[0])
							
						}else{
							$('#thongbao').html(data[0]);
							$('#tong').html(data[1]);
							$('[name=total]').val(data[1])
							$('[name=magiamgia]').val(data[2])
						}
                        
                    }
                })
            }
        })
    </script>