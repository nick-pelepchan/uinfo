/* HTML */
	html {
		font-family:'Karla';
		font-size:1em; /* Set font-size off user's settings */
		line-height:1.1em;
	}

/* BODY */
	body {
		background:url(/media/dots.png) <?=_BLACK_?>;
	}

/* CONTAINER */
	#cont {
		background:<?=_BACK_?>;
		color:<?=_GRAY_?>;
		overflow:hidden;
	}

/* SELECTIONS */
	::-moz-selection {
		background:<?=_PRIM_LT_?>;
		color:<?=_GRAY_?>;
		text-shadow:none;
	}

	::selection {
		background:<?=_PRIM_LT_?>;
		color:<?=_GRAY_?>;
		text-shadow:none;
	}

/* links */
	a:link,a:visited,a:active,a:hover {
		color:<?=_COMP_DKR_?>;
		font-weight:bold;
		text-decoration:none;
	}

	a:hover {
		color:<?=_COMP_?>;
	}

/* HEADINGS */
	h1,h2,h3,h4,h5 {
		color:<?=_PRIM_DKR_?>;
		margin:.25em 0 0 0;
		text-shadow:0px 2px 1px <?WHITE_?>;
		font-family:'Special Elite';
		font-variant:small-caps;
		font-weight:bold;
	}

	h1.solid,h2.solid,h3.solid,h4.solid,h5.solid {
		background:<?=_PRIM_DK_?>;
		color:<?=_WHITE_?>;
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

/* HORIZONTAL RULE */
	hr {
		background:<?=_SEC1_?>;
		border:none;
		border-radius:5px;
		border-bottom:.3em double <?=_SEC1_DKR8_?>;
		border-left:.1em solid <?=_SEC1_DKR8_?>;
		border-right:.1em solid <?=_SEC1_DKR8_?>;
		color:<?=_SEC1_DKR_?>;
		height:.3em;
		padding:0;
		text-align:center;
	}

	hr:after {
		background:<?=_BACK_?>;
		border-radius:5px;
		content:"†";
		display:inline-block;
		font-weight:bold;
		padding:0 .25em;
		position:relative;
		top:-.4em;
	}

/* TEXT */
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

/* LISTS */
	ul {
		list-style-type:disc;
		margin:0 0 .5em 1em;
	}

	ul.none {
		list-style-type:none;
		margin:0 0 .5em .5em;
	}

/* IMAGES */
	img {
		max-height:95vh;
		max-width:100%;
	}

	img.center {
		display:block;
		margin:1vh auto;
	}