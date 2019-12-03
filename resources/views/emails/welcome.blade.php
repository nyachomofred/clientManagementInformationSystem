
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
        <div class="row">
            <div class="col-sm-12">
                <img src="{{ $message->embed('image/globallearning.png') }}" style="width:30%;height:60px;">
                <hr>
            </div>
        </div>
        
        <div class="row" style="background-color:#f6f8fa; color:rgb(23, 106, 93);height:50px;">
            <div class="col-sm-12">
                <center><h2>{{$subject}}</h2></center>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">	<?php echo $messagebody ?> </div>
             <hr>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <p style="font-size: 15px;font-family: Constantia;color: rgb(23,78,134);">Best Regards,</p>
                <p style="font-size: 16px;font-family: Constantia;color: rgb(23,78,134);"><b>Global Learning Solutions</b><br>
                <strong style="color:red;">Tel: +254 722 791 703</strong><br>
                <strong style="color:red">Email:</strong> info@globallearning.co.ke <br>
                <strong style="color:red">Website:</strong>  http://www.globallearning.co.ke</p>
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img src="{{ $message->embed('image/eric.jpg') }}" style="width:50%;">
                
            </div>
        </div>
    </div>
    
</body>
</html>