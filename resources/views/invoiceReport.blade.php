
             
    <?php
       $invoice=count(DB::table('invoices')->get());
       
     ?>
                <html>
                  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                    
                             
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                      google.charts.load("current", {packages:["corechart"]});
                      google.charts.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            
                          ['Invoices', 'Number'],
                          ['Total Invoices',     <?php echo $invoice; ?>],
                          ['Proccessed Invoices',      <?php echo $invoice; ?>],
                          ['Failed Invoices',  1],
                         
                         
                        ]);
                
                        var options = {
                          title: 'Processed And Failed  Invoices',
                          is3D: true,
                        };
                
                        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                        chart.draw(data, options);
                      }
                    </script>
                  </head>
                  <body>
                    <div id="piechart_3d" style="width: 800px; height: 430px;"></div>
                  </body>
                </html>
                