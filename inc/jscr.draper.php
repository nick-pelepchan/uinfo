<?php
$arr = array(
	'draper' => array(
		'links' => array(
			'https://jobs.draper.com/psc/hrprd/EMPLOYEE/HRMS/c/,DanaInfo=.aesr65Ejyiyo2Lp21,Port=15026,SSL+HRS_HRAM.HRS_CE.GBL?Page=HRS_CE_HM_PRE&Action=A&SiteId=4',
			'https://jobs.draper.com/psc/hrprd/EMPLOYEE/HRMS/c/,DanaInfo=.aesr65Ejyiyo2Lp21,Port=15026,SSL+HRS_HRAM.HRS_CE.GBL?Page=HRS_CE_HM_PRE&Action=A&SiteId=3'
		),
		'opts' => array(
			CURLOPT_RETURNTRANSFER => TRUE,
			CURLOPT_HEADER => FALSE,
			CURLOPT_USERAGENT => 'spider',
			CURLOPT_FOLLOWLOCATION => TRUE,
			CURLOPT_ENCODING => '',
			CURLOPT_AUTOREFERER => TRUE,
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_COOKIEJAR => '/tmp/cookies.txt',
			CURLOPT_COOKIEFILE => '/tmp/cookies.txt'
		),
		'titlex' => '~id=\'HRS_APPL_WRK_HRS_PAGE_TITLE\'\>(.*)\<\/span~m',
		'regex' => '~\<tr id=\'trHRS.*\>(.*)\<~m',
		'namex' => '~\<DIV id=\'win0divPOSTINGTITLE.*\<a.*\>(.*)\<\/a\>~m',
		'linkex' => '~\<DIV id=\'win0divPOSTINGTITLE.*href=\"(.*)\"~m',
		'datex' => '~\<DIV id=\'win0divOPENED.*\<a.*\>(.*)\<\/a\>~m',
		'locex' => '~\<DIV id=\'win0divHRS_LOCATION_DESCR.*\<a.*\>(.*)\<\/a\>~m',
		'file' => dirname(__DIR__).'/jscrapes/draper.json',
		'interval' => '86400' // 24 hours
	)
);
?>