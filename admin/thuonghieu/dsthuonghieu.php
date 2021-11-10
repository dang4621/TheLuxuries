<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12" style="flex: 100%;max-width: 100%;">
					<div class="cart-table-wrap">
						<table class="cart-table" >
							<thead class="cart-table-head" >
								<tr class="table-head-row" style="background-color: #051922;color: #F28123;">
									<th class="product-remove">Mã hãng sản xuất</th>
									<th class="product-name">Tên hãng sản xuất</th>
									<th class="product-image">Logo</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
                                                            <?php 
                                                            $thuonghieu=loadAll_th();
                                                            
                                                            foreach ($thuonghieu as $value){
                                                                extract($value);
                                                                
                                                                echo ''
                                                                . '<tr class="table-body-row">
									<td class="product-remove">'.$ma_thuong_hieu.'</td>
									<td class="product-name">'.$ten_thuong_hieu.'</td>
									<td class="product-image"><img src="../upload/'.$logo.'" alt=""></td>
									<td>
									<a href="index.php?act=up_th&id='.$ma_thuong_hieu.'"><input type="button" value="Sửa"></a>
									<a href="index.php?act=del_th&id='.$ma_thuong_hieu.'"><input type="button" value="Xóa"></a>
									</td>
								</tr>	';
                                                            }
                                                            ?>
									
							</tbody>
						</table>
						<div class="buttons">
							<a href="index.php?act=add_th" class="boxed-btn">Nhập thêm</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>