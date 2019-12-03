
<?php
$data=DB::table('files')->orderBy('id','DESC')->first();
$file=$data->file;
$path='image/'.$file;

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">
body{background-color: #88BDBF;margin: 0px;}
</style>
<body>
	<table border="0" width="50%" style="margin:auto;padding:30px;background-color: #F3F3F3;border:1px solid #FF7A5A;">
		<tr>
			<td>
				<table border="0" width="100%">
					<tr>
						<td>
						
                               <img src="{{ $message->embed('image/globallearning.png') }}" style="height:100px;">
                           
						</td>
						<td>
							<p style="text-align: right;"><a href="#" target="_blank" style="text-decoration: none;"></a></p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0" style="text-align:center;width:100%;background-color: #fff;">
					<tr>
						<td style="background-color:#FF7A5A;height:100px;font-size:50px;color:#fff;"><i class="fa fa-envelope-o" aria-hidden="true"></i>{{$subject}}</td>
					</tr>
					<tr>
						<td>
							<h1 style="padding-top:25px;"></h1>
						</td>
					</tr>
					<tr>
						<td style="text-align:left;">
                             <a href="#"><img src="{{ $message->embed($path) }}" style="width:100%;height:600px;"></a>
						</td>
					</tr>
					<tr>
						<td>
						
						</td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>
				<table border="0" width="100%" style="border-radius: 5px;text-align: center;">
					<tr>
						<td>
							<h3 style="margin-top:10px;">Stay in touch</h3>
						</td>
					</tr>
					<tr>
						<td>
							<div style="margin-top:20px;">
								<a href="#" style="text-decoration: none;"><span class="twit" style="padding:10px 9px;background-color:#4099FF;color:#fff;border-radius:50%;"><i class="fa fa-twitter" aria-hidden="true" style="height:20px;width:20px;"></i></span></a>
								<a href="#" style="text-decoration: none;"><span class="fb" style="padding:10px 9px;background-color: #3B5998;color:#fff;border-radius:50%;"><i class="fa fa-facebook" aria-hidden="true" style="height:20px;width:20px;"></i></span></a>
								<a href="#" style="text-decoration: none;"><span class="msg" style="padding:10px 9px;background-color: #FFC400;color:#fff;border-radius:50%;""><i class="fa fa-envelope-o" aria-hidden="true" style="height:20px;width:20px;"></i></span></a>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div style="margin-top: 20px;">
								<span style="font-size:12px;">Glabal Learning Solution</span><br>
								<span style="font-size:12px;">Wilson Business Park, 2nd floor Block B</span>
                                <span style="font-size:12px;">Nairobi, Kenya</span>
                                <span style="font-size:12px;">Tel: +254 722 791 703</span>
                                <span style="font-size:12px;">info@globallearning.co.ke</span>
							</div>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>