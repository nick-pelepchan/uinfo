<?php

/////////////////////////////////////////////////////////////////
// GESHI
//
	function geshi($source,$language){
		$path='./admin/geshi/geshi';

		$geshi = new GeSHi($source, $language, $path);
		$geshi->enable_classes();
		$geshi->set_header_type(GESHI_HEADER_DIV);
		$geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS, 2);
	/*
		echo '<!--';
		echo $geshi->get_stylesheet();
		echo '-->';
	*/  
		$rtn = $geshi->parse_code();
		
		return $rtn;
	}
//
//
/////////////////////////////////////////////////////////////////

?>