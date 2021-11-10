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

         themthuonghieu($tenth,$xuatxu,$filename);

    
   echo ('<script>alert("Cập nhật thành công")</script>');
}
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