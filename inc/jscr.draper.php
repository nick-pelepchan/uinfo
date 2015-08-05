<?php
$arr = array(
	'draper' => array(
		'links' => array(
			'https://jobs.draper.com/psc/hrprd/EMPLOYEE/HRMS/c/HRS_HRAM.HRS_CE.GBL,DanaInfo=.aesr65Ejyiyo2Lp21,Port=15026,SSL,SSO=U+?Page=HRS_CE_HM_PRE&Action=A&SiteId=1',
			'https://jobs.draper.com/psc/hrprd/EMPLOYEE/HRMS/c/,DanaInfo=.aesr65Ejyiyo2Lp21,Port=15026,SSL+HRS_HRAM.HRS_CE.GBL?Page=HRS_CE_HM_PRE&Action=A&SiteId=4',
			'https://jobs.draper.com/psc/hrprd/EMPLOYEE/HRMS/c/,DanaInfo=.aesr65Ejyiyo2Lp21,Port=15026,SSL+HRS_HRAM.HRS_CE.GBL?Page=HRS_CE_HM_PRE&Action=A&SiteId=3'
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