<?php	
// ROWS & COLUMNS
	$lr1='.8vh';
	$lr2='31.6vh';
	$lr3='62.4vh';
	$lc1='.8%';
	$lc2='20.6%';
	$lc3='40.4%';
	$lc4='60.2%';
	$lc5='80%';
?>

/* TILES */
	.tile, .rtile {
		background-color:<?=_PRIM_LT_?>;
		color:<?=_BLACK_?>;
		font-family:'Special Elite';
		font-size:2rem;
		font-variant:small-caps;
		line-height:1.8rem;
		overflow:hidden;
		text-align:left;
	}
	
	.tiny-tile {
		background-color:<?=_PRIM_LT_?>;
		color:<?=_BLACK_?>;
		font-family:'Special Elite';
		font-size:1.4rem;
		font-variant:small-caps;
		line-height:1.2rem;
		overflow:hidden;
		text-align:left;
	}
	
	.tile, .tiny-tile {
		background-position:0px 0px,center;
		background-repeat:no-repeat,no-repeat;
		-webkit-background-size:100% 100%,cover,;
		-moz-background-size:100% 100%,cover;
		-o-background-size:100% 100%,cover;
		background-size:100% 100%,cover;
	}
	
		.rtile {
		background-position:center,center,center;
		background-repeat:no-repeat,no-repeat,no-repeat;
		-webkit-background-size:100% 100%,cover,cover,;
		-moz-background-size:100% 100%,cover,cover;
		-o-background-size:100% 100%,cover,cover;
		background-size:100% 100%,cover,cover;
	}
	
	.btile, .tiny-btile {
		background:url(/media/dots.png);
	}

	.tile .pop-title, .rtile .pop-title {
		background-image:url(/media/pow-md.png);
		background-position:center;
		background-repeat:no-repeat;
		background-size:90% 90%;
		bottom:0;
		color:<?=_YELLOW_?>;
		display:none;
		font-weight:bold;
		overflow:visible;
		padding:5rem 1rem 3rem 0;
		position:absolute;
		right:0;
		text-align:center;
		text-shadow:2px 2px 0px <?=_BLACK_?>, -2px 2px 0px <?=_BLACK_?>, 2px -2px 0px <?=_BLACK_?>, -2px -2px 0px <?=_BLACK_?>;
		vertical-align:middle;
		width:80%;
		z-index:0;
	}
	
	.tiny-tile .pop-title {
		background-image:url(/media/pow-md.png);
		background-position:center;
		background-repeat:no-repeat;
		background-size:90% 90%;
		bottom:0;
		color:<?=_YELLOW_?>;
		display:none;
		font-weight:bold;
		overflow:visible;
		padding:5em 1em 3em 0;
		position:absolute;
		right:0;
		text-align:center;
		text-shadow:2px 2px 0px <?=_BLACK_?>, -2px 2px 0px <?=_BLACK_?>, 2px -2px 0px <?=_BLACK_?>, -2px -2px 0px <?=_BLACK_?>;
		vertical-align:middle;
		width:80%;
		z-index:0;
	}
	
	.tile a, .rtile a, .tiny-tile a {
		color:<?=_BLACK_?>;
		display:block;
		height:100%;
		width:100%;
		z-index:1;
	}
	
	.tile a span, .rtile a span, .tiny-tile a span {
		background:<?=_WHITE_?>;
		border-bottom:5px solid <?=_BLACK_?>;
		border-right:5px solid <?=_BLACK_?>;
		left:.1em;
		padding:.2em .1em .1em .1em;
		position:absolute;
		top:.1em;
		word-wrap:break-word;
	}
	
	.tiny-tile a span {
		border-bottom:3px solid <?=_BLACK_?>;
		border-right:3px solid <?=_BLACK_?>;
	}
	
	.tile a span:first-letter, .rtile a span:first-letter, .tiny-tile a span:first-letter, .return a span:first-letter {
		color:<?=_PRIM_?>;
		font-size:1.3em;
		font-style:italic;
		padding-right:.1em;
		text-shadow:2px 2px 0px <?=_BLACK_?>, -2px 2px 0px <?=_BLACK_?>, 2px -2px 0px <?=_BLACK_?>, -2px -2px 0px <?=_BLACK_?>;
}
	
	.tile:hover a span, .rtile:hover a span, .tiny-tile:hover a span {
		background-color:<?=_COMP_LT_?>;
	}
	
	.tile:hover .pop-title, .rtile:hover .pop-title, .tiny-tile:hover .pop-title {
		display:inline !important;
	}
	
	.tileset {
		height:92vh;
		position:relative;
		width:100%;
		z-index:3;
	}
	
	.tile, .rtile, .btile {
		float:left;
		margin:0 .8% .8vh 0;
		position:relative;
	}
	
	.one {
		clear:left;
		height:60.8vh;
		margin-left:.8%;
		width:19%;
	}
	
	.two {
		height:30vh;
		width:38.8%;
	}
	
	.three {
		height:60.8vh;
		width:19%;
	}
	
	.four {
		height:30vh;
		width:19%;
	}
	
	.five {
		height:60.8vh;
		margin-left:-79.2%;
		margin-top:30.8vh;
		width:19%;
	}
	
	.six {
		height:30vh;
		margin-left:-59.4%;
		margin-top:30.8vh;
		width:19%;
	}
	
	.seven {
		height:60.8vh;
		width:19%;
	}
	
	.eight {
		height:30vh;
		margin-top:-30.8vh;
		margin-left:.8%;
		width:19%;
	}
	
	.nine {
		height:30vh;
		margin-left:40.4%;
		margin-top:-30.8vh;
		width:38.8%;
	}
	
	.tiny-tile, .tiny-btile {
		float:left;
		margin:0 .6% .6vh 0;
		position:relative;
	}
	
	.tiny-one {
		clear:left;
		height:45.6vh;
		margin-left:.6%;
		width:13.6%;
	}
	
	.tiny-two {
		height:22.5vh;
		width:13.6%;
	}
	
	.tiny-three {
		height:22.5vh;
		width:27.8%;
	}
	
	.tiny-four {
		height:45.6vh;
		width:13.6%;
	}
	
	.tiny-five {
		height:22.5vh;
		width:27.8%;
	}
	
	.tiny-six {
		height:22.5vh;
		margin-left:-85.2%;
		margin-top:23.1vh;
		width:27.8%;
	}
	
	.tiny-seven {
		height:22.5vh;
		margin-left:-56.8%;
		margin-top:23.1vh;
		width:13.6%;
	}
	
	.tiny-eight {
		height:45.6vh;
		width:13.6%;
	}
	
	.tiny-nine {
		height:22.5vh;
		width:13.6%;
	}
	
	.tiny-ten {
		height:22.5vh;
		margin-left:.6%;
		margin-top:-23.1vh;
		width:27.8%;
	}
	
	.tiny-eleven {
		height:22.5vh;
		margin-left:29%;
		margin-top:-23.1vh;
		width:13.6%;
	}
	
	.tiny-twelve {
		height:45.6vh;
		margin-left:43.2%;
		margin-top:-23.1vh;
		width:13.6%;
	}
	
	.tiny-thirteen {
		height:22.5vh;
		margin-top:-23.1vh;
		width:13.6%;
	}
	
	.tiny-fourteen {
		height:45.6vh;
		margin-left:28.4%;
		margin-top:-23.1vh;
		width:13.6%;
	}
	
	.tiny-fifteen {
		height:22.5vh;
		margin-left:.6%;
		margin-top:-23.1vh;
		width:13.6%;
	}
	
	.tiny-sixteen {
		height:22.5vh;
		margin-left:14.8%;
		margin-top:-23.1vh;
		width:27.8%;
	}
	
	.tiny-seventeen {
		height:22.5vh;
		margin-left:57.4%;
		margin-top:-23.1vh;
		width:27.8%;
	}