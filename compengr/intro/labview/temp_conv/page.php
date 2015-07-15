<?php
$arr = array(
	'Temperature Conversion',
	'Start off by creating two Modern Numeric Thermometers in the front panel.  Enable the digital display for both and set one of the controls to be an indicator (in this case the Fahrenheit slide scale).  Adjust the scales on each object to suit your needs.',
	'Moving over to the block diagram, we need to link the control (deg C) and the indicator (deg F) with a conversion function.  In this case degrees Celsius can be converted to Fahrenheit by multiplying by 1.8 and adding 32.  Create a numeric multiplication object and assign the constant 1.8 to it&apos;s input.  Attach the control&apos;s (deg C) output to another input on the multiplication object.  Create an addition numeric object and assign a constant to it&apos;s input with the value of 32.  Connect the multiplication object&apos;s output to the input side of the addition object.  Finally connect the addition object&apos;s output to the input on the indicator (Deg F).'
);
	
intro_loop($arr);

?>