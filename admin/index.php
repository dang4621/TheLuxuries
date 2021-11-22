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
                    echo ('<script>swal("Thêm thành công!", "Bạn đã nhấp vào nút!", "success");</script>');                  
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
                    echo ('<script>swal("Cập nhật thành công!", "Bạn đã nhấp vào nút!", "success");</script>');                  
                }
                include '../admin/danhmuc/danhmuc.php';
                break;
            case 'del_dm':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    del_dm($id);
                    echo ('<script>swal("Xóa thành công!", "Bạn đã nhấp vào nút!", "success");</script>');                  
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
                    echo ('<script>swal("Thêm thành công!", "Bạn đã nhấp vào nút!", "success");</script>');                  
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
                    echo ('<script>swal("Cập nhật thành công!", "Bạn đã nhấp vào nút!", "success");</script>');                  
                }                
                include '../admin/thuonghieu/upthuonghieu.php';                
                break;                
            case 'del_th':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    del_th($id);
                    echo ('<script>swal("Xóa thành công!", "Bạn đã nhấp vào nút!", "success");</script>');                  

                }
                include '../admin/thuonghieu/dsthuonghieu.php';      
                break; 
            case 'dsthuonghieu':
                include '../admin/thuonghieu/dsthuonghieu.php';  
                break;
                

            //Sản phẩm

            case 'add_sp': 
                if(isset($_SESSION['thuoctinh'])){
                    unset($_SESSION['thuoctinh']);
                } 
                if(isset($_SESSION['code'])){
                    unset($_SESSION['code']);
                } 
                $thuong_hieu=loadAll_th();
                include '../admin/sanpham/sanpham.php'; 
                 break;
            case 'dssanpham':
                $id=0;
                $keyw="";
                $sanpham=load_all_sp($keyw,$id);
                include '../admin/sanpham/dssanpham.php';   
                break;
            case 'del_sp':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    del_sp($id);
                }
                 $id=0;
                $keyw="";
                $sanpham=load_all_sp($keyw,$id);
                include '../admin/sanpham/dssanpham.php';      
                break; 
            case 'edit_sp':
                if(isset($_GET['id'])){
                $id=$_GET['id'];
                $sanpham=loadOne_sp($id) ;                
                include '../admin/sanpham/suasanpham.php';
                }

                break ;
            case 'update_sp':
                $id=0;
                if(isset($_POST['submit'])){                     
                    $ma_nhom_hang=$_POST['id_dm'];
                    $ma_thuong_hieu = 4231423412;
                    $ten_san_pham=$_POST['ten_sp'];   
                    $ma_san_pham=$_POST['id_sp'];
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
                        update_sp($ma_san_pham,$ma_nhom_hang,$ten_san_pham,$gia_goc,$giam_gia,$image,$donvi,$mo_ta, $today);
                        echo ('<script>swal("Cập nhật thành công!", "Bạn đã nhấp vào nút!", "success");</script>');                  
                    }                    
                    $sanpham=load_all_sp($keyw,$id);
                    include '../admin/sanpham/dssanpham.php';
                    break;
                
            case 'sp_confirm':
                if(isset($_POST['submit'])){                   
                    $ma_nhom_hang=$_POST['id_dm'];
                    $ma_thuong_hieu= $_POST['id_th'];
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

                    $random =rand(10000,99999999) ;
                    $_SESSION['code']=$random;
                    $ma_san_pham = $random;
                    
                    themSanPham($ma_san_pham,$ma_nhom_hang,$ma_thuong_hieu,$ten_san_pham,$file, $gia_goc,$giam_gia,$today, $mo_ta); 
                      
                }               
                include '../admin/sanpham/thuoctinh.php';
                break;
                //Thêm thuộc tính
            case 'thuoctinh':
                if(isset($_SESSION['thuoctinh'])){
                    $code=$_SESSION['code'];
                    foreach($_SESSION["thuoctinh"] as $value){
                        extract($value);      
                        themThuocTinh($code,$size,$color,$quantity);
                    }
                    unset($_SESSION['thuoctinh']);
                    unset($_SESSION['code']);
                    header("Location: index.php?act=dssanpham"); 
                }
                break;
            case 'unset_tt':
                unset($_SESSION['thuoctinh']);
                include '../admin/sanpham/thuoctinh.php';
                break;
            case 'dssanpham':                
                include '../admin/sanpham/dssanpham.php';     
                break;
            case 'dstaikhoan':
                include '../admin/taikhoan/dstaikhoan.php';
                break;    
            case 'dsbinhluan':
                include '../admin/binhluan/dsbinhluan.php';
                break; 
            case 'dsbill':
                include '../admin/bill/dsbill.php';
                break;
            case 'thongke1':
                include '../admin/thongke/thongke1.php';
                break;                        
            }   
        }else{
        include '../admin/home.php';  
    }


