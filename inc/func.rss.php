<?php

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

?>