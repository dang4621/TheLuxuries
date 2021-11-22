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
                <a class="navbar-brand" href="#">Thương hiệu</a>
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
                            <h4 class="title">Thêm Thương Hiệu</h4>
                            <p class="category"></p>
                        </div>
                        <div class="contact-form">
                        <?php if(is_array($nhom_th)){
                    extract($nhom_th);
                    } ?>
                            <form action="" method="POST" id="fruitkha-contact" name="" enctype="multipart/form-data">

                                <p>
                                    <b>TÊN HÃNG SẢN XUẤT</b><br>
                                    <input type="hidden" name="id_dm" value="<?php echo($ma_thuong_hieu) ?>">
                                    <input type="text" name="ten_th" value="<?php echo($ten_thuong_hieu) ?>"
                                        style="width:100%;">
                                </p>
                                <p>
                                    <b>XUẤT XỨ</b><br>
                                    <input type="text" name="xuatxu" value="<?php echo($xuat_xu) ?>"
                                        style="width:100%;">
                                </p>
                                <p>
                                    <b>ẢNH</b><br>
                                    <input type="hidden" name="logo2" value="<?php echo($logo) ?>">
                                    <input type="file" name="ten_logo" value="<?php echo($logo) ?>" style="width:100%;">
                                </p>
                                <img src="../upload/<?php echo($logo) ?>" alt="">
                                <div class="button">
                                    <input type="submit" name="submit" value="Cập nhật">&nbsp;&nbsp;
                                    <input type="reset" value="Nhập lại">&nbsp;&nbsp;
                                    <a href="index.php?act=dsthuonghie"><input type="button" value="Danh sách"></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>