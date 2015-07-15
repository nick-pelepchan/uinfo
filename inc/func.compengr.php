<?php

function intro_loop($arr){
	echo "\n".'<h1 class="solid">'.$arr[0].'</h1>';
	$i=0;
	while($i < count($arr)-1){
		echo "\n".tb('.').'<a class="izoom" tabindex="1" type="button"><img src="'.$GLOBALS['curr']['imgpth'].'/'.str_replace(",","/",$GLOBALS['sub']).'/'.$i.'.png"></a>';
		echo "\n".tb('.').'<p>'.$arr[++$i].'</p>';
	};
};

function rand_img_gal($sub){
	unset($dirarr);
	foreach(scandir($GLOBALS['curr']['incpth'].$sub) as $dir){
		if(is_dir($GLOBALS['curr']['incpth'].$sub.'/'."$dir") && $dir !== '.' && $dir !== '..'){
			$dirarr[] = $dir; 
		};
	};
	$rand = array_rand($dirarr,8);
	foreach($rand as $k => $v){
		echo "\n".tb('.').'<img tabindex="1" type="button" class="four-gal" src="'.$GLOBALS['curr']['imgpth'].$sub.'/'.$dirarr[$v].'/0.png"/>';
	};
};
?>