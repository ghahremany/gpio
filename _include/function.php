<?php

 function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}


function Temperature(){

	$temp = shell_exec('cat /sys/class/thermal/thermal_zone*/temp');
	$temp = round($temp / 1000, 1);
	echo $temp;
}

function cpuinfo(){

	$cpuusage = 100 - shell_exec("vmstat | tail -1 | awk '{print $15}'");
	/*$clock = shell_exec('cat /sys/devices/system/cpu/cpu0/cpufreq/scaling_cur_freq');
	$clock = round($clock / 1000);*/
	 echo $cpuusage;
}


function uptime(){


	$uptime = shell_exec("cat /proc/uptime");
	$uptime = explode(" ", $uptime);
	$uptime = gmdate("H:i", $uptime[0]);
	echo $uptime;
}

function disk_used(){

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
}

function operating_system(){


	$operating_system = shell_exec('uname -a');
	echo $operating_system;
}


function gpio($pin_number,$pin_status,$status){
//$pin_number= Number of raspberry GPIO pin  
//$pin_status= on or off
//$status= output or input
		shell_exec("gpio -1 mode $pin_number $status");
		
			shell_exec("gpio -1 write $pin_number $pin_status");
}
function gpio_status($pin_number){
	$status=shell_exec("gpio -1 read $pin_number");
if($status==1){

echo '<input type="submit"  style="background-color:#00FF00;    width: 36px;
    height: 26px;" name="on" value="'.$pin_number.'"/>';
}
elseif($status==0){
echo '<input type="submit" style="background-color: #dadada;    width: 36px;
    height: 26px;" name="off" value="'.$pin_number.'"/>';


}


}							
?>
