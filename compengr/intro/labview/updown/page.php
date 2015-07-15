<?php
$arr = array(
	'Up/Down Meter',
	'This vi uses a time domain module to count from 0 to 10 and then back down to 0 again.',
	'Using two <i>for</i> loops, one nested within the other.  The outer loop maintains an overall count towards 100.  The inner loop counts to 10 with a 100ms wait time in between steps.  The outer loop&apos;s iteration output is calculated to the power of -1.  This result is piped into the integral sum module which returns the integral of the input, calculated as <span class="math"><i>y<sub>i</sub></i> = <i>y</i><sub><i>i</i>-1</sub> + <i>x<sub>i</sub>dt</i></span>.'
);
	
intro_loop($arr);

?>