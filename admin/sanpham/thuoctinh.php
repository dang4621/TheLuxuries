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
                        </div>
                        <div class="contact-form12">
                            <form action="" method="post" id="fruitkha-contact12" name="">
                                <label for="">Size (vd : L,S,M):</label>
                                <input type="text" name="size" style="width:100%;border:none;box-shadow: 0px 0px 5px rgb(145 140 140);;border-radius: 5px;"><br>
                                <label for="">Màu sắc (vd : xanh , đỏ , tím )</label>
                                <input type="text" name="color" style="width:100%;border:none;box-shadow: 0px 0px 5px rgb(145 140 140);;border-radius: 5px;"><br>
                                <button type="submit" name="add_session">Thêm loại</button>
                                <p></p>
                                <a href="index.php?act=thuoctinh">Xem danh sách</a><br><br>

                            </form>
                                <?php             
                                    if(isset($_POST['add_session'])){                          
                                    $size = explode(',',trim($_POST['size']) );                      
                                    $color = explode(',',trim($_POST['color']) );
                                            ?>
                                        <form action="" method="POST" id="form_tt">
                                        <?php
                                        $i=1;
                                        foreach($size as $value){
                                            foreach($color as $val){
                                                ?>                                    
                                                    Màu : <?= $val ?> |
                                                    <input type="hidden" name="c_size_<?=$i?>" value="<?= $value ?>">
                                                    Size : <?= $value ?>|                                                    
                                                    <input type="hidden" name="c_color_<?=$i?>" value="<?= $val ?>">
                                                    Nhập số lượng :
                                                    <input type="number" name="quantity_<?=$i?>" style="width:100%;border:none;box-shadow: 0px 0px 5px rgb(145 140 140);;border-radius: 5px;"><br>
                                                    <!-- <?=$i?> -->                                    
                                                <?php
                                                $i++;                                    
                                            }
                                        }    
                                        $_SESSION['i']=$i;                        
                                        ?>                                                               
                                        <input type="submit" class="gui" name="add" value="Lưu" form="form_tt">
                                        </form>
                                        <?php
                                        }
                                        if(isset($_POST['add'])){
                                            $i =  $_SESSION['i'];
                                            for($j = 1 ; $j < $i ;$j++){
                                                $row = [
                                                    "size" => $_POST['c_size_'.$j] ,
                                                    "color" =>  $_POST['c_color_'.$j] ,
                                                    "quantity" =>  $_POST['quantity_'.$j] 
                                                    ]; 
                                                $_SESSION["thuoctinh"][$_POST['c_size_'.$j].$_POST['c_color_'.$j].$_POST['quantity_'.$j]]=$row;  
                                                echo ('<script>swal("Thêm thành công!", "Thuộc tính sản phẩm đã lưu", "success");</script>');  
                                            }                        
                                        }                        
					                    ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>