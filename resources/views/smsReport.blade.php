

<?php 
$singlemessages=count(DB::table('singlemessages')->get());
$sms=count(DB::table('sms')->get());
$totalmessages=$sms+$singlemessages;

$mails=count(DB::table('ccmails')->get());

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Proccessed', 'Total Messages', 'Sent Messages', 'Failed Messages','Tota Mails','Sent Mails','Failed Mail'],
          ['Messages', <?php echo $totalmessages?>, <?php echo $totalmessages?>, 0, <?php echo $mails?>,<?php echo $mails?>,0],
         
        
         
        ]);

        var options = {
          chart: {
            title: '',
           
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 1200px; height: 400px;"></div>
  </body>
</html>