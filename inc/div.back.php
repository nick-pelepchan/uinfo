<?php

echo "\n".tb('.').'<div id="back" class="tile return">';
tb('+');
	echo "\n".tb('.').'<img src="/media/arrow_left.png" alt=""/>';
	lnk_build($GLOBALS['parent']);
	tb('-');
echo"\n".tb('.').'</div>';

?>