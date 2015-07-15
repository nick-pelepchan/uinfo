<?php
$arr = array(
	'Up/Down Binary',
	'This tool counts up or down in binary based on the user set interval and boolean input.',
	'Utilize the same integer to binary converter as prior.  Take the boolean input and convert it to binary.  Again take the boolean input reverse (<i>not</i>) it and convert it to binary.  Multiply this value by -1 and add it to the original binary output from the boolean input.  For example:<br><br><span class="math"><i>if</i> = TRUE <i>then</i> 1 + (-1(0)) = 1 + 0 = 1</span><br><span class="math"><i>if</i> = FALSE <i>then</i> 0 + (-1(1)) = 0 + -1 = -1</span><br><br>This value is piped into the integral sum and converted from a signal to decimal and sent to the binary display.'
);
	
intro_loop($arr);

?>