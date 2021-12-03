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
                    <a class="navbar-brand" href="#">Bình luận</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
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
                                <h4 class="title">Danh sách bình luận</h4>
                                <p class="category"></p>
                            </div>
                            <br>
             <form action="" method="post">          
                    <label for="cars">Chọn sản phẩm bạn muốn lọc:</label>
                     <select name="myselect" id="myselect" onchange="this.form.submit()">
                     <?php $sp=loadsp_all();
                            foreach($sp as $pro){
                                extract($pro);
                       ?>   
                        <option value="<?php echo $ma_san_pham?>"><?php echo $ten_san_pham?></option>

                        <?php } ?>
                      </select>
                 </form> 
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover">
                                    <thead>
                                        <th class="product-id">ID</th>
                                        <th class="product-ten">Tên</th>
                                        <th class="product-tenloai">Tên loại</th>
                                        <th class="product-hinh">Hình ảnh</th>
                                        <th class="product-noidung">Nội dung bình luận</th>
                                        <th class="product-thoigian">Thời gian bình luận</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                     <?php
                                     if(isset($_POST['myselect'])){
                                         $car=$_POST['myselect'];
                                         echo $car;
                                     }

                                     if(isset($car)){
                                        $binhluan= loadAll_bl_sanpham($car);
                                     }else{
                                        $binhluan=loadAll_bl();
                                     }

                                     
                                     foreach($binhluan as $com){
                                         extract($com);
                                         $ma_sp=$ma_san_pham;
                                            $sanpham=loadsp($ma_sp);
                                            extract($sanpham);
                                            $url_hinh="";                                
                                            if(isset($image)&&!$image==""){
                                                $file = explode(",",substr($image, 0, -1));
                                            }else{
                                                $url_hinh="không có hình";
                                            }; 
                                    $imgpath = "../upload/" . $file[0];
                                      ?>   
                                        <tr>
                                            <td class="product-id"><?php  echo $ma_bl ?></td>
                                            <td class="product-ten"><?php  echo $username ?></td>
                                            <td class="product-tenloai"><?php  echo $ten_san_pham;?></td>
                                            <td class="product-hinh">
                                                <img src="<?=$imgpath?>" max-width="50px" alt="">
                                            </td>
                                            <td class="product-noidung"><?php  echo $noi_dung ?></td>
                                            <td class="product-thoigian"><?php  echo $ngay_bl ?></td>
                                            <td>
                                                <a href="index.php?act=del_bl&id=<?php  echo $ma_bl ?>"><input type="button" ><i class="pe-7s-trash fa-2x"></i></a>
                                            </td>
                                        </tr>
                              <?php } ?>
   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
