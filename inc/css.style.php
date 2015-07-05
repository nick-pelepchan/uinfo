<?php
header("Content-type: text/css");
?>
/* All hope abandon ye who enter here */

/* !!! ORDERED BY HIERARCHY !!! */
<?php
include(__DIR__.'/var.color.php');
include(__DIR__.'/var.global.php');
include(__DIR__.'/css.resets.css');
include(__DIR__.'/css.layout.css');
include(__DIR__.'/css.font.css');
include(__DIR__.'/css.media.css');

$back = $ghost_white;
/* http://code.tutsplus.com/tutorials/the-30-css-selectors-you-must-memorize--net-16048
SELECTORS
* (wildcard)
# (id)
. (class)
X (type)
X:visited (pseudo-class)
X Y (descendant)
X + Y (adjacent, 1st element)
X > Y (direct children)
X ~ Y (sibling, any element)
X[title] (attributes)
X:not(Y) (negation)
X::pseudo (pseudo element)
X:nth-child(n) (nth-child)
X:nth-last-child(n) (nth-last-child)
*/
?>
/* HTML */
	html {
		font-family:'Karla';
		font-size:1em; /* Set font-size off user's settings */
		line-height:1.1em;
	}

/* BODY */
	body {
		background:url(/media/dots.png) <?=$black?>;
	}

/* BASE STYLES & ELEMENTS */
	/* selections */
	::-moz-selection {
		background:<?=$prim_lt?>;
		color:<?=$gray?>;
		text-shadow:none;
	}

	::selection {
		background:<?=$prim_lt?>;
		color:<?=$gray?>;
		text-shadow:none;
	}

	/* links */
	a:link,a:visited,a:active,a:hover {
		color:<?=$comp_dkr?>;
		font-weight:bold;
		text-decoration:none;
	}

	a:hover {
		color:<?=$comp?>;
	}

	/* headings */
	h1,h2,h3,h4,h5 {
		color:<?=$prim_dk?>;
		margin:.25em 0 0 0;
		text-shadow:0px 2px 1px <?=$white?>;
		font-family:'Special Elite';
		font-variant:small-caps;
		font-weight:bold;
	}
	
	h1.solid,h2.solid,h3.solid,h4.solid,h5.solid {
		background:<?=$prim_dk?>;
		color:<?=$white?>;
		text-shadow:none;
		text-align:center;
	}

	h1 {
		font-size:2.2rem;
		line-height:2.3rem;
	}

	h2 {
		font-size:2rem;
		line-height:2.1rem;
	}

	h3 {
		font-size:1.8rem;
		line-height:1.9rem;
	}

	h4 {
		font-size:1.6rem;
		line-height:1.7rem;
	}

	h5 {
		font-size:1.4rem;
		line-height:1.5rem;
	}

	/* horizontal rule */
	hr {
		background:<?=$sec1?>;
		border:none;
		border-radius:5px;
		border-bottom:.3em double <?=$sec1_dkr8?>;
		border-left:.1em solid <?=$sec1_dkr8?>;
		border-right:.1em solid <?=$sec1_dkr8?>;
		color:<?=$sec1_dkr?>;
		height:.3em;
		padding:0;
		text-align:center;
	}

	hr:after {
		background:<?=$back?>;
		border-radius:5px;
		content:"†";
		display:inline-block;
		font-weight:bold;
		padding:0 .25em;
		position:relative;
		top:-.4em;
	}

	/* text blocks */
	p {
		margin:0 .5em .5em .5em;
		text-indent:1.5em;
	}

	pre {
		white-space:pre-wrap;
		white-space:-moz-pre-wrap;
		white-space:-pre-wrap;
		white-space:-o-pre-wrap;
		word-wrap:break-word;
	}
	
	sup {
		position:relative;
		bottom:.5em;
		font-size:.8em;
	}
	
	sub {
		position:relative;
		top:.3em;
		font-size:.8em;
	}
	
	/* lists */
	ul {
		list-style-type:disc;
		margin:0 0 .5em 1em;
	}
	
	ul.none {
		list-style-type:none;
		margin:0 0 .5em .5em;
	}

	/* images */
	img {
		max-height:95vh;
		max-width:100%;
	}
	
	img.center {
		display:block;
		margin:1vh auto;
	}

/* CONTAINER */
	#cont {
		background:<?=$back?>;
		color:<?=$gray?>;
		overflow:hidden;
	}
	

/* TOP BAR */
	#topbar {
		font-size:1rem; /* SECTION'S ROOT FONT SIZE */
	}
	
	#topbar .logo {
		background:<?=$sec2?>;
		border-bottom:3px solid <?=$black?>;
		border-right:3px solid <?=$black?>;
		max-height:6vh;
	}
	
/* BACK DIV */
	#back {
		background:<?=$sec2?>;
		border-bottom:3px solid <?=$black?>;
		border-left:3px solid <?=$black?>;
	}
	
	#back .arrow {
		border:none;
		display:inline;
		vertical-align:bottom;
		max-height:1.8rem;
		padding:.1rem;
	}
	
	#back:hover {
		background:<?=$comp_lt?>;
	}
	
	.return a {
		display:inline;
		height:100%;
		width:100%;
	}
	
	.return a span {
		color:<?=$black?>;
		font-family:'Special Elite';
		font-size:2rem;
		font-variant:small-caps;
		text-align:left;
		word-wrap:break-word;
	}
	
/* TILES */
	.tile, .rtile {
		background-color:<?=$prim_lt?>;
		color:<?=$black?>;
		font-family:'Special Elite';
		font-size:2rem;
		font-variant:small-caps;
		line-height:1.8rem;
		overflow:hidden;
		text-align:left;
	}
	
	.tile {
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
	
	.btile {
		background:url(/media/dots.png);
	}

	.tile .pop-title, .rtile .pop-title {
		background-image:url(/media/pow-md.png);
		background-position:center;
		background-repeat:no-repeat;
		background-size:90% 90%;
		bottom:0;
		color:<?=$yellow?>;
		display:none;
		font-weight:bold;
		overflow:visible;
		padding:5rem 1rem 3rem 0;
		position:absolute;
		right:0;
		text-align:center;
		text-shadow:2px 2px 0px <?=$black?>, -2px 2px 0px <?=$black?>, 2px -2px 0px <?=$black?>, -2px -2px 0px <?=$black?>;
		vertical-align:middle;
		width:80%;
		z-index:0;
	}
	
	.tile a, .rtile a {
		color:<?=$black?>;
		display:block;
		height:100%;
		width:100%;
		z-index:1;
	}
	
	.tile a span, .rtile a span {
		background:<?=$white?>;
		border-bottom:5px solid <?=$black?>;
		border-right:5px solid <?=$black?>;
		left:.1em;
		padding:.2em .1em .1em .1em;
		position:absolute;
		top:.1em;
		word-wrap:break-word;
	}
	
	.tile a span:first-letter, .rtile a span:first-letter, .return a span:first-letter {
		color:<?=$prim?>;
		font-size:1.3em;
		font-style:italic;
		padding-right:.1em;
		text-shadow:2px 2px 0px <?=$black?>, -2px 2px 0px <?=$black?>, 2px -2px 0px <?=$black?>, -2px -2px 0px <?=$black?>;
}
	
	.tile:hover a span, .rtile:hover a span {
		background-color:<?=$comp_lt?>;
	}
	
	.tile:hover .pop-title, .rtile:hover .pop-title {
		display:inline !important;
	}
	
/* DEBUG */
	#debug {
		padding:.8vh .8%;
	}

/* MAIN */
	#main {
		font-size:1.2rem; /* SECTION'S ROOT FONT SIZE */
		line-height:1.3rem;
		word-wrap: break-word;
	}

/* SIDE MENU */
		.sidem {
			height:100%;
			padding:0 1vw 0 0;
			width:calc(25% - 2vw);
		}
		
		.sidem li:hover a span {
			color:<?=$comp?>;
		}
		
		.sidem a span {
			color:<?=$prim_dk?>;
			font-size:.9em;
			text-align:left;
			word-wrap:none;
		}
		
		.sidec {
			width:75%;
		}


/* IMAGE GALLERY */
	.zoom span {
		background:none !important;
		border:none !important;
		margin:0 !important;
		padding:0 !important;
	}
	
	.zoom img {
		display:none;
		position:relative;
		z-index:3;
	}

	.zoom:focus img { /*http://www.w3.org/Style/Examples/007/center.en.html*/
		background:<?=$black5?>;
		display:inline;
		left:50%;
		margin-right:-50%;
		max-height:85vh;
		max-width:95vw;
		padding:50vh 50vw;
		position:fixed;
		top:50%;
		transform:translate(-50%,-50%);
		z-index:50;
	}



/* COMP-BOX */
	.comp-box {
		background:<?=$sec2?>;
		border-radius:4px;
/*		box-shadow: inset 3px 3px 10px -3px <?=$black2?>;*/
		color:<?=$gray?>;
		padding:1vh 1vw;
	}

	.comp-box ::-moz-selection {
		background:<?=$sec2_lt?>;
		color:<?=$gray?>;
		text-shadow:none;
	}

	.comp-box ::selection {
		background:<?=$sec2_lt?>;
		color:<?=$gray?>;
		text-shadow:none;
	}

	.comp-box a:link,.comp-box a:visited,.comp-box a:active {
		color:<?=$prim_dkr?>;
	}

	.comp-box a:hover {
		color:<?=$prim?>;
	}

	.comp-box h1,.comp-box h2,.comp-box h3,.comp-box h4,.comp-box h5 {
		color:<?=$comp_dkr?>;
		text-shadow:0px 2px 1px <?=$sec2_lt6?>;
	}

	.comp-box hr {
		background:<?=$prim?>;
		border-radius:5px;
		border-bottom:.3em double <?=$prim_dkr8?>;
		border-left:.1em solid <?=$prim_dkr8?>;
		border-right:.1em solid <?=$prim_dkr8?>;
		color:<?=$prim_dkr?>;
	}

	.comp-box hr:after {
		background:<?=$sec2?>;
	}

/* IPTRACK */
#map {
	margin:0 auto;
	max-height:90vh;
	max-width:100vh;
}
	
/* UNIVERSAL CLASSES */
	.alert {
		background:url(/media/exclaim.png) <?=$comp_ltr?> top left / contain no-repeat;
		border-radius:4px;
		box-shadow: inset 3px 3px 10px -3px <?=$black2?>;
		color:<?=$red?>;
		font-size:1.5em;
		margin:.5em;
		padding:.5em .5em .5em 4em;
		text-align:center;
	}
	
	.block {
		display:block !important;
	}
	
	.center {
		margin:0 auto;
	}
	
	.clearb {
		clear:both;
	}
	
	.clearl {
		clear:left;
	}
	
	.clearr {
		clear:right;
	}

	.clearfix:after {
			clear: both;
			content: " ";
			display: block;
			height: 0;
			overflow: hidden;
			visibility: hidden;
	}

	.debug {
		display:none;
	}

	.fleft {
		float:left;
	}

	.fright {
		float:right;
	}

	.geshi-box {
		border:5px solid <?=$black?>;
		font-family:'Lucida Console','Bitstream Vera Sans Mono','Courier New',Monaco,Courier,monospace;
		font-size:.9em;
		font-variant:normal;
		overflow:auto;
		text-align:left;
		text-shadow:none;
		text-transform:none;
		word-wrap: break-word;
	}
	
	.inline {
		display:inline !important;
	}
	
	.math {
		display:inline-block;
		font-family:'Courier New', monospace;
		font-variant:normal;
		font-size:1em;
		font-weight:bold;
		margin:0 auto;
		vertical-align:middle;
	}

	.math .fraction {
		display:inline-block;
		margin:0;
		padding:.2em;
		vertical-align:middle;
	}

	.math .fraction .den {
		display:block;
		width:100%;
		float:left;
		clear:left;
		text-align:center;
	}

	.math .fraction .num {
		display:block;
		width:100%;
		float:left;
		clear:right;
		border-bottom:1px solid <?=$black?>;
		text-align:center;
	}

	.sub-text {
		font-size:.7em;
	}
	
	.tc {
		text-align:center
	}

	.tj {
		text-align:justify;
	}

	.tl {
		text-align:left;
	}

	.tr {
		text-align:right;
	}
	
	.w50 {
		width:50%;
	}
	
<?php include(__DIR__.'/css.geshi.php');?>