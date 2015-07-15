<?php
$arr = array(
	'Material Resistivity',
	'',
	'<p>In order to expedite the process of identifying the resistivity of a material, this tool has been created.  When creating the menu ring elements for the material selection, ensure that the type of the element is extended, single or double precision.  If it is not, you will be restricted to integers when assigning the value to your materials.',
	'Because these values are in scientific notation we need to multiply the output of the list by <span class="math">10<sup>8</sup></span>.  A similar list for semiconductors was also created.  These values are combined and multiplied by the length of the material in meters.  Take this value and divide it by the surface area of a perpendicular cross section of the material (selectable by the AWG ring menu list).  Our final resistance is displayed in the numeric display.'
);
	
intro_loop($arr);

?>