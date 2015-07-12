<?php

/////////////////////////////////////////////////////////////////
// Depreciated
/*
 http://stackoverflow.com/questions/2171963/php-array-as-variable-name
		/*$parts = explode(",", $l);
		
		for ($i = 0, $j = count($parts); $i < $j; ++$i) {
			if ($i < $j - 1) {
				$sdir =& $sdir[$parts[$i]]['child'];
			} else {
				// last item
				$sdir =& $sdir[$parts[$i]];
			};
		};

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


    BUILD SIDE MENU 
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
//
/////////////////////////////////////////////////////////////////
?>
