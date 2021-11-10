<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Sửa danh mục</h2>
					</div>
					<div class="contact-form">
                    <?php if(is_array($nhom_th)){
                    extract($nhom_th);
                    } ?>
			<form action="" method="post" id="fruitkha-contact"  name="" enctype="multipart/form-data">
							<!-- <p>
								<b>MÃ LOẠI</b><br>
								<input type="text" name="maloai" style="width:100%;" disabled value="Auto">
							</p> -->
				       <p>
					<b>TÊN THƯƠNG HIỆU</b><br>
                                <input type="hidden" name="id_dm" value="<?php echo($ma_thuong_hieu) ?>">
			        <input type="text"name="ten_th" value="<?php echo($ten_thuong_hieu) ?>" style="width:100%;">
					</p>
                                        
                                       <p>
					<b>XUẤT XỨ</b><br>
                                
			        <input type="text"name="xuatxu" value="<?php echo($xuat_xu) ?>" style="width:100%;">
					</p>  
                                  <p>      
                                    <b>LOGO</b><br>
                                <input type="hidden" name="logo2" value="<?php echo($logo) ?>">   
                                
			        <input type="file"name="ten_logo" value="<?php echo($logo) ?>" style="width:100%;">
				    </p>  
                                        
                                    <img src="../upload/<?php echo($logo) ?>" alt="" style="width: 200px;height: 200px;">
                                        
                                                    
                                                    
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