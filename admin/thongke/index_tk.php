<div class="main-panel">
    <?php include 'thongke/header.php' ?>
    <?php 
                $so_tk= dem_stk();
                extract($so_tk);
                // echo('<pre>');
                // print_r($so_tk);
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
                            <h4 class="title1">Sản phẩm bán chạy</h4>
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
                                                <img src="https://vcdn1-dulich.vnecdn.net/2021/04/02/trantuanviet-bavi-hanoi-1617326198.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=ktcT9Y2ol0GS9x2oIjJaRw" width="50px" alt="">
                                            </td>
                                            <td class="product-gia">800 VND</td>
                                        </tr>
                                        <tr>
                                            <td class="product-id">2</td>
                                            <td class="product-tenloai">Phan Công Đỉnh</td>
                                            <td class="product-hinh">
                                                <img src="https://vcdn1-dulich.vnecdn.net/2021/04/02/trantuanviet-bavi-hanoi-1617326198.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=ktcT9Y2ol0GS9x2oIjJaRw" width="50px" alt="">
                                            </td>
                                            <td class="product-gia">800 VND</td>
                                        </tr>
                                        <tr>
                                            <td class="product-id">3</td>
                                            <td class="product-tenloai">Phan Công Đỉnh</td>
                                            <td class="product-hinh">
                                                <img src="https://vcdn1-dulich.vnecdn.net/2021/04/02/trantuanviet-bavi-hanoi-1617326198.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=ktcT9Y2ol0GS9x2oIjJaRw" width="50px" alt="">
                                            </td>
                                            <td class="product-gia">800 VND</td>
                                        </tr>
                                        <tr>
                                            <td class="product-id">3</td>
                                            <td class="product-tenloai">Phan Công Đỉnh</td>
                                            <td class="product-hinh">
                                                <img src="https://vcdn1-dulich.vnecdn.net/2021/04/02/trantuanviet-bavi-hanoi-1617326198.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=ktcT9Y2ol0GS9x2oIjJaRw" alt="">
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