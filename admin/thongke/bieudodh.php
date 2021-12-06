<div class="main-panel">
    <?php include 'thongke/header.php' ?>
</div>
</div>
</div>
<div class="row" style="position:absolute;left:400px;" >
    <div id="piechart"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
                $tongdm=count($listthongke);
                $i=1;
                  foreach ($listthongke as $thongke){
                      extract($thongke);
                      if($i==$tongdm) $dauphay="";else $dauphay=",";
                      if($thongke['tt']==0){
                        echo"['thanh toán khi nhận hàng', ".$thongke['datt']."]".$dauphay;
                      }else if($thongke['tt']==1){
                        echo"['thanh toán online', ".$thongke['datt']."]".$dauphay;
                      }else if($thongke['tt']==2){
                        echo"['đã hủy đơn', ".$thongke['datt']."]".$dauphay;
                      }
                     
                    $i+=1;
                  }
                ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
            'title': 'Thống kê sản phẩm theo danh mục',
            'width': 1000,
            'height': 800
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
    </script>
</div>