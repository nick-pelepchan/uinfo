<?php
include(__DIR__.'/inc/func.scrape.php');

echo "\n".tb('.').'<div id="scrape">';
tb('+');

	unset($sites,$arr);
	$sites=array();

	// Include scraper templates
//	include(__DIR__.'/inc/jscr.draper.php');
	array_merge($sites,$arr);

	foreach($arr as $site => $args){
		echo "\n".tb('.').'<span class="company"><h1>'.$site.'</h1></span>';

		// Only check for updates every interval
		if(file_exists($args['file'])){
			$check = fgets(fopen($args['file'],'r'));
			if($check <= time()-$args['interval']){
				file_put_contents($args['file'],time()."\n");
				file_put_contents($args['file'],json_encode(jscr_get($args['links'],$args['opts'])),FILE_APPEND);
			};
		} else {
			file_put_contents($args['file'],time()."\n");
			file_put_contents($args['file'],json_encode(jscr_get($args['links'],$args['opts'])),FILE_APPEND);
		};
		
		// Retrieve file contents
		// http://stackoverflow.com/questions/19358539/php-read-specific-lines-in-a-large-file-without-reading-it-line-by-line#19358934
		$data = new SplFileObject($args['file']);
		$data->seek(1);
		$data = json_decode($data->current());
		
			jscr_match($data,$args['regex'],$args['linkex'],$args['titlex'],$args['namex'],$args['datex'],$args['locex']);
	};
	tb('-');
echo "\n".tb('.').'</div>';
?>