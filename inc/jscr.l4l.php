<?php
$arr = array(
	'l4l' => array(
		'links' => array(
			''
		),
		'opts' => array(
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_USERAGENT => 'spider',
			CURLOPT_FOLLOWLOCATION => TRUE,
			CURLOPT_ENCODING => '',
			CURLOPT_AUTOREFERER => TRUE,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_COOKIEJAR => '/tmp/cookies.txt'
		),
		'titlex' => '`id=\'HRS_APPL_WRK_HRS_PAGE_TITLE\'\>(.*)\<\/span`mU',
		'regex' => '`\<tr id=\'trHRS.*\>(.*)\<\/tr\>`mUs',
		'namex' => '`\<DIV id=\'win0divPOSTINGTITLE.*\<a.*\>(.*)\<\/a\>`mU',
		'linkex' => '`\<DIV id=\'win0divPOSTINGTITLE.*href=\"(.*)\"`mU',
		'datex' => '`\<DIV id=\'win0divOPENED.*\<span.*\>(.*)\<\/span\>`mU',
		'locex' => '`\<DIV id=\'win0divHRS_LOCATION_DESCR.*\<span.*\>(.*)\<\/span\>`mU',
		'file' => dirname(__DIR__).'/jscrapes/draper.json',
		'interval' => '86400' // 24 hours
	)
);
?>