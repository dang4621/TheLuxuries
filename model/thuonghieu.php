<?php 

 function themthuonghieu($tenth,$xuatxu,$filename){
      $so_hoa_don = mt_srand(10);
    $sql="insert into thuong_hieu(ma_thuong_hieu,ten_thuong_hieu,xuat_xu,logo) values ('$so_hoa_don','$tenth','$xuatxu','$filename')";
   return pdo_execute($sql);
}


?>