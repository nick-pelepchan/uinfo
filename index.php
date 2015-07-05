<?php
// Session start
	ob_start();
	session_start();

// Includes
	include(__DIR__.'/inc/function.php');
	include(__DIR__.'/inc/var.global.php');
	//include(__DIR__.'/admin/geshi/geshi.php');
	//require_once(__DIR__.'/admin/tadd.php'); // IP logging
	
// Custom error handling
//	set_error_handler("customError",E_ALL);

// Get GLOBALS and site_dir
	global_build();

// Set cookies

// Page header - NO OUTPUT BEFORE THIS POINT (BOMs!)
	include(__DIR__.'/header.php');

// Container div
	echo "\n".tb('.').'<div id="cont">';
	tb('+');
		
// Main div
		echo "\n".tb('.').'<div id="main">'."\n";
		tb('+');
			page_set();
			tb('-');
		echo "\n".tb('.').'</div>'."\n";

// Top bar
		include(__DIR__.'/topbar.php');

// Debug div
		if(isset($GLOBALS['debug'])){
				include(__DIR__.'/inc/div.debug.php');
		};	
		
// Close container div
	echo "\n".tb('.').'</div>'."\n";
	tb('-');	

	echo "\n".tb('.').'</body>';
	tb('-');
echo "\n".tb('.').'</html>';
	
// Flush
	ob_end_flush();
//	if(isset($GLOBALS['send']) && $GLOBALS['send']==9){
		session_destroy();
//	};	
?>
