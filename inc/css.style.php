<?php
define('_BACK_',_GHOST_WHITE_);

echo "\n".'<style>'."\n";

include(__DIR__.'/css.resets.css');
include(__DIR__.'/css.font.css');
include(__DIR__.'/css.layout.php');
include(__DIR__.'/css.media.php');
include(__DIR__.'/css.base.php');
include(__DIR__.'/css.main.php');
include(__DIR__.'/css.misc.php');
include(__DIR__.'/css.topbar.php');

if($GLOBALS['ts']!=0){
	include(__DIR__.'/css.tile.php');
};

echo "\n".'</style>'."\n";

/* http://code.tutsplus.com/tutorials/the-30-css-selectors-you-must-memorize--net-16048
SELECTORS
* (wildcard)
# (id)
. (class)
X (type)
X:visited (pseudo-class)
X Y (descendant)
X + Y (adjacent, 1st element)
X > Y (direct children)
X ~ Y (sibling, any element)
X[title] (attributes)
X:not(Y) (negation)
X::pseudo (pseudo element)
X:nth-child(n) (nth-child)
X:nth-last-child(n) (nth-last-child)
*/
?>