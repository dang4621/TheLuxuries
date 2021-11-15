<?php 
     ob_start();
     session_start();
     include './model/pdo.php';
     include './model/sanpham.php';   
     include './model/danhmuc.php';    
     include './model/thuonghieu.php';
    
     //include 

    include 'view/header.php';

    //load
 

    if( isset($_GET['act']) ){
        $act=$_GET['act'];        
        switch($act){            
            case 'trangchu':                
                include 'view/home.php';
                break;        
            

            default :  
                include 'view/home.php';         
                    break;
            }
                
        }else{
            include 'view/home.php';
        }            


    include 'view/footer.php';

?>











