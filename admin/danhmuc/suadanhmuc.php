<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Sửa danh mục</h2>
					</div>
					<div class="contact-form">
                    <?php if(is_array($nhom_hang)){
                    extract($nhom_hang);
                    } ?>
						<form action="index.php?act=update_dm" method="post" id="fruitkha-contact"  name="">
							<!-- <p>
								<b>MÃ LOẠI</b><br>
								<input type="text" name="maloai" style="width:100%;" disabled value="Auto">
							</p> -->
							<p>
								<b>TÊN LOẠI SẢN PHẨM</b><br>
                                <input type="hidden" name="id_dm" value="<?php echo($ma_nhom_hang) ?>">
								<input type="text"name="ten_dm" value="<?php echo($ten_nhom_hang) ?>" style="width:100%;">
							</p>
							<div class="button">
								<p><input type="submit" name="submit" value="Cập nhật"></p>
								<a href="index.php?act=dsdanhmuc"><input type="button" value="DANH SÁCH"></a>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>