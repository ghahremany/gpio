<?php
session_start();
if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == "logined") {
	require_once('_include/header.php'); 
	require_once('_include/sub_menu.php'); 
	require_once('_include/function.php');

	
	
	//disk usage
	$bytes = disk_free_space("."); 
	$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
	$base = 1024;
	$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
	$disk_free =  sprintf('%1.2f' , $bytes / pow($base,$class));
	$bytes = disk_total_space("."); 
	$si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
	$base = 1024;
	$class = min((int)log($bytes , $base) , count($si_prefix) - 1);
	$disk_total = sprintf('%1.2f' , $bytes / pow($base,$class));
	
	$disk_used = $disk_total - $disk_free;
	$disk_percentage = round($disk_used / $disk_total * 100);
	
	
	
	//memory usage
	$out = shell_exec('free -mo');
	preg_match_all('/\s+([0-9]+)/', $out, $matches);
	list($memory_total, $memory_used, $memory_free, $memory_shared, $memory_buffers, $memory_cached) = $matches[1];
	$memory_percentage = round(($memory_used - $memory_buffers - $memory_cached) / $memory_total * 100);
	
	#$servicesArray = shell_exec('/usr/sbin/service --status-all');
	
	
	
	$cpu_info = shell_exec('lscpu');
	$cpu_info = str_replace("\n", '. ', $cpu_info);
	

	
	
	$load = sys_getloadavg();
	
	$processes = shell_exec("ps aux | wc -l");
	
	$top = shell_exec("top -b -n 1 | head -n 30  | tail -n 30");
	
	$users = shell_exec("w");
	$users = preg_replace('/^.+\n/', '', $users);
	
	$disks = shell_exec("df");
	
	$date = shell_exec("date");



?>
    <td>
        <!-- config -->
        <style type="text/css">
            <!-- .td_bold {
                font-weight: bold;
            }
            
            .td_table_s td {
                text-align: left;
                width: 323px;
            }
            
            -->

        </style>
        <td>
            <div class="config2">
                <p class="bk_orange" id="deviceinfo">device info</p>
                <div class="div_orange">
                    <p id="Thisinformation">It indicates the current status of all the connections.</p>
                </div>

                <p class="do bk_black" id="systeminfo">system info</p>
                <div class="div_black">
                    <table class="td_table_s" id='system_info_table'>
                        <tr>
                            <td class="td_bold"><span id="ModelName">Divice Name :</span></td>
                            <td id="system_info_model_name">
                                <?php echo gethostname(); ?> (
                                    <?php echo $_SERVER['SERVER_ADDR'];?>)</td>
                        </tr>
                        <tr>
                            <td class="td_bold"><span id="SerialNumber">CPU usage :</span></td>
                            <td id="serial_number">
                                <?php  cpuinfo(); ?>%</td>
                        </tr>
                        <tr>
                            <td class="td_bold"><span id="SerialNumber">System Time :</span></td>
                            <td id="serial_number">
                                <?php echo $date; ?>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_bold"><span id="TimeandDate">Local disk space :</span></td>
                            <td id="system_info_time">
                                <?php echo $disk_total; ?> GB total /
                                    <?php echo $disk_free; ?> GB free /
                                        <?php echo $disk_used; ?> GB used</td>
                        </tr>
                        <tr>
                            <td class="td_bold"><span id="HardwareVersion">Memory Load :</span></td>
                            <td id="system_info_HardwareVersion">
                                <?php echo $memory_percentage ?>%</td>
                        </tr>

                        <tr>
                            <td class="td_bold"><span id="HardwareVersion">Temperature :</span></td>
                            <td id="system_info_HardwareVersion">
                                <?php Temperature(); ?> °C
                            </td>
                        </tr>


                        <tr class="SoftwareVersion_info">
                            <td class="td_bold"><span id="SoftwareVersion">Operating System :</span></td>
                            <td id="system_info_SoftwareVersion">
                                <?php operating_system(); ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_bold"><span id="FirmwareVersion">Firmware Version :</span></td>
                            <td id="system_info_firmware">
                                <?php echo version;?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_bold"><span id="UpTime">System Up Time :</span></td>
                            <td id="system_info_uptime">
                                <?php	uptime();?>
                            </td>
                        </tr>
                    </table>
                </div>

                <!--<p class="do bk_black" id="InternetInfo">Internet Info</p>
		<div class="div_black">
			<div class="div_left" style="width:auto;" id="InternetConnectionStatus">Internet Connection Status :</div>
			<div class="div_right"><select name='select_wan_interface' id = "select_wan_interface" onchange="select_wan()"></select></div>
			<div id="internet_info">
				<table class="td_table_s">
					<tr>
						<td class="td_bold"><span id="InternetConnectionStatus1" >Internet Connection Status:</span></td>
						<td id="internet_connection_status">&nbsp;</td>
					</tr>
					<tr>
						<td class="td_bold"><span id="WanServiceType" >Operating system type:</span></td><td id="wan_service_type"><?php echo $operating_system; ?></td>
					</tr>
					<tr>
						<td class="td_bold"><span id="DefaultGateway" >Default Gateway:</span></td><td id="internet_gateway">&nbsp;</td>
					</tr>
					<tr>
						<td class="td_bold"><span id="PreferredDnsServer" >Preferred DNS Server:</span></td><td id="internet_first_dns">&nbsp;</td>
					</tr>
					<tr>
						<td class="td_bold"><span id="AlternateDnsServer" >Alternate DNS Server:</span></td><td id="internet_second_dns">&nbsp;</td>
					</tr>
		
					
					<		
					<tr>
						<td class="td_bold">Connection Up Time:</td><td id="internet_up_time">&nbsp;</td>
					</tr> 
					
				</table>
				<table class="td_table_s">
					<tr>
						<td class="td_bold"><span id="DataTimeCounter" >Data Time Counter (Second):</span></td><td id="internet_time_counter">&nbsp;</td>
					</tr>
				</table>
			</div>
			<div id="internet_info_bridge" style="display:none;">
				<table class="td_table_s">
					<tr>
						<td class="td_bold"><span id="InternetConnectionStatus2" >Internet Connection Status:</span></td>
						<td id="internet_connection_status_bridge">&nbsp;</td>
					</tr>
							
					<tr>
						<td class="td_bold">Connection Up Time:</td><td id="internet_up_time_bridge">&nbsp;</td>
					</tr>
					 
					<tr>
						<td class="td_bold"><span id="WanServiceType1" >Wan service Type:</span></td><td id="wan_service_type1">&nbsp;</td>
					</tr>
				</table>
			</div>
			
			<p></p>
			<p></p>
			
			<table class="td_table_s" id="streamLineRate">
					<tr class="tr_bold">
						<td colspan="7"><span id="lang_LineRate" >Line Rate :</span></td>
					</tr>
					<tr>
						<td class="td_bold"><span id="DownstreamLineRate" >Downstream Line Rate (Kbps):</span></td><td id="internet_down_rate">&nbsp;</td>
					</tr>
					<tr>
						<td class="td_bold"><span id="UpstreamLineRate" >Upstream Line Rate (Kbps):</span></td><td id="internet_up_rate">&nbsp;</td>
					</tr>
			</table>
			
			<p></p>
			<p></p>
			
			<table class="td_table_s" id="wan_info">
				<tr class="tr_bold">
					<td colspan="7"><span id="lang_EnabledWANConnections" >Enabled WAN Connections :</span></td>
				</tr>
				<tr class="tr_bold">
					<td>VPI/VCI</td><td><span id="lang_ServiceName">Service Name</span></td>
					<td>
						<span id="lang_Protocol">Protocol</span></td><td><span id="lang_IGMP" >IGMP</span>
					</td>
					<td>
						<span id="lang_QoS" >QoS</span></td><td><span id="lang_IPAddress2" >IP Address</span>
					</td>
				</tr>
			</table>
		</div> 
		
		<p class="do bk_black" id="lang_wirelessInfo">wireless Info</p>
		<div class="div_black">
			<div class="div_left" style="width:auto; text-align:left;" id="lang_selectwireless">select wireless :</div>
			<div class="div_right"><select name='select_wireless' id = "select_wireless" onchange="select_wireless()"></select></div>
				<table class="td_table_s" id='wireless_info_table'>
					<tr>
						<td class="td_bold"><span id="lang_MACAddress1" >MAC Address:</span></td><td id="wireless_mac_address">&nbsp;</td>
					</tr>
					<tr>
						<td class="td_bold"><span id="lang_Status2" >Status:</span></td><td id="wireless_status">&nbsp;</td>
					</tr>
					<tr>	
						<td class="td_bold"><span id="lang_NetworkName" >Network Name (SSID):</span></td><td id="wireless_ssid">&nbsp;</td>
					</tr>
					<tr>	
						<td class="td_bold"><span id="lang_Visibility" >Visibility:</span></td><td id="wireless_visibility">&nbsp;</td>
					</tr>
					<tr>	
						<td class="td_bold"><span id="lang_SecurityMode" >Security Mode:</span></td><td id="wireless_security">&nbsp;</td>
					</tr>
				</table>
		</div> 
		
		<p class="do bk_black" id="lang_localinfo">local network Info</p>
		<div class="div_black">
			<table class="td_table_s" id='local_info_table'>
			<tr>
				<td class="td_bold"><span id="lang_MACAddress" >MAC Address:</span></td><td id="local_mac_address">&nbsp;</td>
			</tr>
			<tr>
				<td class="td_bold"><span id="lang_IPAddress" >IP Address:</span></td><td id="local_ip_address"><?php echo $_SERVER['SERVER_ADDR'];?></td>
			</tr>
			<tr>
				<td class="td_bold"><span id="lang_SubnetMask" >Subnet Mask:</span></td><td id="local_netmask">&nbsp;</td>
			</tr>
			<tr>
				<td class="td_bold"><span id="lang_DHCPServer" >DHCP Server:</span></td><td id="lccal_dhcp_enable">&nbsp;</td>
			</tr>
			</table>
		</div>-->




                <p class="do bk_black" id="lang_localinfo">Users</p>
                <div class="div_black">
                    <table class="td_table_s" id='local_info_table'>
                        <pre><?php echo $users; ?></pre>
                    </table>
                </div>


                <p class="do bk_black" id="lang_localinfo">Disks</p>
                <div class="div_black">
                    <table class="td_table_s" id='local_info_table'>
                        <pre><?php echo $disks; ?></pre>
                    </table>
                </div>

                <p class="do bk_black" id="lang_localinfo">Top Processes</p>
                <div class="div_black">
                    <table class="td_table_s" id='local_info_table'>
                        <pre><?php echo $top; ?></pre>
                    </table>
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
