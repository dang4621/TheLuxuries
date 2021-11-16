<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Sửa sản phẩm</h2>
					</div>
					<div class="danhmuc" style="font-size: 15px;margin-bottom: 10px;">
						<b>Danh mục</b><br>
						<select name="id_dm" style="width:100px;">
							< <?php                                 
                                    foreach($danhmuc as $value){
                                        extract($value);
                                        echo '<option value="'.$ma_nhom_hang.'">'.$ten_nhom_hang.'</option>';
                                    }   
                                ?>
						</select>
					</div>
				 	<div id="form_status"></div>
					 <div class="contact-form">
                    <?php if(is_array($sanpham)){
                    extract($sanpham);
                    } ?>
					<div class="contact-form">
						<form method="POST" action="index.php?act=update_sp" id="fruitkha-contact" onSubmit="return valid_datas( this );">
							<p>
								<input type="hidden" name="id_sp" value="<?php echo($ma_san_pham) ?>">
								<input type="text"  name="ten_sp" class="product-name" value="<?php echo ($ten_san_pham)?>">
								<input type="number" min="1" max="999999999" name="gia"class="product-price" value="<?php echo ($gia_goc) ?>">
								<input type="number" min="1" max="999999999" placeholder="Giảm giá" name="giam_gia" value="<?php echo ($giam_gia) ?>">
								<input type="file" name="files[]" multiple ><br>
							</p>
							<p><input class="product-mota" name="mota" id="mota" cols="30" rows="10" value="<?php echo ($mo_ta) ?>" ></p>
							
							<div class="button">
							
								<p>
								<input type="submit" value="Cập nhật"></p>
								<a href="index.php?act=dssanpham"><input type="button" value="DANH SÁCH"></a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>