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
    // $sanpham=load_all_sp($keyw,$id);
    if(isset($_POST['keyw'])&&($_POST['keyw']!="")){
        $keyw=$_POST['keyw'];
    }else{
        $keyw="";
    }    
    if(isset($_GET['id_dm_c'])&&($_GET['id_dm_c']>0)){
        $id_dm_c=$_GET['id_dm_c'];
    }else{
        $id_dm_c=0;
    }
    if(isset($_POST['select'])){      
        $id=$_POST['select'];      
        settype($id,"int");      
    }else{  
           $id=0;   
    }
    $ba_sp=load3_sp();
    $dssp=loadAll_sp($keyw="",$id_dm_c=0);
    $danhmuc=loadAll_dm();
    //
    ////////
    //
    if( isset($_GET['act']) ){
        $act=$_GET['act'];        
        switch($act){            
            case 'trangchu':                
                include 'view/home.php';
                break;        
            
            case 'sanpham':
                    // if(isset($_POST['keyw'])&&($_POST['keyw']!="")){
                    //         $kyw=$_POST['keyw'];
                    // }else{
                    //         $kyw="";
                    // }    
                    // if(isset($_GET['id_dm_c'])&&($_GET['id_dm_c']>0)){
                    //         $id_dm_c=$_GET['id_dm_c'];
                    //     }else{
                    //         $id_dm_c=0;
                    //     }
					// if(isset($_POST['select'])){      
					// 		$id=$_POST['select'];      
					// 		settype($id,"int");      
					// 	}else{  
					// 		   $id=0;   
					// 	}
					// 	$danhmuc=loadAll_dm();	
                    //     $dssp=loadAll_sp($keyw,$id_dm_c);
                    //     $tendm=loadAll_dm();
                        include "view/shop.php";
                        break;        

            default :  
                include 'view/shop.php';         
                    break;
            }
                
        }else{
            include 'view/shop.php';
        }            


    include 'view/footer.php';