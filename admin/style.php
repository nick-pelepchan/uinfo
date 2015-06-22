/* All hope abandon ye who enter here */

/* !!! ORDERED BY HIERARCHY !!! */

<?php
header("Content-type: text/css");
include(__DIR__.'/colors.php');
include(__DIR__.'/vars.php');
include(__DIR__.'/resets.css');
include(__DIR__.'/layout.css');
include(__DIR__.'/font.css');
include(__DIR__.'/media.css');

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
		font-size:1.9rem;
	}

	h2 {
		font-size:1.7rem;
	}

	h3 {
		font-size:1.5rem;
	}

	h4 {
		font-size:1.3rem;
	}

	h5 {
		font-size:1.1rem;
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
		margin:0 .5em 1em .5em;
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

	/* images */
	img {
		max-height:calc( 100vh - ( 2.9rem + 4px ) );
		max-width:100%;
	}

/* CONTAINER */
	#cont {
		background:<?=$back?>;
		color:<?=$gray?>;
	}
	
/* TILES */
	.tile {
		background-color:<?=$prim_lt?>;
		background-position:0px 0px,center;
		background-repeat:no-repeat,no-repeat;
		-webkit-background-size:100% 100%,cover,;
		-moz-background-size:100% 100%,cover;
		-o-background-size:100% 100%,cover;
		background-size:100% 100%,cover;
		overflow:hidden;
	}
	
	.tile a {
		display:block;
		height:100%;
		width:100%;
	}
	
	.tile a span {
		background:<?=$black?>;
		color:<?=$white?>;
		font-family:'Special Elite';
		font-size:2rem;
		font-variant:small-caps;
		left:0;
		padding:.1em;
		position:absolute;
		top:0;
		word-wrap:break-word;
	}
	
	.tile:hover a span {
		color:<?=$sec1_dkr?>;
	}
	
/* DEBUG */
	#debug {
		padding:.8vh .8%;
	}

/* TOP BAR */
	#topbar {
		background:<?=$back?>;
		border-bottom:4px solid <?=$sec1_dk?>;
		font-size:1rem; /* SECTION'S ROOT FONT SIZE */
	}
	
	#topbar img {
		max-height:6vh;
	}
	
/* NAV */
	#nav {
		background:<?=$aliceblue?>;
		border-bottom:4px solid <?=$prim_dk?>;
		font-family:'Homenaje';
		font-size:1.9rem; /* SECTION'S ROOT FONT SIZE */
	}

	#nav .nav-item {
		background:<?=$aliceblue?>;
		display:inline-block;
		text-transform:capitalize;
		word-wrap:break-word;
	}

	#nav .nav-item > a {
		font-variant:small-caps;
		font-weight:bold;
		height:1em;
		padding:0 .25em;
		text-align:center;
		vertical-align:middle;
		z-index:10;
	}
	
	#nav .nav-item > a img {
		height:1em;
		vertical-align:middle;
	}
	
	#nav .nav-item li,#nav .navitem ul {
		list-style:none;
	}

	/* NAV HEADINGS */
	#nav .nav-item > a {
		color:<?=$prim_dk?>;
	}

	#nav .nav-item > a:hover {
		color:<?=$sec2_dk?>;
	}

	/* NAV SUB-HEADINGS */
	#nav .nav-item a + ul {
		background:<?=$back?>;
		border:2px solid <?=$prim_dk?>;
		border-radius:0 0 5px 5px;
		bottom:0;
		font-size:.8em;
		overflow:hidden;
		position:absolute;
		transition: bottom 1.5s ease-in;
		-moz-transition: bottom 1.5s ease-in;
		-ms-transition: bottom 1.5s ease-in;
		-o-transition: bottom 1.5s ease-in;
		-webkit-transition: bottom 1.5s ease-in;
		z-index:-1;
	}
	
	#nav .nav-item a + ul li {
		padding:.1em .5em;
	}

	#nav .nav-item a:focus + ul {
		transition: bottom .5s ease-out;
		-moz-transition: bottom .5s ease-out;
		-ms-transition: bottom .5s ease-out;
		-o-transition: bottom .5s ease-out;
		-webkit-transition: bottom .5s ease-out;
	}
	
	#nav .nav-item a:focus + ul.academic {
		bottom:calc(-1 * ( 1.2em * 5 ) );
	}

	#nav .nav-item a:focus + ul.photo {
		bottom:calc(-1 * ( 1.2em * 7 ) );
	}

	#nav .nav-item a:focus  + ul.projects {
		bottom:calc(-1 * ( 1.2em * 1 ) );
	}

	#nav .nav-item li a {
		color:<?=$prim_dk?>;
		font-weight:normal;
	}

	#nav .nav-item li a.nav-sub {
	}

	#nav .nav-item li:hover {
		background:<?=$sec2?>;
		color:<?=$black9?>;
		font-weight:normal;
	}
	
/* SIDE */
	#side a {
		display:block;
		font-size:1.2rem; /* SECTION'S ROOT FONT SIZE */
		padding:.25em;
	}
	
	#side img {
		display:block;
		margin:0 auto;
	}
	
	#side a:link,#side a:visited,#side a:active {
		color:<?=$gray?>;
		font-weight:bold;
		text-decoration:none;
	}
	
	#side a:not(.recent) .sub-text { /* hide sub-text info -a.recent */
		display:none;
	}

	#side a:hover{
		background:<?=$sec2_dkr5?>;
	}
	
	#side a:hover:not(.recent) .sub-text { /* show sub-text info -a.recent */
		display:inline;
	}
	
	#side h1,#side h2,#side h3,#side h4,#side h5 {
		margin:0;
	}
	
	#side h1.solid,#side h2.solid,#side h3.solid,#side h4.solid,#side h5.solid {
		margin:.25em 0 0 0;
	}
	
	#side a:hover h5 {
		text-shadow:none;
	}
	
	#side .sub-text {
		margin:0;
		font-size:.9em;
		line-height:1em;
		font-weight:normal;
	}

/* MAIN */
	#main {
		font-size:1rem; /* SECTION'S ROOT FONT SIZE */
		line-height:1.2rem;
		text-align:justify;
		word-wrap: break-word;
	}

	#main img {
		display:block;
		margin:.2em auto;
	}

	#main #subbar {
		left:0;
		margin:0 .5em 0 0;
		position:absolute;
		text-align:left;
		top:0;
		width:15vw;
	}

	#main #subbar h5 {
		left:0;
		position:relative;
		top:0;
		border-bottom:.1em solid <?=$comp?>;
	}

	#main #subbar a {
		display:block;
		margin:.2em 0 0 0;
		max-width:calc(15vw - .5em);
		overflow:hidden;
		vertical-align:top;
	}

	#main #subbar img {
		margin:.2em;
		max-height:200px;
		max-width:calc(15vw - .5em);
	}

	#main #subbar ~ .main {
		margin:0 0 0 15vw;
	}

/* IMAGE GALLERY */
	#gallery {
		width:100%;
		text-align:center;
	}

	#gallery .base {
		display:inline-block;
		height:20%;
		margin:.5em;
		width:20%;
		vertical-align:middle;
	}
			
	#gallery .base img{
		background:<?=$white?>;
		border:.1em solid <?=$black?>;
		box-shadow:2px 2px 5px <?=$black5?>;
		display:block;
		max-height:20%;
		padding:.2em;
	}

	.zoom {
		background:<?=$black8?>;
		bottom:0;
		left:0;
		position:fixed;
		right:0;
		top:0;
		z-index:100;
	}

	.zoom img { /*http://www.w3.org/Style/Examples/007/center.en.html */
		left:50%;
		margin-right:-50%;
		max-height:95vh;
		max-width:95vw;
		position:fixed;
		top:50%;
		transform:translate(-50%,-50%);
	}

	.zoom .closeimg {
		background:url(/media/close.png) top left / contain no-repeat;
		font-size:2em;
		height:1.5em;
		position:fixed;
		right:.5em;
		top:.5em;
		width:1.5em;
	}

	#capbox {
		background:<?=$black5?>;
		bottom:0;
		color:<?=$white?>;
		left:0;
		padding:.5em;
		position:fixed;
		right:0;
	}

	/*.img_zoom:focus img { /*http://www.w3.org/Style/Examples/007/center.en.html
		left:50%;
		margin-right:-50%;
		max-height:78vh;
		max-width:95vw;
		position:fixed;
		top:55%;
		transform:translate(-50%,-50%);
	}*/



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
	
<?php include(__DIR__.'/geshi.php');?>