<?php
// Session start
	ob_start();
	session_start();

// Includes
	include(__DIR__.'/inc/var.global.php');
	include(__DIR__.'/inc/var.color.php');
	include(__DIR__.'/inc/func.error.php');
	include(__DIR__.'/inc/func.global.php');
	include(__DIR__.'/inc/func.array.php');
	include(__DIR__.'/inc/func.hyperlink.php');
	include(__DIR__.'/inc/func.misc.php');

// Custom error handling
//	set_error_handler("customError",E_ALL);

// Get GLOBALS and site_dir
	global_build();

// Set cookies

// Page header - NO OUTPUT BEFORE THIS POINT (BOMs!)
	include(__DIR__.'/header.php');

// Include external stylesheets
	include(__DIR__.'/inc/css.style.php');
	
// Container div
	echo "\n".tb('.').'<div id="cont">';
	tb('+');
		
// Offline div
		echo "\n".tb('.').'<div id="down" style="background-image:url(/media/logo_whiteout.png);">';
		tb('+');
			echo "\n".tb('.').'<span class="v-center">Apologies, this site is being updated and is currently unavailable.</span>';
			echo "\n".tb('.').'<a href="http://www.linkedin.com/in/pelepchann" target="_blank"><img class="" src="/media/In-2C-34px-TM.png"/></a>';
			echo "\n".tb('.').'<a href="https://github.com/unassailable/uinfo" target="_blank"><img class="" src="/media/GitHub-Mark-32px.png"/></a>';
			tb('-');
		echo "\n".tb('.').'</div>';

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
	if(isset($GLOBALS['send']) && $GLOBALS['send']==9){
		session_destroy();
	};	
?>