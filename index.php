<?php 
     ob_start();
     session_start();
     include './model/pdo.php';
     include './model/sanpham.php';   
     include './model/danhmuc.php';    
     include './model/thuonghieu.php';
    
     //include 
    include 'view/header.php';

    include 'view/product_details.php';

    include 'view/footer.php';

?>