<?php
/////////////////////////////////////////////////////////////////
// build GLOBALS['site_dir']
//
	function global_build(){
		$GLOBALS['webr']=dirname(__DIR__); // web root dir
		$GLOBALS['tb'] = '0'; // default indent value
		$GLOBALS['ts'] = '1'; // default to tileset layout
		$GLOBALS['loc'] = 'main';  // default to main page
		$GLOBALS['site_dir']['main'] = array( // top level directory
				'name'=>'Main Menu',
				'title'=>'Return to main menu',
				'href'=>'?loc=main',
				'back'=>'/media/main.png',
				'sub'=>'main'
			);

		// _GET any set variables into $GLOBALS
		foreach($_GET as $k => $v){
			$GLOBALS[$k] = strtolower(urldecode($v?$v:''));
		};
		$GLOBALS['site_dir']['main']['child'] = ini_grab($GLOBALS['webr']);
		$GLOBALS['curr'] = $GLOBALS['site_dir']['main'];
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
			$arr[$k]['incpth'] = $pth.'/';
			$arr[$k]['imgpth'] = str_replace($GLOBALS['webr'],'',$pth).'/';
			if($arr[$k]['sub']!=''){
				$arr[$k]['child'] = ini_grab($pth.'/'.$arr[$k]['sub']);
			};
		};
		return($arr);
	};
//
//
/////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////
// Set the current page and update $GLOBALS['curr'] - http://stackoverflow.com/questions/2171963/php-array-as-variable-name
//
	function page_set(){
		/*$parts = explode(",", $l);
		
		for ($i = 0, $j = count($parts); $i < $j; ++$i) {
			if ($i < $j - 1) {
				$sdir =& $sdir[$parts[$i]]['child'];
			} else {
				// last item
				$sdir =& $sdir[$parts[$i]];
			};
		};*/
		// set $GLOBALS['curr']
		if($GLOBALS['loc']=='main'){
			$GLOBALS['curr'] = $GLOBALS['site_dir']['main'];
		} else {
			$GLOBALS['curr'] = $GLOBALS['curr']['child'][$GLOBALS['loc']];
		};
		
		// load the included page
		if($GLOBALS['ts']==0){
			include(dirname(__DIR__).'/'.$GLOBALS['loc'].'.php');
		} else {
			tileset();
		};
	};

//
//
/////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////
// Tile Layout
//
	function tileset(){
		$i=1; // tile class number
		// Tileset div
		echo "\n".tb('.').'<div class="tileset">';
		tb('+');
			if($GLOBALS['loc']!='main'){
				tile($GLOBALS['site_dir']['main'],$i++);
			};
			foreach($GLOBALS['curr']['child'] as $k => $v){
				tile($v,$i++);
				// create new tileset after 9 tiles
				if($i%9==0 && count($GLOBALS['curr'])!=$i-1){
					$i=0;
					tb('-');	
					echo "\n".tb('.').'</div>'."\n";
					echo "\n".tb('.').'<div class="tileset">';
					tb('+');
				};
			};
			// populate empty tiles until set filled
			while($i-1<9){
				echo "\n".tb('.').'<div class="tile '.num2word($i++).'"></div>';
			};
			tb('-');	
		echo "\n".tb('.').'</div>'."\n";
	};
	
	function tile($v,$i){
		// Tile div
		echo "\n".tb('.').'<div class="tile '.num2word($i).'" style="background-image:url(/media/tile_border.png),url('.$v['back'].');">';
		tb('+');
				//echo "\n".tb('.').'<div class="fade">';					
				//tb('+');
				echo "\n".tb('.').'<a href="'.$v['href'].'" title="'.$v['title'].'"><span>'.$v['name'].'</span></a>';
				tb('-');
				//echo "\n".tb('.').'</div>';					
				//tb('-');
		echo "\n".tb('.').'</div>'."\n";
	};
//
//
/////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////
// Linking
//
	function lnk_build($string) {
		$p = arr_parse($string,$GLOBALS['site_dir']);
		$url = urlencode($p);
		$parts = explode(",",$p);
		$arr = $GLOBALS['site_dir'];
		
		for($i=0;$i<(count($parts)-1);++$i){
			$arr = $arr[$parts[$i]]['child'];
		};
		
		$arr = $arr[$parts[$i]];
		
		echo "\n".tb('.').'<a href="'.$arr['href'].'" title="'.$arr['title'].'"><span>'.$arr['name'].'</span></a>';
	};
	
	function lnk_pbuild($v) {
		return buildlnk('Photography').'&amp;sub='.urlencode($v);
	};

	function lnk_img($string) {
	return basename(arrpar($string,$GLOBALS['site_dir']));
	};

	function lnk_proj($loc) {
		echo "\n".tb('.').'<h4 class="solid">Projects</h4>';
		foreach ($loc['child'] as $k => $v) {
			echo "\n".tb('.').'<a href="'.'?loc='.urlencode(arrpar($GLOBALS['curr']['name'],$GLOBALS['site_dir'])).'&amp;sub='.urlencode($v['href']).'" title="'.$v['title'].'">';
			echo "\n".tb('.').'<h5>'.$v['name'].'</h5>';
			echo "\n".tb('.').'<span class="sub-text">'.$v['title'].'</span></a>';
		};
	};
//
//
/////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////
// Arrays
//
function arr_parse($needle,$haystack) {
	// returns comma list of $needle location in $haystack
	$ky = arr_parent($needle,$haystack);
  	if($haystack[$ky]['name']!=$needle){
		$ky = $ky.','.arr_parse($needle,$haystack[$ky]['child']);
	}; 
	return $ky;
};

// http://stackoverflow.com/questions/2504685/php-find-parent-key-of-array
function arr_parent($needle,$haystack) {
	// returns highest parent key of $needle in $haystack
	foreach($haystack as $k => $v){
		if(is_array($v)){
			$found = arr_parent($needle,$v);
			if($found!==false){
				return $k;
			};
		} else if($k==='name' && $v===$needle){
			return true;
		};
	};
	return false;
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

/////////////////////////////////////////////////////////////////
// GESHI
//
	function geshi($source,$language){
		$path='./admin/geshi/geshi';

		$geshi = new GeSHi($source, $language, $path);
		$geshi->enable_classes();
		$geshi->set_header_type(GESHI_HEADER_DIV);
		$geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS, 2);
	/*
		echo '<!--';
		echo $geshi->get_stylesheet();
		echo '-->';
	*/  
		$rtn = $geshi->parse_code();
		
		return $rtn;
	}
//
//
/////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////
// RSS
//
	function rss_filter($sites, $post){
		if( ! $post ){
			$sites_filter = $sites;
			return $sites_filter;
			break;
		}
		$sites_fltr = array();
		foreach ($sites as $a) {
			$b = array( 'site' => $a['site'], 'address' => $a['address'], 'cat' => $a['cat'], 'use' => "off", 'count' => $a['count']);
			foreach ($post as $z => $y) {
				if ($a['site'] == str_replace("_", " ", $z)) {
					$b = array( 'site' => $a['site'], 'address' => $a['address'], 'cat' => $a['cat'], 'use' => "on", 'count' => $a['count']);
				}
			}
		array_push($sites_fltr, $b);
		}
	return $sites_fltr;
	}

	function rss_count($sites, $type){
		$sites_count = array();
		foreach ($sites as $a => $b){
			$file = './aggregate/cache/'.$type.'_'.$b['site'];
			$arr = unserialize(file_get_contents($file));
			$c = array( 'site' => $b['site'], 'address' => $b['address'], 'cat' => $b['cat'], 'use' => $b['use'], 'count' => count($arr));
			array_push($sites_count, $c);
		}
		return $sites_count;
	}

	function rss_get($sites, $type){
		$arrFeeds = array();
		foreach($sites as $a => $b){
			if($b['use'] == "on"){
				$file = './aggregate/cache/'.$type.'_'.$b['site'];
				$arr = unserialize(file_get_contents($file));
				array_push($arrFeeds, $arr);
			}
		}
		return $arrFeeds;
	}

	function rss_catagorize($sites, $cats){
		$list = array();
		foreach($cats as $cat){
			$list[$cat] = array();
			foreach($sites as $site){
				if($site['cat'] == $cat){
					array_push($list[$cat], $site);
				}
			}
		}
		return $list;
	}

	function array_collapse($a){
		$v = array();
		foreach($a as $main=>$sub){
			foreach($sub as $vid=>$key){
				array_push($v, $key);
			}
		}
		return $v;
	}

	function sort_newsnew($a, $b){
		return $b['date']-$a['date'];
	}

	function sort_vidsnew($a, $b){
		return $b['pub']-$a['pub'];
	}

	function sort_alpha($a, $b){
		return strcmp($a['site'], $b['site']);
	}
//
//
/////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////
// SQL
//
	function sql_conn($query){
		require(dirname(getcwd()).'/dcon.php');
		$dbConn = new mysqli($servername, $dbuser, $dbpass, $dbname);
		unset ($servername, $dbuser, $dbpass, $dbname);

		if($dbConn->connect_error){
			trigger_error('Unable to connect to database [' . $dbConn->connect_error, E_USER_ERROR . ']');
		}

		$result = mysqli_query($dbConn, $query);
		
		mysqli_close($dbConn);
		unset($dbConn);
		
			/*if(mysqli_query($dbConn, $query)) {
				echo "Successful";
			} else {
				echo "\nError".mysqli_error($dbConn);
			};*/
			return($result);
	}
//
//
/////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////
// GALLERIES
//
function temp(){
	// Zoom div
	$imgpth=$GLOBALS['curr']['imgpth'].$GLOBALS['curr']['href'].'/'.$GLOBALS['sub'].'/'.$GLOBALS['img'];
	echo "\n\t\t\t".'<img src="'.$imgpth.'"/>';
	echo "\n\t\t\t".'<a href="?loc='.urlencode($GLOBALS['loc']).'&amp;sub='.urlencode($GLOBALS['sub']).'" class="closeimg"></a>';
};

function build_thmb($gal){
  $dir=$GLOBALS['curr']['incpth'].$GLOBALS['curr']['href'].'/'.$gal;
	$odir=opendir($dir);
	unset($bthmb);

	while($file=readdir($odir)){
    $dinfo=pathinfo($dir.'/'.$file);
		
		echo '<!--';
		print_r($dinfo);
		echo '-->';
		
		if(strtolower($dinfo['extension']) == 'jpg'){
			$bthmb[] = build_thumb("$dir/$file");
		};
	};
	$dat = fopen($dir.'/thumbs','w') or die("Error opening thumbs file!");
	fwrite($dat, json_encode($bthumb,JSON_UNESCAPED_UNICODE));
	fclose($dat);
  closedir($odir);
};

function sql_pics($gal){
  $dir=$GLOBALS['curr']['incpth'].$GLOBALS['curr']['href'].'/'.$gal;
	$odir=opendir($dir);
  
  while($file=readdir($odir)){
    $dinfo=pathinfo($dir.'/'.$file);

    if(strtolower($dinfo['extension']) == 'jpg'){
      $sql = "SELECT id FROM photo WHERE name = '$file' AND folder = '$gal'";
      $result = sql_conn($sql);
      $chk = $result->num_rows;
      
      if($chk == 0){
        $bthmb = build_thumb("$dir/$file",300);
        
        $sql = "INSERT INTO photo (folder,name,type,height,width,th,tw,base) VALUES ('$gal','$file','$bthmb[type]','$bthmb[height]','$bthmb[width]','$bthmb[th]','$bthmb[tw]','$bthmb[thmb]')";
        
        $result = sql_conn($sql);
      }
    }
  }
  closedir($odir);
}

function build_thumb($file/*, $dw*/){
  unset($bthmb);
//	$angle = 0;

  $exif=exif_read_data($file);

/*  if (!empty($exif['Orientation'])) {
      switch ($exif['Orientation']) {
          case 3:
              $angle = 180;
              break;

          case 6:
              $angle = -90;
              break;

          case 8:
              $angle = 90;
              break;
          default:
              $angle = 0;
              break;
      }
  }*/

/*  $img = imagecreatefromjpeg("$file");

	$img = imagerotate($img, $angle, 0);

  $bthmb['width'] = imagesx($img);
  $bthmb['height'] = imagesy($img);
  
  if($bthmb['height']>$bthmb['width']){
    $bthmb['th'] = $dw;
    $bthmb['tw'] = floor($bthmb['width']*($bthmb['th']/$bthmb['height']));
  } else {
    $bthmb['tw'] = $dw;
    $bthmb['th'] = floor($bthmb['height']*($bthmb['tw']/$bthmb['width']));
  }

  $tmp_img = imagecreatetruecolor($bthmb['tw'],$bthmb['th']);
  
  imagecopyresized($tmp_img,$img,0,0,0,0,$bthmb['tw'],$bthmb['th'],$bthmb['width'],$bthmb['height']);

  imagejpeg($tmp_img,"$file.tmb");
  $img = file_get_contents("$file.tmb");
  unlink("$file.tmb");*/
  
  $bthmb['type'] = mime_content_type("$file");
  $bthmb['thmb'] = 'data:'.$bthmb['type'].';base64, '.base64_encode(file_get_contents($file));
  
  return $bthmb;
}

function get_pics($gal){
	if(array_key_exists($gal,$_COOKIE)){
		$arr = json_decode(stripslashes($_COOKIE[$gal]),true);
	} else {
		$arr = '';
	};
	return $arr;
};

function build_gal($arr){
	if($arr==''){
		alert('Sorry, there is a problem with this page.  Please let the web-master know about this issue.');
		return;
	};

	foreach ($arr as $n => $i) {
		$lnk='?loc='.urlencode($GLOBALS['loc']).'&amp;sub='.urlencode($GLOBALS['sub']).'&amp;img='.urlencode($i['name']);
		
		echo "\n\t\t\t".'<a href="'.$lnk.'" class="base" tabindex="1"><img src="'.$i['base'].'"></a>';
	};
};

/*		
function build_gal($fp){
	$parr = grab_files(dirname(__DIR__).'/'.$fp,'image');

	echo "\n\t\t".'<div id="gallery" class="clearfix">';
	foreach ($parr as $n => $i) {
		echo "\n\t\t\t".'<div class="img_zoom" tabindex="1"><span class="img" style="background:url('.$fp.'/'.$i.') no-repeat center center;"></span></div>';
	};
	echo "\n\t\t".'</div>';
};*/

function build_hbox_gal($fp,$type,$farr){
  include('./admin/vars.php');

  echo "\n".'<div class="gal hbox">';
    foreach ($farr as $n => $v) {
      $desc = pathinfo($fp.'/'.$farr[$n]);
    
      echo "\n\t".'<div class="gal_box">';
        echo "\n\t\t".'<a class="gal_button" tabindex="1">';
          echo "\n\t\t\t".'<span class="close" tabindex="-1">[X]</span>';
            switch($type){
              case 'nosubs':
                hbox_nosubs($farr[$n],$fp,"\t\t\t");
                break;
              case 'subs':
                hbox_subs($farr[$n],$fp,"\t\t\t");
                break;
              case 'code':
                hbox_code($farr[$n],$fp,"\t\t\t");
                break;
            }
        echo "\n\t\t".'</a>';
      echo "\n\t".'</div>';
    };
  echo "\n\t".'</div>';
};

function hbox_nosubs($farr,$fp,$tb){
  echo "\n".$tb.'<h4>'.$farr[0].'</h4>';
  echo "\n".$tb.'<span class="content">';
    echo "\n".$tb.'<img src="'.$fp.'/'.$farr[1].'"/>';
    echo "\n".$tb.$farr[2];
  echo "\n".$tb.'</span>';
};

function hbox_subs($farr,$fp,$tb){
  $aname = $farr[0];
  $apath = $fp.'/'.$aname;
  $i = 2;
  
  echo "\n".$tb.'<h4>'.$farr[1].'</h4>';
  echo "\n".$tb.'<span class="content">';
    while($i < count($farr)){
      echo "\n\t".$tb.'<img src="'.$apath.'/'.($i-2).'.png"/>';
      echo "\n\t".$tb.'<p>'.$farr[$i++].'</p>';
    };
  echo "\n".$tb.'</span>';
};

function hbox_code($farr,$fp,$tb){
  echo "\n".$tb.'<h4>'.$farr[0].'</h4>';
  echo "\n".$tb.'<span class="content">';
    echo "\n".$tb.'<p>'.$farr[1].'</p>';
    $i = 2;
    
    while($i < count($farr)){
      echo "\n".$tb.'<span class="tl"><p>'.$farr[$i][0].'</p></span>';
      echo "\n\n".'<div class="code-box">';
        $code = geshi($farr[$i][1],'c');
        echo $code;
      echo "\n".'</div>';
      $i++;
    };
    
    echo "\n\n".'<span class="subtxt">Thanks to the people at GeSHi (http://qbnz.com/highlighter/) for the easy syntax highlighting implementation!</span>';
  echo "\n".$tb.'</span>';
};
//
//
/////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////
// OTHER
//

// html source tab modification
function tb($m){
	switch($m){
		case '+':
			$GLOBALS['tb']++;
			break;
		case '-':
			$GLOBALS['tb']--;
			break;
		case '.':
			$str='';
			for($i=0;$i<$GLOBALS['tb'];$i++){
				$str = $str."\t";
			};
			return $str;
			break;
	};
};

// alert div
function alert($str){
	echo "\n\n".'<div class="alert">'.$str.'</div>';
}

// prints all the colors on the page
function color_pallet($pallet) {
	foreach($GLOBALS[$pallet] as $k => $v){
		$i=0;
		echo '<div>';
		foreach($v as $l => $w){
			++$i;
			echo '<a role="button" title="'.$l.' ('.$w.')" style="background:'.$w.';display:inline-block;margin:1px;height:20px;width:20px;"></a>';
			if($i %10 == 0){
				echo '<br>';
			};
		};
		echo '</div>';
	};
	
	return;
};

function num2word($number) { //http://www.karlrixon.co.uk/writing/convert-numbers-to-words-with-php/
   
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );
   
    if (!is_numeric($number)) {
        return false;
    }
   
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }
   
    $string = $fraction = null;
   
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
   
    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }
   
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
   
    return $string;
}

function js_link($src){
	if(file_exists($src)){
		echo "\n"."<script type=\"text/javascript\" src=\"$src\"></script>";
	} else {
		echo "\n"."Unable to load ".$src;
	};
};

function oside($cmd,$c){
  include('./admin/vars.php');
	if($os==1){
		echo "<!-- ";
		eval($cmd.";");
		echo " -->";
	} else {
		switch($c) {
			case 1:
				eval($cmd.";");
			case 2:
		}
	}
};

function download($file){
  $bn = basename($file);
  echo '<span class="absr"><form method="get" action="'.$file.'"><button type="submit">Download '.$bn.'</button></form></span>';
};

function grab_files($fp,$str){
  $dir=opendir("$fp");
  $i=0;
  
  while($file=readdir($dir)){
    $hstk = mime_Content_type($fp.'/'.$file);
    $pos = strpos("$hstk","$str");
    $desc = strpos("$file",'desc');
    if(!($pos === false) && ($desc === false)){
      $arr[$i++]="$file";
    };
  };
  sort($arr);
  return($arr);
};

function debug_arr($arr){
		echo "<!--";
		print_r($arr);
		echo "-->";
}
//
//
/////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////
// Error handling
//
function customError($errno, $errstr)
  {
  alert("Sorry, there is a problem with this page.  Please let the web-master know about this issue. <!-- [$errno] $errstr -->");
  die();
  }
//
//
/////////////////////////////////////////////////////////////////
	
/*
/////////////////////////////////////////////////////////////////
// Generate navigation menus
//
	function nav_gen($arr,$pth){
		echo "\n".tb('.').'<nav id="nav">';
		tb('+');
		foreach($arr as $k => $v){
			echo "\n".tb('.').'<div class="nav-item">';
			tb('+');
				nav_header($arr[$k],$pth,$k);
				tb('-');
			echo "\n".tb('.').'</div>';
		};
		tb('-');
		echo "\n".tb('.').'</nav>'."\n";
	};

	function nav_header($arr,$pth,$ky){
		if($arr['href']=='' || $arr['href']=='photo'){ // If header has sub-menu or is photo
			echo "\n".tb('.').'<a role="button" tabindex="0" title="'.$arr['title'].'">';
			tb('+');
				echo "\n".tb('.').'<img class="middle-hide" src="/media/'.$arr['name'].'.png"/>';
				echo "\n".tb('.').'<span class="desktop-only">'.$arr['name'].'</span>';
				tb('-');
			echo "\n".tb('.').'</a>';	
		} else { // If header has no sub-menu
			echo "\n".tb('.').'<a href="'.buildlnk($arr['name']).'" tabindex="-1" title="'.$arr['title'].'">';
			tb('+');
				echo "\n".tb('.').'<img class="middle-hide" src="/media/'.$arr['name'].'.png"/>';
				echo "\n".tb('.').'<span class="desktop-only">'.$arr['name'].'</span>';
				tb('-');
			echo "\n".tb('.').'</a>';
		};

		// Build sub-menu ul
		if($arr['sub']!=''){
			echo "\n".tb('.').'<ul class="'.$arr['sub'].'">';
			tb('+');
				nav_item($arr['child'],$pth,$ky);
				tb('-');
			echo "\n".tb('.').'</ul>';
		};
	};

	function nav_item($arr,$pth,$ky){
		foreach($arr as $k => $v){				
			if($v['imgpth']=='/photo/'){
				echo "\n".tb('.').'<li>';
				tb('+');
					echo "\n".tb('.').'<a href="'.buildplnk($v['href']).'" tabindex="-1" title="'.$arr[$k]['title'].'" class="nav-sub">'.$arr[$k]['name'].'</a>';
					tb('-');
				echo "\n".tb('.').'</li>';
			} else {
				echo "\n".tb('.').'<li>';
				tb('+');
					echo "\n".tb('.').'<a href="'.buildlnk($arr[$k]['name']).'" tabindex="-1" title="'.$arr[$k]['title'].'" class="nav-sub">'.$arr[$k]['name'].'</a>';
					tb('-');
				echo "\n".tb('.').'</li>';
			};
		};
	};
//
//
/////////////////////////////////////////////////////////////////

function page_set($pg) {
  $disp='.'; // root
  foreach($pg as $v){
    $disp=$disp.'/'.$v; // append sub then pages
  }
  $disp=$disp.'/desc.php'; // append file type
  return $disp;
}

// Sub-page set
function pg_sub($lvl) {
  $ini_name='./sub.ini';
  $arr=parse_ini_file($ini_name, true);
  $nclvl=++$clvl;
  $nlvl=++$lvl;
  $mnr=++$mnr;

  // Build links
  foreach($arr as $k => $v){
    $slnk=$lnk.'&amp;pg'.$clvl.'='.$arr[$k]['page'];
    echo "\n\n\t\t\t\t".'<a href="'.$slnk.'&amp;lvl='.$lvl.'" class="mnr'.$mnr.'" title="'.$arr[$k]['title'].'">';
      echo "\n\t\t\t\t".'<div class="item">';
        echo "\n\t\t\t\t\t\t".$arr[$k]['name'];
      echo "\n\t\t\t\t".'</div>';
    echo "\n\t\t\t\t".'</a>';
  }
}
*/

    /* BUILD SIDE MENU 
function side_menu($arr,$pg,$pth,$ky,$tb,$fpth){
  // $arr -- sub_grab array
  // $pg  -- PG array
  // $pth -- parent path for link building
  // $ky  -- PG array key iteration
  // $tb  -- HTML tab level
  // $fpth-- parent path for directory links
  
  //  print_r($arr);
  echo "\n".$tb.'<ul>';
  foreach($arr as $k => $v){
  
    // build link path
    $lnk=$pth.'pg'.$ky.'='.$arr[$k]['href'];

    //  echo list item
    echo "\n\t".$tb.'<li class="';
      // check for divider
      if($arr[$k]['href']=='div'){
        echo 'divider';
      };
    
      // check for active item
      if(isset($pg[0]) && $arr[$k]['href']==$pg[0]){
        echo 'active ';
      };
      
      // check for subs
      if(is_array($arr[$k]['sub'])){
        echo 'has-sub ';
      };
      
      // check for pic
      if($arr[$k]['pic']=='y'){
        echo 'pic';
      };
    echo '">';
    
      // echo item link
      echo "\n\t\t".$tb.'<a href="';
        
        echo ($arr[$k]['sub'] ? '#' : $lnk);
        
      echo '" style="background: url('.$fpth.'/'.$arr[$k]['href'].'.png);" title="'.$arr[$k]['title'].'">';
      
        // echo item label
        echo "\n\t\t\t".$tb.'<span>'.$arr[$k]['name'].'</span>';
      
      echo "\n\t\t".$tb.'</a>';
      
    // check for sub-menu(s) and loop function if found
    if(is_array($arr[$k]['sub'])){
      side_menu($arr[$k]['sub'],$pg,$lnk.'&amp;',($ky+1),$tb."\t",$fpth.'/'.$arr[$k]['href']);
    }
    echo "\n".$tb.'</li>';
  }
  echo "\n".$tb.'</ul>';
};

function side_set($pg,$fpath,$clvl,$lvl){
  
  // Build links
  foreach($arr as $k => $v){
    $lnk='./index.php?';
    if (!($arr[$k]['side']=='null')){
      $lnk=$lnk.'side='.$arr[$k]['side'].'&amp;';
    }
    $lnk=$lnk.'pg'.count($pg).'='.$arr[$k]['page'];
    
    echo "\n\n\t\t\t\t".'<a href="'.$lnk.'&amp;lvl='.$k.'" title="'.$arr[$k]['title'].'">';
      echo "\n\t\t\t\t".'<div class="item">';
        echo "\n\t\t\t\t\t\t".$arr[$k]['name'];
      echo "\n\t\t\t\t".'</div>';
    echo "\n\t\t\t\t".'</a>';
    
    // Check for sub menu existence and activation
    if(key(array_slice($pg, -1, 1, TRUE))==$arr[$k]['page']){
      if(!($arr[$k]['side']=='null')){
        echo "\n\n\t\t\t".'<div class="minor">';
//      side_set($pg,$fpath,$clvl,$lvl);
        echo "\n\t\t\t".'</div>';
      }
    }
  }
}

  $arr=parse_ini_file($fpath.'/side.ini', true); 
  $clvl = 0;
  
  foreach($arr as $k => $v){
    $lnk='./index.php?';
    if (!($arr[$k]['side']=='null')){
      $lnk=$lnk.'side='.$arr[$k]['side'].'&amp;';
    }
    $lnk=$lnk.'pg'.$k.'='.$arr[$k]['page'];
    echo "\n\n\t\t\t\t".'<a href="'.$lnk.'&amp;lvl='.$k.'" title="'.$arr[$k]['title'].'">';
      echo "\n\t\t\t\t".'<div class="item">';
        echo "\n\t\t\t\t\t\t".$arr[$k]['name'];
      echo "\n\t\t\t\t".'</div>';
    echo "\n\t\t\t\t".'</a>';


    if(key(array_slice($pg, -1, 1, TRUE))==$arr[$k]['page']){
      if(!($arr[$k]['side']=='null')){
        echo "\n\n\t\t\t".'<div class="minor">';
        side_set($pg,$fpath);
        echo "\n\t\t\t".'</div>';
      }
    }
  }

// Side sub-menu
function side_sub_set($lvl,$clvl,$lnk,$pg,$mnr){
  $ini_name='./'.$cat.'/side.ini';
  $arr=parse_ini_file($ini_name, true);
  $nclvl=++$clvl;
  $nlvl=++$lvl;
  $mnr=++$mnr;

  // Build links
  foreach($arr as $k => $v){
    $slnk=$lnk.'&amp;pg'.$clvl.'='.$arr[$k]['page'];
    echo "\n\n\t\t\t\t".'<a href="'.$slnk.'&amp;lvl='.$lvl.'" class="mnr'.$mnr.'" title="'.$arr[$k]['title'].'">';
      echo "\n\t\t\t\t".'<div class="item">';
        echo "\n\t\t\t\t\t\t".$arr[$k]['name'];
      echo "\n\t\t\t\t".'</div>';
    echo "\n\t\t\t\t".'</a>';

    // Check for sub menu (recursive) else return
    if(!empty($pg['pg'.$clvl]) && $pg['pg'.$clvl]==$arr[$k]['side']){
      if($arr[$k]['side']!='null'){
        $pg['pg'.$clvl]=$arr[$k]['side'];
        $cat=$cat.'/'.$arr[$k]['side'];
        echo "\n\n\t\t\t".'<div class="minor">';
        side_sub_set($nlvl,$nclvl,$cat,$slnk,$pg,$mnr);
        echo "\n\t\t\t".'</div>';
      }
    }
  }
}

// Side menu footer
function side_ftr(){
  $ini_name='./side_footer.ini';
  $ftr=parse_ini_file($ini_name, true);

  foreach ($ftr as $k => $v) {
      echo "\n\n\t\t\t".'<a href="'.$v['link'].' title="'.$v['title'].'">';
      echo "\n\t\t\t".'<div class="item">';
          echo "\n\t\t\t\t\t".$v['name'];
      echo "\n\t\t\t".'</div>';
      echo "\n\t\t\t".'</a>';
  }
}

function build_xml($arr, &$xml, $prnt){
	foreach($arr as $key => $value){
    // if there is another array found recrusively call this function
    if(is_array($value)){
      if(!is_numeric($key)){
        $subnode = $xml->addChild("$key");
        build_xml($value, $subnode, "$key");
      }else{
        $subnode = $xml->addChild("item$key");
        build_xml($value, $subnode, "item$key");
      }
    }else{
      if(isset($prnt)){
      // add single node.
      $xml->$prnt->addChild("$key",htmlspecialchars("$value"));
      }else{
      // add single node.
      $xml->addChild("$key",htmlspecialchars("$value"));
      }
    }
  }
  return $xml;
}

function get_pic($gal,$dw){
	unset($dirArray);
  $d = "./photo/$gal";
  $xml = simplexml_load_file("$d/info.xml");
  $dirArray = json_decode(json_encode($xml),true);

  $dir = opendir("$d");
  
  while($file = readdir($dir)) {
    $dinfo = pathinfo($d.$file);
    if(strtolower($dinfo['extension']) == 'jpg'){
      if(!in_array("$file",$dirArray)){
        $img = imagecreatefromjpeg("$d/$file");
        $width = imagesx($img);
        $height = imagesy($img);
        
        $tw = $dw;
        $th = floor($height*($tw/$width));
        
        $tmp_img = imagecreatetruecolor($tw,$th);
        
        imagecopyresized($tmp_img,$img,0,0,0,0,$tw,$th,$width,$height);
        
        imagejpeg($tmp_img,"$d/$file.tmb");
        $img = file_get_contents("$d/$file.tmb");
        unlink("$d/$file.tmb");
        
        $bthmb = '"data:'.mime_content_type("$d/$file").';base64, '.base64_encode($img).'"';
        
        $dirArray['files'][] = array(
          'name' => $file,
          'type' => mime_content_type("$d/$file"),
          'thmb' => $bthmb,
          'height' => $height,
          'width' => $width,
				);
        
        if($tw > $dirArray['maxtw']){
          $dirArray['maxtw'] = $tw;
          $dirArray['frtw'] = $tw + 14;
        }
        if($th > $dirArray['maxth']){
          $dirArray['maxth'] = $th;
          $dirArray['frth'] = $th + 14;
        }
			}
		}
	}
  
  closedir($dir);

  sort($dirArray['files']);
  
  $xml=build_xml($dirArray, $xml, '');
//  $xml->asXML("$d/info.xml");

  return $dirArray;
}
*/

?>
