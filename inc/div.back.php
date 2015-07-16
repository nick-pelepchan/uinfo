<?php

echo "\n".tb('.').'<style>';
	include($GLOBALS['webr'].'/inc/css.divback.php');
echo "\n".tb('.').'</style>';

echo "\n".tb('.').'<div id="back" class="return">';
tb('+');	
	echo "\n".tb('.').'<a href="'.$GLOBALS['parent']['href'];
		// Keep any set debug options across links
		if(isset($GLOBALS['debug'])){
			echo '&amp;debug='.$GLOBALS['debug'];
		};
		if(isset($GLOBALS['opt'])){
			echo '&amp;opt='.$GLOBALS['opt'];
		};
	echo '"';
	echo ' title="'.$GLOBALS['parent']['title'].'">';
	tb('+');
		echo "\n".tb('.').'<img class="arrow" src="/media/arrow_left.png" alt=""/>';
		echo '<span class="desktop-only">'.$GLOBALS['parent']['name'].'</span>';
		tb('-');
	echo "\n".tb('.').'</a>';
	tb('-');
echo"\n".tb('.').'</div>';

?>