<?php
		echo "\n".tb('.').'<div id="topbar">';
		tb('+');
			echo "\n".tb('.').'<img src="/media/name.png" alt="Unassailable Info"/>';
			
			if($GLOBALS['ts']==0){
				include(__DIR__.'/inc/div.back.php');
			};
			
			
			tb('-');
		echo "\n".tb('.').'</div>';
		tb('-');
?>