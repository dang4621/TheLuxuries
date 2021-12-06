<div class="main-panel">
<?php include 'thongke/header.php' ?>
    <?php 
        $so_tk= dem_stk();
         extract($so_tk);
                 ?>
    <br>
    <div class="col-md-42">
        <div class="card2">
            <div class="box-1">
            <table class="table">
                    <thead>
                        <th class="product-tongnd">Tổng người dùng</th>
                    <thead>
                    <tbody>
                        <tr>
                            <td class="product-tongnd"><?= $soluong ?></td> 
                        </tr>
                    </tbody>
                </table>
                <i class="pe-7s-add-user"> </i>
            </div>
            <div class="box-2">
            <table class="table">
                    <thead>
                        <?php
                              $so_hd= dem_shd();
                              extract($so_hd);
                        ?>
                        <th class="product-tongdh">Tổng đơn hàng</th>
                    <thead>
                    <tbody>
                        <tr>
                            <td class="product-tongdh"><?= $soluong_hd ?></td> 
                        </tr>
                    </tbody>
                </table>
                <i class="pe-7s-cart"></i>
            </div>
            <div class="box-3">
                <table class="table">
                    <thead>
                        <th class="product-tongspbd">Tổng sản phẩm đã bán</th>
                        <thead>
                        <tbody>
                        <?php
                              $so_hdb= dem_hdb();
                              extract($so_hdb);
                        ?>
                            <tr>
                            <td class="product-tongspbd"><?= $soluong_mh ?></td> 
                            </tr>
                        </tbody>
                </table>
                <i class="pe-7s-shopbag"></i>
            </div>
            <div class="box-4">
                <table class="table">
                    <thead>
                        <th class="product-tongsttd">Tổng số tiền thu được</th>
                        <thead>
                        <tbody>
                        <?php
                              $dem_tongtien= dem_tongtien();
                              extract($dem_tongtien);
                        ?>
                            <tr>
                            <td class="product-tongsttd"><?= $tongtien ?>$</td> 
                            </tr>
                        </tbody>
                </table>
                <i class="pe-7s-cash"></i>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title1">Biểu đồ tròn</h4>
                            <p class="category">Phan Công Đỉnh</p>
                        </div>
                        <div class="content">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth">

                                <div class="row" >
                                    <div id="piechart"></div>

                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
                                    </script>

                                    <script type="text/javascript">
                                    // Load google charts
                                    google.charts.load('current', {
                                        'packages': ['corechart']
                                    });
                                    google.charts.setOnLoadCallback(drawChart);

                                    // Draw the chart and set the chart values
                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Danh mục', 'Số lượng sản phẩm'],
                                            <?php
                                                $listthongke=loadall_thongke_2();
                                                    $tongdm=count($listthongke);
                                                    $i=1;
                                                    foreach ($listthongke as $thongke){
                                                        extract($thongke);
                                                        if($i==$tongdm) $dauphay="";else $dauphay=",";
                                                        if($thongke['tt']==0){
                                                            echo"['chưa thanh toán', ".$thongke['datt']."]".$dauphay;
                                                        }else if($thongke['tt']==1){
                                                            echo"['đã thanh toán', ".$thongke['datt']."]".$dauphay;
                                                        }else if($thongke['tt']==2){
                                                            echo"['đơn đã hủy', ".$thongke['datt']."]".$dauphay;
                                                        }
                                                        
                                                        $i+=1;
                                                    }
                                                    ?>
                                        ]);

                                        // Optional; add a title and set the width and height of the chart
                                        var options = {
                                            'title': 'Thống kê sản phẩm theo danh mục',
                                           // 'width': 400,
                                            //'height': 300
                                        };

                                        // Display the chart inside the <div> element with id="piechart"
                                        var chart = new google.visualization.PieChart(document.getElementById(
                                            'piechart'));
                                        chart.draw(data, options);
                                    }
                                    </script>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title1">Top 3 sản phẩm bán chạy</h4>
                        </div>
                        <div class="content">
                            <div class="table-full-width">
                                <table class="table">
                                    <thead>
                                        <th class="product-slmua">Số lượng mua</th>
                                        <th class="product-tenhang">Tên sản phẩm</th>
                                        <th class="product-hinh12">Ảnh sản phẩm</th>
                                        <th class="product-gia">Giá</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $load = load_slxh(); 
                                        foreach($load as $value){
                                            extract($value);
                                            // echo("<pre>");
                                            // print_r($value);
                                        ?>                                     
                                        <tr>
                                            <td class="product-slmua"><?= $slxh ?></td>
                                            <?php  
                                             $load_sp = load_sp($id_tt);
                                             extract($load_sp);
                                             $url_hinh="";                                
                                             if(isset($image)&&!$image==""){
                                                 $file = explode(",",substr($image, 0, -1));
                                             }else{
                                                $file[0]="không có hình";
                                             }; 
                                              ?>
                                            <td class="product-tenhang"><?= $ten_san_pham ?></td>
                                            <td class="product-hinh">
                                                <img src="../upload/<?= $file[0] ?>" width="50px" alt="">
                                            </td>
                                            <td class="product-gia"><?= $gia_goc ?></td>
                                        </tr>  
                                     
                                        <?php  }
                                        ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            <div class="footer">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-history"></i> Phan Công Đỉnh
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">               
              
            </div>
        </div>
    </div>