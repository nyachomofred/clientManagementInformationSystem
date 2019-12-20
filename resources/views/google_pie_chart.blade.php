<?php
$total=count(DB::table('clients')->get());
$fullmember=count(DB::table('clients')->where(['member_type'=>'Fullmember'])->get());
$practicing=count(DB::table('clients')->where(['member_type'=>'Practicing'])->get());
$associate=count(DB::table('clients')->where(['member_type'=>'Associate'])->get());

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Total ', 'Fullmember', 'Practicing','Associate' ],
          ['Clients/Members',  <?php echo $total?>,     <?php echo $fullmember?>,        <?php echo $practicing?>,      <?php echo $associate?> ],
       
         
         
         
        ]);

        var options = {
          title : 'Members Registration Report',
          vAxis: {title: 'Total'},
         
          seriesType: 'bars',
          series: {5: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 1200px; height: 400px;"></div>
  </body>
</html>
