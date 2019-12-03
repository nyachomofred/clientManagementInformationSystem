
<?php
$data=DB::table('files')->orderBy('id','DESC')->first();
$file=$data->file;
$path='image/'.$file;

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css">
body{background-color: #ffffff;margin: 0px;}
</style>
<body>
    <div class="container">
        <table style="width:100%">
            <tr>
                <td style="width:20%"></td>
              <td style="width:60%">
                  <div class="col-sm-4"></div>
                  <hr style="height:2px;border:none;color:#333;background-color:#333;"/>
                        <center><img src="{{ $message->embed('image/globallearning.png') }}" style="width:40%;height:60px;"></center>
                  <hr style="height:2px;border:none;color:#333;background-color:#333;"/>
                  
                  <img src="{{ $message->embed($path) }}" style="width:100%;height:100%;">
                  
                   <hr/>
                   <center><p>Global Learning Solution</p></center>
                    <center><p>Wilson Business Park, 2nd floor Block B.<br>
                        Langata Road. P.O Box 856 00606.<br>
                        Nairobi, Kenya<br>
                        Tel: +254 722 791 703<br>
                        info@globallearning.co.ke</p></center>
                        
                 <hr>
                  
              </td>
                <td style="width:20%"></td>
            </tr>
        </table>
    </div>
    
</body>
</html>