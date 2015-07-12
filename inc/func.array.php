<?php

/////////////////////////////////////////////////////////////////
// Array manipulation
//
function arr_parse($needle,$haystack) {
	// returns comma list of $needle location in $haystack
	$ky = arr_parent($needle,$haystack);
	if($ky!=$needle){
		$ky = $ky.','.arr_parse($needle,$haystack[$ky]['child']);
	};
	return $ky;
};

function arr_keysrch($needle,$haystack){
	// returns element's value based on key value
	foreach($haystack as $k => $v){
		if($k===$needle){
			return $v;
		} else if(is_array($v)) {
			$rslt = arr_keysrch($needle,$haystack[$k]);
			if($rslt!==false){
				return $rslt;
			};
		};
	};
	return false;
};

// http://stackoverflow.com/questions/2504685/php-find-parent-key-of-array
function arr_parent($needle,$haystack) {
	// returns highest parent key of $needle in $haystack
	foreach($haystack as $k => $v){
	if($v===$needle){
			return true;
		} else if(is_array($v)){
			$found = arr_parent($needle,$haystack[$k]);
			if($found!==false){
				return $k;
			};
		};
	};
	return false;
};

function arr_mkey($needle,$haystack){
	// return major parent key name of $needle in $haystack
	$i = arr_parse($needle,$haystack);
	$i = explode(",", $i);
	$c = count($i)-2;
	for($j=0;$j<$c;$j++){
		unset($i[$j]);
	};
	unset($i[$j+1]);
	return $i[$j];
};

function arr_kname($needle,$haystack) {
	// returns direct parent key name of $needle in $haystack
	foreach($haystack as $k => $v){
		if(is_array($v)){
			$found = arr_parent($needle,$v);
			if($found===true){
				return $k;
			} else if(is_string($found)){
				return $found;
			};
		} else if($k==='name' && $v===$needle){
			return true;
		};
	};
	return false;
};
//
//
/////////////////////////////////////////////////////////////////

?>