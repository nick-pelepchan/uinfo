<?php

echo "\n".tb('.').'<div id="back" class="return">';
tb('+');
	echo "\n".tb('.').'<img class="arrow" src="/media/arrow_left.png" alt=""/>';
	echo "\n".tb('.').'<span class="desktop-only">';
	lnk_build($GLOBALS['parent'],1,null);
	echo "\n".tb('.').'</span>';
	tb('-');
echo"\n".tb('.').'</div>';

?>