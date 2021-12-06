<div class="main-panel">
    <?php include 'thongke/header.php' ?>
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
                                <td class="product-tongnd">600</td>
                            </tr>
                        </tbody>
                </table>
                <i class="pe-7s-add-user"> </i>
            </div>
            <div class="box-2">
                <table class="table">
                    <thead>
                        <th class="product-tongdh">Tổng đơn hàng</th>
                        <thead>
                        <tbody>
                            <tr>
                                <td class="product-tongdh">513</td>
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
                            <tr>
                                <td class="product-tongspbd">500</td>
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
                            <tr>
                                <td class="product-tongsttd">547.546.000</td>
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
                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i> Open
                                    <i class="fa fa-circle text-danger"></i> Bounce
                                    <i class="fa fa-circle text-warning"></i> Unsubscribe
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-clock-o"></i> Phan Công Đỉnh
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title1">Biểu đồ tăng trưởng</h4>
                            <p class="category">Phan Công Đỉnh</p>
                        </div>
                        <div class="content">
                            <div id="chartHours" class="ct-chart">

                                <!--Nơi gắn biểu đồ-->

                            </div>

                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i> Open
                                    <i class="fa fa-circle text-danger"></i> Click
                                    <i class="fa fa-circle text-warning"></i> Click Second Time
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-history"></i>Phan Công Đỉnh
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title1">Biểu đồ cột</h4>
                            <p class="category">Phan Công Đỉnh</p>
                        </div>
                        <div class="content">
                            <div id="chartActivity" class="ct-chart">
                                <!--Nơi gắn biểu đồ-->
                            </div>
                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i> Tesla Model S
                                    <i class="fa fa-circle text-danger"></i> BMW 5 Series
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-check"></i> Phan Công Đỉnh
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title1">Bảng</h4>
                            <p class="category">Phan Công Đỉnh</p>
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
                                        <tr>
                                            <td class="product-slmua">1</td>
                                            <td class="product-tenhang">Phan Công Đỉnh</td>
                                            <td class="product-hinh">
                                                <img src="https://vcdn1-dulich.vnecdn.net/2021/04/02/trantuanviet-bavi-hanoi-1617326198.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=ktcT9Y2ol0GS9x2oIjJaRw"
                                                    width="50px" alt="">
                                            </td>
                                            <td class="product-gia">800 VND</td>
                                        </tr>
                                        <tr>
                                            <td class="product-id">2</td>
                                            <td class="product-tenloai">Phan Công Đỉnh</td>
                                            <td class="product-hinh">
                                                <img src="https://vcdn1-dulich.vnecdn.net/2021/04/02/trantuanviet-bavi-hanoi-1617326198.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=ktcT9Y2ol0GS9x2oIjJaRw"
                                                    width="50px" alt="">
                                            </td>
                                            <td class="product-gia">800 VND</td>
                                        </tr>
                                        <tr>
                                            <td class="product-id">3</td>
                                            <td class="product-tenloai">Phan Công Đỉnh</td>
                                            <td class="product-hinh">
                                                <img src="https://vcdn1-dulich.vnecdn.net/2021/04/02/trantuanviet-bavi-hanoi-1617326198.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=ktcT9Y2ol0GS9x2oIjJaRw"
                                                    width="50px" alt="">
                                            </td>
                                            <td class="product-gia">800 VND</td>
                                        </tr>
                                        <tr>
                                            <td class="product-id">3</td>
                                            <td class="product-tenloai">Phan Công Đỉnh</td>
                                            <td class="product-hinh">
                                                <img src="https://vcdn1-dulich.vnecdn.net/2021/04/02/trantuanviet-bavi-hanoi-1617326198.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=ktcT9Y2ol0GS9x2oIjJaRw"
                                                    alt="">
                                            </td>
                                            <td class="product-gia">800 VND</td>
                                        </tr>
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
        </div>
    </div>