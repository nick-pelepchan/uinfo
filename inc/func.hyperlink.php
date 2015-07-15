<?php

/////////////////////////////////////////////////////////////////
// Hyperlinking
//
	function lnk_build($v,$t=1,$oth) {
		echo "\n".tb('.').'<a href="'.$v['href'];
			// Keep any set debug options across links
			if(isset($GLOBALS['debug'])){
				echo '&amp;debug='.$GLOBALS['debug'];
			};
			if(isset($GLOBALS['opt'])){
				echo '&amp;opt='.$GLOBALS['opt'];
			};
		echo '"';
		// Insert link title if required
		if($t==1){
			echo ' title="'.$v['title'].'"';
		};
		echo '><span>'.$v['name'].'</span>';
			// Includes withing the hyperlink
			echo $oth;
		echo "\n".tb('.').'</a>';	
	};
	
	function lnk_button($v) {
		echo "\n".tb('.').'<a type="'.$v['href'].' " title="'.$v['title'].'"><span>'.$v['name'].'</span></a>';
	};
	
	function lnk_pbuild($v) {
		return buildlnk('Photography').'&amp;sub='.urlencode($v);
	};

	function lnk_img($string) {
	return basename(arrpar($string,$_SESSION['site_dir']));
	};

	function lnk_proj($arr) {
		echo "\n".tb('.').'<ul class="none">';
		tb('+');
		foreach ($arr as $k => $v) {
			echo "\n".tb('.').'<li>';
			tb('+');
				echo "\n".tb('.').'<a href="?loc='.$GLOBALS['loc'];
				// Keep any set debug options across links
				if(isset($GLOBALS['debug'])){
					echo '&amp;debug='.$GLOBALS['debug'];
				};
				if(isset($GLOBALS['opt'])){
					echo '&amp;opt='.$GLOBALS['opt'];
				};
				if(isset($GLOBALS['ts'])){
					echo '&amp;ts='.$GLOBALS['ts'];
				};				
				echo $v['href'].'" title="'.$v['title'].'"><span>'.$v['name'].'</span></a>';
				tb('-');
			echo "\n".tb('.').'</li>';
			if(isset($v['sub'])){
				lnk_proj($v['child']);
			};
		};
		tb('-');
	echo "\n".tb('.').'</ul>';
	};
//
//
/////////////////////////////////////////////////////////////////

?>