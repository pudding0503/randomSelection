<?php
/*Camera Shooting*/
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Demo | Take a photo</title>
<script type="text/javascript" src="webcam.js"></script>
<script type="text/javascript" src="jquery-1.8.3.min.js"></script>
<style>
/* Background */	
body {
	background-image: url(../photo/bg.jpg);
}
/* Buttons */		
.button {
	position: relative;
	display: inline-block;
	background: #df7366;
	color: #fff;
	text-align: center;
	border-radius: 0.5em;
	text-decoration: none;
	padding: 0.65em 3em 0.65em 3em;
	border: 0;
	cursor: pointer;
	outline: 0;
}
.button:hover {
	color: #fff;
	background: #ef8376;
}
.button:active {
}
.button.alt {
}
.button.alt:hover {
}
.button.alt:active {
}
.button.small {
}
.button.big {
}
.button.huge {
}
/* Camera*/
#cam {
	float: left;
	width: 450px;
	height: 360px;
	margin: 50px
}
.btn {
	height: 28px;
	line-height: 28px;
	border: 1px solid #d3d3d3;
	margin-top: 10px;
	background: url(btn_bg.gif) repeat-x;
	cursor: pointer
}
#results {
	margin-top: 50px;
}
/*Circular*/
.wrap {
	width: 400px;
	margin: 100px auto;
	font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
}
</style>
</head>
<body>
<div id="main">
  <h1 class="top_title">
    <center>
      <p style="color:#FFF1B7">Take a photo</p>
    </center>
  </h1>
  <div id="cam" align="center"> 
    <script language="JavaScript">
            webcam.set_api_url('action.php?uid=<?php echo time();?>');
            webcam.set_quality(100); // JPEG quality (1 - 100)
            webcam.set_shutter_sound(true); // play shutter click sound
            document.write(webcam.get_html(420, 340, 420, 340));//webcam.get_html(width, height, server_width, server_height)
    </script>
    <p style="text-align: center">
      <footer>
        <input type="button" class="button" value="Setting" class="btn" onclick="webcam.configure();">
        <input type="button" class="button" value="Photograph" class="btn" onclick="take_snapshot();">
        <input type="button" class="button" value="Retake" class="btn" onclick="webcam.reset();">
      </footer>
    </p><br>
    <script language="JavaScript">
            webcam.set_hook('onComplete', 'my_completion_handler');
			
            function take_snapshot() {
                // take snapshot and upload to server
                document.getElementById('results').innerHTML = '<h4>uploading...</h4>';
                webcam.snap();
            }

            function my_completion_handler(msg) {
                // extract URL out of PHP output
                if (msg.match(/(http\:\/\/\S+)/)) {
                    var image_url = RegExp.$1;
                    // show JPEG image in page
                    document.getElementById('results').innerHTML = '<h4>Upload Successful!</h4>' + '<img src="' + msg + '">';

                } else {
                    alert("PHP Error:" + msg);
                }
            }
        </script> 
  </div>
  <div id="results"> </div>
</div>
</body>
</html>
