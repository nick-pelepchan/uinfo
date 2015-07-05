<?php
$arr = array(
	array(
		 'logic',
		 'Logic Tool',
		 'In the front panel, create seven LED indicators.  Select three of the indicators and change them to controls.  Label each control "A", "B", and "C" respectively.  Label the four indicators "A and B", "A and C", "not C" and "A and B or not C".  Arrange and style as desired.',
		 'In the block diagram, arrange the current modules in a logical manner.  Create two boolean "and" modules, one "not" module and one "or" module.  Connect the inputs to the indicators in the following manner.  Input A & B connected to each input side of the "and" module, then the output connected to the "A and B" indicator.  Input A & C connected to each input side of the other "and" module, then the output connected to the "A and C" indicator.  Input C connected to the "not" module, then the output connected to the "not C" indicator.  The output of the "A and B" "and" module connected to the input of the "or" module along with the output of the "C" "not" module, then the output connected to the "A & B or not C" indicator.'
	 )
  );

?>