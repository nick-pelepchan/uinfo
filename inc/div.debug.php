<?php
echo "\n".tb('.').'<div id="debug">';
tb('+');

	if(isset($GLOBALS['opt']) && strpos($GLOBALS['opt'],'array')!==false){
		
	$loc='intro';
		echo "\n".tb('.').'<pre>';
		tb('+');
			echo "\n".tb('.').'Searching for '.$loc;
			if(isset($GLOBALS['opt']) && strpos($GLOBALS['opt'],'parse')!==false){
				echo "\n\n".tb('.').'arr_parse:'."\n";
				print_r(arr_parse($loc,$_SESSION['site_dir']));
			};
			if(isset($GLOBALS['opt']) && strpos($GLOBALS['opt'],'keysrch')!==false){
				echo "\n\n".tb('.').'arr_keysrch:'."\n";
				print_r(arr_keysrch($loc,$_SESSION['site_dir']));
			};
			if(isset($GLOBALS['opt']) && strpos($GLOBALS['opt'],'parent')!==false){
				echo "\n\n".tb('.').'arr_parent:'."\n";
				print_r(arr_parent($loc,$_SESSION['site_dir']));
			};
			if(isset($GLOBALS['opt']) && strpos($GLOBALS['opt'],'mkey')!==false){
				echo "\n\n".tb('.').'arr_mkey:'."\n";
				print_r(arr_mkey($loc,$_SESSION['site_dir']));
			};
			if(isset($GLOBALS['opt']) && strpos($GLOBALS['opt'],'kname')!==false){
				echo "\n\n".tb('.').'arr_kname:'."\n";
				print_r(arr_kname($loc,$_SESSION['site_dir']));
			};
			tb('-');
		echo "\n".tb('.').'</pre>';
	};

	if(isset($GLOBALS['opt']) && strpos($GLOBALS['opt'],'lorem')!==false){
		echo '<hr/>';
		echo _LOREM_;
		echo "\n".tb('.').'<a href="#">A LINK</a>';
		if(strpos($GLOBALS['opt'],'color')!==false){
			echo '<hr/>';
			echo "\n".tb('.').'<div style="display:inline-block;vertical-align:top;">';
			tb('+');
				color_pallet('base');
				tb('-');
				echo "\n".tb('.').'</div>';
		};
		echo "\n".tb('.').'<div class="comp-box">';
		tb('+');
			echo '<hr/>';
			echo _LOREM_;
			echo "\n".tb('.').'<a href="#">A LINK</a>';
			if(strpos($GLOBALS['opt'],'color')!==false){
				echo '<hr/>';
				echo "\n".tb('.').'<div style="display:inline-block;vertical-align:top;">';
				tb('+');
					color_pallet('base');
					tb('-');
				echo "\n".tb('.').'</div>';
				tb('-');
			};
		echo "\n".tb('.').'</div>';
		tb('-');
	};

	echo '<!--'."\n\n";

	if(isset($GLOBALS['opt']) && strpos($GLOBALS['opt'],'site_dir')!==false){
		echo "\n\n".tb('.').'$_SESSION-SITE_DIR'."\n";
		print_r($_SESSION['site_dir']);
	};
	if(isset($GLOBALS['opt']) && strpos($GLOBALS['opt'],'curr')!==false){
		echo "\n\n".tb('.').'$GLOBALS-CURR'."\n";
		print_r($GLOBALS['curr']);
	};
	if(isset($GLOBALS['opt']) && strpos($GLOBALS['opt'],'parent')!==false){
		echo "\n\n".tb('.').'$GLOBALS-PARENT'."\n";
		print_r($GLOBALS['parent']);
	};

	
	if(isset($GLOBALS['opt']) && strpos($GLOBALS['opt'],'dump')!==false){
		var_dump(get_defined_vars());
		//var_dump($GLOBALS['webr']);
		//var_dump($GLOBALS);
	};
	
	echo "\n\n".'-->';
echo "\n".tb('.').'</div>';
tb('-');	
?>