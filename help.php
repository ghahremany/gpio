
<?php session_start();
if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == "logined") { require_once('_include/header.php'); 
require_once('_include/sub_menu.php');?>


<td>
	<div class="config1">
	
		<p class="bk_orange" id = "lang_setup_menu">Setup Help</p>
		<div do class="div_black help_table">

			<center><img src="_image/physical-pin-numbers.png"><textarea style=" width: 664px; height: 406px;"><?php echo shell_exec('man gpio');?></textarea></center>
		</div>






               

			


	</div>
</td>
	</tr>
</table>
<?php
 require_once('_include/footer.php');
} 
else{
header('Location: index.php');
}
?>