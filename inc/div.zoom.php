<?php
echo "\n".tb('.').'<div class="zoom">';
tb('+');
	echo "\n".tb('.').'<a href="?loc='.urlencode($GLOBALS['loc']).'" class="closeimg"></a>';

	echo "\n".tb('.').'<img src="'.$GLOBALS['curr']['imgpth'].$GLOBALS['zoom'].'" alt=""/>';
	
	if(isset($GLOBALS['cap'])){
		echo "\n".tb('.').'<div id="capbox">';
		tb('+');
			echo $GLOBALS['cap'];
			tb('-');
		echo "\n".tb('.').'</div>';
	};
	tb('-');
echo "\n".tb('.').'</div>';
?>