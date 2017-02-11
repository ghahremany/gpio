<?php 
session_start();

if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == "logined") {

require_once('_include/header.php'); 
require_once('_include/sub_menu.php'); 
require_once('_include/function.php');
				 
				if (isset($_POST["on"])) {
					$status=$_POST["on"];
gpio($status,"0","output");
                }
                				if (isset($_POST["off"])) {
					$status=$_POST["off"];
gpio($status,"1","output");
                }
			
               



                     
                	
				?>
	<!-- config -->
	<style type="text/css">
		<!-- .div_left {
			width: 240px;
		}
		
		-->

	</style>
	<td>
		<div class="config2">
			<p class="bk_orange" id="lang_AdvancedSettings">Advanced Settings</p>
			<div class="div_orange">
				<p id="lang_dsc">
					These options are for users who wish to change the behavior of their GPIO PINS from the RASPBERRY PI. 
				</p>
			</div>

<form action="" method="post">

			<p class="do bk_black" id="lang_localinfo">GPIO PINS CONTROL</p>
                <div class="div_black">
                    <table class="td_table_s" id='local_info_table'>
                        <center><?php 
require_once('_include/config.php'); 


 connect_to_DB();
                        for($i=1; $i <41 ; $i++) { 
						if ($i=="1" ||$i=="2" || $i=="4"|| $i=="6"|| $i=="9"|| $i=="14"|| $i=="17"|| $i=="20"|| $i=="25"|| $i=="30"|| $i=="34"|| $i=="39") {
							
						}
						elseif ($i=="22") {
							gpio_status($i);
							echo"<br />";
							$result=shell_exec("gpio -1 read $i");
$Query = mysql_query ("UPDATE `gpio` SET `gpio_status` = '".$result."' WHERE `gpio_number` = '".$i."' LIMIT 1");
							
						}
						else{
							gpio_status($i);
							$result=shell_exec("gpio -1 read $i");
 $Query = mysql_query ("UPDATE `gpio` SET `gpio_status` = '$result' WHERE `gpio_number` = '$i' LIMIT 1");
						}
		

}
					 ?></center>
                    </table>
			</div>
			
</form>		
<p class="do bk_black" id="lang_localinfo">GPIO PINS STATUS</p>
                <div class="div_black">
                    <table class="td_table_s" id='local_info_table'>
                        <center><pre><?php echo shell_exec('gpio readall'); ?></pre></center>
                    </table>
                </div>	

				

			
		</div>
	</td>


	</tr>
	</table>










	<?php include('_include/footer.php');
}
else{
	sleep(1);
header("Location: index.php");
}

 ?>
