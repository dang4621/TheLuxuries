<div class="main-panel">
    <?php include 'thongke/header.php' ?>
    <!-- ///////// -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="header">
                            <h4 class="title">Thống kê số lượng</h4>
                            <p class="category"></p>
                        </div>
                        <br>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                    <th class="product">Mã danh mục</th>
                                    <th class="product">Tên danh mục</th>
                                    <th class="product">Số lượng</th>
                                    <th class="product">Giá cao nhất</th>
                                    <th class="product">Giá thấp nhất</th>
                                    <th class="product">Giá trung bình</th>
                                </thead>
                                <tbody>
                                    <?php
                            foreach ($listthongke as $thongke){
                                   extract($thongke);
                                echo '
                                    <tr>
                                        <td class="product">'.$madm.'</td>
                                        <td class="product">'.$tendm.'</td>
                                        <td class="product">'.$countsp.'</td>
                                        <td class="product">'.$maxprice.'</td>
                                        <td class="product">'.$minprice.'</td>
                                        <td class="product">'.$avgprice.'</td>

                                    </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="buttons">
                                <a href="index.php?act=bieudo" class="boxed-btn">Biểu đồ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ///////// -->
</div>
</div>
</div>