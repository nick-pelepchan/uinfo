<?php

/////////////////////////////////////////////////////////////////
// Get GLOBALS and site_dir
//
	function global_build(){
		$GLOBALS['webr']=dirname(__DIR__); // web root
		$GLOBALS['tb'] = '0'; // initial indent value
		$GLOBALS['ts'] = '1'; // default to tileset layout
		$GLOBALS['loc'] = 'main';  // default page

		// _GET any set variables into $GLOBALS
		foreach($_GET as $k => $v){
			$GLOBALS[$k] = strtolower(urldecode($v?$v:''));
		};
		
		// Establish $_SESSION['site_dir'] and $GLOBALS['curr']
		if(empty($_SESSION['site_dir'])){
				$_SESSION['site_dir']['main'] = array(
				'name'=>'Main Menu',
				'title'=>'Return to main menu',
				'href'=>'?loc=main',
				'back'=>'/media/main.png',
				'sub'=>'main',
				'incpth'=>dirname(__DIR__).'/',
				'imgpth'=>'/media/'
			);
			$_SESSION['site_dir']['main']['child'] = ini_grab($GLOBALS['webr']);
		};
	};
//
//
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
// Recursively parse ini files
//
	function ini_grab($pth){
		$arr=parse_ini_file($pth.'/dir.ini', true); // parse directory ini
		// Iterate through array and grab sub menus
 		foreach($arr as $k => $v){
			if(array_key_exists('sub',$arr[$k])){
				$arr[$k]['incpth'] = $pth.'/'.$arr[$k]['sub'].'/';
				$arr[$k]['imgpth'] = str_replace($GLOBALS['webr'],'',$pth).'/'.$arr[$k]['sub'].'/';
				$arr[$k]['child'] = ini_grab($pth.'/'.$arr[$k]['sub']);
			};
		};
		return($arr); 
	};
//
//
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
// Determine location 
//
	function loc_parse(){
		$_SESSION['loc'] = explode(",", $GLOBALS['loc']);
	};
//
//
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
// Update $GLOBALS and set page 
//
	function page_set(){
		loc_parse();
		// set $GLOBALS['curr']
		if($_SESSION['loc']=='main'){
			$GLOBALS['parent'] = null;
			$GLOBALS['curr'] = $_SESSION['site_dir']['main'];
		} else if(count($_SESSION['loc'])==1){
			$GLOBALS['parent'] = $_SESSION['site_dir']['main'];
			$GLOBALS['curr'] = arr_keysrch($_SESSION['loc'][count($_SESSION['loc'])-1],$_SESSION['site_dir']);
		} else {
			$GLOBALS['parent'] = arr_keysrch($_SESSION['loc'][count($_SESSION['loc'])-2],$_SESSION['site_dir']);
			$GLOBALS['curr'] = arr_keysrch($_SESSION['loc'][count($_SESSION['loc'])-1],$_SESSION['site_dir']);
		};

		// Specific page options
		if(isset($GLOBALS['pbuild']) && $GLOBALS['pbuild']==1){
			build_dir_ini();
		};	
		
		// load the included page
		if($GLOBALS['ts']==0){
			include($GLOBALS['parent']['incpth'].$_SESSION['loc'][count($_SESSION['loc'])-1].'.php');
		} else {
			tileset();
		};
	};

//
//
/////////////////////////////////////////////////////////////////

?>