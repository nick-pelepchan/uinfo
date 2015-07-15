<?php
$arr = array(
	'Binary Counter',
	'Tool to convert a decimal (base 10) number to binary (base 2).  16 LEDs indicate bit placement, read from right to left, and 8 bits equal 1 byte.',
	'The process involves taking each digit of the input and multiplying it by its corresponding digit place-holder value (<span class="math"><i>x</i> &times; 10<sup><i>n</i></sup></span>).  This number is then divided by 1023.  The resultant is then passed to a series of logic groups which checks <span class="math"><i>x</i> &#62; <i>constant</i></span> and if true <b>sets</b> the attached bit and <span class="math"><i>x</i> &#61; <i>x</i> &#45; <i>constant</i></span>.  If not true <span class="math"><i>x</i> &#61; <i>x</i></span> and the bit is <b>unset</b>.'
);
	
intro_loop($arr);

?>