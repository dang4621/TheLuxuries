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
            <a class="navbar-brand" href="#">Đơn hàng</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
              </li>
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
                  <h4 class="title">Danh sách đơn hàng</h4>
                  <p class="category"></p>
                </div>
                <br>
                <div class="content table-responsive table-full-width">
                  <table class="table table-hover">
                    <thead>
                      <th class="product-id">MÃ HOÁ ĐƠN</th>
                      <th class="product-tentk">HỌ TÊN</th>
                      <th class="product-hinh">SỐ ĐIỆN THOẠI</th>
                      <th class="product-diachi">NGÀY ĐẶT</th>
                      <th class="product-gia">TRẠNG THÁI</th>
                      <th class="product-pttt">TỔNG TIỀN</th>
                      <th class="product-trangthai"></th>
                      <th></th>
                    </thead>
                    <tbody>
                    <?php 
              $donhang=load_all_dh();
							foreach($donhang as $value){ 
								    extract($value); ?>
                      <tr>
                        <td class="product-id"><?php echo $so_hoa_don; ?></td>
                        <td class="product-tentk"><?php echo $ho_ten; ?></td>
                        <td class="product-diachi"><?php echo $sdt; ?></td>
                        <td class="product-gia"><?php echo $ngay_hoa_don; ?></td>
                        <td class="product-pttt">
                        <?php 
									if($trang_thai==1){
										echo'<span1 style="background-color: #D3E4CD;">Đang chuẩn bị hàng</span1>';
									}elseif($trang_thai==0){
                                         echo'<span1 style="background-color: #F3950D;">Đang xác nhận</span1>';
									} 
									elseif($trang_thai==2){
										echo'<span1 style="background-color: #FF87CA;">Đang giao</span1>';
								   	} 
								   	elseif($trang_thai==3){
									echo'<span1 style="background-color: #71DFE7;">Đã giao</span1>';
							   		} 
									elseif($trang_thai==4){
									echo'<span1 style="background-color: #71DFE7;">Đã hủy</span1>';
							   		} 
									?>
                        </td>
                        <td class="product-trangthai"><?php echo $thanh_tien; ?><span>&nbsp;USĐ</span></td>
                        <td>
                          <a href="index.php?act=cartde&id=<?php echo $so_hoa_don; ?>"><input type="button"><i class="pe-7s-plus fa-2x"></i></a>
                          <a href="index.php?act=del_dh&id=<?php echo $so_hoa_don; ?>"><input type="button"><i class="pe-7s-trash fa-2x"></i></a>
                        </td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>