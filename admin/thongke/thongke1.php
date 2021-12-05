<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Thống kê</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                            <b class="caret hidden-sm hidden-xs"></b>
                            <span class="notification hidden-sm hidden-xs">5</span>
                            <p class="hidden-lg hidden-md">
                                Thông báo
                                <b class="caret"></b>
                            </p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Thông báo 1</a></li>
                            <li><a href="#">Thông báo 2</a></li>
                            <li><a href="#">Thông báo 3</a></li>
                            <li><a href="#">Thông báo 4</a></li>
                            <li><a href="#">Thông báo 5</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-search"></i>
                            <p class="hidden-lg hidden-md">Search</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">

                
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>
                                Doanh thu
                                <b class="caret"></b>
                            </p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?act=thongke1">Tổng doanh thu tháng</a></li>
                            <li><a href="#">Something</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>
                               Sản phẩm
                                <b class="caret"></b>
                            </p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?act=thongke2">Số lượng sản phẩm</a></li>
                            <li><a href="index.php?act=bieudo">Thống kê danh mục</a></li>
                            <li><a href="#">Something</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>
                                Khác
                                <b class="caret"></b>
                            </p>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?act=thongke2">Số lượng sản phẩm</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li class="separator hidden-lg hidden-md"></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-plain">
                        <div class="s-heading ">
                        </div>
                        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
                        <div class="checked">
                            <div class="content">
                                <form action="index.php?act=thongke1" method="POST">
                                    <select name="thang" onChange="this.form.submit()">
                                        <option value="">Chọn tháng</option>
                                        <?php for($i=1 ; $i<13 ; $i++){
                          echo("<option value='".$i."'> Tháng ".$i."</option>");
                  }; ?>
                                    </select>
                                </form>
                                <?php 
                
                foreach ($values as $value){
                            extract($value);                                  
                            echo(substr($ngay_hoa_don,8,2).","); 
                            
                }
            ?>
                                <div id="myPlot"></div>
                                <script>
                                var xArray = [
                                    <?php  
                  foreach ($values as $value){
                    extract($value);                                  
                    echo(substr($ngay_hoa_don,8,2).",");  
                      }
                  ?>
                                ];
                                var yArray = [
                                    <?php  
              foreach ($values as $value){
                          extract($value);                            
                          echo($Tongtien.",");
              }
          ?>
                                ];
                                // Define Data
                                var data = [{
                                    x: xArray,
                                    y: yArray,
                                    mode: "lines"
                                }];
                                // Define Layout
                                var layout = {
                                    xaxis: {
                                        range: [1, 31],
                                        title: "Ngày"
                                    },
                                    yaxis: {
                                        range: [50, 1000],
                                        title: "Doanh thu ($)"
                                    },
                                    title: "Doanh thu theo tháng <?= $thang ?> TheLuxuries"
                                };
                                // Display using Plotly
                                Plotly.newPlot("myPlot", data, layout);
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>