 
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
            <div id="myPlot" style="height : 500px;width:100%;max-width:1000px"></div>

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
                mode:"lines"
                }];

                // Define Layout
                var layout = {
                xaxis: {range: [1, 31], title: "Ngày"},
                yaxis: {range: [50, 1000], title: "Doanh thu ($)"},  
                title: "Doanh thu theo tháng <?php  ?> TheLuxuries"
                };

                // Display using Plotly
                Plotly.newPlot("myPlot", data, layout);
                </script>

        </div>     
            
      
                
    </div>