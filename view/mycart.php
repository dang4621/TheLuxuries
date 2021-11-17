<div class="cart-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<div class="cart-table-wrap">
					<table class="cart-table">
						<thead class="cart-table-head">
							<tr class="table-head-row">
								<th class="product-remove"></th>
								<th class="product-image">Ảnh sản phẩm</th>
								<th class="product-name">Tên</th>
								<th class="product-price">Giá</th>
								<th class="product-quantity">Số lượng</th>
								<th class="product-total">Tất cả</th>
							</tr>
						</thead>

						<form method="post" action="">
							<tbody>
								<?php 
								 if(!empty($_SESSION["shopping_cart"])){
									$tong=0;
									$total=0;
									$a=1;
									foreach ($_SESSION["shopping_cart"] as $value) {
										extract($value);
											$url_hinh="";                                
											if(isset($image)&&!$image==""){
												$file = explode(",",substr($image, 0, -1));
											}else{
												$url_hinh="không có hình";
											}; 
									$imgpath = "upload/" . $file[0];
									$hinhp = "<img src='" . $imgpath . "' height='80px'>";

								?>
								<tr class="table-body-row">
									<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><?= 	$hinhp ?></td>
									<td class="product-name"><?= $ten_san_pham ?></td>
									<td class="product-price"><?= $gia ?></td>
									<td class="product-quantity">
										<select name='quantity' class='quantity' onChange='this.form.submit()'>
										<?php for($i=1 ; $i<100 ; $i++){ ?>
											<option <?php if($quantity==$i) echo 'selected';?> value='<?=$i?>'> <?=$i?> </option>
										<?php  } ?>                                
									</select>
									</td>
									<td class="product-total">xxx vnd</td>
                           		</tr>
								<?php $a++; }}?>
							</tbody>
					</table>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="total-section">
					<table class="total-table">
						<thead class="total-table-head">
							<tr class="table-total-row">
								<th>Tất cả</th>
								<th>Giá</th>
							</tr>
						</thead>
						<tbody>
							<tr class="total-data">
								<td><strong>Tổng phụ: </strong></td>
								<td>$500</td>
							</tr>
							<tr class="total-data">
								<td><strong>Vận chuyển: </strong></td>
								<td>$45</td>
							</tr>
							<tr class="total-data">
								<td><strong>Tất cả: </strong></td>
								<td>$545</td>
							</tr>
						</tbody>
					</table>

					<div class="cart-buttons">
						<input class="boxed-btn" type="submit" name="cartup" value="cập nhập giỏ hàng">
						<a href="checkout.html" class="boxed-btn black">Kiểm tra lại</a>
					</div>
					</form>
					<?php


					if (isset($_POST['cartup'])) {
						unset($_SESSION['cart'][$_POST['quan'] == 0]);
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>