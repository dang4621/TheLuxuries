	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Kiểm tra sản phẩm</h1>
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
								<form method="post" action="">
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
						    <div class="card-header" id="headingTwo">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          Địa chỉ vận chuyển
						        </button>
						      </h5>
						    </div>
						    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="shipping-address-form">
						        	<p>Mẫu địa chỉ vận chuyển của bạn ở đây.</p>
						        </div>
						      </div>
						    </div>
						  </div>
						  <div class="card single-accordion">
						    <div class="card-header" id="headingThree">
						      <h5 class="mb-0">
						        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						          Chi tiết thẻ
						        </button>
						      </h5>
						    </div>
						    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="card-details">
						        	<p>Chi tiết thẻ của bạn đi đến đây.</p>
						        </div>
						      </div>
						    </div>
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
									<th>Giá</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Sản phẩm</td>
									<td>Tất cả</td>
								</tr>
                    <?php if(!empty($_SESSION['shopping_cart'])){
                        $total=0;
						$a=1;
						foreach ($_SESSION['shopping_cart'] as $value){
                          extract($value);
						?>
								<tr>
									<td><?= $ten_san_pham ?></td>
									<td><?= $tt[$a]=$gia*$quantity ; ?></td>
								</tr>
               <?php $a++; }


			 } ?>
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td>Tổng phụ</td>
									<td>$190</td>
								</tr>
								<tr>
									<td>Vận chuyển</td>
									<td>$50</td>
								</tr>
								<tr>
									<td>Tất cả</td>
									<td><?php 
									if(!empty($a)){
											for($j=1;$j<$a;$j++){
											$total+=$tt[$j];
											}
										print_r($total);
										}
									?></td>
								</tr>
							</tbody>
						</table>
						<input class="boxed-btn" type="submit" value="đồng ý đặt hàng" name="sethang"> 
					</div>

					<?php 
                    	if(isset($_POST['sethang'])){
							$ngaydathang=date('h:i:sa d/m/y');
							$idtk=$_SESSION['user']['id_tai_khoan'];
							$thanhtien=$total;
							$phiship=5000;
							$hoten=$_POST['name'];
							$email=$_POST['email'];
							$address=$_POST['address'];
							$sdt=$_POST['sdt'];
							$random =rand(10000,99999999) ;
							$_SESSION['idchitiet']=$random;
							$so_hoa_don=$_SESSION['idchitiet'];
							$idtk=$_SESSION['user']['id_tai_khoan'];
                                                  
					$sql="insert into hoa_don(so_hoa_don,id_tai_khoan,ngay_hoa_don,thanh_tien,phi_ship,trang_thai,ho_ten,sdt,dia_chi ) value(?,?,?,?,?,?,?,?,?)";
					pdo_execute($sql,$so_hoa_don,$idtk,$ngaydathang,$thanhtien,$phiship,1,$hoten,$sdt,$address);
					header("Location:index.php?act=confirm");

                       



									}
					?>


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
