<?php

/////////////////////////////////////////////////////////////////
// Data Scraping
//
// http://scraping.pro/scraping-in-php-with-curl/
// http://stackoverflow.com/questions/2126300/curl-malformed-url
// http://www.electrictoolbox.com/php-curl-cookies/
//

function jscr_get($links,$opts){
	unset($arr);
	foreach($links as $url){
		$ch = curl_init($url);

		// Return transfer page as string
		curl_setopt_array($ch, $opts);
		
		$curl[0] = curl_exec($ch);
		$err = curl_errno($ch);
		$errmsg = curl_error($ch);
		$curl[1] = curl_getinfo($ch);
		$curl[2] = $url;
		$curl[3] = parse_url($url);
		curl_close($ch);

		if(!$errmsg==''){
			die($err.':'.$errmsg);
		};
		$arr[] = $curl;
	};
	return $arr;
};

function jscr_match($data,$regex,$linkex,$titlex,$namex,$datex,$locex){
	/* 
		$data[#][0] - contents
		$data[#][1] - header
		$data[#][2] - url
		$data[#][3] - parsed url
	*/
	foreach($data as $v){
		preg_match($titlex,$v[0],$title); // Get title
		echo "\n".tb('.').'<span class="title"><h4><a target="_blank" href="'.$v[2].'">'.$title[1].'</a></h4></span>';
		
		if(preg_match_all($regex,$v[0],$list)){ // Get listing
			print_r($list);
			foreach($list[0] as $k => $v){
				preg_match($namex,$v,$name);
				preg_match($datex,$v,$dte);
				preg_match($locex,$v,$loca);
				if(preg_match($linkex,$v,$href)){
					if(FALSE === filter_var($href[1], FILTER_VALIDATE_URL)){
						print '<span class="result"><a target="_blank" href="'.ltrim($href[1],'/').'">'.$name.' - '.$dte.' - '.$loca.'</a></span><br/>';
					};
				};
			};
		};
	};
};

//
//
/////////////////////////////////////////////////////////////////

?>