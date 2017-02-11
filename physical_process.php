
<?php session_start();
if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == "logined") { require_once('_include/header.php'); 
require_once('_include/sub_help_menu.php');
?>


<td>
	<div class="config1">
	
		<p class="bk_orange" >MENU</p>
		<div do class="div_black help_table">
			<ul>
				<li><a href="#Internet">GETTING STARTED WITH PHYSICAL COMPUTING ON THE RASPBERRY PI</span></a></li>
				<li><a href="#GPIO">GPIO</a></li>
				<li><a href="#What_can_I_do">What are they for? What can I do with them?</a></li>
				
				<li><a href="#WORK">How the GPIO pins work</a></li>
				
				<li><a href="#NUMBER">GPIO Pin Numbering</a></li>
				
				
				
				
				
				
				
			</ul>
		</div>



<!-- block  -->
		<p class="do bk_black"><a name="Internet"><span id = "Internet">GETTING STARTED WITH PHYSICAL COMPUTING ON THE RASPBERRY PI</span></a></p>
		<div do class="div_black help_table">
			<p id = "lang_internet_htlp">One powerful feature of the Raspberry Pi is the row of GPIO pins along the top edge of the board. GPIO stands for General-Purpose Input/Output. These pins are a physical interface between the Pi and the outside world. At the simplest level, you can think of them as switches that you can turn on or off (input) or that the Pi can turn on or off (output).

The GPIO pins are a way in which the Raspberry Pi can control and monitor the outside world by being connected to electronic circuits. The Pi is able to control LEDs, turning them on or off, or motors, or many other things. It is also able to detect whether a switch has been pressed, or temperature, or light. We refer to this as physical computing.</p>
		</div>
		<!-- block  -->
               
<!-- block  -->
		<p class="do bk_black"><a name="Internet"><span id = "GPIO">GPIO</span></a></p>
		<div do class="div_black help_table">
			
<p>Models A+, B+ and Pi 2 have 40 pins that look like this:</p>
<p><img src="_image/gpio-pins-pi2.jpg" alt="GPIO pins" /></p>
<p>These pins are a physical interface between the Raspberry Pi and the outside world. You can program the Raspberry Pi to switch devices on and off (output), or receive data from sensors and switches (input). Of the 40 pins, 26 are GPIO pins and the others are power or ground pins (plus two ID EEPROM pins which you should not play with unless you know your stuff!)</p>
<p><img src="_image/gpio-numbers-pi2.png" alt="GPIO layout" /></p>
<p>Models A and B have only 26 pins, and look like this:</p>
<p><img src="_image/gpio-pins.jpg" alt="" /></p>
<p>Note that the numbering of the GPIO pins is rather unusual. This is explained in the section on pin numbering, below.</p>
		</div>
		<!-- block  -->
			
<!-- block  -->
		<p class="do bk_black"><a name="What_can_I_do"><span id = "Internet">What are they for? What can I do with them?</span></a></p>
		<div do class="div_black help_table">
			<p id = "lang_internet_htlp">You can program the pins to interact in amazing ways with the real world. Inputs don't have to come from a physical switch; it could be input from a sensor or a signal from another computer or device, for example. The output can also do anything, from turning on an LED to sending a signal or data to another device. If the Raspberry Pi is on a network, you can control devices that are attached to it from almost anywhere, and those devices can send data back. Connectivity and control of physical devices over the internet is a powerful and exciting thing, and the Raspberry Pi is ideal for this. There are lots of brilliant examples of physical computing.</p>
		</div>
		<!-- block  -->
<!-- block  -->
		<p class="do bk_black"><a name="Internet"><span id = "WORK">How the GPIO pins work</span></a></p>
		<div do class="div_black help_table">
			<h3>Output</h3>
<p><strong>WARNING</strong>: If you follow the instructions, then messing about with the GPIO is safe and fun. Randomly plugging wires and power sources into your Pi, however, may kill it. Bad things can also happen if you try to connect things to your Pi that use a lot of power; LEDs are fine, motors are not. If you are worried about this, then you might want to consider using an add-on board such as the Explorer HAT until you are confident enough to use the GPIO directly.</p>
<p>Ignoring the Pi for a moment, one of the simplest electrical circuits that you can build is a battery connected to a light source and a switch (the resistor is there to protect the LED):</p>
<p><img src="_image/simple-circuit.png" alt="Simple circuit" /></p>
<p>When we use a GPIO pin as an output, the Raspberry Pi replaces both the switch and the battery in the above diagram. Each pin can turn on or off, or go <code>HIGH</code> or <code>LOW</code> in computing terms. When the pin is <code>HIGH</code> it outputs 3.3 volts (3v3); when the pin is <code>LOW</code> it is off.</p>
<p>Here's the same circuit using the Raspberry Pi. The LED is connected to a GPIO pin (which can output +3v3) and a ground pin (which is 0v and acts like the negative terminal of the battery):</p>
<p><img src="_image/gpio-led-pi2.png" alt="GPIO wth LED" /></p>
<p>The next step is to write a program to tell the pin to go <code>HIGH</code> or <code>LOW</code>. Here's an example using Python and here's how to do it in Scratch.</p>
<h3>Input</h3>
<p>GPIO <strong>outputs</strong> are easy; they are on or off, <code>HIGH</code> or <code>LOW</code>, 3v3 or 0v. <strong>Inputs</strong> are a bit trickier because of the way that digital devices work. Although it might seem reasonable just to connect a button across an input pin and a ground pin, the Pi can get confused as to whether the button is on or off. It might work properly, it might not. It's a bit like floating about in deep space; without a reference it would be hard to tell if you were going up or down, or even what up or down meant!</p>
<p>This is why you will see phrases like &quot;pull up&quot; and &quot;pull down&quot; in Raspberry Pi GPIO tutorials. It's a way of giving the input pin a reference so it knows for certain when an input is received.</p>
		</div>
		<!-- block  -->




<!-- block  -->
		<p class="do bk_black"><a name="NUMBER"><span id = "Internet">GPIO Pin Numbering</span></a></p>
		<div do class="div_black help_table">
			<p>When programming the GPIO pins there are two different ways to refer to them: GPIO numbering and physical numbering.</p>
<h3>GPIO numbering</h3>
<p>These are the GPIO pins as the computer sees them. The numbers don't make any sense to humans, they jump about all over the place, so there is no easy way to remember them. However, you can use a printed reference or a reference board that fits over the pins to help you out.</p>
<p><img src="_image/gpio-numbers-pi2.png" alt="GPIO layout" /></p>
<h3>Physical numbering</h3>
<p>The other way to refer to the pins is by simply counting across and down from pin 1 at the top left (nearest to the SD card). This is 'physical numbering' and it looks like this:</p>
<p><img src="_image/physical-pin-numbers.png" alt="GPIO layout" /></p>
<h3>Which system should I use?</h3>
<p>Beginners and young children may find the physical numbering system simpler: you simply count the pins. You'll still need a diagram like the one above to know which are GPIO pins, which are ground, and which are power though.</p>
<p>Generally we recommend using the GPIO numbering. It's good practice and most resources use this system. Take your pick though: as long as you use the same system within a program then all will be well. Note that pin numbering can also depend on what programming language you are using.</p>
<p>For more details on the advanced capabilities of the GPIO pins see Gadgetoid's interactive pinout diagram.</p>
<h3>Pull Up and Pull Down Resistors</h3>
<p>When a GPIO pin is in input mode and not connected to ground or 3v3, the pin is said to be 'floating', meaning that it has no fixed voltage level. That's no good for what we want, as the pin will randomly float between <code>HIGH</code> and <code>LOW</code>. We need to categorically know that the wires have touched. So we need to fix the voltage level to <code>HIGH</code> or <code>LOW</code>, and then make it change only when the we touch the wires together. You can learn more about pull up and pull down resistors in this guide.</p>
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