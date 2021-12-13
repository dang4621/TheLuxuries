
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
                <a class="navbar-brand" href="#">Thêm loại sản phẩm</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="pe-7s-global"></i>
                            <b class="caret hidden-lg hidden-md"></b>
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
                        <a href="#">
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
                    <li class="separator hidden-lg"></li>
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
                            <h4 class="title">Thuộc tính sản phẩm</h4>
                            <p class="category"></p>
                            <br>
                            <br>
                        </div>
                        <div class="contact-form12">
                            <form action="index.php?act=cp_edit_tt" method="post"  name="">
                            <?php 
                                $i=1;
                                foreach ($thuoctinh as $value){
                                    extract($value);
                                    ?>
                                        <input type="hidden" name="id_tt_<?=$i?>" value="<?= $id_tt ?>">
                                        Màu : <input type="text" name="color_<?=$i?>" value="<?= $color ?>"> 
                                        Size : <input type="text" name="size_<?=$i?>" value=" <?= $size ?>">
                                        Số lượng : <input type="number" name="so_luong_<?=$i?>" value="<?= $so_luong ?>">
                                        <br>
                                    <?php
                                    $i++;
                                }
                                ?>
                                <input type="hidden" name="i" value="<?= $i ?>">
                                <?php
                            ?>
                            <input type="submit" name="edit" value="Sửa">
                            </form>                              
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
