<?php 
     ob_start();
     session_start();
     include './model/pdo.php';
     include './model/sanpham.php';   
     include './model/danhmuc.php';    
     include './model/thuonghieu.php';
    
     //include 
     include 'model/pdo.php';
     include 'model/danhmuc.php';
     include 'model/thuonghieu.php';
     include 'model/sanpham.php';

    include 'view/header.php';

    if( isset($_GET['act']) ){
        $act=$_GET['act'];        
        switch($act){            
            case 'trangchu':                
                include './site/page/home.php';
                break;
            default :  
                    include './site/page/home.php';                
                    break;
            }
                
        }else{
            include 'view/';
        }            


    include 'view/footer.php';

?>











