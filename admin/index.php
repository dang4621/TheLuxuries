<?php 
    session_start();
    include '../model/pdo.php';
    include '../model/sanpham.php';   
    include '../model/danhmuc.php';    
    include '../model/thuonghieu.php';
    

    include 'header.php';
    $danhmuc = loadAll_dm();
    if( isset($_GET['act']) ){
        $act=$_GET['act'];
        
        switch($act){
            //Danh mục
            case 'add_dm':
                include '../admin/danhmuc/danhmuc.php';
                if(isset($_POST['submit'])){
                    $ten_nhom_hang=$_POST['ten_dm'];                    
                    themDanhMuc($ten_nhom_hang);
                    echo ('<script>alert("Thêm thành công")</script>');                  
                }     
                break;
            case 'dsdanhmuc':
                include '../admin/danhmuc/dsdanhmuc.php';   
                break;
            case 'edit_dm':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $nhom_hang=loadOne_dm($id) ;                
                    include '../admin/danhmuc/suadanhmuc.php';
                }
                break ;
            case 'update_dm':
                if(isset($_POST['submit'])){
                    $ma_nhom_hang=$_POST['id_dm'];
                    $ten_nhom_hang=$_POST['ten_dm'];
                    update_dm($ten_nhom_hang,$ma_nhom_hang);
                    echo ('<script>alert("Cập nhật thành công")</script>');
                }
                include '../admin/danhmuc/dsdanhmuc.php';
                break;
            case 'del_dm':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    del_dm($id);
                }
                include '../admin/danhmuc/dsdanhmuc.php';      
                break; 
            //Thương hiệu
                
            case 'dsthuonghie':
                include '../admin/thuonghieu/dsthuonghieu.php';    
                
                break;
            case 'add_th':
                include '../admin/thuonghieu/thuonghieu.php';
            
                
                if(isset($_POST['add'])){
                $tenth=$_POST['name'];
                $xuatxu=$_POST['xuatxu'];
                $filename=$_FILES['img']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                $math=rand(1000000000,9999999999);
                settype($math,"int");
                themthuonghieu($math,$tenth,$xuatxu,$filename);                   
                echo ('<script>alert("Cập nhật thành công")</script>');
                }
                break;
                
               case 'up_th':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $nhom_th=loadOne_th($id) ;                
                    
                }
                
                if(isset($_POST['submit'])){
 
                    $tenth=$_POST['ten_th'];
                    $xuatxu=$_POST['xuatxu'];
                  $logo=$_FILES['ten_logo']['name'];
                  $target_dir = "../upload/";
                  $target_file = $target_dir . basename($_FILES["ten_logo"]["name"]);
                    if($logo!=""){
                      update_th($tenth,$xuatxu,$logo);
                    } else {
                    $sql="UPDATE thuong_hieu SET ten_thuong_hieu = '$tenth',xuat_xu= '$xuatxu' WHERE ma_thuong_hieu='$id'";
                     pdo_execute($sql);
                    }
                    echo ('<script>alert("Cập nhật thành công")</script>'); 
                    
                    header('location:index.php?act=dsthuonghie');
                    
                }
                
                include '../admin/thuonghieu/upthuonghieu.php';
                
                break;  
                
                
               case 'del_th':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    del_th($id);
                }
                include '../admin/thuonghieu/dsthuonghieu.php';      
                break; 
            //Thương hiệu
                
            case 'dsthuonghie':
                include '../admin/thuonghieu/dsthuonghieu.php';    
                
                break;
                

            //Sản phẩm
            case 'add_sp': 
                include '../admin/sanpham/sanpham.php';  
            //  session_destroy();
                 break;
            case 'sp_confirm':
                if(isset($_POST['submit'])){
                   
                    $ma_nhom_hang=$_POST['id_dm'];
                    $ma_thuong_hieu = 4231423412;
                    $ten_san_pham=$_POST['ten_sp'];   

                     //upload nhiều ảnh
                     $targetDir = "../upload/"; 
                     $allowTypes = array('jpg','png','jpeg','gif'); 
                     $fileNames = $_FILES['anhsp']['name']; 
                     if(!empty($fileNames)){                         
                         $file = implode(',', $fileNames);
                         // print_r($file);
                         foreach($_FILES['anhsp']['name'] as $key=>$val){              
                             // địa chỉ của file 
                             $fileName = basename($_FILES['anhsp']['name'][$key]); 
                             $targetFilePath = $targetDir . $fileName; 
                             // kiểm tra định dạng file đúng là ảnh hay không 
                             $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                             if(in_array($fileType, $allowTypes)){ 
                                     move_uploaded_file($_FILES["anhsp"]["tmp_name"][$key], $targetFilePath);
                             }else{ 
                                 $mes="Tải tệp thất bại";
                             } 
                         }                       
                     }else{ 
                        $mes="Tải tệp thất bại";
                     }
                    $gia_goc=$_POST['gia_goc'];
                    $giam_gia=$_POST['giam_gia'];
                    $timestamp = time();
                    $today=date("20y-m-d h:i:s", $timestamp);
                    $mo_ta=$_POST['mota'];
                    $ma_san_pham =rand(1000,99999999) ;
                    $_SESSION['ma_san_pham']=$ma_san_pham;
                    themSanPham($ma_san_pham,$ma_nhom_hang,$ma_thuong_hieu,$ten_san_pham,$file, $gia_goc,$giam_gia,$today, $mo_ta); 
                      
                }
                include '../admin/sanpham/thuoctinh.php';
                break;
            case 'thuoctinh':
                if(isset($_SESSION['thuoctinh'])){
                    $code=$_SESSION['code'];
                    foreach($_SESSION["thuoctinh"] as $value){
                    extract($value);      
                     themThuocTinh($code,$size,$color,$quantity);
                    }
                    unset($_SESSION['thuoctinh']);
                    unset($_SESSION['code']);
                    header("Location: index.php?act=add_sp"); 
                }
                break;
            case 'unset_tt':
                unset($_SESSION['thuoctinh']);
                include '../admin/sanpham/thuoctinh.php';
                break;
            case 'add_tt':
                include '../admin/sanpham/thuoctinh.php';  
                break;
            case 'dssanpham':
                
                include '../admin/sanpham/dssanpham.php';     
                break;


                
            }
            
        

        

    }else{
        include '../admin/home.php';  
    }


    include 'footer.php';

?>
