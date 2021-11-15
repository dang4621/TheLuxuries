<div class="contact-from-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <form method="POST">
                    <p>Thêm các loại sản phẩm và số lượng của từng loại</p>
                    <input name="size" type="radio" id="html" value="S" checked>
                    <label for="html">S</label>
                    <input name="size" type="radio" id="css" value="M">
                    <label for="css">M</label>
                    <input name="size" type="radio" id="javascript" value="L">
                    <label for="javascript">L</label>
                    <input name="size" type="radio" id="javascript" value="XL">
                    <label for="javascript">XL</label>
                    <input name="size" type="radio" id="javascript" value="XXL">
                    <label for="javascript">XXL</label><br>

                    <label for="favcolor">Chọn màu hiển thị:</label>
                    <input type="color" id="favcolor" name="favcolor" value="#ff0000"><br><br>
                    <label for="">Số lượng:</label>
                    <input id="number" name="number" type="number" value="50"> <br>
                    <button type="submit" name="add_session">Thêm loại</button>
                </form>
                <a href="index.php?act=unset_tt">Nhập lại</a><br>
                <a href="index.php?act=thuoctinh">Xác nhận</a><br>

                <?php             
									 if(isset($_POST['add_session'])){                   
										$row = ["size" => $_POST['size'] ,"color" =>  $_POST['favcolor'] ,"quantity" =>  $_POST['number'] ];              
										$_SESSION["thuoctinh"][$_POST['size'].$_POST['favcolor'].$_POST['number']]=$row;
									}  
									if(isset($_SESSION['thuoctinh'])){
										foreach($_SESSION["thuoctinh"] as $value){
										extract($value);   
										echo("Size: ".$size." Màu : ".$color." Số lượng : ".$quantity."");
										echo("<br>");
										} 
									}else{
										echo("KO CÓ GÌ");
									} 
									echo("<pre>");
							?>
            </div>
        </div>
    </div>
</div>