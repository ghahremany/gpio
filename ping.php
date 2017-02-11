<?php 
session_start();

if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == "logined") {
require_once('_include/header.php'); 
require_once('_include/sub_menu.php'); 
if (isset($_POST['command'])) {
	$command=$_POST['command'];
	 $result=shell_exec("ping $command -c4");//
	# code...
}


?>


	<!-- config -->
	<style type="text/css">
<!-- 
.div_left { padding-left:120px; width:150px;}
 -->
</style>
		<td>
			<div class="config2">
				<p class="bk_orange" id = "lang_traceroute1">PING</p>
				<div class="div_orange">
					<p id = "lang_routers">
						Ping diagnostics sends packets to determine the RASPBERRY PI on the Internet.
					</p>
				</div>
				
			
				
				<p class="do bk_black"  id = "lang_result">Result</p>
				<div class="div_black">
					<div align="center">
						<pre><?php echo $result; ?></pre>
						
					</div>
					
					<div class="div_right">
				
				</div></div>
				<div class="div_left" id = "lang_host">Host NAME OR IP:</div>
				<form action = "<?php $_PHP_SELF ?>" method = "post">
					<input name="command" type="text"  /></div>
					<div class="div_button">
					<input type = "submit" />
					
				</div>
				</form>
			
		</td>
		
	</tr>
</table>
<?php require_once('_include/footer.php');
}
else {
	sleep(1);
	header("Location: index.php");

} ?>