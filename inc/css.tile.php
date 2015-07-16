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