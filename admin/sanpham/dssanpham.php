<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Sản phẩm</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="pe-7s-global"></i>
                            <b class="caret hidden-sm hidden-xs"></b>
                            <span class="notification hidden-sm hidden-xs">5</span>
                            <p class="hidden-lg hidden-md">
                                Thông báo
                                <b class="caret"></b>
                            </p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Thông báo 1</a></li>
                            <li><a href="#">Thông báo 2</a></li>
                            <li><a href="#">Thông báo 3</a></li>
                            <li><a href="#">Thông báo 4</a></li>
                            <li><a href="#">Thông báo 5</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-search"></i>
                            <p class="hidden-lg hidden-md">Search</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="">
                            <p>Tài khoản</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>
                                Thả xuống
                                <b class="caret"></b>
                            </p>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <p>Đăng xuất</p>
                        </a>
                    </li>
                    <li class="separator hidden-lg hidden-md"></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="header">
                            <h4 class="title">Danh sách sản phẩm</h4>
                            <p class="category"></p>
                        </div>
                        <br>
                        <img src="">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                    <th class="product-id">ID</th>
                                    <th class="product-tenloai">Tên loại</th>
                                    <th class="product-hinh">Hình ảnh</th>
                                    <th class="product-gia">Giá</th>
                                    <th class="product-view">Luợt xem</th>
                                    <th></th>
                                </thead>
                                <tbody>
                           <?php
							 foreach($sanpham as $value){ 
								extract($value);
                                $url_hinh="";                                
                                if(isset($image)&&!$image==""){
                                    $file = explode(",",substr($image, 0, -1));
                                }else{
                                   $file[0]="không có hình";
                                }; 
                                echo('
                                            <tr>
                                                <td class="product-id">'.$ma_san_pham.'</td>
                                                <td class="product-tenloai">'.$ten_san_pham.'</td>
                                                <td class="product-hinh"><img src="../upload/'.$file[0].'"></td>
                                                <td class="product-gia">'.$gia_goc.'</td>
                                                <td class="product-view">'.$view.'</td>
                                                <td>
                                                    <!--sửa-->
                                                    <a href="index.php?act=edit_sp&id='.$ma_san_pham.'"><input type="button"><i class="pe-7s-config fa-2x"></i></a>
                                                    <!--Xoá-->
                                                    <a href="index.php?act=del_sp&id='.$ma_san_pham.'"><i class="pe-7s-trash fa-2x"></i></a>
                                                </td>
                                            </tr>');
                                        } ?>
                                </tbody>
                            </table>
                            <div class="buttons">
                                <a href="index.php?act=add_sp" class="boxed-btn">Nhập thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
								<!-- extract($value);
									$url_hinh="";                                
									if(isset($image)&&!$image==""){
										$file = explode(",",substr($image, 0, -1));
									}else{
										$url_hinh="không có hình";
									}; 
									echo(' 
										<tr class="table-body-row">
											<td class="product-remove">'.$ma_san_pham.'</td>
											<td class="product-name">'.$ten_san_pham.'</td>
											<td class="product-image"><img src="../upload/'.$file[0].'" alt=""></td>
											<td class="product-price">'.$gia_goc.'</td>
											<td class="product-mota">'.$mo_ta.'</td>
										<td>
											<a href="index.php?act=edit_sp&id='.$ma_san_pham.'">
												<input type="button" value="Sửa">
											</a>
											<a href="index.php?act=del_sp&id='.$ma_san_pham.'">
												<input type="button" value="Xóa">
											</a>
										</td>
										</tr>
										
										');

							} ?>			 -->
								<!-- <tr class="table-body-row">
									<td class="product-remove">1</td>
									<td class="product-name">Strawberry</td>
									<td class="product-image"><img src="assets/img/products/product-img-1.jpg" alt=""></td>
									<td class="product-price">$85</td>
									<td>
									<a href="sanpham.html"><input type="button" value="Sửa"></a>
									<a href=""><input type="button" value="Xóa"></a>
									</td>
								</tr>
								<tr class="table-body-row">
									<td class="product-remove">2</td>
									<td class="product-name">Strawberry</td>
									<td class="product-image"><img src="assets/img/products/product-img-2.jpg" alt=""></td>
									<td class="product-price">$85</td>
									<td>
										<a href="sanpham.html"><input type="button" value="Sửa"></a>
										<a href=""><input type="button" value="Xóa"></a>
										</td>
								</tr>
								<tr class="table-body-row">
									<td class="product-remove">3</td>
									<td class="product-name">Strawberry</td>
									<td class="product-image"><img src="assets/img/products/product-img-3.jpg" alt=""></td>
									<td class="product-price">$85</td>
									<td>
									<a href="sanpham.html"><input type="button" value="Sửa"></a>
									<a href=""><input type="button" value="Xóa"></a>
								    </td>
								</tr> -->
							<!-- </tbody>
						</table>
						<div class="buttons">
							<a href="index.php?act=add_sp" class="boxed-btn">Nhập thêm</a>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
