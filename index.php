<?php
// Session start
	ob_start();
	session_start();

// Includes
	include(__DIR__.'/admin/functions.php');
	include(__DIR__.'/admin/vars.php');
	include(__DIR__.'/admin/geshi/geshi.php');
	//require_once(__DIR__.'/admin/tadd.php'); // IP logging
	
// Error handling
//	set_error_handler("customError",E_ALL);

// Get globals
  $GLOBALS['debug'] = strtolower(isset($_GET['debug'])?urldecode($_GET['debug']):''); // debug flag
  $GLOBALS['loc'] = strtolower(isset($_GET['loc'])?urldecode($_GET['loc']):'main'); // location string
  $GLOBALS['sub'] = strtolower(isset($_GET['sub'])?urldecode($_GET['sub']):'desc'); // sub page string
  $GLOBALS['opt'] = strtolower(isset($_GET['opt'])?urldecode($_GET['opt']):''); // options string
	$GLOBALS['zoom'] = isset($_GET['zoom'])?urldecode($_GET['zoom']):''; // full page div flag
	$GLOBALS['cap'] = isset($_GET['cap'])?urldecode($_GET['cap']):''; // full page div caption string
	$GLOBALS['webr'] = __DIR__; // webdir root
	$GLOBALS['tb'] = '0'; // default indent value
  ini_grab($GLOBALS['webr']); // site directory array

// Set cookies

// Page header - NO OUTPUT BEFORE THIS POINT (BOMs!)
	include(__DIR__.'/header.php');

// Container div
	echo "\n".tb('.').'<div id="cont">';
	tb('+');

// Top bar
		include(__DIR__.'/topbar.php');
		tb('+');
		
// Main div
		echo "\n".tb('.').'<div id="main">'."\n";
		tb('+');
			page_set();
			tb('-');
		echo "\n".tb('.').'</div>'."\n";

// Debug div
		if($GLOBALS['debug']!=''){
			echo "\n".tb('.').'<div id="debug">';
			tb('+');
				include(__DIR__.'/admin/debug.php');
				tb('-');	
			echo "\n".tb('.').'</div>';
		};	

// Close container div
	echo "\n".tb('.').'</div>'."\n";
	tb('-');	

	echo "\n".tb('.').'</body>';
	tb('-');
echo "\n".tb('.').'</html>';
	
// Flush
	ob_end_flush();
?>
