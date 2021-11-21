<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row1">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <form method="POST">
                    <p1>Thêm loại sản phẩm và số lượng của từng loại</p1><br>
                    <p2>Size (vd : L,S,M):</p2>
                        <input type="text" name="size"><br>
                    <label for="">Màu sắc (vd : xanh , đỏ , tím )</label>
                        <input type="text" name="color"><br>
                    <!-- <label for="">Số lượng:</label>
                    <input id="number" name="number" type="number" value="50"> <br> -->
                    <button type="submit" name="add_session">Thêm loại</button>
                </form>
                <br>
                <a href="index.php?act=thuoctinh">Xác nhận</a>
                <a href="index.php?act=unset_tt">Nhập lại</a><br>
                <br>

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
                                        Màu : <?= $value ?>
                                        <input type="hidden" name="c_size_<?=$i?>" value="<?= $value ?>">
                                        Size : <?= $val ?>
                                        <input type="hidden" name="c_color_<?=$i?>" value="<?= $val ?>">
                                            Nhập số lượng
                                        <input type="number" name="quantity_<?=$i?>"><br>
                                        <!-- <?=$i?> -->                                    
                                    <?php
                                    $i++;                                    
                                }
                            }    
                            $_SESSION['i']=$i;                        
                            ?>                           
                              <input type="submit" name="add" form="form_tt">
                              </form>
                            <?php
                        }
                        if(isset($_POST['add'])){
                            $i =  $_SESSION['i'];
                            for($j = 1 ; $j <= $i ;$j++){
                                $row = [
                                    "size" => $_POST['c_size_'.$j] ,
                                    "color" =>  $_POST['c_color_'.$j] ,
                                    "quantity" =>  $_POST['quantity_'.$j] 
                                    ]; 
                                $_SESSION["thuoctinh"][$_POST['c_size_'.$j].$_POST['c_color_'.$j].$_POST['quantity_'.$j]]=$row;  
                            }                            
                        }                        
					?>
            </div>
        </div>
    </div>
</div>