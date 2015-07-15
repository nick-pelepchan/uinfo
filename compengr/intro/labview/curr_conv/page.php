<?php
$arr = array(
	'Currency Conversion',
	'Begin by creating four vertical fill slide objects in the front panel.  Enable the digital display for all four objects and convert the latter three to indicators.  Assign appropriate labels and adjust the scales to suit your needs.',
	'In the block diagram, we will need to take the control&apos;s (USD) input and multiply it by a conversion factor to get the resulting currencies.  Create three numeric multiplication objects, connecting the control (USD) to the input side of all three.  Connect the output of each multiplication object to a single indicator.  In order to accept user input for the current conversion rate, we need to create a control for each multiplication object.  Once the controls are created, readjust and align the vi&apos;s layout in the front panel.'
);
	
intro_loop($arr);

?>