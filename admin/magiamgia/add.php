<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  
<div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
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
                                    <h4 class="title">Thêm mã giảm giá</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="contact-form">
                                    <form action="" method="POST" name="create">
                                        <button type="submit" name="create">Tạo mã</button>
                                    </form>
                                    <?php
                                     function generateRandomString($length = 10) {
                                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                        $charactersLength = strlen($characters);
                                        $randomString = '';
                                        for ($i = 0; $i < $length; $i++) {
                                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                                        }
                                        return $randomString;
                                        }
                                        $code ='';
                                        if(isset($_POST['create']) && empty($code)){
                                            $code = generateRandomString();                                
                                        }
                                    ?>
                                    <form action="" method="POST" id="fruitkha-contact" name="add_mgg" enctype="multipart/form-data">
                                        <input type="hidden" name="code_mgg" value="<?php if(!empty($code)){print_r($code);} ?>">
                                        <?php if(!empty($code)){
                                            print_r(" <p>Mã code của bạn là : </p><h2>".$code."</h2>");
                                        } ?>
                                        <br>
                                        <p>Ngày bắt đầu :</p>
                                        <input type="datetime-local" name="start">
                                        <br>
                                        <p>Ngày kết thúc :</p>
                                        <input type="datetime-local" name="end">
                                        <br>
                                        <p>Số % giảm trên tổng hóa đơn</p>
                                        <input type="number" value="1" name="value_gg" min="1" max="80">
                                        <br>
                                        <p>Title</p>
                                        <input type="text" name="title_mgg">
                                        <br>
                                        <button type="submit" name="add_mgg"> Thêm mã giảm giá</button>
                                    </form> 
                                    <a href="index.php?act=show_mgg">Xem các mã hiện có</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>