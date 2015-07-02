<?php

echo "\n".tb('.').'<div id="back" class="return">';
tb('+');
	echo "\n".tb('.').'<img class="arrow" src="/media/arrow_left.png" alt=""/>';
	lnk_build($GLOBALS['parent'],1,null);
	tb('-');
echo"\n".tb('.').'</div>';

?>