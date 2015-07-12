<?php

/////////////////////////////////////////////////////////////////
// Tile Layout
//
	function tileset(){
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
			foreach($GLOBALS['curr']['child'] as $k => $v){
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
		echo "\n".tb('.').'<div class="rtile '.num2word($i).'" style="background-image:url(/media/tile_border.png),url(/media/back_arrow.png),url('.$v['back'].');">';
		tb('+');
			$rand = rand(-15,15);
			// lnk_build
				lnk_build($v,0,"\n".tb('.').'<div class="pop-title" style="-moz-transform: rotate('.$rand.'deg);-ms-transform: rotate('.$rand.'deg);-o-transform: rotate('.$rand.'deg);-webkit-transform:rotate('.$rand.'deg);">'.$v['title'].'</div>');
			tb('-');
		echo "\n".tb('.').'</div>'."\n";
	};
	
	function tile($v,$i){
		// Tile div
		echo "\n".tb('.').'<div class="tile '.num2word($i).'" style="background-image:url(/media/tile_border.png),url('.$v['back'].');">';
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
//
//
/////////////////////////////////////////////////////////////////

?>