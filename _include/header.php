<?php require_once('config.php'); ?>
	<!DOCTYPE html>

	<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

	<head><script>
function changeImage()
{
element=document.getElementById('myimage')
if (element.src.match("bulbon"))
  {
  element.src="pic_bulboff.gif";
  }
else
  {
  element.src="pic_bulbon.gif";
  }
}
</script>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Pragma" content="No-cache" />
		<meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
		<meta http-equiv="Expires" content="-1" />
		<title>GP I/O CONNECT</title>
		<link type="text/css" rel="stylesheet" href="_css/common.css" media="screen" />
		<link rel="shortcut icon" type="image/x-icon" href="_image/favicon.png">
		
		<script type="text/javascript" src="_js/menu.js"></script>
		<script type="text/javascript" src="_js/wizard.js"></script>
		<script type="text/javascript" src="_js/boot.js"></script>
		<script type="text/javascript" src="_js/school.js"></script>


		<!-- LIVICON -->
		<script src="_js/jquery-1.9.1.min.js"></script>
		<script src="_js/raphael-min.js"></script>
		<script src="_js/livicons-1.3.min.js"></script>
		<!--<script for=window event=onbeforeunload>  
  if(event.clientX > document.body.clientWidth && event.clientY < 0 || event.altKey)  
  uiLogout('322d08eb');
</script>-->


	</head>

	<body>

		<!-- header -->
		<div class="header">
			<!-- title -->
			<div class="title">
				<div class="product"><?php echo version;?>
					
				</div>
				<div class="firmware"><span id="lang_firmware"> </span></div>
			</div>
			<!-- logo -->
			<div class="logo"><img src="_image/logo.jpg" alt="logo" /></div>
		</div>
		<!-- main menu -->
		<div class="main_menu">
			<div class="model"><img src="_image/raspbery.png" alt="dsl-2750u" /></div>
			<!-- left logo image-->
			<ul>
				<li><a id="<?php  if(basename($_SERVER['PHP_SELF'])=='dashbord.php') echo 'on';?>" href="index.php"><span ><i class="livicon"  data-name="barchart" data-size="16" data-color="#FFFFFF"></i> status</span></a></li>

				<li><a id="<?php  if(basename($_SERVER['PHP_SELF'])=='gpio.php') echo 'on';?>" href="gpio.php"><span><i class="livicon"  data-name="flickr" data-size="16" data-color="#FFFFFF"></i> GPIO</span></a></li>

				<li><a id="<?php  if(basename($_SERVER['PHP_SELF'])=='management.php') echo 'on';?>" href="management.php"><span><i class="livicon"  data-name="wrench" data-size="16" data-color="#FFFFFF"></i>MANEAGE</span></a></li>

				<li><a id="<?php  if(basename($_SERVER['PHP_SELF'])=='physical_process.php' || basename($_SERVER['PHP_SELF'])=='material.php') echo 'on';?>" href="physical_process.php"><span id="lang_gpio"><i class="livicon"  data-name="notebook" data-size="16" data-color="#FFFFFF"></i> LEARN</span></a></li>

				<li><a id="<?php  if(basename($_SERVER['PHP_SELF'])=='help.php') echo 'on';?>" href="help.php"><span class="livicon"  data-name="help" data-size="16" data-color="#FFFFFF" > help</span></a></li>
			</ul>
		</div>
		<!-- Content -->
		<table class="content" id="Content">
			<tr>
				

				<!-- config -->
