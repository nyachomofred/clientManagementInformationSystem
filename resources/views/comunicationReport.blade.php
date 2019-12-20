<?php


?>

<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Total Messages ', 'Received Messages', 'Failed Messages',],
          ['Mails/Messages',  8,    6,2,],
       
         
         
         
        ]);

        var options = {
          title : 'Send And Received Mails/Messages',
          vAxis: {title: 'Total'},
         
          seriesType: 'bars',
          series: {5: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 800px; height: 300px;"></div>
  </body>
</html>
