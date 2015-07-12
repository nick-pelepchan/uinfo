<?php

/////////////////////////////////////////////////////////////////
// PHOTO GALLERIES
//

function build_dir_ini(){
	// Builds dir.ini for photo gallery
	$file = 'dir.ini';
	$dir = $GLOBALS['curr']['incpth'];
	if(file_exists($dir.$file)){
		rename($dir.$file,$dir.$file.'.bak');
	};
	$fh = fopen($dir.$file, 'w') or die("can't open file");
	foreach(glob($GLOBALS['curr']['incpth']."*.jpg") as $filename){
		$name = basename($filename);
/* 		$href = '?loc='.$GLOBALS['curr']['sub'].'&amp;zoom='.$name;*/
		$href = 'button" tabindex="1" class="zoom';
		$back = htmlspecialchars(str_replace($GLOBALS['webr'],'',$filename));
		$pattern = "/^\[$name\]\n.*\n.*\n/m"; // search for name + 6 lines
		if(isset($GLOBALS['bpforce']) && preg_match_all($pattern,file_get_contents($dir.$file.'.bak'),$matches)){
			// copy existing contents to new file
			fwrite($fh,implode("\n",$matches[0]));
		} else {		
			// create new entry
			fwrite($fh,'['.$name.']'."\n".'name = \'<img src="'.$back.'" alt=""/>\''."\n".'title = \'\''."\n");
		};
		fwrite($fh,'href = \''.$href.'\''."\n".'back = \''.$back.'\''."\n\n");
	};
	fclose($fh);
};

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

?>