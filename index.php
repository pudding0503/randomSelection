<?php
	$dir = "images/";
	$img = "";
	if (is_dir($dir)){
		if ($dh = opendir($dir)){
			while (($file = readdir($dh))!= false){
				if( $file<>'' && strlen($file)>2 ){
					$img .= '"'.$file.'",';
				}
			}
		}
		$img = substr($img, 0, ( strlen($img)-1));
}
?>
<!--Random Selection-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Demo | Random selection</title>
<head>
<script id="jquery_172" type="text/javascript" class="library" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
		
	$(function(){
		
		var alldata = new Array(<?php echo $img;?>);
		var num = alldata.length - 1;
		var show = $("#show");
		var btn = $("#btn");
		var open = false;
	
		function change(){
			var randomVal = Math.round(Math.random() * num);
			var prizeName = alldata[randomVal];
			show.html("<img src='images/"+prizeName+"' />");
		}
		
		function run(){
			if(!open){
				timer=setInterval(change,50);
				btn.removeClass('start').addClass('stop').text('Stop');
				open = true;
			}else{
				clearInterval(timer);
				btn.removeClass('stop').addClass('start').text('Start');
				open = false;
			}
		}
		
		btn.click(function(){run();})
		
	})	
	</script>
<style>
body {
	background-image: url(photo/bg.jpg);
}
/*Circular*/
.wrap {
	width: 400px;
	margin: 100px auto;
	font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
}
/*Circular Settings*/
.show {
	width: 400px;
	height: 400px;
	background-color: #FFD401;
	line-height: 300px;
	text-align: center;
	color: #fff;
	font-size: 30px;
	-moz-border-radius: 150px;
	-webkit-border-radius: 150px;
	border-radius: 150px;
	/*Shadow Settings*/
	-moz-box-shadow: 2px 2px 2px #BBBBBB;
	-webkit-box-shadow: 2px 2px 4px #BBBBBB;
	box-shadow: 2px 2px 4px #BBBBBB;
	border-radius: 50%;
	overflow: hidden;
}
.btn a {
	display: block;
	width: 120px;
	height: 50px;
	margin: 30px auto;
	text-align: center;
	line-height: 50px;
	text-decoration: none;
	color: #fff;
	-moz-border-radius: 25px;
	-webkit-border-radius: 25px;
	border-radius: 25px;
}
.btn a.start {
	background: #80b600;
}
.btn a.start:hover {
	background: #75a700;
}
.btn a.stop {
	background: #00a2ff;
}
.btn a.stop:hover {
	background: #008bdb;
}
</style>
</head>

<body>
<div class="wrap">
  <div class="show" id="show">Clicking</div>
  <div class="btn"> <a href="javascript:void(0)" class="start" id="btn">Start</a> </div>
</div>
</body>
</html>