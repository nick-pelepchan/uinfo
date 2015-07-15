<?php
$arr = array(
	'Binary Counter (revamp)',
	'After playing around with the original binary counter, it was noticed that the counter would return sporadic results when <span class="math"><i>x &#62; 1024</i></span>.  To correct this, the counter was revamped to use the Descending Powers of Two and Subtraction method of conversion.  This method is easily scalable and provides no sporadic results.',
	'The input portion of this counter remains the same as before.  After combining the decimal input with the random noise generator, the input is checked against the maximum value for 2 bytes (<span class="math">{<i>x</i> &isin; &#x211D; | <i>x</i> &lt; 2<sup>(<i>bytes</i> &times; 8)</sup>}</span>).  If <span class="math"><i>x</i> &ge; 2<sup>16</sup></span> then <span class="math"><i>x</i> = 0</span>.  The input is then sent through a series of logic groups with numeric displays for educational purposes.  The logic is if <span class="math"><i>x</i> &ge; 2<sup><i>n</i></sup></span> then <span class="math"><i>x</i> = <i>x</i> - 2<sup><i>n</i></sup></span> and bit is <b>set</b> (true/1).  If <span class="math"><i>x</i> &lt; 2<sup><i>n</i></sup></span> then <span class="math"><i>x</i> = <i>x</i></span> and bit is <b>unset</b> (false/0).'
);
	
intro_loop($arr);

?>