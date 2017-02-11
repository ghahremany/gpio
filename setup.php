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
			
                
                if (isset($_POST["vb_status"]) && isset($_POST["GPIO_number"])) {
                	$status=$_POST["vb_status"];
                	$GPIO_number=$_POST["GPIO_number"];
                      
                      	gpio($GPIO_number,$status,"output");

                     
                      	
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
					These options are for users who wish to change the behavior of their 802.11g wireless radio from the standard setting. It is not recommended to modify these settings from the factory defaults. Incorrect settings may affect your wireless performance. The default settings usually provide the best wireless performance in most environments.
				</p>
			</div>

<form action="" method="post">

			<p class="do bk_black" id="lang_localinfo">GPIO--PINS</p>
                <div class="div_black">
                    <table class="td_table_s" id='local_info_table'>
                        <center><?php for($i=1; $i <41 ; $i++) { 
						if ($i=="1" ||$i=="2" || $i=="4"|| $i=="6"|| $i=="9"|| $i=="14"|| $i=="17"|| $i=="20"|| $i=="25"|| $i=="30"|| $i=="34"|| $i=="39") {
							
						}
						elseif ($i=="22") {
							gpio_status($i);
							echo"<br />";
							
						}
						else{gpio_status($i);}
		

}
					 ?></center>
                    </table>
			</div>
			
</form>		
<p class="do bk_black" id="lang_localinfo">GPIO--PINS</p>
                <div class="div_black">
                    <table class="td_table_s" id='local_info_table'>
                        <center><pre><?php echo shell_exec('gpio readall'); ?></pre></center>
                    </table>
                </div>	
<!--
			<p class="do bk_black" id="lang_AdvancedWireless">Advanced GPIO Settings</p>
			<div class="div_black">
				<div class="div_left" id="lang_TransmissionRate">GPIO NUMBER :</div>
				<div class="div_right">

				<form method="POST" action="">
					<select name="GPIO_number" style="width:110px" >
					<?php for ($i=3; $i <41 ; $i++) { 
						
					?>
						<option value="<?php echo $i; ?>">GPIO <?php echo $i; ?> </option>
						<?php } ?>
					</select>
				</div>
				<div class="div_left" >GPIO Status :</div>

				<div class="div_right">
				
				
					<input type="radio" name="vb_status" id="INPUT_Visible" value="1" />
					<label for="INPUT_Visible" id="lang_Visible5">ON</label>
					<input type="radio" name="vb_status" id="INPUT_Invisible" value="0" />
					<label for="INPUT_Invisible" id="lang_Invisible5">OFF</label>
				</div>
				</div>



				<p class="do bk_black" id="lang_AdvancedWireless">Advanced Wireless Settings</p>
			<div class="div_black">
				<div class="div_left" >Transmit Power :</div>
				<div class="div_right">
					<select  name="" style="width:110px">
						<option value="100">100%</option>
						<option value="80">80%</option>
						<option value="60">60%</option>
						<option value="40">40%</option>
						<option value="20">20%</option>
					</select>


					
				</div>
				<div class="div_left" >Beacon Period :</div>
				<div class="div_right">
					<input type="text" style="width:100px" name="test" /> (20 ~ 1000)</div>
				<div class="div_left" id="lang_RTSThreshold">RTS Threshold :</div>
				<div class="div_right">
					<input type="text" id="INPUT_RTSThreshold" style="width:100px" /> (256 ~ 2346)</div>
				<div class="div_left" id="lang_FragmentationThreshold">Fragmentation Threshold :</div>
				<div class="div_right">
					<input type="text" id="INPUT_FragThres" style="width:100px" /> (256 ~ 2346)</div>
				<div class="div_left" id="lang_DTIMInterval">DTIM Interval :</div>
				<div class="div_right">
					<input type="text" id="INPUT_DTIM" style="width:100px" /> (1 ~ 255)</div>
				<div class="div_left" id="lang_PreambleType">Preamble Type :</div>
				<div class="div_right">
					<select id="SELECT_PreType" style="width:110px">
						<option value="0">long</option>
						<option value="1">short</option>
					</select>
				</div>
			</div>


			
			<p class="do bk_black" id="lang_SSID5">SSID</p>
			<div class="div_black">
				<div class="div_left" id="lang_EnableWireless5">Enable Wireless :</div>
				<div class="div_right">
					<input type="checkbox" id="INPUT_Enable" />
				</div>
				<div class="div_left" id="lang_WirelessNetworkName5">Wireless Network Name (SSID) :</div>
				<div class="div_right">
					<input type="text" id="INPUT_SSID" maxlength="32" style="width:100px" />
				</div>
				<div class="div_left">
					<label for="INPUT_Visible" id="lang_VisibilityStatus5">Visibility Status :</label>
				</div>
				<div class="div_right">
					<input type="radio" name="vb_status" id="INPUT_Visible" value="1" />
					<label for="INPUT_Visible" id="lang_Visible5">ON</label>
					<input type="radio" name="vb_status" id="INPUT_Invisible" value="0" />
					<label for="INPUT_Invisible" id="lang_Invisible5">OFF</label>
				</div>
				<div class="div_left" id="lang_UserIsolation5">User Isolation :</div>
				<div class="div_right">
					<select name="ls" style="width:110px">
						<option value="0">Off</option>
						<option value="1">On</option>
					</select>
				</div>
				<div class="div_left" id="lang_DisableWMMAdvertise5">WMM Advertise :</div>
				<div class="div_right">
					<select id="SELECT_WMMAdv" style="width:110px" disabled>
						 <option value="0">Off</option> 
						<option value="1">On</option>
					</select>
				</div>
				<div class="div_left" id="lang_MaxClients4">Max Clients :</div>
				<div class="div_right">
					<input type="text" id="INPUT_MaxClients" style="width:100px" /> (1 ~ 31)</div>
			</div>

			<div class="SecLevel div_button">
				<input type="submit"  value="Apply"/>
				<input type="reset" value="Cancel"/>
			</div>


</form>
	
				
			 -->	
				

			
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
