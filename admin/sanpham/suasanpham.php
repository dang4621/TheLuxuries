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
                <a class="navbar-brand" href="#">Thêm sản phẩm</a>
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
                            <h4 class="title">Sản phẩm</h4>
                            <p class="category"></p>
                        </div>
                        <br>
                        <br>
                        <div id="form_status"></div>
                        <div class="contact1">
                            <?php if(is_array($sanpham)){
                               extract($sanpham);
                    } ?>
                            <form id="add_sp" action="index.php?act=sp_confirm" method="post"
                                enctype="multipart/form-data">
                                <b>Danh mục</b>
                                <select name="id_dm" style="width:150px;height:30px;margin:20px 10px;">
                                    <?php                                 
										foreach($danhmuc as $value){
											extract($value);
											echo '<option value="'.$ma_nhom_hang.'">'.$ten_nhom_hang.'</option>';
										}   
									?>
                                </select>
                                <p>
                                    <input type="text" placeholder="Tên" name="ten_sp" required
                                        value="<?php echo($ten_san_pham) ?>" style="width:100%;">&nbsp;
                                </p>
                                <p>
                                    <input type="number" min="1" max="999999999" placeholder="Giá" name="gia_goc"
                                        value="<?php echo ($gia_goc) ?>" style="width:100%;">&nbsp;
                                </p>
                                <p>
                                    <input type="number" min="1" max="999999999" placeholder="Giảm giá" name="giam_gia"
                                        value="<?php echo ($giam_gia) ?>" style="width:100%;">&nbsp;
                                </p>
                                <p><input type="file" name="anhsp[]" multiple="multiple" value="<?php echo ($image) ?>"
                                        style="padding:5px;width:60%;">&nbsp;</p>
                                <p><textarea name="mota" id="mota" cols="30" rows="10" placeholder="Mô tả"
                                        value="<?php echo ($mo_ta) ?>" style="width:100%;"></textarea></p>
                            </form>
                        </div>
                    </div>
                    <div class="button">
                        <input form="add_sp" name="submit" type="submit" value="Cập nhật">&nbsp;&nbsp;
                        <input type="reset" value="Nhập lại">&nbsp;&nbsp;
                        <a href="index.php?act=dssanpham"><input type="button" value="Danh sách"></a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>