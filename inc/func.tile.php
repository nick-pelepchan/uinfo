<?php
/////////////////////////////////////////////////////////////////
// Tile Layout
//
	function tileset(){
		echo "\n".tb('.').'<style>';
		echo "\n".tb('.').'</style>';
	
		$i=1; // tile class count
		$j=0; // overall tile count
		// Tileset div
		echo "\n".tb('.').'<div class="tileset">';
		tb('+');
			if($GLOBALS['loc']!='main'){
				// set return tile
				rtile($GLOBALS['parent'],$i);
				$i++;
				$j++;
			};
				$dir = $GLOBALS['curr']['child'];
			foreach($dir as $k => $v){
				tile($v,$i);
				$i++;
				$j++;
				// create new tileset after 9 tiles
				if($i%10==0 && ($j-1)!=count($GLOBALS['curr']['child'])){
					$i=1;
/* 					tb('-');	
					echo "\n".tb('.').'</div>'."\n";
					echo "\n".tb('.').'<div class="tileset">';
					tb('+'); */
				};
			};
			// populate empty tiles until set filled
			while($i<=9){
				echo "\n".tb('.').'<div class="btile '.num2word($i++).'"></div>';
			};
			tb('-');	
		echo "\n".tb('.').'</div>'."\n";
	};

	function rtile($v,$i){
		// Tile div
		echo "\n".tb('.').'<div class="rtile '.num2word($i).'" style="background-image:url(/media/tile_border.png),url(/media/back_arrow.png),url('.$GLOBALS['parent']['imgpth'].$v['back'].');">';
		tb('+');
			$rand = rand(-15,15);
			// lnk_build
				lnk_build($v,0,"\n".tb('.').'<div class="pop-title" style="-moz-transform: rotate('.$rand.'deg);-ms-transform: rotate('.$rand.'deg);-o-transform: rotate('.$rand.'deg);-webkit-transform:rotate('.$rand.'deg);">'.$v['title'].'</div>');
			tb('-');
		echo "\n".tb('.').'</div>'."\n";
	};
	
	function tile($v,$i){
		// Tile div
		echo "\n".tb('.').'<div class="tile '.num2word($i).'" style="background-image:url(/media/tile_border.png),url('.$v['imgpth'].$v['back'].');">';
		tb('+');
			$rand = rand(-15,15);
			if($GLOBALS['parent']['sub']=='photo'){
				// lnk_button
				echo "\n".tb('.').'<a type="'.$v['href'].' "><span>'.$v['name'].'</span></a>';
			} else {
				// lnk_build
				lnk_build($v,0,"\n".tb('.').'<div class="pop-title" style="-moz-transform: rotate('.$rand.'deg);-ms-transform: rotate('.$rand.'deg);-o-transform: rotate('.$rand.'deg);-webkit-transform:rotate('.$rand.'deg);">'.$v['title'].'</div>');
			};
			tb('-');
		echo "\n".tb('.').'</div>'."\n";
	};
	
	function tiny_tileset($special){
		$i=1; // tile class count
		$j=0; // overall tile count
		// Tileset div
		echo "\n".tb('.').'<div class="tileset clearfix">';
		tb('+');
			$dir = array();
			foreach(explode(',',$special) as $spc){
				$dir = array_merge($dir,$GLOBALS['curr']['child'][$spc]['child']);
			};
			foreach($dir as $k => $v){
				tiny_tile($v,$i);
				$i++;
				$j++;
				// create new tileset after 9 tiles
				if($i%19==0 && ($j-1)!=count($GLOBALS['curr']['child'])){
					$i=1;
/* 					tb('-');	
					echo "\n".tb('.').'</div>'."\n";
					echo "\n".tb('.').'<div class="tileset">';
					tb('+'); */
				};
			};
			// populate empty tiles until set filled
/* 			while($i<=18){
				echo "\n".tb('.').'<div class="tiny-btile tiny-'.num2word($i++).'"></div>';
			}; */
			tb('-');	
		echo "\n".tb('.').'</div>'."\n";
	};
	
	function tiny_tile($v,$i){
		// Tile div
		echo "\n".tb('.').'<div class="tiny-tile tiny-'.num2word($i).'" style="background-image:url(/media/tile_border.png),url('.$v['imgpth'].$v['back'].');">';
		tb('+');
			$rand = rand(-15,15);
			// lnk_build
			echo "\n".tb('.').'<a href="?loc='.$GLOBALS['loc'].$v['href'];
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
				echo '"';
				// Insert link title
				echo ' title="'.$v['title'].'"';
				echo '><span>'.$v['name'].'</span>';
					// Includes withing the hyperlink
					echo "\n".tb('.').'<div class="pop-title" style="-moz-transform: rotate('.$rand.'deg);-ms-transform: rotate('.$rand.'deg);-o-transform: rotate('.$rand.'deg);-webkit-transform:rotate('.$rand.'deg);">'.$v['title'].'</div>';
			echo "\n".tb('.').'</a>';	
		tb('-');
		echo "\n".tb('.').'</div>'."\n";
	};
//
//
/////////////////////////////////////////////////////////////////

?>