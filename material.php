
<?php session_start();
if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == "logined") { require_once('_include/header.php'); 
require_once('_include/sub_help_menu.php');?>


<td>
	<div class="config1">
	
		<p class="bk_orange" id = "lang_setup_menu">MENU</p>
		<div do class="div_black help_table">
			<ul>
				<li><a href="#breadboard">What is a breadboard?</span></a></li>
				<li><a href="#resistor"><span id = "lang_internet_menu">What is a resistor?</span></a></li>
				<li><a href="#LED"><span id = "lang_wireless_menu">What is an LED?</span></a></li>
				<li><a href="#jumper"><span id = "lang_internet_menu">What is a jumper wire?</span></a></li>
				<li><a href="#PIR"><span id = "lang_wireless_menu">What is a PIR Motion Sensor?</span></a></li>
				
			</ul>
		</div>




<!-- block  -->
		<p class="do bk_black"><a name="Internet"><span id = "breadboard">What is a breadboard?</span></a></p>
		<div do class="div_black help_table">
			<p>You can think of a breadboard as being something like an artist's canvas, but without any of what we create on the canvas being permanent. While it is possible to make a circuit without a breadboard, it keeps components organised rather than being a mess of wires without clear indication of how every wire connects to each other. Secondly, if you were to take a circuit and design it to fit on a PCB, a breadboard allows you to organise components logically before making the design permanent.</p>
<img src="_image/breadboard.png" alt="" />
<p>From an electronics perspective, horizontal lines of holes are connected together inside the breadboard by metal connections, with the components inside the holes clipping onto each connection.</p>
<p>Along the sides of the breadboard are power and ground rails - these connect vertically instead of horizontally, and are used to tidy up the circuits by being a union point for any power connections. It's also safer this way, as all power can be disconnected from components by pulling the power source's connection to these rails, rather than pulling the connection to each individual component requiring power.</p>
<p>The name breadboard comes from the the fact that engineers in the past would prototype circuits on bits of wood. Often these bits of wood would be breadboards they'd pinch from the kitchen!</p>
<p><img src="_image/early_breadboard.jpg" alt="Early Breadboard" /></p>

		</div>
		<!-- block  -->

<!-- block  -->
		<p class="do bk_black"><a name="resistor"><span id = "resistor">What is a resistor?</span></a></p>
		<div do class="div_black help_table">
			<p>Resistors are a way of limiting the amount of electricity going through a circuit; specifically, they limit the amount of <strong>current</strong> that is allowed to flow. The measure of resistance is the <strong>Ohm (Ω)</strong>, and the larger the resistance, the more it limits the current.</p>
<p><img src="_image/resistor-330r.png" alt="" /></p>
<p>The value of a resistor is marked with coloured bands along the length of the resistor body. A resistor commonly used in LED projects has the resistance value of a 330Ω. You can identify the 330Ω resistors by the colour bands along the body. The colour coding will depend on how many bands are on the resistors supplied: If there are four colour bands, they will be orange, orange, brown, and then gold. If there are five bands, then the colours will be orange, orange, black, black, brown.</p>
<p>You have to use resistors to connect LEDs up to the GPIO pins of the Raspberry Pi. The Raspberry Pi can only supply a small current (about 60mA). The LEDs will want to draw more, and if allowed to they will burn out the Raspberry Pi. Therefore putting the resistors in the circuit will ensure that only this small current will flow and the Pi will not be damaged. It does not matter which way round you connect the resistors. Current flows in both directions through them.</p>
		</div>
		<!-- block  -->

<!-- block  -->
		<p class="do bk_black"><a name="Internet"><span id = "LED">What is an LED?</span></a></p>
		<div do class="div_black help_table">
			<p><img src="_image/led.png" alt="" /></p>
<p>LED stands for Light Emitting Diode. An LED glows when electricity is passed through it. When you pick up the LED, you will notice that one leg is longer than the other.The longer leg (known as the anode), is always connected to the positive supply of the circuit. The shorter leg (known as the cathode) is connected to the negative side of the power supply, known as ground. LEDs will only work if power is supplied the correct way round (i.e. if the polarity is correct). You will not break the LEDs if you connect them the wrong way round, but they will not glow. If you find that they do not light in your circuit, it may be because they have been connected the wrong way round.</p>
<h3>Why does the LED shine?</h3>
<p>When a circuit is plugged into the Raspberry Pi GPIO pins, electricity flows through the circuit. The flow is called the current. The LED lights up only when electric current flows from the long leg through the bulb to the short leg. The resistor reduces the amount of electric current passing through the circuit. This protects the LED from breaking, as a high current will make the light shine more brightly and then stop working.</p>


		</div>
		<!-- block  -->
		<!-- block  -->
		<p class="do bk_black"><a name="Internet"><span id = "jumper">What is a jumper wire?</span></a></p>
		<div do class="div_black help_table">
			<p>Jumper wires are used on breadboards to ‘jump’ from one connection to another. Commonly, jumper wires have different connectors on each end. There are three types of jumper wires:</p>
<table>
<thead>
<tr>
<th style="text-align: left;"></th>
<th></th>
<th style="text-align: left;"></th>
</tr>
</thead>
<tbody>
<tr>
<td style="text-align: left;"><strong>Male to Male</strong></td>
<td><img src="_image/jumper-male-to-male.png" alt="" /></td>
<td style="text-align: left;">Both ends have a 'pin' that can be used with breadboards.</td>
</tr>
<tr>
<td style="text-align: left;"><strong>Male to Female</strong></td>
<td><img src="_image/jumper-male-to-female.png" alt="" /></td>
<td style="text-align: left;">The end with the ‘pin’ will go into a Breadboard. The end with the piece of plastic with a hole in it will go onto the Raspberry Pis GPIO pins.</td>
</tr>
<tr>
<td style="text-align: left;"><strong>Female to female</strong></td>
<td><img src="_image/jumper-female-to-female.png" alt="" /></td>
<td style="text-align: left;">Both ends have a piece of plastic with a hole in it and can be used with Raspberry Pis GPIO pins and components.</td>
</tr>
</tbody>
</table>
<p>We use jumper wires to connect to the GPIO pins on the Raspberry Pi and breadboards. It's a really quick and simple way to get started making simple circuits.</p>
		</div>
		<!-- block  -->

		<p class="do bk_black"><a name="Internet"><span id = "PIR">What is a PIR Motion Sensor?</span></a></p>
		<div do class="div_black help_table">

<p><strong>PIR</strong> stands for <strong>Passive Infrared</strong>. It's a type of sensor that you would most often find in the corners of rooms for burglar alarm systems. All objects whose temperatures are above absolute zero emit infrared radiation. Infrared wavelengths are not visible to the human eye, but they can be detected by the electronics inside one of these modules.</p>
<p>The sensor is regarded as passive because it doesn't send out any signal in order to detect movement. It adjusts itself to the infrared signature of the room it is in and then watches for any changes. Any object moving through the room will disturb the infrared signature, and will cause a change to be noticed by the PIR module.</p>
<p><img src="_image/pir_module.png" alt="" /></p>
<p>We don't need to worry about its inner workings. What we're interested in are the three pins on it; we can connect those to the Raspberry Pi GPIO pins. One pin is for +5 volts, one pin is for ground and the other is the sensor pin (the middle pin on our Pi). This sensor pin will receive power whenever motion is detected by the PIR module. We can then see that happening on the Raspberry Pi and take action accordingly.</p>


		</div>
		<!-- block  -->



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