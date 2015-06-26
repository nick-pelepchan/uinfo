<?php
// COLOR PALETT - http://paletton.com/#uid=72y0V0k8NL-0ZWx40SKdZDkj3wi
$base = array(
	array(
		// Primary color:
		'prim_ltr' => '235,240,242',
		'prim_lt' => '203,222,231',
		'prim' => '155,193,210',
		'prim_dk' => '108,162,185',
		'prim_dkr' => '70,134,162',
	),
	array(
		// Secondary color (1):
		'sec1_ltr' => '248,251,244',
		'sec1_lt' => '233,248,217',
		'sec1' => '210,243,176',
		'sec1_dk' => '185,236,133',
		'sec1_dkr' => '162,230, 93',
	),
	array(
		// Secondary color (2):
		'sec2_ltr' => '255,251,247',
		'sec2_lt' => '255,240,223',
		'sec2' => '255,222,185',
		'sec2_dk' => '255,202,144',
		'sec2_dkr' => '255,183,103',
	),
	array(
		// Complement color:
		'comp_ltr' => '251,243,246',
		'comp_lt' => '247,216,227',
		'comp' => '240,174,197',
		'comp_dk' => '232,130,166',
		'comp_dkr' => '224, 91,138',
	),
	array(
		// Red
		'red' => '230,110,110'
	),
	array(
		// Orange
		'orange' => '230,186,110'
	),
	array(
		// Yellow
		'yellow' => '220,230,110'
	),
	array(
		// Green
		'green' => '110,230,112'
	),
	array(
		// Blue
		'blue' => '140,221,242'
	),
	array(
		// Violet
		'violet' => '230,110,226'
	),
	array(
		// White
		'white' => '255,255,255'
	),
	array(
		// Gray
		'gray' => '40,40,40'
	),
	array(
		// Black
		'black' => '0,0,0'
	)
);

$clear = "rgba(0,0,0,0)";

foreach($base as $arr){
	foreach($arr as $k => $v){
		$GLOBALS['pallet'][$k][$k] = 'rgba('.$v.',1)';
		$$k = 'rgba('.$v.',1)';
		for($i=1;$i<10;$i++){
			$GLOBALS['pallet'][$k][$k.$i] = 'rgba('.$v.',.'.$i.')';
			${$k.$i} = 'rgba('.$v.',.'.$i.')';
		};
	};
};

$vars = get_defined_vars(); // http://php.net/manual/en/function.get-defined-vars.php#111830

$maroon='rgba(128,0,0,1)';
$dark_red='rgba(139,0,0,1)';
$brown='rgba(165,42,42,1)';
$firebrick='rgba(178,34,34,1)';
$crimson='rgba(220,20,60,1)';
$tomato='rgba(255,99,71,1)';
$coral='rgba(255,127,80,1)';
$indian_red='rgba(205,92,92,1)';
$light_coral='rgba(240,128,128,1)';
$dark_salmon='rgba(233,150,122,1)';
$salmon='rgba(250,128,114,1)';
$light_salmon='rgba(255,160,122,1)';
$orange_red='rgba(255,69,0,1)';
$dark_orange='rgba(255,140,0,1)';
$cantaloupe='rgba(255,166,47,1)';
$gold='rgba(255,215,0,1)';
$dark_golden_rod='rgba(184,134,11,1)';
$golden_rod='rgba(218,165,32,1)';
$pale_golden_rod='rgba(238,232,170,1)';
$dark_khaki='rgba(189,183,107,1)';
$khaki='rgba(240,230,140,1)';
$olive='rgba(128,128,0,1)';
$yellow_green='rgba(154,205,50,1)';
$dark_olive_green='rgba(85,107,47,1)';
$olive_drab='rgba(107,142,35,1)';
$greenApple='rgba(76,196,23,1)';
$lawn_green='rgba(124,252,0,1)';
$chart_reuse='rgba(127,255,0,1)';
$green_yellow='rgba(173,255,47,1)';
$dark_green='rgba(0,100,0,1)';
$forest_green='rgba(34,139,34,1)';
$comment_green='rgba(51,153,51,1)';
$lime='rgba(0,255,0,1)';
$jadegreen='rgba(94,251,110,1)';
$lime_green='rgba(50,205,50,1)';
$light_green='rgba(144,238,144,1)';
$pale_green='rgba(152,251,152,1)';
$dark_sea_green='rgba(143,188,143,1)';
$medium_spring_green='rgba(0,250,154,1)';
$spring_green='rgba(0,255,127,1)';
$sea_green='rgba(46,139,87,1)';
$medium_aqua_marine='rgba(102,205,170,1)';
$medium_sea_green='rgba(60,179,113,1)';
$light_sea_green='rgba(32,178,170,1)';
$dark_slate_gray='rgba(47,79,79,1)';
$teal='rgba(0,128,128,1)';
$dark_cyan='rgba(0,139,139,1)';
$aqua='rgba(0,255,255,1)';
$cyan='rgba(0,255,255,1)';
$light_cyan='rgba(224,255,255,1)';
$dark_turquoise='rgba(0,206,209,1)';
$turquoise='rgba(64,224,208,1)';
$medium_turquoise='rgba(72,209,204,1)';
$pale_turquoise='rgba(175,238,238,1)';
$aqua_marine='rgba(127,255,212,1)';

$blueEyes='rgba(21,105,199,1)';
$blueGrey='rgba(152,175,199,1)';
$butterfly='rgba(56,172,236,1)';
$metallic='rgba(188,198,204,1)';
$steelblue='rgba(72,99,160,1)';
$aliceblue='rgba(240,248,255,1)';
$silkblue='rgba(72,138,199,1)';
$electricblue='rgba(154,254,255,1)';
$bluehosta='rgba(119,191,199,1)';
$azure='rgba(240,255,255,1)';
$jeansblue='rgba(160,207,236,1)';
$dodgerBlue='rgba(21,137,255,1)';
$bluedress='rgba(21,125,236,1)';
$blueberry='rgba(0,65,194,1)';
$darkSlate='rgba(43,56,86,1)';
$lapis='rgba(21,49,126,1)';
$blue_koi='rgba(101,158,199,1)';

$powder_blue='rgba(176,224,230,1)';
$cadet_blue='rgba(95,158,160,1)';
$steel_blue='rgba(70,130,180,1)';
$corn_flower_blue='rgba(100,149,237,1)';
$deep_sky_blue='rgba(0,191,255,1)';
$dodger_blue='rgba(30,144,255,1)';
$light_blue='rgba(173,216,230,1)';
$sky_blue='rgba(135,206,235,1)';
$light_sky_blue='rgba(135,206,250,1)';
$midnight_blue='rgba(25,25,112,1)';
$navy='rgba(0,0,128,1)';
$dark_blue='rgba(0,0,139,1)';
$medium_blue='rgba(0,0,205,1)';
$royal_blue='rgba(65,105,225,1)';
$blue_violet='rgba(138,43,226,1)';
$indigo='rgba(75,0,130,1)';
$dark_slate_blue='rgba(72,61,139,1)';
$slate_blue='rgba(106,90,205,1)';
$medium_slate_blue='rgba(123,104,238,1)';
$medium_purple='rgba(147,112,219,1)';
$dark_magenta='rgba(139,0,139,1)';
$dark_violet='rgba(148,0,211,1)';
$dark_orchid='rgba(153,50,204,1)';
$medium_orchid='rgba(186,85,211,1)';
$purple='rgba(128,0,128,1)';

$dull_purple = '#7F525D';

$thistle='rgba(216,191,216,1)';
$plum='rgba(221,160,221,1)';
$magenta='rgba(255,0,255,1)';
$orchid='rgba(218,112,214,1)';
$medium_violet_red='rgba(199,21,133,1)';
$pale_violet_red='rgba(219,112,147,1)';
$deep_pink='rgba(255,20,147,1)';
$hot_pink='rgba(255,105,180,1)';
$light_pink='rgba(255,182,193,1)';
$pink='rgba(255,192,203,1)';
$antique_white='rgba(250,235,215,1)';
$beige='rgba(245,245,220,1)';
$bisque='rgba(255,228,196,1)';
$blanched_almond='rgba(255,235,205,1)';
$wheat='rgba(245,222,179,1)';
$corn_silk='rgba(255,248,220,1)';
$lemon_chiffon='rgba(255,250,205,1)';
$light_golden_rod_yellow='rgba(250,250,210,1)';
$light_yellow='rgba(255,255,224,1)';
$saddle_brown='rgba(139,69,19,1)';
$sepia='rgba(127,70,44,1)';
$sienna='rgba(160,82,45,1)';
$chocolate='rgba(210,105,30,1)';
$peru='rgba(205,133,63,1)';
$sandy_brown='rgba(244,164,96,1)';
$burly_wood='rgba(222,184,135,1)';
$tan='rgba(210,180,140,1)';
$rosy_brown='rgba(188,143,143,1)';
$moccasin='rgba(255,228,181,1)';
$navajo_white='rgba(255,222,173,1)';
$peach_puff='rgba(255,218,185,1)';
$misty_rose='rgba(255,228,225,1)';
$lavender_blush='rgba(255,240,245,1)';
$linen='rgba(250,240,230,1)';
$old_lace='rgba(253,245,230,1)';
$papaya_whip='rgba(255,239,213,1)';
$sea_shell='rgba(255,245,238,1)';
$mint_cream='rgba(245,255,250,1)';
$slate_gray='rgba(112,128,144,1)';
$light_slate_gray='rgba(119,136,153,1)';
$light_steel_blue='rgba(176,196,222,1)';
$lavender='rgba(230,230,250,1)';
$floral_white='rgba(255,250,240,1)';
$alice_blue='rgba(240,248,255,1)';
$ghost_white='rgba(248,248,255,1)';
$honeydew='rgba(240,255,240,1)';
$ivory='rgba(255,255,240,1)';
$azure='rgba(240,255,255,1)';
$snow='rgba(255,250,250,1)';
$dim_grey='rgba(105,105,105,1)';
$dark_grey='rgba(169,169,169,1)';
$silver='rgba(192,192,192,1)';

$ltgrey = '#F5F5F5';
$dkgrey = '#333333';
$gunmetal = '#2C3539';
$granite = '#837E7C';
$metallicS = '#BCC6CC';

$light_grey='rgba(211,211,211,1)';
$gainsboro='rgba(220,220,220,1)';
$platinum='rgba(229,228,226,1)';
$white_smoke='rgba(245,245,245,1)';

$GLOBALS['pallet']['basic'] = @array_diff(get_defined_vars(),$vars);

?>