<?php 
    
    include '../model/pdo.php';
    include '../model/danhmuc.php';
    
    include '../model/thuonghieu.php';
    

    include 'header.php';

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
                $danhmuc = loadAll_dm();
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
                $danhmuc = loadAll_dm();
                include '../admin/danhmuc/dsdanhmuc.php';
                break;
            case 'del_dm':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    del_dm($id);
                }
                $danhmuc = loadAll_dm();
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
                    include '../admin/thuonghieu/upthuonghieu.php';
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
                    
                }
                
                
                
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
                $danhmuc = loadAll_dm();
                if(isset($_POST['submit'])){

                       
                }
                include '../admin/sanpham/sanpham.php'; 
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