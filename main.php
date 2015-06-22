<?php
$i=0;

// Tileset div
			echo "\n".tb('.').'<div class="tileset">';
			tb('+');
				$j=0;
				foreach($GLOBALS['site_dir'] as $k => $v){
					++$j;
// Tile div
					echo "\n".tb('.').'<div class="tile '.num2word(++$i).'" style="background-image:url(/media/tile_border.png),url('.$v['back'].');">';
					tb('+');
	//					echo "\n".tb('.').'<div class="fade">';					
	//					tb('+');
							echo "\n".tb('.').'<a href="'.$v['href'].'" title="'.$v['title'].'"><span>'.$v['name'].'</span></a>';
							tb('-');
	//					echo "\n".tb('.').'</div>';					
	//					tb('-');
					echo "\n".tb('.').'</div>'."\n";
					if($i%9==0 && count($tsarr)!=$j){
						$i=0;
						tb('-');	
						echo "\n".tb('.').'</div>'."\n";
						echo "\n".tb('.').'<div class="tileset">';
						tb('+');
					};
				};
				while($i<9){
					echo "\n".tb('.').'<div class="tile '.num2word(++$i).'"></div>';
				};
				tb('-');	
			echo "\n".tb('.').'</div>'."\n";
?>