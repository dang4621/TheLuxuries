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
                        <a class="navbar-brand" href="#">Tài khoản</a>
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
                                    <h4 class="title">Danh sách tài khoản</h4>
                                    <p class="category"></p>
                                </div>
                                <br>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover">
                                        <thead>
                                            <th class="product-id">ID</th>
                                            <th class="product-tentk">Tên tài khoản</th>
                                            <th class="product-email">Email</th>
                                            <th class="product-diachi">Số điện thoại</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $taikhoan=loadAll_tk(); 
                                         foreach($taikhoan as $value){ 
								         extract($value);
                                         echo('<tr>
                                                <td class="product-id">'.$id_tai_khoan.'</td>
                                                <td class="product-tentk">'.$username.'</td>
                                                <td class="product-email">'.$email.'</td>
                                                <td class="product-sdt">'.$sdt.'</td>
                                                <td>
                                                    <!--Xoá-->
                                                    <a href="index.php?act=del_tk&id='.$id_tai_khoan.'"><input type="button"><i class="pe-7s-trash fa-2x"></i></a>
                                                </td>
                                            </tr> ');
                                        } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>