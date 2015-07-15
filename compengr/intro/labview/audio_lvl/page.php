<?php
$arr = array(
	'Audio Tool',
	'Begin by creating two numeric dial controls in the front panel and label one for volts DC and one for volts AC.  For this exercise the scale will be from 0 to 1 on each dial.  Next create a group of boolean LED indicators based on the desired divisions in the controls.  Using the labels on the LED indicators, create a scale for the group that matches the scale of the inputs.',
	'Switching over to the block diagram, begin by arranging your existing components in a way which makes sense.  The DC input will suffice as is (ranging from 0-1 volt).  The AC input, in order to simulate alternating current, will need some variance in the value set from the input.  We accomplish this effect by generating a random number between 0 and 1 and subtracting from it .5.  This gives us the possible values of .5 and -.5 being randomly sent as output.  Multiply this output by the AC input value to give us a fluctuating voltage between +.5 and -.5 volts.  The signal from each input needs to be sent to all the indicators, this is done by creating a numeric addition module and assigning each input to it.<br><br>The group of LED indicators will function as digital VU meter, displaying the value of the signal visually.  In order to have each LED trigger when appropriate, we utilize the numeric comparison modules.  For each LED create a greater than module and assign it a constant value.  NOTE: Ensure the assigned constant is attached to the module using the lower node, this module has a built in order of operation.  After the values are assigned, connect the common input to each comparison module and the output of each module to a corresponding LED.'
);

intro_loop($arr);

?>