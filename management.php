<?php 
session_start();
if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == "logined") {

require_once('_include/header.php'); 
require_once('_include/sub_menu.php'); 
if (isset($_POST['reboot'])) {
	exec('sudo reboot');//
	
}
if (isset($_POST['update'])) {
	 exec('sudo apt-get update -y');//
	
}
if (isset($_POST['shutdown'])) {
	exec('sudo shutdown -h now');
	
}


?>
	<!-- config -->



	<style type="text/css">
		<!-- .div_left {
			width: 250px;
		}
		
		-->

	</style>
	<td>

		<div class="config2">
			<p class="do bk_black" id="lang_Sreboot" >System -- Shutdown  <i class="fa fa-power-off" aria-hidden="true"></i></p>
	  <div class="div_black">
	       <p id="lang_reboot">Click the button below to reboot the Device.</p>
		   <div class="div_button">
				<form name="shutdown" id="reboot" method="post" action="<?php $_PHP_SELF ?>">
					<input type="submit"  name="shutdown" value="Shutdown" />					
									</form>
		   </div>
	  </div>
			<!--shutdown menu-->
			<p class="do bk_black" id="lang_Sreboot">System -- Reboot</p>
			<div class="div_black">
				<p id="lang_reboot">Click the button below to reboot the Device.</p>
				<div class="div_button">
					<form name="reboot" id="reboot" method="post" action="<?php $_PHP_SELF ?>">
						<input type="submit" name="reboot" value="Reboot" />
					</form>
				</div>
			</div>



			<p class="do bk_black" id="lang_Supdate">System -- Update</p>
			<div class="div_black">
				<p id="lang_update">Update settings on the DSL router. You can update them using the configuration files your saved.</p>
				<form name="confForm1" method="post" action="<?php $_PHP_SELF ?>">

					<input type="hidden" name="update" value="update">
					<div class="div_button">
						<input type="submit" name="update" id="update" value="Update System">
					</div>
				</form>
			</div>



		</div>

	</td>

	</tr>
	</table>
	<?php require_once('_include/footer.php');
} 

else{
	header('Location: index.php');
}
?>
